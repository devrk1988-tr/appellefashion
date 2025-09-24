<?php
namespace Orra\Videos\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{
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
