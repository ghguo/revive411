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

function MAX_cacheGetContentCategoriesKeywords($qContent, $cached = true)
{
	$cacheKey = strlen($qContent) < 255 ? $qContent : substr($qContent, 0, 255);
	$sName = OA_Delivery_Cache_getName(__FUNCTION__, $cacheKey);
	if (!$cached || ($aRows = OA_Delivery_Cache_fetch($sName)) === false) {
		MAX_Dal_Delivery_Include();
		$aRows = ContentCategoriesKeywords($qContent);
		$aRows = OA_Delivery_Cache_store_return($sName, $aRows);
	}
	return $aRows;
}

function ContentCategoriesKeywords($qContent)
{
	$conf = $GLOBALS['_MAX']['CONF'];
	$deliveryId = md5("{$conf['webpath']['delivery']}*{$conf['webpath']['deliverySSL']}");
	$catsServer = $conf['var']['catsServer'];
	$catsServerKey = $conf['var']['catsServerKey'];
	
	if(empty($deliveryId) || empty($catsServer) || empty($catsServerKey)) 
		return '';
	
	$postdata = http_build_query(
	    array(
	        'appId' => $catsServerKey,
	        'zoneId' => '',
	        'deliveryId' => $deliveryId,
	        'q' => $qContent
	    )
	);

	$opts = array('http' =>
	    array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded',
	        'content' => $postdata
	    )
	);
	
	$context  = stream_context_create($opts);
	$result = file_get_contents($catsServer, false, $context);
	return $result;
}
?>
