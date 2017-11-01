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
 * Question model
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Webinse\FAQ6\Api\Data\QuestionInterface;

class Question extends AbstractModel implements QuestionInterface, IdentityInterface
{
    /**
     * Question cache tag
     */
    const CACHE_TAG = 'webinse_faq6_question';

    /**
     * @var string
     */
    protected $_cacheTag = 'webinse_faq6_question';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'webinse_faq6_question';

    /**
     * @return void
     */
    protected function _construct()
    {
        /**
         * @todo: you must init model
         *        set resource model class name
         */
        $this->_init('Webinse\FAQ6\Model\ResourceModel\Question');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @todo: you must define getter and setters for question fields using constants of fields names
     *        @see \Webinse\FAQ6\Api\Data\QuestionInterface
     */

    public function getId() {
        return $this->_getData(self::QUESTION_ID);
    }
    public function getContent() {
        return $this->_getData(self::CONTENT);
    }
    public function getAnswer() {
        return $this->_getData(self::ANSWER);
    }
    public function getCreationTime() {
        return $this->_getData(self::CREATION_TIME);
    }
    public function getUserId() {
        return $this->_getData(self::USER_ID);
    }

    public function setId($id) {
        return $this->setData(self::QUESTION_ID, $id);
    }
    public function setContent($content) {
        return $this->setData(self::CONTENT, $content);
    }
    public function setAnswer($answer) {
        return $this->setData(self::ANSWER, $answer);
    }
    public function setCreationTime($creationTime) {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }
    public function setUserId($user_id) {
        return $this->setData(self::USER_ID, $user_id);
    }
}
