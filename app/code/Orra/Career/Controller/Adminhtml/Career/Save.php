<?php

namespace Orra\Career\Controller\Adminhtml\Career;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Orra\Career\Model\CareerFactory;

class Save extends Action
{
    /**
     * @var CareerFactory
     */
    protected $careerFactory;

    /**
     * @param Context $context
     * @param CareerFactory $careerFactory
     */
    public function __construct(Context $context, CareerFactory $careerFactory)
    {
        parent::__construct($context);
        $this->careerFactory = $careerFactory;
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        $dataValue = [];
        $data = $this->getRequest()->getPostValue()['general'];
        if (!empty($data) && $data != null) {
            try {
                $career = $this->careerFactory->create();
                $dataValue['title'] = $data['title'];
                $dataValue['status'] = $data['status'];
                $dataValue['content'] = $data['content'];
                $dataValue['description'] = $data['description'];
                $dataValue['publishdate'] = $data['publishdate'];

                if (!empty($data['id'])) {
                    $career->load($data['id']);
                    $dataValue['id'] = $data['id'];
                }

                $career->setData($dataValue);
                $career->save();
                $this->messageManager->addSuccessMessage(__('Successfully saved the Career.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                if (!empty($data['id'])) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $career->getId()]);
                }

                return $resultRedirect->setPath('*/*/add');
            }

        }
        return $resultRedirect->setPath('career/career/index');
    }
}
