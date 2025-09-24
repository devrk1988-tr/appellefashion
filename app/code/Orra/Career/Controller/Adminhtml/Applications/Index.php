<?php

namespace Orra\Career\Controller\Adminhtml\Applications;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * Execute
     *
     * @return Raw
     */
    public function execute()
    {
        /** @var Raw $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->setActiveMenu('Orra_General::general');
        return $result;
    }
}
