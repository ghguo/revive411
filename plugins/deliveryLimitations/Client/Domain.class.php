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
require_once MAX_PATH . '/lib/max/Delivery/limitations.delivery.php';

/**
 * A Client delivery limitation plugin, for filtering delivery of ads on the
 * basis of the viewer's domain URL.
 *
 * Works with a string which is matched with the viewer's domain URL.
 * The mechanism of the matching depends on the operator being used.
 *
 * Valid comparison operators:
 * ==, !=, =~, !~, =x, ~x
 *
 * @package    OpenXPlugin
 * @subpackage DeliveryLimitations
 */
class Plugins_DeliveryLimitations_Client_Domain extends Plugins_DeliveryLimitations
{
    function __construct()
    {
        parent::__construct();
        $this->nameEnglish = 'Client - Domain';
    }
}

?>
