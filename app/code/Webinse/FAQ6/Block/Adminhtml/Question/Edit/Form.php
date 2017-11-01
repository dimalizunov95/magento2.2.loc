<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Adminhtml form block of question
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Block\Adminhtml\Question\Edit;

use \Magento\Framework\Data\Form as DataForm;
use \Magento\Backend\Block\Widget\Form\Generic as FormGeneric;
use \Webinse\FAQ6\Model\Question as Question;

class Form extends FormGeneric
{
    protected function _prepareForm()
    {
        /** @var $model Question */
        $model = $this->_coreRegistry->registry('webinse_faq6_question');

        /** @var DataForm $form */
        $form = $this->_formFactory->create(['data' => [
            'id' => 'edit_form',
            'action' => $this->getData('action'),
            'method' => 'post',
        ]]);

        $baseFieldset = $form->addFieldset(
            'base_fieldset',
            [
                'legend' => __('Question Details'),
            ]
        );

        if ($model && $model->getId()) {
            /**
             * @todo: add hidden field question_id
             */
            $baseFieldset->addField(
                'question_id',
                'hidden',
                [
                    'name' => 'question_id'
                ]
            );
        }

        /**
         * @todo: add fields 'Question content' and 'Answer'
         */

        $baseFieldset->addField(
            'content',
            'text',
            [
                'name' => 'question',
                'label' => __('Question'),
                'id' => 'question',
                'title' => __('Question'),
                'required' => true
            ]
        );

        $baseFieldset->addField(
            'answer',
            'text',
            [
                'name' => 'answer',
                'label' => __('Answer'),
                'id' => 'answer',
                'title' => __('Answer'),
                'required' => true
            ]
        );

        $form->setUseContainer(true);

        if ($model) {
            $form->setValues($model->getData());
        }

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
