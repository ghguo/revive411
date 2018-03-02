<?php /* Smarty version 2.6.18, created on 2017-12-21 20:40:40
         compiled from layout/links-container.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'layout/links-container.html', 23, false),)), $this); ?>

<div class='dropDown <?php echo $this->_tpl_vars['cssClass']; ?>
'>
    <span><span><?php echo $this->_tpl_vars['title']; ?>
</span></span>

    <div class='panel'>
        <div>
            <ul>
    		<?php unset($this->_sections['linkLoop']);
$this->_sections['linkLoop']['name'] = 'linkLoop';
$this->_sections['linkLoop']['loop'] = is_array($_loop=$this->_tpl_vars['aLinks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['linkLoop']['show'] = true;
$this->_sections['linkLoop']['max'] = $this->_sections['linkLoop']['loop'];
$this->_sections['linkLoop']['step'] = 1;
$this->_sections['linkLoop']['start'] = $this->_sections['linkLoop']['step'] > 0 ? 0 : $this->_sections['linkLoop']['loop']-1;
if ($this->_sections['linkLoop']['show']) {
    $this->_sections['linkLoop']['total'] = $this->_sections['linkLoop']['loop'];
    if ($this->_sections['linkLoop']['total'] == 0)
        $this->_sections['linkLoop']['show'] = false;
} else
    $this->_sections['linkLoop']['total'] = 0;
if ($this->_sections['linkLoop']['show']):

            for ($this->_sections['linkLoop']['index'] = $this->_sections['linkLoop']['start'], $this->_sections['linkLoop']['iteration'] = 1;
                 $this->_sections['linkLoop']['iteration'] <= $this->_sections['linkLoop']['total'];
                 $this->_sections['linkLoop']['index'] += $this->_sections['linkLoop']['step'], $this->_sections['linkLoop']['iteration']++):
$this->_sections['linkLoop']['rownum'] = $this->_sections['linkLoop']['iteration'];
$this->_sections['linkLoop']['index_prev'] = $this->_sections['linkLoop']['index'] - $this->_sections['linkLoop']['step'];
$this->_sections['linkLoop']['index_next'] = $this->_sections['linkLoop']['index'] + $this->_sections['linkLoop']['step'];
$this->_sections['linkLoop']['first']      = ($this->_sections['linkLoop']['iteration'] == 1);
$this->_sections['linkLoop']['last']       = ($this->_sections['linkLoop']['iteration'] == $this->_sections['linkLoop']['total']);
?>
        		<li>
        			<?php if ($this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['type'] == 'link'): ?>
            			<?php if ($this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['icon']): ?><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/<?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['icon']; ?>
' align='absmiddle' alt=''><?php endif; ?>
                        <a href='<?php echo ((is_array($_tmp=$this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['url'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
' <?php if ($this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['iconClass']): ?>class='inlineIcon <?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['iconClass']; ?>
'<?php endif; ?> <?php if ($this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['accesskey']): ?>accesskey='<?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['accesskey']; ?>
'<?php endif; ?> <?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['extraAttr']; ?>
><?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['title']; ?>
</a>
        			<?php elseif ($this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['type'] == 'form'): ?>
            			<?php if ($this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['icon']): ?><img src='<?php echo $this->_tpl_vars['assetPath']; ?>
/images/<?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['icon']; ?>
' align='absmiddle' alt=''><?php endif; ?>
            			<label <?php if ($this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['iconClass']): ?>class='inlineIcon <?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['iconClass']; ?>
'<?php endif; ?>><?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['title']; ?>
</label>
               			<?php echo $this->_tpl_vars['aLinks'][$this->_sections['linkLoop']['index']]['form']; ?>

        			<?php endif; ?>
        		</li>
    		<?php endfor; endif; ?>
            </ul>
        </div>
    </div>

    <div class='mask'></div>
</div>