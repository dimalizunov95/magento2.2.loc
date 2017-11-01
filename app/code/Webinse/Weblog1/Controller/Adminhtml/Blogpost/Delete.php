<?php
namespace Webinse\Weblog1\Controller\Adminhtml\Blogpost;

class Delete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Webinse_Weblog1::blogpost';

    /**
     * @var \Webinse\Weblog1\Model\BlogpostFactory
     */
    protected $_blogpostFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Webinse\Weblog1\Model\BlogpostFactory $blogpostFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Webinse\Weblog1\Model\BlogpostFactory $blogpostFactory
    ) {
        $this->_blogpostFactory = $blogpostFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('blogpost_id');
        if ($id) {
            try {
                /** @var \Webinse\Weblog1\Model\Blogpost $model */
                $model = $this->_blogpostFactory->create();
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccessMessage(__('You deleted the blogpost.'));
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while deleting the blogpost.'));
            }
        }
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}