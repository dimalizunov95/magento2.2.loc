<?php
namespace Webinse\Weblog1\Api\Data;

interface BlogpostInterface
{
    const BLOGPOST_ID = 'blogpost_id';
    const TITLE       = 'title';
    const POST        = 'post';
    const DATE        = 'date';

    public function getId();
    public function getTitle();
    public function getPost();
    public function getDate();

    public function setId($id);
    public function setTitle($title);
    public function setPost($post);
    public function setDate($date);
}