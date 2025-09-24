<?php
namespace Orra\Videos\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const VIDEO_URL = 'video_url';
    const SORT_POSITION = 'sort_position';
    const STATUS = 'status';

   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getEntityId();

   /**
    * Set EntityId.
    */
    public function setEntityId($entityId);

   /**
    * Get name.
    *
    * @return varchar
    */
    public function getName();

   /**
    * Set Name.
    */
    public function setName($name);

   /**
    * Get Description.
    *
    * @return varchar
    */
    public function getDescription();

   /**
    * Set Description.
    */
    public function setDescription($description);
   /**
    * Get VideoUrl.
    *
    * @return varchar
    */
    public function getVideourl();

   /**
    * Set VideoUrl.
    */
    public function setVideoUrl($videoUrl);

    /**
     * Get Sortposition.
     * @return varchar
     */
    public function getSortPosition();

   /**
    * Set SortPosition.
    */
    public function setSortPosition($sortPosition);
   
   /**
    * Get status.
    *
    * @return varchar
    */
    public function getStatus();

   /**
    * Set status.
    */
    public function setStatus($status);
}
