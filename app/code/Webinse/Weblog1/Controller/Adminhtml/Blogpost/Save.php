<?php
namespace Webinse\Weblog1\Controller\Adminhtml\Blogpost;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Webinse_Weblog1::blogpost';

    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * @var \Webinse\Weblog1\Model\BlogpostFactory
     */
    protected $_blogpostFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param \Webinse\Weblog1\Model\BlogpostFactory $blogpostFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        \Webinse\Weblog1\Model\BlogpostFactory $blogpostFactory
    ) {
        $this->_blogpostFactory = $blogpostFactory;
        $this->_date = $date;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            if (empty($data['blogpost_id'])) {
                $data['blogpost_id'] = null;
            }
            /** @var \Webinse\Weblog1\Model\Blogpost $model */
            $model = $this->_blogpostFactory->create();
            $model->setData($data);
            $model->setDate($this->_date->gmtDate());
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the blogpost.'));
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the blogpost.'));
            }
        }
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}