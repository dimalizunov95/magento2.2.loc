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
 * Service Contract Data for Question model
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Api\Data;

interface QuestionInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const QUESTION_ID   = 'question_id';
    const CONTENT       = 'content';
    const ANSWER        = 'answer';
    const CREATION_TIME = 'creation_time';
    const USER_ID       = 'user_id';

    /**
     * @todo: you must enumerate getter and setters for question fields
     */

    public function getId();
    public function getContent();
    public function getAnswer();
    public function getCreationTime();
    public function getUserId();

    public function setId($id);
    public function setContent($content);
    public function setAnswer($answer);
    public function setCreationTime($creationTime);
    public function setUserId($user_id);

}