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
 * Frontend Action frontName/index/index
 *
 * @category    Webinse
 * @package     Webinse_FAQ1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ2\Controller\Index;

use Magento\Framework\App\Action\Action;

class Index extends Action
{
    /**
     * This method has been created to show output to screen
     *
     * for example you may visit the following URL http://example.com/frontName/index/index/
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        echo 'Webinse FAQ2 Module - index action';
    }
}
