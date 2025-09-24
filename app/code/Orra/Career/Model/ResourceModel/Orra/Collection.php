<?php

namespace Orra\Career\Model\ResourceModel\Orra;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Orra\Career\Model\ResourceModel\Orra as ResourceTending;
use Orra\Career\Model\Orra as Orra;

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
        $this->_init(Orra::class, ResourceTending::class);
    }
}
