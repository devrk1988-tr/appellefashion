<?php

namespace Orra\Career\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Orra\Career\Model\ResourceModel\Career\CollectionFactory;
use Magento\Framework\App\RequestInterface;

class Orra extends Template
{
    /**
     * Request instance
     *
     * @var \Magento\Framework\App\RequestInterface
     */
    protected $request;

    public $collection;
    /**
     * Get collection
     *
     * @return collection
     */
    public function __construct(Context $context, RequestInterface $request, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        $this->request = $request;
        parent::__construct($context, $data);
    }
    /**
     * Get collection
     *
     * @return collection
     */
    public function getCollection()
    {
       
        return $this->collection->create();
    }
    /**
     * Get Careerdetails
     *
     * @return Careercollection
     */
    public function getCareerdetails()
    {
        $id=$this->request->getParam('id');
        $careercollection=$this->collection->create();
        $careercollection->addFieldToFilter('id', ['eq' => $id ])
        ->load();
        return $careercollection;
    }
}
