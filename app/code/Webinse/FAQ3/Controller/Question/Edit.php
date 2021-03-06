<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_FAQ3
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Frontend Action frontName/question/edit
 *
 * @category    Webinse
 * @package     Webinse_FAQ3
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ3\Controller\Question;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Webinse\FAQ3\Model\QuestionFactory;
use Webinse\FAQ3\Model\Question;

class Edit extends Action
{
    /**
     * @var QuestionFactory
     */
    protected $_questionFactory;

    /**
     * @param Context $context
     * @param QuestionFactory $questionFactory
     */
    public function __construct(
        Context $context,
        QuestionFactory $questionFactory
    ) {
        parent::__construct($context);
        $this->_questionFactory = $questionFactory;
    }

    /**
     * This method has been created to show editing existing row in DB
     *
     * for example you may visit the following URL http://example.com/frontName/question/edit/id/1
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        /** @var Question $question */
        $question = $this->_questionFactory->create();

        /**
         * @todo here you must get id sent by url
         */
        $questionId = $this->getRequest()->getParam('id');

        /**
         * @todo load question by id
         */
        $question->load($questionId);

        if ($question->getId()) {
            /**
             * @todo change some field ('content' or 'answer') in object
             */
            $question->setContent('newChangedContent');

            $question->save();

            echo 'Question with ID = ' . $question->getId() . ' have been changed.';
        } else {
            echo 'Question with ID = ' . $questionId . ' not found.';
        }
    }
}
