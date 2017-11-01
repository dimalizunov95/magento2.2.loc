<?php
namespace Webinse\FAQ6\Block\Adminhtml\Question;

use \Magento\Backend\Block\Widget\Context;
use \Magento\Framework\Registry;
use \Magento\Backend\Block\Widget\Form\Container as FormContainer;

class Edit extends FormContainer
{
    /**
     * @var Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'question_id';

        /**
         * @todo: set controller and blockGroup
         */
        $this->_controller = 'adminhtml_question';
        $this->_blockGroup = 'Webinse_FAQ6';

        parent::_construct();

        if (empty($this->getRequest()->getParam($this->_objectId))) {
            /**
             * @todo: remove Delete button
             */
            $this->buttonList->remove('delete');
        }
    }
}
