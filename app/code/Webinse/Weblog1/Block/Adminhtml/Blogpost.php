<?php
namespace Webinse\Weblog1\Block\Adminhtml;

class Blogpost extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_blogpost';
        $this->_blockGroup = 'Webinse_Weblog1';
        $this->_headerText = __('Weblog Posts');
        $this->_addButtonLabel = __('Add New Post');
        parent::_construct();
    }
}