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
 * Backend Action frontName/question/newAction
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Controller\Adminhtml\Question;

use Magento\Backend\Model\View\Result\Forward;
use Webinse\FAQ6\Controller\Adminhtml\Question;

class NewAction extends Question
{
    /**
     * @return Forward
     */
    public function execute()
    {
        /** @var Forward $resultForward */
        $resultForward = $this->_resultForwardFactory->create();
        $resultForward->forward('edit');

        return $resultForward;
    }
}
