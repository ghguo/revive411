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

require_once LIB_PATH . '/Extension/deliveryLimitations/DeliveryLimitationsCommaSeparatedData.php';
require_once MAX_PATH . '/lib/max/Plugin/Translation.php';
/**
 * A Content delivery limitation plugin, for filtering delivery of ads on the
 * basis of the IAB category of viewed content.
 */
class Plugins_DeliveryLimitations_Content_Category extends Plugins_DeliveryLimitations_CommaSeparatedData
{
    function __construct()
    {
        parent::__construct();
		$this->nameEnglish = 'Content - Category';
    }

    function displayArrayData()
    {
		if (!isset($GLOBALS['IAB_CATEGORIES']['LEVEL3']))
		{
			include(MAX_PATH . '/plugins/deliveryLimitations/Content/iab-category.php');
		}

        $tabindex =& $GLOBALS['tabindex'];
		$catLevl = $GLOBALS['IAB_CATEGORIES']['LEVEL3'];
        echo "<div class='box' style='width:500px;height:200px;'>";
		foreach ($catLevl as $key => $val) {
            echo "<div class='boxrow'>";
            echo "<input tabindex='".($tabindex++)."' ";
            echo "type='checkbox' id='c_{$this->executionorder}_{$key}' name='acl[{$this->executionorder}][data][]' value='{$key}'".(in_array($key, $this->data, TRUE) ? ' CHECKED' : '').">{$val}</div>";
		}
        echo "</div>";
	}
}

?>
