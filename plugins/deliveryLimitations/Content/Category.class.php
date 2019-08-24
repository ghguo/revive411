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
 * basis of the IAB category of viewed content.
 */
class Plugins_DeliveryLimitations_Content_Category extends Plugins_DeliveryLimitations
{
    var $delimiter = ',';

    function __construct()
    {
        parent::__construct();
        $this->aOperations = array(
            '==' => $GLOBALS['strEqualTo'],
			'!=' => $GLOBALS['strDifferentFrom'],
			'=~' => MAX_Plugin_Translation::translate('Contains', $oPlugin->module, $oPlugin->package),
			'!~' => MAX_Plugin_Translation::translate('Does not contain', $oPlugin->module, $oPlugin->package)
			);
		$this->nameEnglish = 'Content - Category';
    }

    function init($data)
    {
        parent::init($data);
        if (is_array($this->data)) {
            $this->data = $this->_flattenData($this->data);
        }
    }

	function _flattenData($data = null)
    {
        $result = parent::_flattenData($data);
        if (is_array($result)) {
            return implode($this->delimiter, $result);
        }
        return $result;
    }

	function _expandData($data = null)
    {
        $result = parent::_expandData($data);
        if (!is_array($result)) {
            return strlen($result) ? explode($this->delimiter, $result) : array();
        }
        return $result;
    }

    function displayData()
    {
        $this->data = $this->_expandData($this->data);
		if (!isset($GLOBALS['IAB_CATEGORIES']['LEVEL1']))
		{
			include(MAX_PATH . '/plugins/deliveryLimitations/Content/iab-category.php');
		}

        $tabindex =& $GLOBALS['tabindex'];
		echo "<select class='cat1' tabindex='".($tabindex++)."' id='c_{$this->executionorder}_1' name='acl[{$this->executionorder}][data][]'>";
		$catLevl = $GLOBALS['IAB_CATEGORIES']['LEVEL1'];
		foreach ($catLevl as $key => $val) {
			echo "<option value='{$key}'" . (in_array($key, $this->data) ? " selected='selected'" : "") . ">" . $val . "</option>";
		}
		echo "</select>";

		echo "<br>";
		echo "<select class='cat2' tabindex='".($tabindex++)."' id='c_{$this->executionorder}_2' name='acl[{$this->executionorder}][data][]'>";
		$catLevl = $GLOBALS['IAB_CATEGORIES']['LEVEL2'];
		foreach ($catLevl as $key => $val) {
			echo "<option value='{$key}'" . (in_array($key, $this->data) ? " selected='selected'" : "") . ">" . $val . "</option>";
		}
		echo "</select>";

		echo "<br>";
		echo "<select class='cat3' tabindex='".($tabindex++)."' id='c_{$this->executionorder}_3' name='acl[{$this->executionorder}][data][]'>";
		$catLevl = $GLOBALS['IAB_CATEGORIES']['LEVEL3'];
		foreach ($catLevl as $key => $val) {
			echo "<option value='{$key}'" . (in_array($key, $this->data) ? " selected='selected'" : "") . ">" . $val . "</option>";
		}
		echo "</select>";

        $this->data = $this->_flattenData($this->data);
	}
}

?>
