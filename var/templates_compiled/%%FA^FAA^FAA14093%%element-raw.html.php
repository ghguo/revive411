<?php /* Smarty version 2.6.18, created on 2017-12-21 20:40:40
         compiled from /var/www/html/lib/templates/admin/form/element-raw.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oa_form_input_attributes', '/var/www/html/lib/templates/admin/form/element-raw.html', 15, false),array('function', 'html_options', '/var/www/html/lib/templates/admin/form/element-raw.html', 25, false),array('modifier', 'escape', '/var/www/html/lib/templates/admin/form/element-raw.html', 21, false),array('modifier', 'cat', '/var/www/html/lib/templates/admin/form/element-raw.html', 28, false),)), $this); ?>

<?php if ($this->_tpl_vars['elem']['type'] == 'text' || $this->_tpl_vars['elem']['type'] == 'password' || $this->_tpl_vars['elem']['type'] == 'submit' || ! $this->_tpl_vars['elem']['type']): ?>
  <?php if ($this->_tpl_vars['elem']['prefix']): ?><span class="affix prefix"><?php echo $this->_tpl_vars['elem']['prefix']; ?>
</span><?php endif; ?><input <?php echo OA_Admin_Template::_function_form_input_attributes(array('elem' => $this->_tpl_vars['elem'],'parent' => $this->_tpl_vars['parent']), $this);?>
 /><?php if ($this->_tpl_vars['elem']['suffix']): ?><span class="affix suffix"><?php echo $this->_tpl_vars['elem']['suffix']; ?>
</span><?php endif; ?>

<?php elseif ($this->_tpl_vars['elem']['type'] == 'checkbox' || $this->_tpl_vars['elem']['type'] == 'radio'): ?>
  <?php if ($this->_tpl_vars['elem']['prefix']): ?><span class="affix prefix"><?php echo $this->_tpl_vars['elem']['prefix']; ?>
</span><?php endif; ?><?php echo $this->_tpl_vars['elem']['html']; ?>
<?php if ($this->_tpl_vars['elem']['suffix']): ?><span class="affix suffix"><?php echo $this->_tpl_vars['elem']['suffix']; ?>
</span><?php endif; ?>

<?php elseif ($this->_tpl_vars['elem']['type'] == 'textarea'): ?>
  <?php if ($this->_tpl_vars['elem']['prefix']): ?><span class="affix prefix"><?php echo $this->_tpl_vars['elem']['prefix']; ?>
</span><?php endif; ?><textarea <?php echo OA_Admin_Template::_function_form_input_attributes(array('elem' => $this->_tpl_vars['elem'],'parent' => $this->_tpl_vars['parent']), $this);?>
><?php echo ((is_array($_tmp=$this->_tpl_vars['elem']['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea><?php if ($this->_tpl_vars['elem']['suffix']): ?><span class="affix suffix"><?php echo $this->_tpl_vars['elem']['suffix']; ?>
</span><?php endif; ?>

<?php elseif ($this->_tpl_vars['elem']['type'] == 'select'): ?>
  <?php if ($this->_tpl_vars['elem']['prefix']): ?><span class="affix prefix"><?php echo $this->_tpl_vars['elem']['prefix']; ?>
</span><?php endif; ?><select <?php echo OA_Admin_Template::_function_form_input_attributes(array('elem' => $this->_tpl_vars['elem'],'parent' => $this->_tpl_vars['parent']), $this);?>
 >
  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['elem']['options'],'selected' => $this->_tpl_vars['elem']['value']), $this);?>

  </select><?php if ($this->_tpl_vars['elem']['suffix']): ?><span class="affix suffix"><?php echo $this->_tpl_vars['elem']['suffix']; ?>
</span><?php endif; ?>
<?php elseif ($this->_tpl_vars['elem']['type'] == 'plugin-custom'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pluginBaseDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['elem']['plugin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['elem']['plugin'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['pluginTemplateDir']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['pluginTemplateDir'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['elem']['templateId']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['elem']['templateId'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['elem']['type'] == 'script'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oaTemplateDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'form/script-') : smarty_modifier_cat($_tmp, 'form/script-')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['elem']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['elem']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['elem']['type'] == 'plugin-script'): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pluginBaseDir'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['elem']['plugin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['elem']['plugin'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['pluginTemplateDir']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['pluginTemplateDir'])))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['elem']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['elem']['name'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.html') : smarty_modifier_cat($_tmp, '.html')), 'smarty_include_vars' => array('plugin' => $this->_tpl_vars['elem']['plugin'],'pluginWebPath' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['adminPluginWebPath'])) ? $this->_run_mod_handler('cat', true, $_tmp, '/') : smarty_modifier_cat($_tmp, '/')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['elem']['plugin']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['elem']['plugin'])))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
  <?php echo $this->_tpl_vars['elem']['html']; ?>

<?php endif; ?>