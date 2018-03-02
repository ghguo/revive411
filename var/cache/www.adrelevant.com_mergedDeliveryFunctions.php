<?php



MAX_Dal_Delivery_Include();
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon($adId, $zoneId)
{
$GLOBALS['_MAX']['deliveryData']['creative_id'] = (int)$adId;
$GLOBALS['_MAX']['deliveryData']['zone_id'] = (int)$zoneId;
if (!empty($GLOBALS['_MAX']['deliveryData']['Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon'])) {
return;
}
$GLOBALS['_MAX']['deliveryData']['Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon'] = true;
if (empty($GLOBALS['_MAX']['NOW'])) {
$GLOBALS['_MAX']['NOW'] = time();
}
$time = $GLOBALS['_MAX']['NOW'];
$oi = $GLOBALS['_MAX']['CONF']['maintenance']['operationInterval'];
$GLOBALS['_MAX']['deliveryData']['interval_start'] = gmdate('Y-m-d H:i:s', $time - $time % ($oi * 60));
$GLOBALS['_MAX']['deliveryData']['ip_address'] = $_SERVER['REMOTE_ADDR'];
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon_Delivery_logRequest($adId, $zoneId)
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon($adId, $zoneId);
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon_Delivery_logImpression($adId, $zoneId)
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon($adId, $zoneId);
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon_Delivery_logClick($adId, $zoneId)
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataCommon($adId, $zoneId);
}


function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataPageInfo()
{
static $executed;
if ($executed) return;
$executed = true;
if (!empty($_GET['loc'])) {
$pageInfo = parse_url($_GET['loc']);
} elseif (!empty($_SERVER['HTTP_REFERER'])) {
$pageInfo = parse_url($_SERVER['HTTP_REFERER']);
} elseif (!empty($GLOBALS['loc'])) {
$pageInfo = parse_url($GLOBALS['loc']);
}
if (!empty($pageInfo['scheme'])) {
$pageInfo['scheme'] = ($pageInfo['scheme'] == 'https') ? 1 : 0;
}
$GLOBALS['_MAX']['deliveryData']['pageInfo'] = $pageInfo;
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataPageInfo_Delivery_logRequest()
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataPageInfo();
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataPageInfo_Delivery_logImpression()
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataPageInfo();
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataPageInfo_Delivery_logClick()
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataPageInfo();
}


function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataUserAgent()
{
static $executed;
if ($executed) return;
$executed = true;
$userAgentInfo = array(
'os' => $GLOBALS['_MAX']['CLIENT']['os'],
'long_name' => $GLOBALS['_MAX']['CLIENT']['long_name'],
'browser' => $GLOBALS['_MAX']['CLIENT']['browser'],
);
$GLOBALS['_MAX']['deliveryData']['userAgentInfo'] = $userAgentInfo;
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataUserAgent_Delivery_logRequest()
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataUserAgent();
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataUserAgent_Delivery_logImpression()
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataUserAgent();
}
function Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataUserAgent_Delivery_logClick()
{
Plugin_deliveryDataPrepare_oxDeliveryDataPrepare_dataUserAgent();
}


MAX_Dal_Delivery_Include();
function Plugin_deliveryLog_oxLogClick_logClick_Delivery_logClick($adId = 0, $zoneId = 0, $okToLog = true)
{
if (!$okToLog) { return false; }
$aData = $GLOBALS['_MAX']['deliveryData'];
$aQuery = array(
'interval_start' => $aData['interval_start'],
'creative_id' => (int)$aData['creative_id'],
'zone_id' => (int)$aData['zone_id']
);
return OX_bucket_updateTable('data_bkt_c', $aQuery);
}



