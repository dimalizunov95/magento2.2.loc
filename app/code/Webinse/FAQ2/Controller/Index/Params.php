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
 * Frontend Action frontName/index/params
 *
 * @category    Webinse
 * @package     Webinse_FAQ1
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ2\Controller\Index;

use Magento\Framework\App\Action\Action;

class Params extends Action
{
    /**
     * This method has been created to show getting all query parameters
     *
     * for example you may visit the following URL http://example.com/frontName/index/params?key1=value1&key2=value2
     * frontName - you must set in etc/frontend/routes.xml file
     */
    public function execute()
    {
        $params = [];

        $params = $this->getRequest()->getParams();

        /**
         * @todo here you must replace the empty array by all parameters that have been sent to the Controller
         *       @see \Magento\Framework\App\Request\Http - $this->getRequest()
         */

        echo '<dl>';
        foreach ($params as $key => $value) {
            echo '<dt>' . $key . '</dt>';
            echo '<dd>' . $value . '</dd>';
        }
        echo '</dl>';
    }
}
