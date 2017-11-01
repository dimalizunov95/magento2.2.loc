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
 * Backend Action frontName/question/edit
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Controller\Adminhtml\Question;

use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Webinse\FAQ6\Controller\Adminhtml\Question;
use Webinse\FAQ6\Model\Question as QuestionModel;

class Edit extends Question
{
    /**
     * @return Page|Redirect
     */
    public function execute()
    {
        /**
         * @todo:
         * 1) create instance of question model using factory
         * 2) if GET parameter with id of question passed then try to load question model by id
         * 3) restore previously entered form data using data persistor (with key 'webinse_faq6_question')
         *    and set it to model if exist
         *    @see \Magento\Framework\App\Request\DataPersistor
         * 4) register question model by code webinse_faq6_question
         *    @see Magento\Framework\Registry::register()
         * 5) create instance of result page using factory
         * 6) set active menu
         *    @see \Magento\Backend\Model\View\Result\Page::setActiveMenu()
         * 7) prepend to title phrase 'New Question' or 'Edit Question 85' depending on situation
         * 8) return result page
         */

//        1)
        $questionModel = $this->_questionFactory->create();

//        2)
        $params = $this->getRequest()->getParams();

        if (isset($params['question_id'])) {
            try {
                $questionModel->load($params['question_id']);
                $questionModel->setUserId($this->getCurrentUser()->getId());

//                3)
                $form_data_persistor = $this->_dataPersistor->get('webinse_faq6_question');
                if (isset($form_data_persistor)) {
                    $questionModel->setAnswer($form_data_persistor['answer']);
                    $questionModel->setContent($form_data_persistor['question']);
                }


            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $this->resultRedirectFactory->create()->setPath('/*/*/*');
            }

//        4)
        $this->_coreRegistry->register('webinse_faq6_question', $questionModel);

        }

//        5)
        $resultPage = $this->_resultPageFactory->create();

//        6)
        $resultPage->setActiveMenu('Webinse_FAQ6::question');

//        7)
        if (isset($params['question_id'])) {
            $name = 'Edit Question ' . $params['question_id'];
        } else {
            $name = 'New Question';
        }
        $resultPage->getConfig()->getTitle()->prepend(__($name));

//        8)
        return $resultPage;
    }
}
