<?php
/**
 * Copyright © 2020 Codazon, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace MGS\OSCheckout\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Session;

class CheckoutSubmitAllAfter implements ObserverInterface
{
    /**
     * @var \Magento\Sales\Model\Order\Status\HistoryFactory
     */
    protected $historyFactory;

    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderFactory;

    /**
     * @var \Magento\Framework\Json\Helper\Data
     */
    protected $_jsonHelper;

    /**
     * @var \Magento\Framework\Filter\FilterManager
     */
    protected $_filterManager;
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    protected $checkoutRegister;
    protected $_customer;
    protected $_storeManager;
    protected $orderCustomerService;

    public function __construct(
        \Magento\Framework\Json\Helper\Data              $jsonHelper,
        \Magento\Framework\Filter\FilterManager          $filterManager,
        \Magento\Sales\Model\Order\Status\HistoryFactory $historyFactory,
        \Magento\Sales\Model\OrderFactory                $orderFactory,
        Session                                          $checkoutSession,
        \Magento\Customer\Model\CustomerFactory $customer,
        \Magento\Sales\Api\OrderCustomerManagementInterface $orderCustomerService,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->_jsonHelper = $jsonHelper;
        $this->_filterManager = $filterManager;
        $this->historyFactory = $historyFactory;
        $this->orderFactory = $orderFactory;
        $this->checkoutSession = $checkoutSession;
        $this->_customer = $customer;
        $this->_storeManager = $storeManager;
        $this->orderCustomerService = $orderCustomerService;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $comment = '';
        $data = $this->checkoutSession->getData();
        $order = $observer->getEvent()->getData('order');
        if (!empty($data['o_s_checkout_data']['order_comment'])) {
            $comment = $data['o_s_checkout_data']['order_comment'];
        }
        $orderId = $observer->getOrder()->getId();
        if ($orderId && (!empty($comment))) {
            $order = $observer->getOrder();
            if ($order->getEntityId()) {
                $status = $order->getStatus();
                $history = $this->historyFactory->create();
                $history->setComment($comment);
                $history->setParentId($orderId);
                $history->setIsVisibleOnFront(1);
                $history->setIsCustomerNotified(0);
                $history->setEntityName('order');
                $history->setStatus($status);
                $history->save();
            }
        }

        if(!empty($data['o_s_checkout_data']['form_register_chechbox'])&&!empty($data['o_s_checkout_data']['register'])){
            $customer= $this->_customer->create();
            $customer->setWebsiteId($this->_storeManager->getStore()->getWebsiteId());
            $customer->loadByEmail($order->getCustomerEmail());
            $this->orderCustomerService->create($orderId);
        }

    }
}
?>
