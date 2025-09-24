<?php
namespace Orra\Videos\Model;

use Orra\Videos\Api\Data\GridInterface;
use Orra\Videos\Model\ResourceModel\Grid as GridModel;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'video_records';

    /**
     * @var string
     */
    protected $cacheTag = 'video_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $eventPrefix = 'video_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init(GridModel::class);
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get name.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get description.
     *
     * @return varchar
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set description.
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get videourl
     *
     * @return varchar
     */
    public function getVideoUrl()
    {
        return $this->getData(self::VIDEO_URL);
    }

    /**
     * Set videourl
     */
    public function setVideoUrl($videoUrl)
    {
        return $this->setData(self::VIDEO_URL, $videoUrl);
    }
    
   /**
    * Get sortposition.
    *
    * @return varchar
    */
    public function getSortPosition()
    {
        return $this->getData(self::SORTPOSITION);
    }

   /**
    * Set sortposition.
    */
    public function setSortPosition($sortPosition)
    {
        return $this->setData(self::SORT_POSITION, $sortPosition);
    }

    /**
     * Get status.
     *
     * @return varchar
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status.
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
