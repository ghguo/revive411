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
require_once __DIR__.'/OsVersion.delivery.php';

use Sinergi\BrowserDetector\Os;

/**
 * A Client delivery limitation plugin, for filtering delivery of ads on the
 * basis of the viewer's browser.
 *
 * Works with:
 * A comma separated list of valid browser codes. See the phpSniff.class.php
 * file for details of the valid browser codes.
 *
 * Valid comparison operators:
 * =~, !~
 *
 * @package    OpenXPlugin
 * @subpackage DeliveryLimitations
 */
class Plugins_DeliveryLimitations_Client_OsVersion extends Plugins_DeliveryLimitations_CommaSeparatedData
{
    private static $aOSs = [
        Os::WINDOWS,
        Os::OSX,
        Os::LINUX,
        Os::ANDROID,
        Os::BLACKBERRY,
        Os::CHROME_OS,
        Os::IOS,
        Os::WINDOWS_PHONE,
    ];

    function __construct()
    {
        parent::__construct();
        $this->nameEnglish = 'Client - Operating System Version';

        $aStringOp = MAX_limitationsGetAOperationsForString($this);

        $this->delimiter = '|';
        $this->aOperations = [
            'nn' => '',
            '==' => $aStringOp['=='],
            '!=' => $aStringOp['!='],
        ] + MAX_limitationsGetAOperationsForNumeric($this);
    }

    public function init($data)
    {
        parent::init($data);
        $this->aOperations['nn'] = $this->translate("is any version of");
        $this->setAValues(array_keys($this->res));
    }

    /**
     * Outputs the HTML to display the data for this limitation
     *
     * @return void
     */
    public function displayArrayData()
    {
        $tabindex =& $GLOBALS['tabindex'];
?>
<table width="275" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="left" width="50"><strong><?php echo $this->translate("Operating System");
        ?>:</strong></td>
        <td><select name="acl[<?php echo $this->executionorder;
        ?>][data][]" value="<?php echo((!empty($this->data[0])) ? htmlspecialchars($this->data[0]) : '');
        ?>" tabindex="<?php echo $tabindex;
        ?>"><?php foreach (self::$aOSs as $value) {
            $value = htmlspecialchars($value, ENT_QUOTES);
            echo "<option value='{$value}'".($value == $this->data[0] ? ' selected="selected"' : '').">{$value}</option>";
        }
        ?></select></td>
    </tr>
    <tr id="acl-<?php echo $this->executionorder; ?>">
        <td align="left" width="50"><strong><?php echo $this->translate("Version");
        ?>:</strong></td>
        <td><input type="text" size="10" name="acl[<?php echo $this->executionorder;
        ?>][data][]" value="<?php echo((!empty($this->data[1])) ? htmlspecialchars($this->data[1]) : '');
        ?>"  id="acl-<?php echo $this->executionorder;
        ?>-version" tabindex="<?php echo $tabindex++;
        ?>">
    <script>
        (function ($) {
            $('select[name="acl[<?php echo $this->executionorder; ?>][comparison]"]').change(function() {
                var $tr = $("#acl-<?php echo $this->executionorder; ?>");

                if ($(this).val() == 'nn') {
                    $tr.hide();
                    $tr.find("input").attr('disabled', true);
                } else {
                    $tr.find("input").attr('disabled', false);
                    $tr.show();
                }
            }).change();
        })(jQuery);
    </script>
        </td>
    </tr>
</table><?php
    }

    public function _flattenData($data = null)
    {
        if (is_array($data)) {
            if (!isset($data[1])) {
                $data[1] = '';
            } else {
                $data[1] = strtolower($data[1]);
            }
        }

        return parent::_flattenData($data);;
    }

    public function checkInputData($data)
    {
        $result = parent::checkInputData($data);

        if ($result === true) {
            if (is_array($data['data'])) {
                if (isset($data['data'][1]) && !is_numeric($data['data'][1])) {
                    if ($data['data'][0] != Os::WINDOWS) {
                        return sprintf('%s: %s',
                            $this->getName(),
                            $this->translate('Version should be a number')
                        );
                    } elseif (!isset($this->res[$data['data'][1]])) {
                        return sprintf('%s: %s',
                            $this->getName(),
                            $this->translate('Version is not valid')
                        );
                    }
                }
            }
        }

        return $result;
    }
}
