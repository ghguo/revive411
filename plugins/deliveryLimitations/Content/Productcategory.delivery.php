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
 * Check to see if this impression contains the product category of limitation.
 *
 * @param string $limitation The product category (or comma list of category, subcategory) limitation
 * @param string $op The operator ('==', '!=', '=~' or '!~')
 * @param array $aParams An array of additional parameters to be checked
 * @return boolean Whether this impression's product category passes this limitation's test.
 */
function MAX_checkContent_Productcategory($limitation, $op, $aParams = array())
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
		if (!empty($result) && !empty($result['ProductCats']) && count($result['ProductCats']) > 0)
		{
			$cats = explode("/", $result['ProductCats'][0]['Content']);
			$cat1 = $cats[1];
			$cat2 = '';
			if (count($cats) == 3) {
				$cat2 = $cats[2];
			}
			
			if (!isset($GLOBALS['PRODUCT_CATEGORIES']['LEVEL1']))
			{
				include(MAX_PATH . '/plugins/deliveryLimitations/Content/product-category.php');
			}
			if (isset($GLOBALS['PRODUCT_CATEGORIES']['LEVEL1']))
			{
				$key1 = array_search($cat1, $GLOBALS['PRODUCT_CATEGORIES']['LEVEL1']);
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
					$key2 = array_search($cat2, $GLOBALS['PRODUCT_CATEGORIES']['LEVEL2']);
				}
				
				$keys = $key1 . (!empty($key2) ? ",$key2" : "");
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
