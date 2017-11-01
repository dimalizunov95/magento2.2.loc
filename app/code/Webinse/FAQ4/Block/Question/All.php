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
 * Block for working with questions collection
 *
 * @category    Webinse
 * @package     Webinse_FAQ4
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */

namespace Webinse\FAQ4\Block\Question;

use Magento\Framework\Url;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\UrlInterface;
use Magento\TestFramework\Event\Magento;
use Webinse\FAQ4\Model\ResourceModel\Question\CollectionFactory;
use Webinse\FAQ4\Model\ResourceModel\Question\Collection;
use Webinse\FAQ4\Api\Data\QuestionInterface;

class All extends Template
{
    /**
     * Collection factory
     *
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * Retrieve all questions sorted by creation time
     *
     * @return Collection
     */
    public function getCollection()
    {
        /**
         * @todo: get collection of all questions sorted by creation time (DESC)
         */
        $collection = $this->_collectionFactory->create();
        $collection->setOrder('creation_time', 'DESC');
        return $collection;
    }

    /**
     * @return string
     */
    public function getAddNewUrl()
    {
        /**
         * @todo: get url link to "frontName/question/addNew" action
         *        @see \Magento\Framework\Url::getUrl
         */

        return $this->_urlBuilder->getUrl("webinse_faq4/question/addNew");
    }

    /**
     * @param \Webinse\FAQ4\Model\Question $question
     * @return string
     */
    public function getEditUrl(\Webinse\FAQ4\Model\Question $question)
    {
        /**
         * @todo: get url link to "frontName/question/edit" action with parameter "id" of question
         *        @see \Magento\Framework\Url::getUrl
         */

        return $this->_urlBuilder->getUrl("webinse_faq4/question/edit", ['id' => $question->getId()]);
    }

    /**
     * @param \Webinse\FAQ4\Model\Question $question
     * @return string
     */
    public function getDeleteUrl(\Webinse\FAQ4\Model\Question $question)
    {
        /**
         * @todo: get url link to "frontName/question/delete" action with parameter "id" of question
         *        @see \Magento\Framework\Url::getUrl
         */

        return $this->_urlBuilder->getUrl("webinse_faq4/question/delete", ['id' => $question->getId()]);
    }
}
