<?php
namespace Orra\Career\Controller\Index;

use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var pageFactory
     */
     protected $pageFactory;
      
     /**
      * @param \Magento\Framework\App\Action\Context $context
      * @param \Magento\Framework\View\Result\PageFactory $pageFactory
      */
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    
    /**
     * Index Action
     *
     * @return StoreLocator Index execute - Render store list
     */
    public function execute()
    {
        try {
            $this->_view->loadLayout();
            $this->_view->getLayout()->initMessages();
            $this->_view->renderLayout();
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }
}
