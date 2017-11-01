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
 * Backend Action frontName/question/save
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Controller\Adminhtml\Question;

use Webinse\FAQ6\Controller\Adminhtml\Question;
use Webinse\FAQ6\Model\Question as QuestionModel;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\Model\Auth\Session;

class Save extends Question
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        /**
         * @todo: save to DB all params from post and set id of the current admin user to user_id field
         * @see \Magento\Cms\Controller\Adminhtml\Block\Save::execute() for example
         *
         * use data persistor with key 'webinse_faq6_question' for saving form data if there are error while saving
         * @see Webinse\FAQ6\Controller\Adminhtml\Question\Edit::execute() where it shold be used
         */
        $post_data = $this->getRequest()->getParams();

        $question_model = $this->_questionFactory->create();

//        var_dump($post_data); exit;

        $question_model->setAnswer($post_data['answer']);

        if (isset($post_data['question_id'])) {
            $question_model->setId($post_data['question_id']);
        }

        $question_model->setContent($post_data['question']);
//        $question_model->setContent($post_data);
        $question_model->setUserId($this->getCurrentUser()->getId());

        try {
            $question_model->save();
            $this->_dataPersistor->clear('webinse_faq6_question');

            return $this->resultRedirectFactory->create()->setPath('webinse_faq6/question/index');
        } catch (\Exception $e) {
            $this->_dataPersistor->set('webinse_faq6_question', $post_data);
            return $this->resultRedirectFactory->create()->setPath('webinse_faq6/question/save');
        }


    }
}
