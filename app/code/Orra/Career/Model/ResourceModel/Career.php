<?php

namespace Orra\Career\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Career extends AbstractDb
{
    /**
     * Career construct
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('orra_career', 'id');
    }
}
