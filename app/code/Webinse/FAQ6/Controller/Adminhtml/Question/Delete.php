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
 * Backend Action frontName/question/delete
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

class Delete extends Question
{
    /**
     * @return Redirect
     */
    public function execute()
    {
        /**
         * @todo:
         * 1) create instance of result redirect using factory
         * 2) if GET parameter with id of question passed then try to load question model by id and delete (use try..catch)
         * 3) set message about delete process
         *    @see \Magento\Framework\Message\ManagerInterface
         * 4) set redirect to index action
         * 5) return result redirect
         */

//        1)
        $result_redirect = $this->resultRedirectFactory->create();

//        $result_redirect->setPath()  webinse_faq6/

//        2)
        $id = $this->getRequest()->getParam('question_id');
        if ($id) {
            try {
                $this->_questionFactory->create()->load($id)->delete();
//                3)
                $this->messageManager->addSuccessMessage('Deleted successfully');

//                4)
                return $result_redirect->setPath('*/*/');
            } catch (\Exception $e) {
//                3)
                $this->messageManager->addErrorMessage($e->getMessage());

//                4)
                return $result_redirect->setPath('webinse_faq6/question/edit', ['question_id' => $id]);
            }
        }

//        5)
        return $result_redirect->setPath('*/*/');
    }
}
