<?php
namespace Webinse\FAQ3\Model\ResourceModel\Question;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Webinse\FAQ3\Api\Data\QuestionInterface;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = QuestionInterface::QUESTION_ID;

    protected $_eventPrefix = 'webinse_faq3_question_collection';

    protected $_eventObject = 'question_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        /**
         * @todo: you must init resource collection model
         *        set model and resource model class name
         */
        $this->_init('Webinse\FAQ3\Model\Question', 'Webinse\FAQ3\Model\ResourceModel\Question');
    }
}