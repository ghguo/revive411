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
 * basis of the referring page URL (of the page the ad is on).
 *
 * Valid comparison operators:
 * ==, !=, =~, !~, =x, !x
 *
 * @package    OpenXPlugin
 * @subpackage DeliveryLimitations
 */
class Plugins_DeliveryLimitations_Site_Referingpage extends Plugins_DeliveryLimitations
{

    function __construct()
    {
        parent::__construct();
        $this->columnName = 'referer';
        $this->nameEnglish = 'Site - Referring Page';
    }

}

?>
