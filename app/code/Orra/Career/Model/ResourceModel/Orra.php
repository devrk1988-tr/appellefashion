<?php

namespace Orra\Career\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Orra extends AbstractDb
{
    /**
     * Career construct
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('orra_job_applications', 'id');
    }
}
