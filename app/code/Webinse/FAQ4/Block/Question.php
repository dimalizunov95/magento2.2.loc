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
 * Block for working with questions collection
 *
 * @category    Webinse
 * @package     Webinse_FAQ4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

namespace Webinse\FAQ4\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\UrlInterface;
use Webinse\FAQ4\Model\QuestionFactory;
use Webinse\FAQ4\Model\Question as QuestionModel;

class Question extends Template
{
    /**
     * Question factory
     *
     * @var QuestionFactory
     */
    protected $_questionFactory;

    /**
     * @param Context $context
     * @param QuestionFactory $questionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        QuestionFactory $questionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_questionFactory = $questionFactory;
    }

    /**
     * Retrieve question instance by ID in request parameter
     *
     * @return QuestionModel
     */
    public function getQuestion()
    {
        /** @var QuestionModel $question */
        $question = $this->_questionFactory->create();

        /**
         * @todo: get id param from request and load model
         */
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $question->load($id);
        }

        return $question;
    }

    /**
     * @return string
     */
    public function getSaveUrl()
    {
        $params = [];
        if ($id = $this->getQuestion()->getId()) {
            $params['id'] = $id;
        }
        return $this->getUrl('webinse_faq4/question/save', $params);
    }
}
