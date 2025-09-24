<?php

namespace MGS\Callforprice\Block;

class Price extends \Magento\Catalog\Block\Product\View
{
    public function getLoginUrl()
    {
        return $this->getUrl('customer/account/login');
    }
    public function getProduct()
    {
        return $this->getLoadedProduct();
    }
}
