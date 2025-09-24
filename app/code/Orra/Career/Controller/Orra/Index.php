<?php

namespace Orra\Career\Controller\Orra;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * [__construct]
     * @param Context                          $context
     * @param PageFactory                      $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct(
            $context
        );
    }

    /**
     * loads custom layout
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->addHandle('orra_index_index');
        return $resultPage;
    }
}
