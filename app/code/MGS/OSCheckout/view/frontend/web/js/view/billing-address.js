/**
 * @copyright Copyright © 2020 magesolution. All rights reserved.
 * @author    @copyright Copyright (c) 2014 magesolution (<https://www.magesolution.com>)
 * @license <https://www.magesolution.com/license-agreement.html>
 * @Author: ndthien0912<ndthien0912@gmail.com>
 * @github: <https://github.com/magesolution>
 */
define([
    "jquery",
    "ko",
    "underscore",
    "Magento_Checkout/js/view/billing-address",
    "Magento_Checkout/js/model/quote",
    "Magento_Checkout/js/checkout-data",
    "MGS_OSCheckout/js/model/one-step-checkout-data",
    "Magento_Checkout/js/action/create-billing-address",
    "Magento_Checkout/js/action/select-billing-address",
    "Magento_Customer/js/model/customer",
    "Magento_Checkout/js/action/set-billing-address",
    "Magento_Checkout/js/model/address-converter",
    "Magento_Checkout/js/model/payment/additional-validators",
    "Magento_Ui/js/model/messageList",
    "Magento_Checkout/js/model/checkout-data-resolver",
    "MGS_OSCheckout/js/model/address/auto-complete",
    "uiRegistry",
    "mage/translate",
    "rjsResolver",
], function (
    $,
    ko,
    _,
    Component,
    quote,
    checkoutData,
    OneStepCheckoutData,
    createBillingAddress,
    selectBillingAddress,
    customer,
    setBillingAddressAction,
    addressConverter,
    additionalValidators,
    globalMessageList,
    checkoutDataResolver,
    addressAutoComplete,
    registry,
    $t,
    resolver
) {
    "use strict";

    var observedElements = [],
        canShowBillingAddress =
            window.checkoutConfig.mageConfig.showBillingAddress;
    return Component.extend({
        defaults: {
            template: "MGS_OSCheckout/address/billing/form",
            actionsTemplate: "MGS_OSCheckout/address/billing/actions",
            formTemplate: "MGS_OSCheckout/address/billing/form",
            detailsTemplate: "MGS_OSCheckout/address/billing/details",
            links: {
                isAddressFormVisible:
                    "${$.billingAddressListProvider}:isNewAddressSelected",
            },
        },
        isCustomerLoggedIn: customer.isLoggedIn,
        quoteIsVirtual: quote.isVirtual(),
        isAddressSameAsShipping: ko.observable(true),
        isAddressSameAsShipping: ko.observableArray(["billingAddress"]),

        canUseShippingAddress: ko.computed(function () {
            return (
                !quote.isVirtual() &&
                quote.shippingAddress() &&
                quote.shippingAddress().canUseForBilling() &&
                canShowBillingAddress
            );
        }),

        /**
         * @return {exports}
         */
        initialize: function () {
            var self = this;

            this._super();

            this.initFields();

            additionalValidators.registerValidator(this);

            registry.async("checkoutProvider")(function (checkoutProvider) {
                var billingAddressData =
                    checkoutData.getBillingAddressFromData();

                if (billingAddressData) {
                    checkoutProvider.set(
                        "billingAddress",
                        $.extend(
                            {},
                            checkoutProvider.get("billingAddress"),
                            billingAddressData
                        )
                    );
                }
                checkoutProvider.on(
                    "billingAddress",
                    function (billingAddressData) {
                        checkoutData.setBillingAddressFromData(
                            billingAddressData
                        );
                    }
                );
            });

            quote.shippingAddress.subscribe(function (newAddress) {
                if (self.isAddressSameAsShipping()) {
                    selectBillingAddress(newAddress);
                }
            });

            resolver(this.afterResolveDocument.bind(this));

            quote.paymentMethod.subscribe(function () {
                checkoutDataResolver.resolveBillingAddress();
            }, this);

            return this;
        },

        useShippingAddress: function () {
            if ($("#billing-address-same-as-shipping-shared").is(":checked")) {
                $(".billing-address-form").hide();
                $(".billing-address-select-payment-method").hide();
                if (this.isAddressSameAsShipping()) {
                    selectBillingAddress(quote.shippingAddress());
                    checkoutData.setSelectedBillingAddress(null);
                    if (window.checkoutConfig.reloadOnBillingAddress) {
                        setBillingAddressAction(globalMessageList);
                    }
                } else {
                    this.updateAddress();
                }
            } else {
                this.getShippingAddress();
                $(".billing-address-select-payment-method").show();
                const $selectPaymentMethod = $("#selectPaymentMethod");
                const currentValue =  $selectPaymentMethod.val();
                if (currentValue === "new_address") {
                    $(".billing-address-form").show();
                } else {
                    $(".billing-address-form").hide();
                }

                $selectPaymentMethod.on("change", function () {
                    let selectedValue = $(this).val();

                    if (selectedValue === "new_address") {
                        $(".billing-address-form").show();
                    } else {
                        $(".billing-address-form").hide();
                    }
                });

                $("#btn-update-address").on("click", function () {
                    let selectedValue = $("#selectPaymentMethod").val();
                    if (selectedValue === "new_address") {
                        let form = document
                            .querySelector(
                                'fieldset[data-form="billing-new-address"]'
                            )
                            .closest("form");
                        let customerData = customer.customerData;
                        let inputs = document.querySelectorAll(
                            'input[name^="street["]'
                        );
                        let values = [];
                        inputs.forEach(function (input) {
                            if (input.value !== "") {
                                values.push(input.value);
                            }
                        });

                        let formData = new FormData(form);
                        let selectedAddress = {
                            customerId: customerData.id,
                            email: customerData.email,
                            company: formData.get("company"),
                            prefix: null,
                            firstname: formData.get("firstname"),
                            lastname: formData.get("lastname"),
                            middlename: null,
                            suffix: null,
                            street: values,
                            city: formData.get("city"),
                            region: null,
                            region_id: "0",
                            postcode: formData.get("postcode"),
                            country_id: formData.get("country_id"),
                            telephone: formData.get("telephone"),
                            fax: null,
                            default_billing: null,
                            default_shipping: null,
                            custom_attributes: [],
                            extension_attributes: {},
                            vat_id: null,
                        };

                        let newBillingAddress =
                            createBillingAddress(selectedAddress);
                        selectBillingAddress(newBillingAddress);
                        checkoutData.setSelectedBillingAddress(
                            newBillingAddress.getKey()
                        );
                        checkoutData.setNewCustomerBillingAddress(
                            selectedAddress
                        );

                        console.log(newBillingAddress);
                    } else {
                        let addresses = customer.customerData.addresses;
                        let selectedAddress = addresses[selectedValue];
                        selectedAddress["region"] = null;
                        let newBillingAddress =
                            createBillingAddress(selectedAddress);
                        quote.billingAddress(newBillingAddress);
                        selectBillingAddress(newBillingAddress);
                        checkoutData.setSelectedBillingAddress(
                            newBillingAddress.getKey()
                        );
                        checkoutData.setNewCustomerBillingAddress(
                            addresses[selectedValue]
                        );
                    }
                });
            }

            return true;
        },
        afterResolveDocument: function () {
            this.saveBillingAddress();

            addressAutoComplete.register("billing");
        },

        onAddressChange: function (address) {
            this._super(address);

            if (!this.isAddressSameAsShipping() && canShowBillingAddress) {
                this.updateAddress();
            }
        },

        updateAddress: function () {
            var mgpDetailsBilling = $(".billing-address-details-mgp"),
                formBillingaddress = $(".form-mgp-billing-address");
            if (this.selectedAddress() && !this.isAddressFormVisible()) {
                newBillingAddress = createBillingAddress(
                    this.selectedAddress()
                );
                selectBillingAddress(newBillingAddress);
                checkoutData.setSelectedBillingAddress(
                    this.selectedAddress().getKey()
                );
            } else {
                var addressData = this.source.get("billingAddress"),
                    newBillingAddress;

                newBillingAddress = createBillingAddress(addressData);
                selectBillingAddress(newBillingAddress);
                checkoutData.setSelectedBillingAddress(
                    newBillingAddress.getKey()
                );
                checkoutData.setNewCustomerBillingAddress(addressData);
                if (
                    addressData.firstname != "" &&
                    addressData.lastname != "" &&
                    addressData.street["0"] != "" &&
                    addressData.city != "" &&
                    addressData.telephone != ""
                ) {
                    mgpDetailsBilling
                        .find(".billing-address-detail-child")
                        .html(
                            addressData.firstname +
                                " " +
                                addressData.lastname +
                                "<br><br>" +
                                addressData.street["0"] +
                                " " +
                                addressData.street["1"] +
                                " " +
                                addressData.street["2"] +
                                "<br><br>" +
                                addressData.city +
                                ", " +
                                addressData.postcode +
                                "<br><br>" +
                                '<a href="tel:' +
                                addressData.telephone +
                                '">' +
                                addressData.telephone +
                                "</a>"
                        );
                    formBillingaddress.hide();
                    mgpDetailsBilling.show();
                }
            }

            if (window.checkoutConfig.reloadOnBillingAddress) {
                setBillingAddressAction(globalMessageList);
            }
        },

        editAddressBilling: function () {
            var mgpDetailsBilling = $(".billing-address-details-mgp"),
                formBillingaddress = $(".form-mgp-billing-address");
            formBillingaddress.show();
            mgpDetailsBilling.hide();
            $(this).parent().hide();
        },
        cancelAddressEdit: function () {
            var checkBox = $("#billing-address-same-as-shipping-shared");
            $(document).find(checkBox).trigger("click");
            this.restoreBillingAddress();
        },

        initFields: function () {
            var self = this,
                addressFields = window.checkoutConfig.mageConfig.addressFields,
                fieldsetName =
                    "checkout.steps.shipping-step.billingAddress.billing-address-fieldset";

            $.each(addressFields, function (index, field) {
                registry.async(fieldsetName + "." + field)(
                    self.bindHandler.bind(self)
                );
            });

            return this;
        },

        bindHandler: function (element) {
            var self = this;

            if (element.component.indexOf("/group") !== -1) {
                $.each(element.elems(), function (index, elem) {
                    registry.async(elem.name)(function () {
                        self.bindHandler(elem);
                    });
                });
            } else {
                element.on(
                    "value",
                    this.saveBillingAddress.bind(this, element.index)
                );
                observedElements.push(element);
            }
        },

        saveBillingAddress: function (fieldName) {
            if (!this.isAddressSameAsShipping()) {
                if (!canShowBillingAddress && !this.quoteIsVirtual) {
                    selectBillingAddress(quote.shippingAddress());
                } else if (this.isAddressFormVisible()) {
                    var addressFlat =
                            addressConverter.formDataProviderToFlatData(
                                this.collectObservedData(),
                                "billingAddress"
                            ),
                        newBillingAddress;

                    newBillingAddress = createBillingAddress(addressFlat);
                    selectBillingAddress(newBillingAddress);
                    checkoutData.setSelectedBillingAddress(
                        newBillingAddress.getKey()
                    );
                    checkoutData.setNewCustomerBillingAddress(addressFlat);

                    if (
                        window.checkoutConfig.reloadOnBillingAddress &&
                        fieldName == "country_id"
                    ) {
                        setBillingAddressAction(globalMessageList);
                    }
                }
            }
        },

        collectObservedData: function () {
            var observedValues = {};

            $.each(observedElements, function (index, field) {
                observedValues[field.dataScope] = field.value();
            });

            return observedValues;
        },

        validate: function () {
            if (this.isAddressSameAsShipping()) {
                OneStepCheckoutData.setData("same_as_shipping", true);
                return true;
            }

            if (!this.isAddressFormVisible()) {
                return true;
            }

            this.source.set("params.invalid", false);
            this.source.trigger("billingAddress.data.validate");

            if (this.source.get("billingAddress.custom_attributes")) {
                this.source.trigger(
                    "billingAddress.custom_attributes.data.validate"
                );
            }

            OneStepCheckoutData.setData("same_as_shipping", false);
            return !this.source.get("params.invalid");
        },
        getShippingAddress: function () {
            let billingAddress = quote.billingAddress();
            let customerAddress = customer.customerData.addresses;
            let OptionAddress = "";
            if (customerAddress) {
                for (const key in customerAddress) {
                    if (customerAddress.hasOwnProperty(key)) {
                        const address = customerAddress[key];
                        OptionAddress += `<option value="${address.id}">${address.inline}</option>`;
                    }
                }
            }
            OptionAddress += `<option value="new_address">New Address</option>`;
            $("#selectPaymentMethod").html(OptionAddress);
        },
        getAddressTemplate: function () {
            return "MGS_OSCheckout/address/billing/form";
        },
    });
});
