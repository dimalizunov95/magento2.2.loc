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
 * Service Contract Data for Question model
 *
 * @category    Webinse
 * @package     Webinse_FAQ3
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ3\Api\Data;

interface QuestionInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const QUESTION_ID   = 'question_id';
    const CONTENT       = 'content';
    const ANSWER        = 'answer';
    const CREATION_TIME = 'creation_time';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Get answer
     *
     * @return string|null
     */
    public function getAnswer();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Set ID
     *
     * @param int $id
     * @return QuestionInterface
     */
    public function setId($id);

    /**
     * Set content
     *
     * @param string $content
     * @return QuestionInterface
     */
    public function setContent($content);

    /**
     * Set answer
     *
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer($answer);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return QuestionInterface
     */
    public function setCreationTime($creationTime);
}