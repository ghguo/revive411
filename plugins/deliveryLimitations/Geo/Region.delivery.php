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

/**
 * Check to see if this impression contains the valid region.
 *
 * @param string $limitation The region (or comma list of regions) limitation
 * @param string $op The operator (either '==' or '!=')
 * @param array $aParams An array of additional parameters to be checked
 * @return boolean Whether this impression's region passes this limitation's test.
 */
function MAX_checkGeo_Region($limitation, $op, $aParams = array())
{
    if (empty($aParams)) {
        $aParams = $GLOBALS['_MAX']['CLIENT_GEO'];
    }
    if ($op != '=~' && $op != '!~') {
        // Provide backwards compatibility
        $op = '=~';
    }

    $aLimitation = explode('|', $limitation);
    $sCountry = $aLimitation[0];
    $sRegions = $aLimitation[1];

    if ($aParams && $aParams['region'] && $aParams['country_code']) {
        return MAX_limitationsMatchStringValue($aParams['country_code'], $sCountry, '==')
            && MAX_limitationsMatchArrayValue($aParams['region'], $sRegions, $op);
    } else {
        return false; // Do not show the ad if user has no data about region and country.
    }
}

?>
