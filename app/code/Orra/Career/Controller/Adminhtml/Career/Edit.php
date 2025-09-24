<?php

namespace Orra\Career\Controller\Adminhtml\Career;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Edit extends Action implements HttpGetActionInterface
{

    /**
     * Execute
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->setActiveMenu('Orra_General::general');
        return $result;
    }
}
