<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_FAQ4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Frontend Action frontName/question/save
 *
 * @category    Webinse
 * @package     Webinse_FAQ4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ4\Controller\Question;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Webinse\FAQ4\Model\QuestionFactory;
use Webinse\FAQ4\Model\Question as QuestionModel;

class Save extends Action
{
    /**
     * @var RedirectFactory
     */
    protected $_resultRedirectFactory;

    /**
     * @var QuestionFactory
     */
    protected $_questionFactory;

    /**
     * @param Context $context
     * @param RedirectFactory $resultRedirectFactory
     * @param QuestionFactory $questionFactory
     */
    public function __construct(
        Context $context,
        RedirectFactory $resultRedirectFactory,
        QuestionFactory $questionFactory
    ) {
        parent::__construct($context);
        $this->_resultRedirectFactory = $resultRedirectFactory;
        $this->_questionFactory = $questionFactory;
    }

    /**
     * This method has been created to show saving model
     */
    public function execute()
    {
        /**
         * @todo here you must implement a logic for a creation or editing of the question
         *      if id exist in params, you can load model by using it otherwise create new record
         *
         *      add message about successful saving or editing by using Message Manager
         *      @see \Magento\Framework\Message\ManagerInterface
         */

        $params = $this->getRequest()->getParams();

        if (isset($params['submit'])) {
            $questionModel = $this->_questionFactory->create();
            if (isset($params['id'])) {
                $questionModel->load($params['id']);
                $questionModel->setContent($params['question_field']);
                $questionModel->setAnswer($params['answer_field']);
                $questionModel->save();
                $this->messageManager->addSuccessMessage('Question was edited');
            } else {
                $questionModel->setContent($params['question_field']);
                $questionModel->setAnswer($params['answer_field']);
                $questionModel->save();
                $this->messageManager->addSuccessMessage('Question was saved');
            }

            return $this
                ->_resultRedirectFactory
                ->create()
                ->setPath('webinse_faq4/question/index');
        } else {
            return $this
                ->_resultRedirectFactory
                ->create()
                ->setPath('webinse_faq4/question/index');
        }
    }
}
