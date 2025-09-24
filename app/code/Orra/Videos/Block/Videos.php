<?php
namespace Orra\Videos\Block;

use Orra\Videos\Model\ResourceModel\Grid\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;

class Videos extends  \Magento\Framework\View\Element\Template
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context           $context
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory
    ) {

        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * get videos data.
     *
     * @return collection
     */
    public function getVideos()
    {
        $collection = $this->collectionFactory->create()
            ->addFieldToFilter('status', '1');
            return $collection->getItems();
    }
   
    /**
     * @return
     */
    public function getMediaFolder()
    {
        $media_folder = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media_folder;
    }
}
