<?php
namespace Webinse\Weblog1\Block\Adminhtml\Blogpost;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'blogpost_id';
        $this->_controller = 'adminhtml_blogpost';
        $this->_blockGroup = 'Webinse_Weblog1';

        parent::_construct();

        if (empty($this->getRequest()->getParam($this->_objectId))) {
            $this->buttonList->remove('delete');
        }
    }

    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('webinse_weblog1_blogpost')->getId()) {
            $title = $this->escapeHtml($this->_coreRegistry->registry('webinse_weblog1_blogpost')->getTitle());
            return __("Edit Blogpost '%1'", $title);
        } else {
            return __('New Blogpost');
        }
    }
}