<?php
namespace Webinse\FAQ6\Block\Adminhtml;

use \Magento\Backend\Block\Widget\Grid\Container;

class Question extends Container
{
    protected function _construct()
    {
        /**
         * @todo:
         * 1) set controller with proper path to grid block
         * 2) set blockGroup with proper module class prefix
         * 3) modify button label
         */
        $this->_controller = 'adminhtml_question';
        $this->_blockGroup = 'Webinse_FAQ6';
        $this->_headerText = __('Weblog Questions');
        $this->_addButtonLabel = __('Add New Question');
        parent::_construct();
    }
}
