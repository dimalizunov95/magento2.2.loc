<?php
namespace Webinse\FAQ4\Controller\Question;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
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
     * for example you may visit the following URL http://example.com/frontName/question/edit/id/1
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        /*$id = $this->getRequest()->getParam('id');
        if ($id) {
            echo $id;
        } else {
            echo 'error';
        }*/

        /**
         * @todo: here you must return result page instance
         */
        return $this->_resultPageFactory->create();
    }
}
