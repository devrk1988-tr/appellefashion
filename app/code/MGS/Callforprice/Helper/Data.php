<?php

namespace MGS\Callforprice\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    )
    {
        parent::__construct($context);
    }
    public function getConfig($cfg='')
    {
        if($cfg) return $this->scopeConfig->getValue( $cfg, \Magento\Store\Model\ScopeInterface::SCOPE_STORE );
        return $this->scopeConfig;
    }
}
