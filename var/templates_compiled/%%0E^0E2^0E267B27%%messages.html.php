<?php /* Smarty version 2.6.18, created on 2017-12-18 22:07:21
         compiled from messages.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'messages.html', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['aMessages']['error'] || $this->_tpl_vars['forceRender']): ?>
    <div class="messagePlaceholder messagePlaceholderStatic <?php if ($this->_tpl_vars['class']): ?><?php echo $this->_tpl_vars['class']; ?>
<?php endif; ?>" <?php if ($this->_tpl_vars['id']): ?>id=<?php echo $this->_tpl_vars['id']; ?>
<?php endif; ?>>
      <div class="message localMessage">
        <div class="panel error">
          <div class="icon"></div>
          <div class="body">
			<span id='errorMessages'>
            <?php $_from = $this->_tpl_vars['aMessages']['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['messagesLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['messagesLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['error']):
        $this->_foreach['messagesLoop']['iteration']++;
?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php if (! ($this->_foreach['messagesLoop']['iteration'] == $this->_foreach['messagesLoop']['total'])): ?><br/><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            </span>
          </div>
          <div class="topleft"></div>
          <div class="topright"></div>
          <div class="bottomleft"></div>
          <div class="bottomright"></div>
        </div>
      </div>
    </div>    
<?php endif; ?>