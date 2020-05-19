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
 * Check to see if this impression contains the IAB category of limitation.
 *
 * @param string $limitation The IAB category (or comma list of category and subcategory) limitation
 * @param string $op The operator ('==', '!=', '=~' or '!~')
 * @param array $aParams An array of additional parameters to be checked
 * @return boolean Whether this impression's IAB category passes this limitation's test.
 */
function MAX_checkContent_Category($limitation, $op, $aParams = array())
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
		
		$cats = array();
		if (!empty($result) && !empty($result['Cats']) && count($result['Cats']) > 0)
		{
			foreach ($result['Cats'] as $c){
				array_push($cats, $c['Content']);
			}
		}
	}
	else if (!empty($_POST['category'])) {
		$cats = explode("|", $_POST['category']);
	}
		
//	if (!empty($result) && !empty($result['Cats']) && count($result['Cats']) > 0)
	if (!empty($cats) && count($cats) > 0)
	{
		if (!isset($GLOBALS['IAB_CATEGORIES']['LEVEL3']))
		{
			include(MAX_PATH . '/plugins/deliveryLimitations/Content/iab-category.php');
		}
		if ($op == '=~') {
			$limits = explode(",", $limitation);
			$ckey='';
//			foreach ($result['Cats'] as $cat) {
			foreach ($cats as $cat) {
//				$ckey = array_search(substr($cat['Content'], 1), $GLOBALS['IAB_CATEGORIES']['LEVEL3']);
				$ckey = array_search(substr($cat, 1), $GLOBALS['IAB_CATEGORIES']['LEVEL3']);
				foreach ($limits as $lmt) {
					if ($lmt == substr($ckey, 0, strlen($lmt))) {
						return true;
					}
				}
			}
			return false;
		}
		else if ($op == '!~') {
//			foreach ($result['Cats'] as $i => $cat) {
			foreach ($cats as $i => $cat) {
//				$ckey = array_search(substr($cat['Content'], 1), $GLOBALS['IAB_CATEGORIES']['LEVEL3']);
				$ckey = array_search(substr($cat, 1), $GLOBALS['IAB_CATEGORIES']['LEVEL3']);
				if (strpos(','.$limitation.',', ','.$ckey.',') !== false) {
					return false;
				}
			}
			return true;
		}
	}

	return false;
}
?>
