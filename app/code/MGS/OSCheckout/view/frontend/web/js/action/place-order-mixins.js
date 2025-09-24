/**
 * @copyright Copyright © 2020 magesolution. All rights reserved.
 * @license   https://www.magesolution.com/license-agreement.html
 * @Author:   ndthien0912 <ndthien0912@gmail.com>
 * @github:   https://github.com/magesolution
 */
define([
    'jquery',
    'mage/utils/wrapper',
    'MGS_OSCheckout/js/action/set-checkout-information',
], function ($, wrapper, setCheckoutInformationAction) {
    'use strict';

    return function (placeOrderAction) {
        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            var deferred = $.Deferred();

            if (paymentData && paymentData.method === 'braintree_paypal') {
                setCheckoutInformationAction().done(function () {
                    originalAction(paymentData, messageContainer).done(function (response) {
                        deferred.resolve(response);
                    }).fail(function (response) {
                        deferred.reject(response);
                    });
                }).fail(function (response) {
                    deferred.reject(response);
                });
            } else {
                return originalAction(paymentData, messageContainer).fail(function (response) {
                    var $error = $('.message-error:visible:first');
                    if ($error.length) {
                        var $target = $error.closest('div');
                        var offset = $target.offset();

                        if (offset && typeof offset.top !== 'undefined') {
                            $('html, body').scrollTop(offset.top - $(window).height() / 2);
                        }
                    }
                });
            }

            return deferred;
        });
    };
});