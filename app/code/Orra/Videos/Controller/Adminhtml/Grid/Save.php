<?php
namespace Orra\Videos\Controller\Adminhtml\Grid;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Backend\App\Action\Context;
use Orra\Videos\Model\GridFactory;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\HTTP\PhpEnvironment\Request;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Orra\Videos\Model\GridFactory
     */
    private $gridFactory;

    protected $fileSystem;

    protected $uploaderFactory;

    protected $adapterFactory;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Orra\Videos\Model\GridFactory $gridFactory
     * @param Request $request
     */
    public function __construct(
        Context $context,
        GridFactory $gridFactory,
        Filesystem $fileSystem,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Request $request
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
        $this->fileSystem = $fileSystem;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->request = $request;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('videos/grid/addrow');
            return;
        }
        try {
            $rowData = $this->gridFactory->create();
                
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('videos/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Orra_Videos::save');
    }
}
