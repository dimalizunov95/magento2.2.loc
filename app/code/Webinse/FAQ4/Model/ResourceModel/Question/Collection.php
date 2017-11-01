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
 * Question resource collection model
 *
 * @category    Webinse
 * @package     Webinse_FAQ4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ4\Model\ResourceModel\Question;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Webinse\FAQ4\Api\Data\QuestionInterface;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = QuestionInterface::QUESTION_ID;

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
        $this->_init('Webinse\FAQ4\Model\Question', 'Webinse\FAQ4\Model\ResourceModel\Question');
    }
}