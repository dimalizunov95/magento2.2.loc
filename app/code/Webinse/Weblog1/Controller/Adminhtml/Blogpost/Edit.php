<?php
namespace Webinse\Weblog1\Controller\Adminhtml\Blogpost;

class Edit extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Webinse_Weblog1::blogpost';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Webinse\Weblog1\Model\BlogpostFactory
     */
    protected $_blogpostFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Webinse\Weblog1\Model\BlogpostFactory $blogpostFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Webinse\Weblog1\Model\BlogpostFactory $blogpostFactory
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_blogpostFactory = $blogpostFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $blogpostId = $this->getRequest()->getParam('blogpost_id');
        /** @var \Webinse\Weblog1\Model\Blogpost $model */
        $model = $this->_blogpostFactory->create();

        if ($blogpostId) {
            $model->load($blogpostId);
        }

        $this->_coreRegistry->register('webinse_1_blogpost', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();

        $resultPage->setActiveMenu('Webinse_Weblog1::blogpost_grid');
        $resultPage->getConfig()->getTitle()->prepend(__('Blogpost'));

        return $resultPage;
    }
}