<?php

namespace MGS\ThemeSettings\Model\Config\Source;

class StickyStyle implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'visible', 'label' => __('Always Visible')],
            ['value' => 'show_on_scroll_up_only', 'label' => __('Show on Scroll Up Only')]
        ];
    }
}
