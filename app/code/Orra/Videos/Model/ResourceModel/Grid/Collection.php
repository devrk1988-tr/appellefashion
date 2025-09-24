<?php
namespace Orra\Videos\Model\ResourceModel\Grid;

use Orra\Videos\Model\Grid as GridModel;
use Orra\Videos\Model\ResourceModel\Grid as GridResourceModel;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $idFieldName = 'entity_id';
    
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            GridModel::class,
            GridResourceModel::class,
        );
    }
}
