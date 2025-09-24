<?php

namespace Appelle\Customform\Plugin;

class ToolbarPlugin
{
    public function afterGetCurrentOrder(\Magento\Catalog\Block\Product\ProductList\Toolbar $subject, $result)
    {
        return 'created_at';
    }
    public function afterGetCurrentDirection(\Magento\Catalog\Block\Product\ProductList\Toolbar $subject, $result)
    {
        // Change 'desc' to 'asc' if you want ascending
        return 'desc';
    }
}
