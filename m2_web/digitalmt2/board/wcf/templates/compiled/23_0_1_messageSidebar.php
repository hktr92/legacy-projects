<?php
/**
* WoltLab Community Framework
* Template: messageSidebar
* Compiled at: Sat, 31 Aug 2013 11:58:13 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'messageSidebar';
?>
<?php if ($this->v['this']->getStyle()->getVariable('messages.sidebar.alignment') == 'top' && $this->v['sidebar']->getUser()->getAvatar()) { ?><?php $this->assign('dummy', $this->v['sidebar']->getUser()->getAvatar()->setMaxSize(76,76)); ?><?php } ?>
<div class="messageSidebar"<?php if ($this->v['this']->getStyle()->getVariable('messages.sidebar.alignment') == 'top') { ?> style="min-height: <?php if ($this->v['sidebar']->getUser()->getAvatar()) { ?><?php echo $this->v['sidebar']->getUser()->getAvatar()->getHeight()+14; ?>px<?php } else { ?>90px<?php } ?>"<?php } ?>>
	<p class="skipSidebar hidden"><a href="#skipPoint<?php echo $this->v['sidebar']->getMessageID(); ?>" title="Skip user information">Skip user information</a></p><!-- support for disabled surfers -->
	<?php if ($this->v['sidebar']->getUser()->userID) { ?>
		<div class="messageAuthor">
			<p class="userName">
				<?php if (MESSAGE_SIDEBAR_ENABLE_ONLINE_STATUS) { ?>
					<?php if ($this->v['sidebar']->getUser()->isOnline()) { ?>
						<img src="<?php ob_start(); ?>onlineS.png<?php $_icon6140a3f3b60a2834ceda3f6e4e86ff32854e9c7b = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon6140a3f3b60a2834ceda3f6e4e86ff32854e9c7b); ?>" alt="" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['sidebar']->getUser()->username))); ob_start(); ?>wcf.user.online<?php $_langfbcabbf55e9f47b9c6c4c89c41893f16f567f279 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_langfbcabbf55e9f47b9c6c4c89c41893f16f567f279, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>" />
					<?php } else { ?>
						<img src="<?php ob_start(); ?>offlineS.png<?php $_icon549f8126bae91385825c681c02c44860a5308037 = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon549f8126bae91385825c681c02c44860a5308037); ?>" alt="" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['sidebar']->getUser()->username))); ob_start(); ?>wcf.user.offline<?php $_lang2efc556a6c0bdfba74280c54a2d3d6d3f6a1d511 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang2efc556a6c0bdfba74280c54a2d3d6d3f6a1d511, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>" />		
					<?php } ?>
				<?php } ?>
			
				<a href="index.php?page=User&amp;userID=<?php echo $this->v['sidebar']->getUser()->userID; ?><?php echo SID_ARG_2ND; ?>" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['sidebar']->getUser()->username))); ob_start(); ?>wcf.user.viewProfile<?php $_lang5e5624afd9d2107804a9b916a679e553e9673c8b = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang5e5624afd9d2107804a9b916a679e553e9673c8b, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>">
					<span><?php echo $this->v['sidebar']->getStyledUsername(); ?></span>
				</a>
				
				<?php if (isset($this->v['additionalSidebarUsernameInformation'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarUsernameInformation'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
			</p>

			<?php if (MODULE_USER_RANK && MESSAGE_SIDEBAR_ENABLE_RANK) { ?>
				<?php if ($this->v['sidebar']->getUser()->getUserTitle()) { ?>
					<p class="userTitle smallFont"><?php echo $this->v['sidebar']->getUser()->getUserTitle(); ?></p>
				<?php } ?>
				<?php if ($this->v['sidebar']->getUser()->getRank() && $this->v['sidebar']->getUser()->getRank()->rankImage) { ?>
					<p class="userRank"><?php echo $this->v['sidebar']->getUser()->getRank()->getImage(); ?></p>
				<?php } ?>
			<?php } ?>
			
			<?php if (isset($this->v['additionalSidebarAuthorInformation'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarAuthorInformation'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
		</div>
		
		<?php if (MESSAGE_SIDEBAR_ENABLE_AVATAR) { ?>
			<?php if ($this->v['sidebar']->getUser()->getAvatar()) { ?>
				<div class="userAvatar<?php if ($this->v['this']->getStyle()->getVariable('messages.sidebar.avatar.framed')) { ?>Framed<?php } ?>">
					<a href="index.php?page=User&amp;userID=<?php echo $this->v['sidebar']->getUser()->userID; ?><?php echo SID_ARG_2ND; ?>" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['sidebar']->getUser()->username))); ob_start(); ?>wcf.user.viewProfile<?php $_lang37319860ca9320d8bbbd0a8100ff04a92f0ede50 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang37319860ca9320d8bbbd0a8100ff04a92f0ede50, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>"><img src="<?php echo StringUtil::encodeHTML($this->v['sidebar']->getUser()->getAvatar()->getURL()); ?>" alt=""
						style="width: <?php echo $this->v['sidebar']->getUser()->getAvatar()->getWidth(); ?>px; height: <?php echo $this->v['sidebar']->getUser()->getAvatar()->getHeight(); ?>px;<?php if ($this->v['this']->getStyle()->getVariable('messages.sidebar.avatar.framed')) { ?> margin-top: -<?php echo intval($this->v['sidebar']->getUser()->getAvatar()->getHeight()/2); ?>px; margin-left: -<?php echo intval($this->v['sidebar']->getUser()->getAvatar()->getWidth()/2); ?>px<?php } ?>" /></a>
				</div>
			<?php } elseif ($this->v['this']->getStyle()->getVariable('messages.sidebar.alignment') == 'top') { ?>
				<div class="userAvatar<?php if ($this->v['this']->getStyle()->getVariable('messages.sidebar.avatar.framed')) { ?>Framed<?php } ?>">
					<a href="index.php?page=User&amp;userID=<?php echo $this->v['sidebar']->getUser()->userID; ?><?php echo SID_ARG_2ND; ?>" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['sidebar']->getUser()->username))); ob_start(); ?>wcf.user.viewProfile<?php $_lang3ca6d165a0f34b6afb6360c18e93056660edefed = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang3ca6d165a0f34b6afb6360c18e93056660edefed, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>images/avatars/avatar-default.png" alt=""
						style="width: 76px; height: 76px;<?php if ($this->v['this']->getStyle()->getVariable('messages.sidebar.avatar.framed')) { ?> margin-top: -38px; margin-left: -38px<?php } ?>" /></a>
				</div>
			<?php } ?>
		<?php } ?>
		
		<?php if (count($this->v['sidebar']->getUserSymbols()) > 0 || isset($this->v['additionalSidebarUserSymbols'][$this->v['sidebar']->getMessageID()])) { ?>
			<div class="userSymbols">
				<ul>
					<?php
if (count($this->v['sidebar']->getUserSymbols()) > 0) {
foreach ($this->v['sidebar']->getUserSymbols() as $this->v['userSymbol']) {
?>
						<li><?php echo $this->v['userSymbol']['value']; ?></li>
					<?php } } ?>
					
					<?php if (isset($this->v['additionalSidebarUserSymbols'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarUserSymbols'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
				</ul>
			</div>
		<?php } ?>
		
		<?php if (count($this->v['sidebar']->getUserCredits()) > 0 || isset($this->v['additionalSidebarUserCredits'][$this->v['sidebar']->getMessageID()])) { ?>
			<div class="userCredits">
				<?php
if (count($this->v['sidebar']->getUserCredits()) > 0) {
foreach ($this->v['sidebar']->getUserCredits() as $this->v['userCredit']) {
?>
					<p><?php if ($this->v['userCredit']['url']) { ?><a href="<?php echo $this->v['userCredit']['url']; ?>"><?php echo $this->v['userCredit']['name']; ?>: <?php echo $this->v['userCredit']['value']; ?></a><?php } else { ?><?php echo $this->v['userCredit']['name']; ?>: <?php echo $this->v['userCredit']['value']; ?><?php } ?></p>
				<?php } } ?>
				
				<?php if (isset($this->v['additionalSidebarUserCredits'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarUserCredits'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
			</div>
		<?php } ?>
		
		<?php if (count($this->v['sidebar']->getUserContacts()) > 0 || isset($this->v['additionalSidebarUserContacts'][$this->v['sidebar']->getMessageID()])) { ?>
			<div class="userMessenger">
				<ul>
					<?php
if (count($this->v['sidebar']->getUserContacts()) > 0) {
foreach ($this->v['sidebar']->getUserContacts() as $this->v['userContact']) {
?>
						<li><?php echo $this->v['userContact']['value']; ?></li>
					<?php } } ?>
					
					<?php if (isset($this->v['additionalSidebarUserContacts'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarUserContacts'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
				</ul>
			</div>
		<?php } ?>
	<?php } else { ?>
		<div class="messageAuthor">
			<p class="userName"><?php echo $this->v['sidebar']->getStyledUsername(); ?></p>
			<p class="userTitle smallFont">Unregistered</p>
		</div>
		
		<?php if (count($this->v['sidebar']->getUserSymbols()) > 0 || isset($this->v['additionalSidebarUserSymbols'][$this->v['sidebar']->getMessageID()])) { ?>
			<div class="userSymbols">
				<ul>
					<?php
if (count($this->v['sidebar']->getUserSymbols()) > 0) {
foreach ($this->v['sidebar']->getUserSymbols() as $this->v['userSymbol']) {
?>
						<li><?php echo $this->v['userSymbol']['value']; ?></li>
					<?php } } ?>
					
					<?php if (isset($this->v['additionalSidebarUserSymbols'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarUserSymbols'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
				</ul>
			</div>
		<?php } ?>
		
		<?php if (count($this->v['sidebar']->getUserContacts()) > 0 || isset($this->v['additionalSidebarUserContacts'][$this->v['sidebar']->getMessageID()])) { ?>
			<div class="userMessenger">
				<ul>
					<?php
if (count($this->v['sidebar']->getUserContacts()) > 0) {
foreach ($this->v['sidebar']->getUserContacts() as $this->v['userContact']) {
?>
						<li><?php echo $this->v['userContact']['value']; ?></li>
					<?php } } ?>
					
					<?php if (isset($this->v['additionalSidebarUserContacts'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarUserContacts'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
				</ul>
			</div>
		<?php } ?>
	<?php } ?>
	
	<?php if (isset($this->v['additionalSidebarContents'][$this->v['sidebar']->getMessageID()])) { ?><?php echo $this->v['additionalSidebarContents'][$this->v['sidebar']->getMessageID()]; ?><?php } ?>
	
	<a id="skipPoint<?php echo $this->v['sidebar']->getMessageID(); ?>"></a><!-- support for disabled surfers -->
</div>