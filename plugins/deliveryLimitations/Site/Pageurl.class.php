<?php

/*
+---------------------------------------------------------------------------+
| Revive Adserver                                                           |
| http://www.revive-adserver.com                                            |
|                                                                           |
| Copyright: See the COPYRIGHT.txt file.                                    |
| License: GPLv2 or later, see the LICENSE.txt file.                        |
+---------------------------------------------------------------------------+
*/

require_once LIB_PATH . '/Extension/deliveryLimitations/DeliveryLimitations.php';
require_once MAX_PATH . '/lib/max/Plugin/Translation.php';

/**
 * A Site delivery limitation plugin, for filtering delivery of ads on the
 * basis of the URL of the page the ad is on.
 *
 * Valid comparison operators:
 * ==, !=, =~, !~, =x, !x
 *
 * @package    OpenXPlugin
 * @subpackage DeliveryLimitations
 */
class Plugins_DeliveryLimitations_Site_Pageurl extends Plugins_DeliveryLimitations
{
    var $defaultComparison = '=~';

    function __construct()
    {
        parent::__construct();

        $aConf = $GLOBALS['_MAX']['CONF'];
        if ($aConf['database']['type'] == 'mysql' || $aConf['database']['type'] == 'mysqli') {
            $this->columnName = 'CONCAT(IF(https=1, \'https://\', \'http://\'), domain, page, IF(query<>\'\', \'?\', \'\'),query)';
        } else {
            $this->columnName = 'IF(https=1, \'https://\', \'http://\') || domain || page || IF(query<>\'\', \'?\', \'\') || query';
        }

        $this->nameEnglish = 'Site - Page URL';
    }

}

?>
