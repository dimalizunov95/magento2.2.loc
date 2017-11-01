<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_FAQ1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Frontend Action frontName/index/getCustomerEmail
 *
 * @category    Webinse
 * @package     Webinse_FAQ1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ2\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Api\CustomerRepositoryInterface;

class GetCustomerEmail extends Action
{
    /**
     * @var CustomerRepositoryInterface
     */
    protected $_customerRepository;

    /**
     * @param Context $context
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        Context $context,
        CustomerRepositoryInterface $customerRepository
    ) {
        parent::__construct($context);
        $this->_customerRepository = $customerRepository;
    }

    /**
     * This method has been created to show getting row from DB
     *
     * for example you may visit the following URL http://example.com/frontName/index/getCustomerEmail/id/1
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        try {
            $customerDataObject = $this->_customerRepository->getById($id);
            echo $customerDataObject->getEmail();
        } catch (\Exception $e) {
            echo 'error <br>';
            echo $e->getMessage();
        }

        /**
         * @todo acquire ID from URL
         *       that ID will help you to get proper row from DB using CustomerRepository
         *       @see \Magento\Customer\Model\ResourceModel\CustomerRepository
         */

        /** @var \Magento\Customer\Model\Data\Customer $customerDataObject */

    }
}