MAX_Dal_Delivery_Include();
function Plugin_deliveryLog_oxLogConversion_logConversion_Delivery_logConversion($trackerId, $serverRawIp, $aConversion, $okToLog = true)
{
if (!$okToLog) { return false; }
OA_Dal_Delivery_connect('rawDatabase');
$table = $GLOBALS['_MAX']['CONF']['table']['prefix'] . 'data_bkt_a';
if (empty($GLOBALS['_MAX']['NOW'])) {
$GLOBALS['_MAX']['NOW'] = time();
}
$time = $GLOBALS['_MAX']['NOW'];
$aValues = array(
'server_ip' => $serverRawIp,
'tracker_id' => (int)$trackerId,
'date_time' => gmdate('Y-m-d H:i:s', $time),
'action_date_time' => gmdate('Y-m-d H:i:s', $aConversion['dt']),
'creative_id' => (int)$aConversion['cid'],
'zone_id' => (int)$aConversion['zid'],
'ip_address' => $_SERVER['REMOTE_ADDR'],
'action' => $aConversion['action_type'],
'window' => $aConversion['window'],
'status' => $aConversion['status']
);
$aFields = array_map('OX_escapeIdentifier', array_keys($aValues));
$aValues = array_map('OX_escapeString', $aValues);
$query = "
        INSERT INTO
            {$table}
            (" . implode(', ', $aFields) . ")
        VALUES
            ('" . implode("', '", $aValues) . "')
    ";
$result = OA_Dal_Delivery_query($query, 'rawDatabase');
if (!$result) {
return false;
}
$aResult = array(
'server_conv_id' => OA_Dal_Delivery_insertId('rawDatabase', $table, 'server_conv_id'),
'server_raw_ip' => $serverRawIp
);
return $aResult;
}



MAX_Dal_Delivery_Include();
function Plugin_deliveryLog_oxLogConversion_logConversionVariable_Delivery_logConversionVariable($aVariables, $trackerId, $serverConvId, $serverRawIp, $okToLog=true)
{
if (!$okToLog) { return false; }
OA_Dal_Delivery_connect('rawDatabase');
$table = $GLOBALS['_MAX']['CONF']['table']['prefix'] . 'data_bkt_a_var';
if (empty($GLOBALS['_MAX']['NOW'])) {
$GLOBALS['_MAX']['NOW'] = time();
}
$time = $GLOBALS['_MAX']['NOW'];
$aRows = array();
foreach ($aVariables as $aVariable) {
$aRows[] = "(
                        '".OX_escapeString($serverConvId)."',
                        '".OX_escapeString($serverRawIp)."',
                        '{$aVariable['variable_id']}',
                        '".OX_escapeString($aVariable['value'])."',
                        '".gmdate('Y-m-d H:i:s', $time)."'
                    )";
}
if (empty($aRows)) {
return;
}
$query = "
        INSERT INTO
            {$table}
            (
                server_conv_id,
                server_ip,
                tracker_variable_id,
                value,
                date_time
            )
        VALUES " . implode(',', $aRows);
return OA_Dal_Delivery_query($query, 'rawDatabase');
}



function Plugin_deliveryLog_OxLogImpression_LogImpression_Delivery_logImpression($adId = 0, $zoneId = 0, $okToLog = true)
{
if (!$okToLog) { return false; }
$aData = $GLOBALS['_MAX']['deliveryData'];
$aQuery = array(
'interval_start' => $aData['interval_start'],
'creative_id' => (int)$aData['creative_id'],
'zone_id' => (int)$aData['zone_id']
);
return OX_bucket_updateTable('data_bkt_m', $aQuery);
}

function Plugin_deliveryLog_oxLogRequest_logRequest_Delivery_logRequest($adId = 0, $zoneId = 0, $aAd = array(), $okToLog = true)
{
if (!$okToLog) { return false; }
$aData = $GLOBALS['_MAX']['deliveryData'];
$aQuery = array(
'interval_start' => $aData['interval_start'],
'creative_id' => (int)$aData['creative_id'],
'zone_id' => (int)$aData['zone_id']
);
return OX_bucket_updateTable('data_bkt_r', $aQuery);
}


?>