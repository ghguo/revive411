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

/**
 * @package    OpenXPlugin
 * @subpackage DeliveryLimitations
 */

require_once MAX_PATH . '/lib/max/Delivery/limitations.delivery.php';
require_once MAX_PATH . '/plugins/deliveryLimitations/Content/getcategories.php';

/**
 * Check to see if this impression contains the category of limitation.
 *
 * @param string $limitation The category (or comma list of categories) limitation
 * @param string $op The operator (either '=~' or '!~')
 * @param array $aParams An array of additional parameters to be checked
 * @return boolean Whether this impression's category passes this limitation's test.
 */
function MAX_checkContent_Keyword($limitation, $op, $aParams = array())
{
	if (!empty($_POST['q'])) {
		$qContent = trim($_POST['q']);
		if (empty($qContent))
		{
			if ($op == '=~') {
				return false;
			} 
			return true;
		}
		
		$result = MAX_cacheGetContentCategoriesKeywords($qContent); 
		if (!empty($result))
			$result = json_decode($result, true);
		
		$keys = array();
		if (!empty($result) && !empty($result['Keywords']) && count($result['Keywords']) > 0)
		{
			foreach ($result['Keywords'] as $k){
				array_push($keys, $k['Content']);
			}
		}
	}
	else if (!empty($_POST['keywords'])) {
		$keys = explode("|", $_POST['keywords']);
	}
		
	if (!empty($keys) && count($keys) > 0)
	{
		if ($op == '=~') {
			foreach ($keys as $ke) {
				if (MAX_limitationsMatchStringValue($limitation, $ke, $op)) {
					return true;
				}
			}
			return false;
		}
		else if ($op == '!~') {
			foreach ($keys as $ke) {
				if (MAX_limitationsMatchStringValue($limitation, $ke, '=~')) {
					return false;
				}
			}
			return true;
		}
	}
	return false;
}
?>
