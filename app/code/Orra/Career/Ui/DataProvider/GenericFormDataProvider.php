<?php

namespace Orra\Career\Ui\DataProvider;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;

class GenericFormDataProvider extends AbstractDataProvider
{
    /**
     * CAREER_IMAGE_PATH
     */
    public const CAREER_IMAGE_PATH = '/orra/career_images/';
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var string
     */
    protected $fieldset;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param AbstractCollection $collection
     * @param StoreManagerInterface $storeManager
     * @param string $fieldset
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        AbstractCollection $collection,
        StoreManagerInterface $storeManager,
        $fieldset,
        $requestFieldName,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collection;
        $this->fieldset = $fieldset;
        $this->storeManager = $storeManager;
    }

    /**
     * Getdata
     *
     * @return array
     */
    public function getData()
    {
        $result = [];

        foreach ($this->collection->getItems() as $item) {

            $result[$item->getId()][$this->fieldset] = $item->getData();
            $result[$item->getId()][$this->fieldset]['image_field'][0]['name'] = $item->getData('career_image');
            $result[$item->getId()][$this->fieldset]['image_field'][0]['url']
                = $this->getMediaUrl() . $item->getData('career_image');
        }
        return $result;
    }

    /**
     * GetMediaUrl
     *
     * @return string
     */
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . self::CAREER_IMAGE_PATH;
        return $mediaUrl;
    }
}
