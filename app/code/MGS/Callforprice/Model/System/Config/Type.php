<?php

namespace MGS\Callforprice\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;

class Type implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => '',
                'label' => __('--Please select--')
            ],
            [
                'value' => '1',
                'label' => __('Call for price')
            ],
            [
                'value' => '2',
                'label' => __('Request Quote')
            ],
            [
                'value' => '3',
                'label' => __('Login to see price')
            ]
        ];
    }

}
