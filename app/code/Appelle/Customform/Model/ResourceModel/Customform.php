<?php

namespace Appelle\Customform\Model\ResourceModel;

class Customform extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('appelle_callback', 'id');   //here "Appelle_customform" is table name and "id" is the primary key of custom table
    }
}

