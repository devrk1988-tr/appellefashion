<?php

namespace Orra\Career\Controller\Adminhtml\Career;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Catalog\Model\ImageUploader;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Io\File;
use Magento\Store\Model\StoreManagerInterface;

class Upload extends Action
{

    /**
     * @var $imageUploader
     */
    protected $imageUploader;
    /**
     * @var Filesystem
     */
    protected $filesystem;
    /**
     * @var File
     */
    protected $fileIo;
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param Context $context
     * @param ImageUploader $imageUploader
     * @param Filesystem $filesystem
     * @param File $fileIo
     * @param StoreManagerInterface $storeManager
     */

    public function __construct(
        Context               $context,
        ImageUploader         $imageUploader,
        Filesystem            $filesystem,
        File                  $fileIo,
        StoreManagerInterface $storeManager
    ) {

        parent::__construct($context);
        $this->imageUploader = $imageUploader;
        $this->filesystem = $filesystem;
        $this->fileIo = $fileIo;
        $this->storeManager = $storeManager;
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $imageUploadId = $this->getRequest()->getParam('param_name', 'image_field');
        try {
            $imageResult = $this->imageUploader->saveFileToTmpDir($imageUploadId);
        } catch (\Exception $e) {
            $imageResult = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($imageResult);
    }
}
