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
			if ($op == '==' || $op == '=~') {
				return false;
			} 
			return true;
		}
		
		$result = MAX_cacheGetContentCategoriesKeywords($qContent); 
		if (!empty($result))
			$result = json_decode($result, true);
		
		$keys = '';
		$key1 = '';
		$key2 = '';
		$key3 = '';
		if (!empty($result) && !empty($result['Cats']) && count($result['Cats']) > 0)
		{
			$cats = explode("/", $result['Cats'][0]['Content']);
			$cat1 = $cats[1];
			$cat2 = '';
			$cat3 = '';
			if (count($cats) == 3) {
				$cat2 = $cats[2];
			}
			else if (count($cats) == 4)	{
				$cat2 = $cats[2];
				$cat3 = $cats[3];
			}
			
			if (!isset($GLOBALS['IAB_CATEGORIES']['LEVEL1']))
			{
				include(MAX_PATH . '/plugins/deliveryLimitations/Content/iab-category.php');
			}
			if (isset($GLOBALS['IAB_CATEGORIES']['LEVEL1']))
			{
				$key1 = array_search($cat1, $GLOBALS['IAB_CATEGORIES']['LEVEL1']);
				if ($op == '=~') {
					if (empty($key1)) {
						return false;
					}
					return stripos(','.$limitation.',', ','.$key1.',') !== false;
				}
				if ($op == '!~') {
					if (empty($key1)) {
						return true;
					}
					return stripos(','.$limitation.',', ','.$key1.',') === false;
				}
				
				if (!empty($cat2))
				{
					$key2 = array_search($cat2, $GLOBALS['IAB_CATEGORIES']['LEVEL2']);
					
					if (!empty($cat3))
					{
						$key3 = array_search($cat3, $GLOBALS['IAB_CATEGORIES']['LEVEL3']);
					}
				}
				
				$keys = $key1 . (!empty($key2) ? ",$key2" . (!empty($key3) ? ",$key3" : "") : "");
			}
		}
		
		if ($op == '==') {
			return strcasecmp($limitation, $keys) == 0;
		} 

		if ($op == '!=') {
			return strcasecmp($limitation, $keys) != 0;
		} 
	}

	if ($op == '==' || $op == '=~') {
		return false;
	} 

	return true;
}
?>
