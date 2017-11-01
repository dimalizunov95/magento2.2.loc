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
 * Frontend Action ifrontName/index/index2
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
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\Raw;

class Index2 extends Action
{
    /**
     * @var RawFactory
     */
    protected $_resultRawFactory;

    /**
     * @param Context $context
     * @param RawFactory $resultRawFactory
     */
    public function __construct(
        Context $context,
        RawFactory $resultRawFactory
    ) {
        parent::__construct($context);
        $this->_resultRawFactory = $resultRawFactory;
    }

    /**
     * This method has been created to show output to screen by using standard magento method
     *
     * for example you may visit the following URL http://example.com/frontName/index/index2/
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        $string = 'Webinse FAQ1 Module - index2 action';

        /** @var Raw $resultRaw */
        $resultRaw = $this->_resultRawFactory->create();

        $resultRaw->setContents($string);

        return $resultRaw;
    }
}
