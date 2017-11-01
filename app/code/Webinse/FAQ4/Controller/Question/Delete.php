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
 * Frontend Action frontName/question/delete
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

class Delete extends Action
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
     * This method has been created to show deleting model
     */
    public function execute()
    {
        /**
         * @todo here you must implement a logic for deleting of the question
         *      get id sent by url and delete question
         *
         *      add message about successful deleting by using Message Manager
         *      @see \Magento\Framework\Message\ManagerInterface
         */
        $id = $this->getRequest()->getParam('id');
        $questionModel = $this->_questionFactory->create();
        $questionModel->load($id)->delete();
        $this->messageManager->addSuccessMessage('Question was deleted');
        return $this->_resultRedirectFactory->create()->setPath('webinse_faq4/question/index');
    }
}
