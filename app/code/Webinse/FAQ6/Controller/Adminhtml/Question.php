<?php
namespace Webinse\FAQ6\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Backend\Model\Auth\Session;
use Magento\User\Model\User;
use Webinse\FAQ6\Model\QuestionFactory;

abstract class Question extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Webinse_FAQ6::questions';

    /**
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var ForwardFactory
     */
    protected $_resultForwardFactory;

    /**
     * @var QuestionFactory
     */
    protected $_questionFactory;

    /**
     * @var DataPersistorInterface
     */
    protected $_dataPersistor;

    /**
     * @var Session
     */
    protected $_authSession;


    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param QuestionFactory $questionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param Session $authSession
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        QuestionFactory $questionFactory,
        DataPersistorInterface $dataPersistor,
        Session $authSession
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultForwardFactory = $resultForwardFactory;
        $this->_questionFactory = $questionFactory;
        $this->_dataPersistor = $dataPersistor;
        $this->_authSession = $authSession;
        parent::__construct($context);
    }

    /**
     * @return User|null
     */
    public function getCurrentUser()
    {
        return $this->_authSession->getUser();
    }
}
