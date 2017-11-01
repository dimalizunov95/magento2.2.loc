<?php
namespace Webinse\Weblog1\Model\ResourceModel\Blogpost;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = \Webinse\Weblog1\Api\Data\BlogpostInterface::BLOGPOST_ID;

    protected $_eventPrefix = 'webinse_weblog1_blogpost_collection';

    protected $_eventObject = 'blogpost_collection';

    protected function _construct()
    {
        $this->_init('Webinse\Weblog1\Model\Blogpost', 'Webinse\Weblog1\Model\ResourceModel\Blogpost');
    }

    /**
     * Overridden to use other label field by default.
     *
     * @param null $valueField
     * @param string $labelField
     * @param array $additional
     * @return array
     */
    protected function _toOptionArray($valueField = null, $labelField = 'title', $additional = [])
    {
        return parent::_toOptionArray($valueField, $labelField, $additional);
    }
}