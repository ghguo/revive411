<?php /* Smarty version 2.6.18, created on 2017-12-21 20:40:40
         compiled from banner-edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 't', 'banner-edit.html', 20, false),array('function', 'tabindex', 'banner-edit.html', 22, false),array('function', 'html_options', 'banner-edit.html', 23, false),array('function', 'phpAds_ShowBreak', 'banner-edit.html', 28, false),)), $this); ?>
<script src="assets/tinymce/tinymce.min.js"></script>
<?php if (! $this->_tpl_vars['bannerId']): ?>
<form action='banner-edit.php' method='POST'>
    <input type='hidden' name='clientid' value='<?php echo $this->_tpl_vars['clientId']; ?>
'>
    <input type='hidden' name='campaignid' value='<?php echo $this->_tpl_vars['campaignId']; ?>
'>
    <input type='hidden' name='bannerid' value='<?php echo $this->_tpl_vars['bannerId']; ?>
'>

    <table border='0' width='100%' cellpadding='0' cellspacing='0'>
        <tr><td height='25' colspan='3'><b><?php echo OA_Admin_Template::_function_t(array('str' => 'ChooseBanner'), $this);?>
</b></td></tr>
        <tr><td height='25'>
        <select name='type' onChange='this.form.action=this.form.action+"?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&campaignid=<?php echo $this->_tpl_vars['campaignId']; ?>
";this.form.submit();' <?php echo OA_Admin_Template::_function_tabindex(array(), $this);?>
 >
            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['bannerTypes'],'selected' => $this->_tpl_vars['bannerType']), $this);?>

        </select>
        </td></tr>
    </table>
</form>
<?php echo OA_Admin_Template::_function_phpAds_ShowBreak(array(), $this);?>


<?php else: ?>
    <div class='errormessage' id='warning_change_zone_type' style='display:none'> <img class='errormessage' src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/errormessage.gif' align='absmiddle' />
<span class='tab-r'><?php echo OA_Admin_Template::_function_t(array('str' => 'Warning'), $this);?>
:</span><br />
<?php echo OA_Admin_Template::_function_t(array('str' => 'WarnChangeZoneType'), $this);?>

</div>

<div class='errormessage' id='warning_change_banner_size' style='display:none'> <img class='errormessage' src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/warning.gif' align='absmiddle' />
<span class='tab-s'> <?php echo OA_Admin_Template::_function_t(array('str' => 'Notice'), $this);?>
</span><br />
<?php echo OA_Admin_Template::_function_t(array('str' => 'WarnChangeBannerSize'), $this);?>

</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['disabled']): ?>
<div class='errormessage' id='warning_banner_readonly'> <img class='errormessage' src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/warning.gif' align='absmiddle' />
<span class='tab-s'> <?php echo OA_Admin_Template::_function_t(array('str' => 'Notice'), $this);?>
</span><br />
<?php echo OA_Admin_Template::_function_t(array('str' => 'WarnBannerReadonly'), $this);?>

</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "form/form.html", 'smarty_include_vars' => array('form' => $this->_tpl_vars['form'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<script language='JavaScript'>
<!--

<?php if ($this->_tpl_vars['bannerId']): ?>
    document.bannerHeight =<?php echo $this->_tpl_vars['bannerHeight']; ?>
;
    document.bannerWidth =<?php echo $this->_tpl_vars['bannerWidth']; ?>
;
<?php endif; ?>

<?php echo '
    function selectFile(o, handleSWF)
    {
        var filename = o.value.toLowerCase();
        var bannerForm = findObj (\'bannerForm\');
        $(o).siblings(\'input[value=t]\').attr(\'checked\', true);

        if (handleSWF) {
            // Show SWF Layer
            var swflayer = findObj (\'swflayer\');
            var swfAlternate1 = findObj (\'swfAlternative1\');
            var swfAlternate2 = findObj (\'swfAlternative2\');
            var iab_rmedia_note = findObj (\'iab_rmedia_note\');

            if (swflayer) {
                if (filename.indexOf(\'swf\') + 3 == filename.length) {
                    swflayer.style.display = \'\';
                    swfAlternate1.style.display = \'\';
                    swfAlternate2.style.display = \'\';
                    iab_rmedia_note.style.display = \'\'; 
                } else {
                    swflayer.style.display = \'none\';
                    swfAlternate1.style.display = \'none\';
                    swfAlternate2.style.display = \'none\';
                    iab_rmedia_note.style.display = \'none\';
                }
            }
        }

    }

    function oa_sizeChangeUpdateMessage(id)
    {
        if (document.bannerWidth != document.bannerForm.width.value ||
            document.bannerHeight !=  document.bannerForm.height.value) {
                oa_show(id);

        } else if (document.bannerWidth == document.bannerForm.width.value &&
                   document.bannerHeight ==  document.bannerForm.height.value) {
            oa_hide(id);
        }
    }

    function oa_show(id)
    {
        var obj = findObj(id);
        if (obj) { obj.style.display = \'block\'; }
    }

    function oa_hide(id)
    {
        var obj = findObj(id);
        if (obj) { obj.style.display = \'none\'; }
    }

    function rv_tinymce(sel, enable, imgurl)
    {
        var r = function (str) {
            return new RegExp(str.replace(/[\\-\\[\\]\\/\\{\\}\\(\\)\\*\\+\\?\\.\\\\\\^\\$\\|]/g, "\\\\$&"), \'g\');
        };

        if (enable) {
            if (imgurl) {
                jQuery(sel).val(jQuery(sel).val().replace(r(\'{img_url_prefix}\'), imgurl));
            }

            tinymce.init({
                selector: sel,
                branding: false,
                plugins: \'code colorpicker contextmenu directionality image imagetools link lists media preview searchreplace table textcolor\',
                toolbar_items_size : \'small\',
                toolbar: \'undo redo | styleselect | bold italic | link image | forecolor backcolor | code\',
                menubar: false,
                extended_valid_elements:\'script[language|type|src]\',
                forced_root_block: false,
                images_upload_url: \''; ?>
banner-async-upload.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&campaignid=<?php echo $this->_tpl_vars['campaignId']; ?>
&bannerid=<?php echo $this->_tpl_vars['bannerId']; ?>
<?php echo '\',
                images_upload_base_path: imgurl,
                images_upload_credentials: true,
                relative_urls : false,
                remove_script_host: false,
                allow_unsafe_link_target: true,
                content_style: "body { margin: 0; padding: 0 }"
            });
        } else {
            tinymce.remove(sel);

            if (imgurl) {
                jQuery(sel).val(jQuery(sel).val().replace(r(imgurl), \'{img_url_prefix}\'));
            }
        }
    }

    '; ?>

//-->
</script>


