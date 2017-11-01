<?php
namespace Webinse\FAQ3\Controller\Question;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Webinse\FAQ3\Model\ResourceModel\Question\CollectionFactory;
use Webinse\FAQ3\Model\ResourceModel\Question\Collection;
use Webinse\FAQ3\Model\Question;

class Index extends Action
{
    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * This method has been created to show loading collection from DB
     *
     * for example you may visit the following URL http://example.com/frontName/question/index
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        $collection = $this->_collectionFactory->create();
        /**
         * @todo Create object of collection by using collection factory
         */

        foreach ($collection as $item) {
            /** @var Question $item */

            echo '<h2>' . $item->getId() . '</h2>';
            echo '<p>' . $item->getContent() . '</p>';
            echo '<p>' . $item->getAnswer() . '</p>';
            echo '<p>' . $item->getCreationTime() . '</p>';
        }
    }
}