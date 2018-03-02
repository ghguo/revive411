<?php /* Smarty version 2.6.18, created on 2017-12-21 20:18:07
         compiled from website-index-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 't', 'website-index-list.html', 17, false),array('function', 'rv_add_session_token', 'website-index-list.html', 36, false),array('function', 'ox_column_class', 'website-index-list.html', 70, false),array('function', 'ox_column_title', 'website-index-list.html', 71, false),array('function', 'cycle', 'website-index-list.html', 117, false),array('function', 'ox_entity_id', 'website-index-list.html', 126, false),array('function', 'ox_column_updated', 'website-index-list.html', 129, false),array('modifier', 'count', 'website-index-list.html', 89, false),array('modifier', 'escape', 'website-index-list.html', 125, false),array('modifier', 'default', 'website-index-list.html', 133, false),)), $this); ?>

<div class='tableWrapper'>
    <div class='tableHeader'>
        <ul class='tableActions'>
            <li>
                <a href='affiliate-edit.php' class='inlineIcon iconWebsiteAdd'><?php echo OA_Admin_Template::_function_t(array('str' => 'AddNewAffiliate'), $this);?>
</a>
            </li>
            <li class='inactive activeIfSelected'>
                <a id='deleteSelection' href='#' class='inlineIcon iconDelete'><?php echo OA_Admin_Template::_function_t(array('str' => 'Delete'), $this);?>
</a>

                <?php echo '
                <script type=\'text/javascript\'>
                <!--

                $(\'#deleteSelection\').click(function(event) {
					event.preventDefault();

					if (!$(this).parents(\'li\').hasClass(\'inactive\')) {
						var ids = [];
						$(this).parents(\'.tableWrapper\').find(\'.toggleSelection input:checked\').each(function() {
							ids.push(this.value);
						});

						if (!tablePreferences.warningBeforeDelete || confirm("'; ?>
<?php echo OA_Admin_Template::_function_t(array('str' => 'ConfirmDeleteAffiliates'), $this);?>
<?php echo '")) {
							window.location = \'affiliate-delete.php?'; ?>
<?php echo OA_Admin_Template::_add_session_token(array(), $this);?>
<?php echo '&affiliateid=\' + ids.join(\',\');
						}
					}
                });

                //-->
                </script>
                '; ?>

            </li>
        </ul>

        <?php if (! empty ( $this->_tpl_vars['topPager']->links )): ?>
        <ul class='tableFilters alignRight'>
            <li>
              <div class="pager">
                <span class="controls"><?php echo $this->_tpl_vars['topPager']->links; ?>
</span>
              </div>
            </li>
        </ul>
        <?php endif; ?>


        <div class='clear'></div>
        <div class='corner left'></div>
        <div class='corner right'></div>
    </div>


    <table cellspacing='0' summary=''>
        <thead>
            <tr>
              <th class='first toggleAll'>
                    <input type='checkbox' />
                </th>
                <th class='<?php echo OA_Admin_Template::_function_ox_column_class(array('item' => 'name','order' => 'up','default' => 1), $this);?>
'>
                    <?php echo OA_Admin_Template::_function_ox_column_title(array('item' => 'name','order' => 'up','default' => 1,'str' => 'Name','url' => "website-index.php"), $this);?>

                </th>
                <th class='<?php echo OA_Admin_Template::_function_ox_column_class(array('item' => 'updated','order' => 'up','default' => 0), $this);?>
'>
                    <?php echo OA_Admin_Template::_function_ox_column_title(array('item' => 'updated','order' => 'up','default' => 0,'str' => 'Updated','url' => "website-index.php"), $this);?>

                </th>
                <?php if ($this->_tpl_vars['showAdDirect']): ?>
                <th>
                    <?php echo OA_Admin_Template::_function_t(array('str' => 'AdvertiserSignup'), $this);?>

                </th>
                <?php endif; ?>
                <th class='last alignRight'>&nbsp;

                </th>
            </tr>
        </thead>



<?php if (! count($this->_tpl_vars['affiliates'])): ?>
        <tbody>
            <tr class='odd'>
                <td colspan='<?php if ($this->_tpl_vars['showAdDirect']): ?>4<?php else: ?>3<?php endif; ?>'>&nbsp;</td>
            </tr>
            <tr class='even'>
                <td colspan='<?php if ($this->_tpl_vars['showAdDirect']): ?>4<?php else: ?>3<?php endif; ?>' class="hasPanel">
                    <div class='tableMessage'>
                        <div class='panel'>
                            <?php echo OA_Admin_Template::_function_t(array('str' => 'NoAffiliates'), $this);?>


                            <div class='corner top-left'></div>
                            <div class='corner top-right'></div>
                            <div class='corner bottom-left'></div>
                            <div class='corner bottom-right'></div>
                        </div>
                    </div>

                    &nbsp;
                </td>
            </tr>
            <tr class='odd'>
                <td colspan='<?php if ($this->_tpl_vars['showAdDirect']): ?>4<?php else: ?>3<?php endif; ?>'>&nbsp;</td>
            </tr>
        </tbody>

<?php else: ?>
        <tbody>
    <?php echo smarty_function_cycle(array('name' => 'bgcolor','values' => "even,odd",'assign' => 'bgColor','reset' => 1), $this);?>

    <?php $_from = $this->_tpl_vars['from']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['affiliate']):
?>
        <?php echo smarty_function_cycle(array('name' => 'bgcolor','assign' => 'bgColor'), $this);?>

            <tr class='<?php echo $this->_tpl_vars['bgColor']; ?>
'>
              <td class='toggleSelection'>
                  <input type='checkbox' value='<?php echo $this->_tpl_vars['key']; ?>
' />
                </td>
                <td>
                    <a href='affiliate-edit.php?affiliateid=<?php echo $this->_tpl_vars['key']; ?>
' class='inlineIcon iconWebsite'><?php echo ((is_array($_tmp=$this->_tpl_vars['affiliate']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a>
                    <?php echo OA_Admin_Template::_function_ox_entity_id(array('type' => 'Website','id' => $this->_tpl_vars['key']), $this);?>

                </td>
                <td>
                    <?php echo OA_Admin_Template::_function_ox_column_updated(array('updated' => $this->_tpl_vars['affiliate']['updated']), $this);?>

                </td>
                <?php if ($this->_tpl_vars['showAdDirect']): ?>
                <td>
                    <?php echo ((is_array($_tmp=@$this->_tpl_vars['affiliate']['adv_signup'])) ? $this->_run_mod_handler('default', true, $_tmp, '&nbsp;') : smarty_modifier_default($_tmp, '&nbsp;')); ?>

                </td>
                <?php endif; ?>
                <td class='alignRight'>
                    <ul class='rowActions'>
                        <li>
                            <a href='zone-edit.php?affiliateid=<?php echo $this->_tpl_vars['key']; ?>
' class='inlineIcon iconZoneAdd'><?php echo OA_Admin_Template::_function_t(array('str' => 'AddNewZone'), $this);?>
</a>
                        </li>
                        <li>
                          <a href='affiliate-zones.php?affiliateid=<?php echo $this->_tpl_vars['key']; ?>
' class='inlineIcon iconZones'><?php echo OA_Admin_Template::_function_t(array('str' => 'Zones'), $this);?>
</a>
                        </li>
                        <li>
                            <a href='affiliate-channels.php?affiliateid=<?php echo $this->_tpl_vars['key']; ?>
' class='inlineIcon iconTargetingChannels'><?php echo OA_Admin_Template::_function_t(array('str' => 'Channels'), $this);?>
</a>
                        </li>
                    </ul>
                </td>
            </tr>
    <?php endforeach; endif; unset($_from); ?>
       </tbody>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['pager']->links )): ?>
    <tbody class="tableFooter">
        <tr>
        <td  colspan="3">
              <div class="pager">
                <span class="summary"><?php echo $this->_tpl_vars['pager']->summary; ?>
</span>
                <span class="controls"><?php echo $this->_tpl_vars['pager']->links; ?>
</span>
              </div>
        </td>
        </tr>
    </tbody>
<?php endif; ?>

    </table>
</div>