<?php
namespace Webinse\Weblog1\Controller\Adminhtml\Blogpost;

abstract class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Webinse_Weblog1::blogpost';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();

        $resultPage->setActiveMenu('Webinse_Weblog1::blogpost_grid');
        $resultPage->getConfig()->getTitle()->prepend(__('Weblog Posts'));

        $resultPage->addContent(
            $resultPage->getLayout()->createBlock('Webinse\Weblog1\Block\Adminhtml\Blogpost')
        );
        return $resultPage;
    }
}