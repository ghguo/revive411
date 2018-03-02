<?php /* Smarty version 2.6.18, created on 2017-12-21 20:40:40
         compiled from form/form.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 't', 'form/form.html', 17, false),array('block', 'oa_form_element', 'form/form.html', 30, false),)), $this); ?>

<div class="messagePlaceholder messagePlaceholderForm" id="errors_<?php echo $this->_tpl_vars['form']['id']; ?>
" <?php if ($this->_tpl_vars['form']['errors']): ?><?php else: ?>style="display:none"<?php endif; ?>>
  <div class="message localMessage">
    <div class="panel error">
      <div class="icon"></div><p><?php echo OA_Admin_Template::_function_t(array('str' => 'FormContainsErrors'), $this);?>
</p>
      <div class="topleft"></div>
      <div class="topright"></div>
      <div class="bottomleft"></div>
      <div class="bottomright"></div>
    </div>
  </div>
</div>

<form <?php echo $this->_tpl_vars['form']['attributes']; ?>
>
<?php echo $this->_tpl_vars['form']['hidden']; ?>


<?php $_from = $this->_tpl_vars['form']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['_e_elements'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['_e_elements']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ei'] => $this->_tpl_vars['nonSecElem']):
        $this->_foreach['_e_elements']['iteration']++;
?>
    <?php $this->_tag_stack[] = array('oa_form_element', array('elem' => $this->_tpl_vars['nonSecElem'])); $_block_repeat=true;OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['form']['sections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['_e_outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['_e_outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['sec']):
        $this->_foreach['_e_outer']['iteration']++;
?>
    <?php if (! ($this->_foreach['_e_outer']['iteration'] <= 1)): ?>
    <?php endif; ?>
    <?php $this->_tag_stack[] = array('oa_form_element', array('elem' => $this->_tpl_vars['sec'])); $_block_repeat=true;OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
        <?php $_from = $this->_tpl_vars['sec']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
            <?php $this->_tag_stack[] = array('oa_form_element', array('elem' => $this->_tpl_vars['element'])); $_block_repeat=true;OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo OA_Admin_Template::_block_form_element($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endforeach; endif; unset($_from); ?>
</form>

<script type="text/javascript">
<!--
<?php echo $this->_tpl_vars['form']['JQueryMethods']; ?>


$(document).ready(function() {
    $("#<?php echo $this->_tpl_vars['form']['id']; ?>
").initForm({
        <?php echo $this->_tpl_vars['form']['JQueryRules']; ?>

    });
});
//-->
</script>
