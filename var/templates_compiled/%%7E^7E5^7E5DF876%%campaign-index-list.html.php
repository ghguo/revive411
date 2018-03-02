<?php /* Smarty version 2.6.18, created on 2017-12-21 20:18:01
         compiled from campaign-index-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 't', 'campaign-index-list.html', 20, false),array('function', 'rv_add_session_token', 'campaign-index-list.html', 44, false),array('function', 'ox_column_class', 'campaign-index-list.html', 92, false),array('function', 'ox_column_title', 'campaign-index-list.html', 93, false),array('function', 'cycle', 'campaign-index-list.html', 149, false),array('function', 'ox_campaign_icon', 'campaign-index-list.html', 160, false),array('function', 'ox_entity_id', 'campaign-index-list.html', 172, false),array('function', 'ox_campaign_status', 'campaign-index-list.html', 175, false),array('function', 'ox_campaign_type', 'campaign-index-list.html', 178, false),array('function', 'ox_column_updated', 'campaign-index-list.html', 181, false),array('modifier', 'count', 'campaign-index-list.html', 113, false),array('modifier', 'escape', 'campaign-index-list.html', 160, false),)), $this); ?>


<div class='tableWrapper'>
    <div class='tableHeader'>
        <ul class='tableActions'>
            <?php if ($this->_tpl_vars['isManager']): ?>
            <li>
                <?php if ($this->_tpl_vars['clientId'] != -1): ?>
                <a href='campaign-edit.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
' class='inlineIcon iconCampaignAdd'><?php echo OA_Admin_Template::_function_t(array('str' => 'AddCampaign'), $this);?>
</a>
                <?php else: ?>
                <span class='inlineIcon iconCampaignAddDisabled'><?php echo OA_Admin_Template::_function_t(array('str' => 'AddCampaign'), $this);?>
</span>
                <?php endif; ?>
            </li>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['isAdvertiser'] == false): ?>
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
<?php echo OA_Admin_Template::_function_t(array('str' => 'ConfirmDeleteCampaigns'), $this);?>
<?php echo '")) {
    						window.location = \'campaign-delete.php?clientid='; ?>
<?php echo $this->_tpl_vars['clientId']; ?>
&<?php echo OA_Admin_Template::_add_session_token(array(), $this);?>
<?php echo '&campaignid=\' + ids.join(\',\');
						}
					}
                });

                //-->
                </script>
                '; ?>

            </li>
            <?php endif; ?>
        </ul>

        <ul class='tableFilters alignRight'>
            <li>
                <div class='label'>
                    Show
                </div>

                <div class='dropDown'>
                    <span><span><?php if ($this->_tpl_vars['hideinactive']): ?>Active campaigns<?php else: ?>All campaigns<?php endif; ?></span></span>

                    <div class='panel'>
                        <div>
                            <ul>
                                <li><a href='advertiser-campaigns.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&hideinactive=0'>All campaigns</a></li>
                                <li><a href='advertiser-campaigns.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&hideinactive=1'>Active campaigns</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class='mask'></div>
                </div>
            </li>
        </ul>

        <div class='clear'></div>
        <div class='corner left'></div>
        <div class='corner right'></div>
    </div>

    <table cellspacing='0' summary=''>
        <thead>
            <tr>
                <?php if ($this->_tpl_vars['isAdvertiser'] == false): ?>
                <th class='first toggleAll'>
                    <input type='checkbox' />
                </th>
                <?php endif; ?>
                <th class='<?php echo OA_Admin_Template::_function_ox_column_class(array('item' => 'name','order' => 'up','default' => 1), $this);?>
'>
                    <?php echo OA_Admin_Template::_function_ox_column_title(array('item' => 'name','order' => 'up','default' => 1,'str' => 'Name','url' => "advertiser-campaigns.php"), $this);?>

                </th>
                <th class='<?php echo OA_Admin_Template::_function_ox_column_class(array('item' => 'status','order' => 'up','default' => 0), $this);?>
'>
                    <?php echo OA_Admin_Template::_function_ox_column_title(array('item' => 'status','order' => 'up','default' => 0,'str' => 'Status','url' => "advertiser-campaigns.php"), $this);?>

                </th>
                <th class='<?php echo OA_Admin_Template::_function_ox_column_class(array('item' => 'type','order' => 'up','default' => 0), $this);?>
'>
                    <?php echo OA_Admin_Template::_function_ox_column_title(array('item' => 'type','order' => 'up','default' => 0,'str' => 'Type','url' => "advertiser-campaigns.php"), $this);?>

                </th>
                <th class='<?php echo OA_Admin_Template::_function_ox_column_class(array('item' => 'updated','order' => 'up','default' => 0), $this);?>
'>
                    <?php echo OA_Admin_Template::_function_ox_column_title(array('item' => 'updated','order' => 'up','default' => 0,'str' => 'Updated','url' => "advertiser-campaigns.php"), $this);?>

                </th>
                <th>&nbsp;

                </th>
                <th class='last alignRight'>&nbsp;

                </th>
            </tr>
        </thead>

<?php if (! count($this->_tpl_vars['from'])): ?>
        <tbody>
            <tr class='odd'>
                <td colspan='6'>&nbsp;</td>
            </tr>
            <tr class='even'>
                <td colspan='6' class="hasPanel">
                    <div class='tableMessage'>
                        <div class='panel'>
                            <?php if ($this->_tpl_vars['clientId'] != -1): ?>
                            	<?php if ($this->_tpl_vars['hideinactive']): ?>
                               		<?php echo $this->_tpl_vars['aCount']['campaigns_hidden']; ?>
 <?php echo OA_Admin_Template::_function_t(array('str' => 'InactiveCampaignsHidden'), $this);?>

                                <?php else: ?>
	                                <?php echo OA_Admin_Template::_function_t(array('str' => 'NoCampaigns'), $this);?>

                                <?php endif; ?>
                            <?php else: ?>
                                <?php echo OA_Admin_Template::_function_t(array('str' => 'NoCampaignsAddAdvertiser'), $this);?>

                            <?php endif; ?>

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
                <td colspan='6'>&nbsp;</td>
            </tr>
        </tbody>

<?php else: ?>
        <tbody>
    <?php echo smarty_function_cycle(array('name' => 'bgcolor','values' => "even,odd",'assign' => 'bgColor','reset' => 1), $this);?>

    <?php $_from = $this->_tpl_vars['from']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['campaignId'] => $this->_tpl_vars['campaign']):
?>
        <?php echo smarty_function_cycle(array('name' => 'bgcolor','assign' => 'bgColor'), $this);?>

            <tr class='<?php echo $this->_tpl_vars['bgColor']; ?>
'>
                <?php if ($this->_tpl_vars['isAdvertiser'] == false): ?>
                <td class='toggleSelection'>
                    <input type='checkbox' value='<?php echo $this->_tpl_vars['campaignId']; ?>
' />
                </td>
                <?php endif; ?>
                <td>
                    <?php if ($this->_tpl_vars['isAdvertiser']): ?>
                        <a href='campaign-banners.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&campaignid=<?php echo $this->_tpl_vars['campaignId']; ?>
' class='inlineIcon <?php echo OA_Admin_Template::_function_ox_campaign_icon(array('status' => $this->_tpl_vars['campaign']['status']), $this);?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['campaign']['campaignname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a>
                    <?php else: ?>
                        <?php if ($this->_tpl_vars['isAdvertiser'] && $this->_tpl_vars['canEdit'] == false): ?>
                            <span class='inlineIcon <?php echo OA_Admin_Template::_function_ox_campaign_icon(array('status' => $this->_tpl_vars['campaign']['status']), $this);?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['campaign']['campaignname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</span>
                        <?php else: ?>
                            <?php if ($this->_tpl_vars['campaign']['system']): ?>
                                <a href='campaign-edit.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&campaignid=<?php echo $this->_tpl_vars['campaignId']; ?>
' class='inlineIcon iconCampaignSystem'><?php echo ((is_array($_tmp=$this->_tpl_vars['campaign']['campaignname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a>
                            <?php else: ?>
                                <a href='campaign-edit.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&campaignid=<?php echo $this->_tpl_vars['campaignId']; ?>
' class='inlineIcon <?php echo OA_Admin_Template::_function_ox_campaign_icon(array('status' => $this->_tpl_vars['campaign']['status']), $this);?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['campaign']['campaignname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php echo OA_Admin_Template::_function_ox_entity_id(array('type' => 'Campaign','id' => $this->_tpl_vars['campaignId']), $this);?>

                </td>
                <td>
                    <?php echo OA_Admin_Template::_function_ox_campaign_status(array('clientid' => $this->_tpl_vars['clientId'],'campaignid' => $this->_tpl_vars['campaignId'],'status' => $this->_tpl_vars['campaign']['status']), $this);?>

                </td>
                <td>
                    <?php echo OA_Admin_Template::_function_ox_campaign_type(array('type' => $this->_tpl_vars['campaign']['type']), $this);?>

                </td>
                <td>
                    <?php echo OA_Admin_Template::_function_ox_column_updated(array('updated' => $this->_tpl_vars['campaign']['updated']), $this);?>

                </td>
                <td class='alignRight verticalActions'>
                  <?php if ($this->_tpl_vars['campaign']['system'] != true): ?>
                    <ul class='rowActions'>
                    <?php if ($this->_tpl_vars['isAdvertiser'] == false): ?>
                        <li>
                            <a href='banner-edit.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&campaignid=<?php echo $this->_tpl_vars['campaignId']; ?>
' class='inlineIcon iconBannerAdd'><?php echo OA_Admin_Template::_function_t(array('str' => 'AddBanner'), $this);?>
</a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href='campaign-banners.php?clientid=<?php echo $this->_tpl_vars['clientId']; ?>
&campaignid=<?php echo $this->_tpl_vars['campaignId']; ?>
' class='inlineIcon iconBanners'><?php echo OA_Admin_Template::_function_t(array('str' => 'Banners'), $this);?>
</a>
                        </li>
                    </ul>
                  <?php endif; ?>
                </td>
                <td class='hasPanel'>
                    <div class='panel'>
                        <table cellspacing='0' summary=''>
                            <tr>
                                <th><?php echo OA_Admin_Template::_function_t(array('str' => 'ImpressionsBooked'), $this);?>
</th>
                                <td><?php if ($this->_tpl_vars['campaign']['impressions'] >= 0): ?><?php echo $this->_tpl_vars['campaign']['impressions']; ?>
<?php else: ?><?php echo OA_Admin_Template::_function_t(array('str' => 'Unlimited'), $this);?>
<?php endif; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo OA_Admin_Template::_function_t(array('str' => 'ClicksBooked'), $this);?>
</th>
                                <td><?php if ($this->_tpl_vars['campaign']['clicks'] >= 0): ?><?php echo $this->_tpl_vars['campaign']['clicks']; ?>
<?php else: ?><?php echo OA_Admin_Template::_function_t(array('str' => 'Unlimited'), $this);?>
<?php endif; ?></td>
                            </tr>
                            <?php if ($this->_tpl_vars['showconversions']): ?>
                            <tr>
                                <th><?php echo OA_Admin_Template::_function_t(array('str' => 'ConversionsBooked'), $this);?>
</th>
                                <td><?php if ($this->_tpl_vars['campaign']['conversions'] >= 0): ?><?php echo $this->_tpl_vars['campaign']['conversions']; ?>
<?php else: ?><?php echo OA_Admin_Template::_function_t(array('str' => 'Unlimited'), $this);?>
<?php endif; ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th><?php echo OA_Admin_Template::_function_t(array('str' => 'ActivationDate'), $this);?>
</th>
                                <td><?php echo $this->_tpl_vars['campaign']['activate']; ?>
</td>
                            </tr>
                            <tr>
                                <th><?php echo OA_Admin_Template::_function_t(array('str' => 'ExpirationDate'), $this);?>
</th>
                                <td><?php echo $this->_tpl_vars['campaign']['expire']; ?>
</td>
                            </tr>
                            <tr>
                                <th><?php echo OA_Admin_Template::_function_t(array('str' => 'Priority'), $this);?>
</th>
                                <td><?php echo $this->_tpl_vars['campaign']['priority']; ?>
</td>
                            </tr>
                        </table>

                        <div class='corner top-left'></div>
                        <div class='corner top-right'></div>
                        <div class='corner bottom-left'></div>
                        <div class='corner bottom-right'></div>
                    </div>
                </td>
            </tr>
    <?php endforeach; endif; unset($_from); ?>
       </tbody>
<?php endif; ?>
    </table>
</div>