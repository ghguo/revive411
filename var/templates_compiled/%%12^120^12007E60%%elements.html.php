<?php /* Smarty version 2.6.18, created on 2017-12-21 20:40:40
         compiled from /var/www/html/lib/templates/admin/form/elements.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 't', '/var/www/html/lib/templates/admin/form/elements.html', 51, false),array('function', 'cycle', '/var/www/html/lib/templates/admin/form/elements.html', 77, false),array('block', 'oa_form_element', '/var/www/html/lib/templates/admin/form/elements.html', 80, false),array('modifier', 'cat', '/var/www/html/lib/templates/admin/form/elements.html', 87, false),array('modifier', 'default', '/var/www/html/lib/templates/admin/form/elements.html', 113, false),array('modifier', 'escape', '/var/www/html/lib/templates/admin/form/elements.html', 113, false),)), $this); ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'header'): ?>
  <table class="section" border='0' width='100%' cellpadding='0' cellspacing='0'>
  <tr><td height='25' colspan='3'><?php if ($this->_tpl_vars['_e']['icon']): ?><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/<?php echo $this->_tpl_vars['_e']['icon']; ?>
' align='absmiddle'>&nbsp;<?php endif; ?><?php if ($this->_tpl_vars['_e']['header']): ?><b><?php echo $this->_tpl_vars['_e']['header']; ?>
</b><?php endif; ?></td></tr>
  <tr style="height:1px;"><td width='30'><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/break.gif' alt='' style="height:1px; width:30px;"></td>
    <td width='170'><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/break.gif' alt='' style="height:1px; width:170px;"></td>
    <td width='100%'><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/break.gif' alt='' style="height:1px;" width='100%'></td>
  </tr>
  <tr><td height='10' colspan='3'>&nbsp;</td></tr>
      <?php if ($this->_tpl_vars['_e']['errors']): ?>
            <tr><td>&nbsp;</td><td height='10' colspan='2'>
      <table cellpadding='0' cellspacing='0' border='0'><tr><td>
      <img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/error.gif' align='absmiddle'>&nbsp;
      <?php $_from = $this->_tpl_vars['_e']['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_eErr']):
?>
          <font color='#AA0000'><b><?php echo $this->_tpl_vars['_eErr']; ?>
</b></font><br />
      <?php endforeach; endif; unset($_from); ?>
      </td></tr></table></td></tr><tr><td height='10' colspan='3'>&nbsp;</td></tr>
      <tr><td><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/spacer.gif' style="height:1px;" width='100%'></td>
      <td colspan='2'><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/break-l.gif' style="height:1px; width:170px;" vspace='6'></td></tr>
      <?php endif; ?>

            <?php echo $this->_tpl_vars['_e']['content']; ?>


              </table>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'controls'): ?>
        <div class="controls">
      <?php if ($this->_tpl_vars['form']['hasRequiredFields'] && ! $this->_tpl_vars['form']['frozen']): ?>
        <span style="margin-left: 7px; float: right;">
            <span style="font-size:80%; color: red">*</span> <span style="font-size:80%; color:#7f7f7f;"><?php echo OA_Admin_Template::_function_t(array('str' => 'RequiredFieldLegend'), $this);?>
</span>
        </span>
      <?php endif; ?>

            <?php echo $this->_tpl_vars['_e']['content']; ?>

          </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] != 'header' && $this->_tpl_vars['_e']['type'] != 'controls' && $this->_tpl_vars['_e']['type'] != 'hidden' && $this->_tpl_vars['_e']['type'] != 'script' && $this->_tpl_vars['_e']['type'] != 'plugin-script' && $this->_tpl_vars['_e']['break']): ?>
    <tr class="spacer"><td style="height:1px;" colspan='3'>&nbsp;</td></tr>
<?php endif; ?>


<?php if ($this->_tpl_vars['_e']['type'] == 'group'): ?>
    <?php if (! $this->_tpl_vars['_e']['parent']): ?>
    <tr>
        <td width='30'>&nbsp;</td>
        <?php if ($this->_tpl_vars['_e']['label']): ?>
            <td width='170' valign="top" style="padding-top: 5px"><?php echo $this->_tpl_vars['_e']['label']; ?>
 <?php if ($this->_tpl_vars['_e']['required']): ?><font color="red">*</font><?php endif; ?></td>
        <?php endif; ?>
        <td <?php if ($this->_tpl_vars['_e']['label']): ?>width='100%'<?php else: ?>colspan='2'<?php endif; ?>>
    <?php endif; ?>

    <?php echo smarty_function_cycle(array('name' => 'gsep','advance' => false,'values' => $this->_tpl_vars['_e']['separator'],'reset' => true,'print' => false), $this);?>

    <?php $_from = $this->_tpl_vars['_e']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gkey'] => $this->_tpl_vars['groupItem']):
?>
        <?php if ($this->_tpl_vars['groupItem']['type'] == 'group'): ?>
            <?php $this->_tag_stack[] = array('oa_form_element', array('elem' => $this->_tpl_vars['groupItem'],'parent' => $this->_tpl_vars['_e'])); $_block_repeat=true;OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <?php else: ?>
            <?php if ($this->_tpl_vars['groupItem']['decorators']): ?>
               <?php echo $this->_tpl_vars['groupItem']['decorators']['prepend']; ?>

            <?php endif; ?>

            <?php if ($this->_tpl_vars['groupItem']['type'] == 'custom'): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/custom-') : smarty_modifier_cat($_tmp, 'form/custom-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['groupItem']['templateId']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['groupItem']['templateId'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['groupItem'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php else: ?>
              <?php if ($this->_tpl_vars['groupItem']['labelPlacement'] == 'after'): ?>
                 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/element-raw.html') : smarty_modifier_cat($_tmp, 'form/element-raw.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['groupItem'],'parent' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php echo $this->_tpl_vars['groupItem']['label']; ?>
<?php if ($this->_tpl_vars['groupItem']['required']): ?><font color="red">*</font><?php endif; ?>
              <?php else: ?>
                  <?php echo $this->_tpl_vars['groupItem']['label']; ?>
<?php if ($this->_tpl_vars['groupItem']['required'] && $this->_tpl_vars['groupItem']['label']): ?><font color="red">*</font><?php endif; ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/element-raw.html') : smarty_modifier_cat($_tmp, 'form/element-raw.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['groupItem'],'parent' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php if ($this->_tpl_vars['groupItem']['required'] && ! $this->_tpl_vars['groupItem']['label']): ?><font color="red">*</font><?php endif; ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['groupItem']['decorators']): ?>
                <?php echo $this->_tpl_vars['groupItem']['decorators']['append']; ?>

            <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['_e']['separator']): ?><?php echo smarty_function_cycle(array('name' => 'gsep','values' => $this->_tpl_vars['_e']['separator']), $this);?>

        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>

    <?php if (! $this->_tpl_vars['_e']['parent']): ?>
        <?php if ($this->_tpl_vars['_e']['error']): ?><br><label class="error"><?php echo $this->_tpl_vars['_e']['error']; ?>
</label><?php endif; ?>
        </td>
    </tr>
    <?php endif; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'text' || $this->_tpl_vars['_e']['type'] == 'password' || $this->_tpl_vars['_e']['type'] == 'textarea' || $this->_tpl_vars['_e']['type'] == 'select' || ! $this->_tpl_vars['_e']['type']): ?>
    <tr>
        <td width='30'>&nbsp;</td><td width='170'><label for="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['_e']['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['_e']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['_e']['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['_e']['label']; ?>
 <?php if ($this->_tpl_vars['_e']['required']): ?><font color="red">*</font><?php endif; ?></label></td>
        <td width='100%'>
           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/element-raw.html') : smarty_modifier_cat($_tmp, 'form/element-raw.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php if ($this->_tpl_vars['_e']['error']): ?><label class="error" for="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['_e']['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['_e']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['_e']['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['_e']['error']; ?>
</label><?php endif; ?>
        </td>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'checkbox' || $this->_tpl_vars['_e']['type'] == 'radio'): ?>
    <tr>
        <td width='30'>&nbsp;</td>
        <?php if ($this->_tpl_vars['_e']['label'] != ''): ?>
            <td width='170'><?php echo $this->_tpl_vars['_e']['label']; ?>
 <?php if ($this->_tpl_vars['_e']['required']): ?><font color="red">*</font><?php endif; ?></td>
	        <td width='100%'>
	            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/element-raw.html') : smarty_modifier_cat($_tmp, 'form/element-raw.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php if ($this->_tpl_vars['_e']['error']): ?><br><label class="error" for="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['_e']['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['_e']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['_e']['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['_e']['error']; ?>
</label><?php endif; ?>
	        </td>
        <?php else: ?>
            <td colspan="2">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/element-raw.html') : smarty_modifier_cat($_tmp, 'form/element-raw.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php if ($this->_tpl_vars['_e']['error']): ?><br><label class="error" for="<?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['_e']['id'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['_e']['name']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['_e']['name'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo $this->_tpl_vars['_e']['error']; ?>
</label><?php endif; ?>
            </td>
        <?php endif; ?>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'submit'): ?>
    <?php if ($this->_tpl_vars['_e']['parent_tag'] == 'controls'): ?>
       <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/element-raw.html') : smarty_modifier_cat($_tmp, 'form/element-raw.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
    <tr>
        <td width='30'>&nbsp;</td>
        <td colspan='2'>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/element-raw.html') : smarty_modifier_cat($_tmp, 'form/element-raw.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </td>
    </tr>
    <?php endif; ?>

<?php endif; ?>


<?php if ($this->_tpl_vars['_e']['type'] == 'static'): ?>
    <tr>
        <td width='30'>&nbsp;</td>
        <?php if ($this->_tpl_vars['_e']['label'] != ''): ?>
            <td width='170'><?php echo $this->_tpl_vars['_e']['label']; ?>
</td>
            <td width='100%' class="static">
                <?php echo $this->_tpl_vars['_e']['html']; ?>

            </td>
        <?php else: ?>
            <td colspan="2">
                <?php echo $this->_tpl_vars['_e']['html']; ?>

            </td>
        <?php endif; ?>
    </tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'html'): ?>
    <tr>
      <td colspan="3">
          <?php echo $this->_tpl_vars['_e']['html']; ?>

      </td>
    </tr>
<?php endif; ?>


<?php if ($this->_tpl_vars['_e']['type'] == 'custom'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/custom-') : smarty_modifier_cat($_tmp, 'form/custom-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_e']['templateId']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_e']['templateId'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array('elem' => $this->_tpl_vars['_e'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'plugin-custom'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pluginBaseDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_e']['plugin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_e']['plugin'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['pluginTemplateDir']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['pluginTemplateDir'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_e']['templateId']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_e']['templateId'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'script'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/script-') : smarty_modifier_cat($_tmp, 'form/script-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_e']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_e']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['_e']['type'] == 'plugin-script'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pluginBaseDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_e']['plugin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_e']['plugin'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['pluginTemplateDir']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['pluginTemplateDir'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_e']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_e']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array('plugin' => $this->_tpl_vars['_e']['plugin'],'pluginWebPath' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['adminPluginWebPath'])) ? $this->_run_mod_handler('cat', true, $_tmp, '/') : smarty_modifier_cat($_tmp, '/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['_e']['plugin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['_e']['plugin'])))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
