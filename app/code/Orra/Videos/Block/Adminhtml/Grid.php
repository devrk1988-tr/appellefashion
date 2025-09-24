<?php
namespace Orra\Videos\Block\Adminhtml;

class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_grid';
        $this->_blockGroup = 'Orra_Videos';
        $this->_headerText = __('Manage Video');
        $this->_addButtonLabel = __('Add New Config');
        
        $this->buttonList->add(
            'create_banner',
            [
                'label' => __('Upload CSV'),
                'class' => 'add primary',
                'onclick' => 'window.location.href = "'.$this->getUploadCsvUrl().'"',
            ],
            1
        );

        parent::_construct();
        if ($this->_isAllowed('Orra_Videos::grid_mgmt')) {
            $this->buttonList->update('add', 'label', __('Add New Config'));
        } else {
            $this->buttonList->remove('add');
        }
    }
    
    /**
     * get upload csv file url.
     *
     * @return string
     */
    public function getUploadCsvUrl()
    {
        return $this->getUrl('*/upload/upload');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Orra_Videos::grid_mgmt');
    }
}
