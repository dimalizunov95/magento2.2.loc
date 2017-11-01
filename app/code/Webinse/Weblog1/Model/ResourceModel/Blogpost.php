<?php
namespace Webinse\Weblog1\Model\ResourceModel;

class Blogpost extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('webinse_blog1_posts', \Webinse\Weblog1\Api\Data\BlogpostInterface::BLOGPOST_ID);
    }
}