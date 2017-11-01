<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Backend Action frontName/question/index
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Controller\Adminhtml\Question;

use Magento\Backend\Model\View\Result\Page;
use Webinse\FAQ6\Controller\Adminhtml\Question;

class Index extends Question
{
    /**
     * @return Page
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        /**
         * @todo: set active menu
         * @see \Magento\Backend\Model\View\Result\Page::setActiveMenu()
         */
        $resultPage->setActiveMenu('Webinse_FAQ6::questions');

        $resultPage->getConfig()->getTitle()->prepend(__('Questions'));

        return $resultPage;
    }
}
