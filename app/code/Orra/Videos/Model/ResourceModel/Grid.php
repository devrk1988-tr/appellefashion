<?php
namespace Orra\Videos\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\Context;
use \Magento\Framework\Stdlib\DateTime\DateTime;

class Grid extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var string
     */
    protected $idFieldName = 'entity_id';
    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $date;

    /**
     * Construct.
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime       $date
     * @param string|null                                       $resourcePrefix
     */
    public function __construct(
        Context $context,
        DateTime $date,
        $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
        $this->date = $date;
    }

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('video_records', 'entity_id');
    }
}
