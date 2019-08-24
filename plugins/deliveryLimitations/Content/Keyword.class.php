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
/**
 * A Content delivery limitation plugin, for filtering delivery of ads on the
 * basis of keywords of viewed content.
 */
class Plugins_DeliveryLimitations_Content_Keyword extends Plugins_DeliveryLimitations
{
    var $delimiter = ',';

    function __construct()
    {
        parent::__construct();
        $this->aOperations = array(
			'=~' => MAX_Plugin_Translation::translate('Contains', $oPlugin->module, $oPlugin->package),
			'!~' => MAX_Plugin_Translation::translate('Does not contain', $oPlugin->module, $oPlugin->package)
			);
		$this->nameEnglish = 'Content - Keyword';
    }
}

?>
