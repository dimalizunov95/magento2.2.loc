<?php
namespace Webinse\Weblog1\Block\Adminhtml\Blogpost\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected function _prepareForm()
    {
        /** @var $model \Webinse\Weblog1\Model\Blogpost */
        $model = $this->_coreRegistry->registry('webinse_weblog_blogpost');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(['data' => [
            'id' => 'edit_form',
            'action' => $this->getData('action'),
            'method' => 'post',
        ]]);

        $baseFieldset = $form->addFieldset(
            'base_fieldset',
            [
                'legend' => __('Blogpost Details'),
            ]
        );

        if ($model->getId()) {
            $baseFieldset->addField(
                'blogpost_id',
                'hidden',
                [
                    'name' => 'blogpost_id',
                ]
            );
        }

        $baseFieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Post Title'),
                'id' => 'title',
                'title' => __('Post Title'),
                'required' => true
            ]
        );

        $baseFieldset->addField(
            'post',
            'textarea',
            [
                'name' => 'post',
                'label' => __('Post Content'),
                'id' => 'post',
                'title' => __('Post Content'),
                'required' => true
            ]
        );

        $form->setUseContainer(true);
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
}