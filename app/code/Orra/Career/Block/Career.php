<?php

namespace Orra\Career\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Orra\Career\Model\ResourceModel\Career\CollectionFactory;

class Career extends Template
{
    public $collection;
    /**
     * Get collection
     *
     * @return collection
     */
    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collection->create();
    }
}
