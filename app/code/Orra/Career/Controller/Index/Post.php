<?php

namespace Orra\Career\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Orra\Career\Model\ResourceModel\Orra\CollectionFactory;

class Post extends \Magento\Framework\App\Action\Action
{

    const LIMIT = 20000000;
    protected $orra;
    protected $collectionFactory;
    protected $resultRedirect;
    protected $storeManager;
    protected $transportBuilder;
    protected $scopeConfig;
    public function __construct(
        collectionFactory $collectionFactory,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Orra\Career\Model\OrraFactory  $orra,
        \Magento\Framework\Controller\ResultFactory $result
    ) {
        parent::__construct($context);
        $this->orra = $orra;
        $this->storeManager = $storeManager;
        $this->transportBuilder = $transportBuilder;
        $this->scopeConfig = $scopeConfig;
        $this->resultRedirect = $result;
        $this->collectionFactory = $collectionFactory;
    }
    /**
     * Post data on DB
     *
     * @return resultRedirect
     */
    public function execute()
    {
        $errorMsg = '';
        $data = $this->getRequest()->getPostValue();
        $fileup = $this->getRequest()->getFiles('docname');
       
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect = $this->resultRedirect->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        
        if(isset($fileup['name'])) {
            $maxsize  = self::LIMIT;

            if(($fileup['size'] >= $maxsize)) {
               $errorMsg = "File too large. File must be less than 20 megabytes.";
                $this->messageManager->addErrorMessage($errorMsg);
                return $resultRedirect;
            }
        }
        if ($data) {
            $model = $this->orra->create();
            $email = $this->getRequest()->getParam('email');

            if (isset($email) && $email != '') {
           
                $franchise = $this->collectionFactory->create()
                ->addFieldToFilter('career_id', $data["career_id"])
                ->addFieldToFilter('email', $email)
                ->load()->getData();

                if (!empty($franchise)) {
                    $errorMsg = "You are already applied for this role..";
                }
                if ($errorMsg != '') {
                    $this->messageManager->addErrorMessage($errorMsg);
                    return $resultRedirect;
                }
       
                try {
                    $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORES;
        
                    $post = $this->getRequest()->getPostValue();
                    $model->setCareerId($post['career_id']);
                    $model->setName($post['name']);
                    $model->setEmail($post['email']);
                    $model->setPhoneNo($post['phone_no']);
                    $model->setLocation($post['location']);
                    $model->setLinkedinProfile($post['linkedin_profile']);
                    $model->setWebsite($post['website']);
        
                    $saveData = $model->save();

                    if ($saveData) {
                        $this->messageManager->addSuccess(__('Application has been submitted..!'));
                    }
                    return $resultRedirect;
                } catch (\Exception $e) {

                    $this->messageManager->addErrorMessage($e->getMessage());
                    $this->logger->error($e->getMessage());
                }
            }
        }
    }
}
