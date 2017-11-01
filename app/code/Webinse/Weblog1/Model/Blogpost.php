<?php
namespace Webinse\Weblog1\Model;

class Blogpost extends \Magento\Framework\Model\AbstractModel implements
    \Webinse\Weblog1\Api\Data\BlogpostInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'webinse_weblog1_blogpost';

    protected $_cacheTag = 'webinse_weblog1_blogpost';

    protected $_eventPrefix = 'webinse_weblog1_blogpost';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Webinse\Weblog1\Model\ResourceModel\Blogpost');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData(self::BLOGPOST_ID);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function getPost()
    {
        return $this->getData(self::POST);
    }

    public function getDate()
    {
        return $this->getData(self::DATE);
    }

    public function setId($id)
    {
        return $this->setData(self::BLOGPOST_ID, $id);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function setPost($post)
    {
        return $this->setData(self::POST, $post);
    }

    public function setDate($date)
    {
        return $this->setData(self::DATE, $date);
    }
}