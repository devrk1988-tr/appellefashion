<?php

namespace Orra\Career\Model\ResourceModel\Career;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Orra\Career\Model\ResourceModel\Career as ResourceTending;
use Orra\Career\Model\Career as Career;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Career construct
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Career::class, ResourceTending::class);
    }
}
