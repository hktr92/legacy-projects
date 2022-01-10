<?php
/**
* WoltLab Community Framework
* Template: footer
* Compiled at: Fri, 30 Aug 2013 22:18:58 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'footer';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginModifierFulldate'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierFulldate.class.php');
$this->pluginObjects['TemplatePluginModifierFulldate'] = new TemplatePluginModifierFulldate;
}
?><?php if (isset($this->v['additionalFooterContents'])) { ?><?php echo $this->v['additionalFooterContents']; ?><?php } ?>
</div>
<div id="footerContainer">
	<div id="footer">
		<?php
$outerTemplateNameaf2a641807201968112ae7a9ab15ac2fdc2894b5 = $this->v['tpl']['template'];
$this->includeTemplate('footerMenu', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNameaf2a641807201968112ae7a9ab15ac2fdc2894b5;
$this->v['tpl']['includedTemplates']['footerMenu'] = 1;
?>
		<div id="footerOptions" class="footerOptions">
			<div class="footerOptionsInner">
				<ul>
					<?php if (isset($this->v['additionalFooterOptions'])) { ?><?php echo $this->v['additionalFooterOptions']; ?><?php } ?>
					
					<?php if (SHOW_CLOCK) { ?>
						<li id="date" class="date last" title="<?php echo $this->pluginObjects['TemplatePluginModifierFulldate']->execute(array(TIME_NOW), $this); ?> UTC<?php if ($this->v['timezone'] > 0) { ?>+<?php echo $this->v['timezone']; ?><?php } elseif ($this->v['timezone'] < 0) { ?><?php echo $this->v['timezone']; ?><?php } ?>"><em><img src="<?php ob_start(); ?>dateS.png<?php $_icon220983166072b1361a70b9e3c08b3d6642f07fad = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon220983166072b1361a70b9e3c08b3d6642f07fad); ?>" alt="" /> <span><?php echo $this->pluginObjects['TemplatePluginModifierFulldate']->execute(array(TIME_NOW), $this); ?></span></em></li>
					<?php } ?>
					<li id="toTopLink" class="last extraButton"><a href="#top" title="Go to the top of the page"><img src="<?php ob_start(); ?>upS.png<?php $_icon67007ca0447567121b0c22ae11ad1c2142e78cea = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon67007ca0447567121b0c22ae11ad1c2142e78cea); ?>" alt="Go to the top of the page" /> <span class="hidden">Go to the top of the page</span></a></li>
				</ul>
			</div>
		</div>
		<p class="copyright"><a href="http://www.woltlab.com">Forum Software: <strong>Burning Board&reg; Lite<?php if (SHOW_VERSION_NUMBER) { ?> <?php echo PACKAGE_VERSION; ?><?php } ?></strong>, developed by <strong>WoltLab&reg; GmbH</strong></a></p>
	</div>
</div>
<?php if ( ! $this->v['this']->user->userID &&  ! LOGIN_USE_CAPTCHA) { ?>
	<div class="border loginPopup hidden" id="quickLoginBox">
		<form method="post" action="index.php?form=UserLogin" class="container-1">
			<div>
				<input tabindex="1" type="text" class="inputText" id="quickLoginUsername" name="loginUsername" value="Username" title="Username" />
				<input tabindex="2" type="password" class="inputText" id="quickLoginPassword" name="loginPassword" value="" title="Password" />
				<?php if ($this->v['this']->session->requestMethod == "GET") { ?><input type="hidden" name="url" value="<?php echo StringUtil::encodeHTML($this->v['this']->session->requestURI); ?>" /><?php } ?>
				<?php echo SID_INPUT_TAG; ?>
				<input tabindex="4" type="image" class="inputImage" src="<?php ob_start(); ?>submitS.png<?php $_icon8c64cf7344797218562d5d52e51214a8e57da207 = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon8c64cf7344797218562d5d52e51214a8e57da207); ?>" alt="Submit" />
			</div>
			<p><label><input tabindex="3" type="checkbox" id="useCookies" name="useCookies" value="1" /> Remember me?</label></p>
		</form>
	</div>
<?php } ?>