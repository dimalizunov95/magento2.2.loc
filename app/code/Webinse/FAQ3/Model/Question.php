<?php
namespace Webinse\FAQ3\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Webinse\FAQ3\Api\Data\QuestionInterface;

class Question extends AbstractModel implements QuestionInterface, IdentityInterface
{
    /**
     * Question cache tag
     */
    const CACHE_TAG = 'webinse_faq3_question';

    /**
     * @var string
     */
    protected $_cacheTag = 'webinse_faq3_question';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'webinse_faq3_question';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webinse\FAQ3\Model\ResourceModel\Question');
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
     * Retrieve question id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::QUESTION_ID);
    }

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Get answer
     *
     * @return string|null
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return QuestionInterface
     */
    public function setId($id)
    {
        return $this->setData(self::QUESTION_ID, $id);
    }

    /**
     * Set content
     *
     * @param string $content
     * @return QuestionInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return QuestionInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }
}
