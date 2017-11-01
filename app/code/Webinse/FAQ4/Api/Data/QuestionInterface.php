<?php
namespace Webinse\FAQ4\Api\Data;

interface QuestionInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const QUESTION_ID   = 'question_id';
    const CONTENT       = 'content';
    const ANSWER        = 'answer';
    const CREATION_TIME = 'creation_time';

    public function getId();
    public function getContent();
    public function getAnswer();
    public function getCreationTime();

    public function setId($id);
    public function setContent($content);
    public function setAnswer($answer);
    public function setCreationTime($creationTime);

}