<?php
namespace Orra\Career\Controller\Adminhtml\Career;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Add extends Action implements HttpGetActionInterface
{
    /**
     * Execute
     *
     * @return Raw
     */
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->setActiveMenu('Orra_General::general');
        return $result;
    }
}
