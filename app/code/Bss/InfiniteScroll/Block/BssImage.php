<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_InfiniteScroll
 * @author     Extension Team
 * @copyright  Copyright (c) 2018-2019 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\InfiniteScroll\Block;

use Magento\Catalog\Block\Product\Image;

/**
 * Class Image
 *
 * @package Bss\InfiniteScroll\Block
 */
class BssImage extends Image
{
    /**
     * @var \Magento\Framework\App\ProductMetadataInterface
     */
    protected $productMetadata;

    /**
     * BssImage constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\App\ProductMetadataInterface $productMetadata
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\ProductMetadataInterface $productMetadata,
        array $data = [])
    {
        $this->productMetadata = $productMetadata;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->productMetadata->getVersion();
    }
}

