<?php
namespace Webinse\FAQ4\Controller\Question;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * This method has been created to show standard loading the page through layout
     *
     * for example you may visit the following URL http://example.com/frontName/question/index
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        return $this->_resultPageFactory->create();
    }
}
