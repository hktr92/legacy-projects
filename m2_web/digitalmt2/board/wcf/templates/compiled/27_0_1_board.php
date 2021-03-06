<?php
/**
* WoltLab Community Framework
* Template: board
* Compiled at: Sat, 31 Aug 2013 01:25:48 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'board';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginModifierConcat'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierConcat.class.php');
$this->pluginObjects['TemplatePluginModifierConcat'] = new TemplatePluginModifierConcat;
}
if (!isset($this->pluginObjects['TemplatePluginFunctionPages'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginFunctionPages.class.php');
$this->pluginObjects['TemplatePluginFunctionPages'] = new TemplatePluginFunctionPages;
}
if (!isset($this->pluginObjects['TemplatePluginFunctionCycle'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginFunctionCycle.class.php');
$this->pluginObjects['TemplatePluginFunctionCycle'] = new TemplatePluginFunctionCycle;
}
?><?php
$outerTemplateNamef2bb67de8348a6d56c2cd5c6ab2ee2ca80a7d32a = $this->v['tpl']['template'];
$this->includeTemplate("documentHeader", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamef2bb67de8348a6d56c2cd5c6ab2ee2ca80a7d32a;
$this->v['tpl']['includedTemplates']["documentHeader"] = 1;
?>
<head>
	<title><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML($this->v['board']->title); ?><?php $_langc25ae75669c5ef1b42cdf79d43308cf4aefb6202 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_langc25ae75669c5ef1b42cdf79d43308cf4aefb6202, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?> <?php if ($this->v['pageNo'] > 1) { ?>- Page <?php echo StringUtil::formatNumeric($this->v['pageNo']); ?> <?php } ?>- <?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML(PAGE_TITLE); ?><?php $_lang3cfc72aeab0c31e7e13e523c22bdba2914315cbc = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang3cfc72aeab0c31e7e13e523c22bdba2914315cbc, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></title>
	
	<?php
$outerTemplateNamea51f41beca44da596b907c46844743ac31f8935c = $this->v['tpl']['template'];
$this->includeTemplate('headInclude', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamea51f41beca44da596b907c46844743ac31f8935c;
$this->v['tpl']['includedTemplates']['headInclude'] = 1;
?>
	
	<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/MultiPagesLinks.class.js"></script>
</head>
<body<?php if (isset($this->v['templateName'])) { ?> id="tpl<?php echo StringUtil::encodeHTML(ucfirst($this->v['templateName'])); ?>"<?php } ?>>

<?php $this->assign('searchFieldTitle', 'Search Forum'); ?>
<?php ob_start(); ?>
	<input type="hidden" name="boardIDs[]" value="<?php echo $this->v['boardID']; ?>" />
	<input type="hidden" name="types[]" value="post" />
<?php
$this->v['tpl']['capture']['default'] = ob_get_contents();
ob_end_clean();
$this->assign('searchHiddenFields', $this->v['tpl']['capture']['default']);
?>

<?php
$outerTemplateName652ea5575cc541a4e1f3c86269243481f5edd6a7 = $this->v['tpl']['template'];
$this->includeTemplate('header', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName652ea5575cc541a4e1f3c86269243481f5edd6a7;
$this->v['tpl']['includedTemplates']['header'] = 1;
?>

<div id="main">
	
	<?php
$outerTemplateNamef7f62dc3830136f6f69b9cb00c4d116ce6ec7fac = $this->v['tpl']['template'];
$this->includeTemplate("navigation", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamef7f62dc3830136f6f69b9cb00c4d116ce6ec7fac;
$this->v['tpl']['includedTemplates']["navigation"] = 1;
?>
	
	<div class="mainHeadline">
		<img src="<?php ob_start(); ?><?php echo $this->v['board']->getIconName(); ?>L.png<?php $_icon42e34718e095e2153fbb49f362f41a2a1840ea62 = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon42e34718e095e2153fbb49f362f41a2a1840ea62); ?>" alt="" />
		<div class="headlineContainer">
			<h2><a href="index.php?page=Board&amp;boardID=<?php echo $this->v['boardID']; ?><?php echo SID_ARG_2ND; ?>"><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML($this->v['board']->title); ?><?php $_langd4dc4e6a0ba6b8353dbf50e5030f515aac685a97 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_langd4dc4e6a0ba6b8353dbf50e5030f515aac685a97, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></a></h2>
			<p><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php if ($this->v['board']->allowDescriptionHtml) { ?><?php echo $this->v['board']->description; ?><?php } else { ?><?php echo StringUtil::encodeHTML($this->v['board']->description); ?><?php } ?><?php $_langa5ed7336e0ad0a30ab2666923815b897cf14faea = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_langa5ed7336e0ad0a30ab2666923815b897cf14faea, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></p>
		</div>
	</div>
	
	<?php if (isset($this->v['userMessages'])) { ?><?php echo $this->v['userMessages']; ?><?php } ?>
	
	<?php
$outerTemplateName9d22afc73561674eaecddb05a4325e3fa746cac5 = $this->v['tpl']['template'];
$this->includeTemplate("boardList", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName9d22afc73561674eaecddb05a4325e3fa746cac5;
$this->v['tpl']['includedTemplates']["boardList"] = 1;
?>
	
	<?php if ($this->v['board']->isBoard()) { ?>
		<div class="contentHeader">
			<?php $this->assign('multiplePagesLink', "index.php?page=Board&boardID={$this->v['boardID']}&pageNo=%d"); ?>
			<?php if ($this->v['sortField'] != $this->v['defaultSortField']) { ?><?php $this->assign('multiplePagesLink', $this->pluginObjects['TemplatePluginModifierConcat']->execute(array($this->v['multiplePagesLink'],'&sortField=',$this->v['sortField']), $this)); ?><?php } ?>
			<?php if ($this->v['sortOrder'] != $this->v['defaultSortOrder']) { ?><?php $this->assign('multiplePagesLink', $this->pluginObjects['TemplatePluginModifierConcat']->execute(array($this->v['multiplePagesLink'],'&sortOrder=',$this->v['sortOrder']), $this)); ?><?php } ?>
			<?php echo $this->pluginObjects['TemplatePluginFunctionPages']->execute(array('print' => true, 'assign' => 'pagesOutput', 'link' => $this->pluginObjects['TemplatePluginModifierConcat']->execute(array($this->v['multiplePagesLink'],SID_ARG_2ND_NOT_ENCODED), $this)), $this); ?>
			<?php if ($this->v['board']->canStartThread() || isset($this->v['additionalLargeButtons'])) { ?>
				<div class="largeButtons">
					<ul>
						<?php if ($this->v['board']->canStartThread()) { ?><li><a href="index.php?form=ThreadAdd&amp;boardID=<?php echo $this->v['boardID']; ?><?php echo SID_ARG_2ND; ?>" title="New thread"><img src="<?php ob_start(); ?>threadNewM.png<?php $_icon59d60f64a8fff14e725e5c1c41fd2b2631e0cafa = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon59d60f64a8fff14e725e5c1c41fd2b2631e0cafa); ?>" alt="" /> <span>New thread</span></a></li><?php } ?>
						<?php if (isset($this->v['additionalLargeButtons'])) { ?><?php echo $this->v['additionalLargeButtons']; ?><?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>
	
		<?php if (count($this->v['normalThreads']) == 0) { ?>
			<div class="border content">
				<div class="container-1">
					<p>There are no threads available in this forum<?php if ($this->v['board']->getThreads() > 0) { ?> which fulfill your criteria<?php } ?>.</p>
				</div>
			</div>
		<?php } else { ?>
			<?php if (count($this->v['normalThreads']) > 0) { ?>
				<?php
$outerTemplateName7ac2e6ccd50f6866ee819800cae4e5c20b1086d6 = $this->v['tpl']['template'];
$this->includeTemplate("boardThreads", array('title' => "Threads", 'threads' => $this->v['normalThreads']), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName7ac2e6ccd50f6866ee819800cae4e5c20b1086d6;
$this->v['tpl']['includedTemplates']["boardThreads"] = 1;
?>
			<?php } ?>
		<?php } ?>
	
		<div class="contentFooter">
			<?php echo $this->v['pagesOutput']; ?>
			
			<?php if ($this->v['board']->canStartThread() || isset($this->v['additionalLargeButtons'])) { ?>
				<div class="largeButtons">
					<ul>
						<?php if ($this->v['board']->canStartThread()) { ?><li><a href="index.php?form=ThreadAdd&amp;boardID=<?php echo $this->v['boardID']; ?><?php echo SID_ARG_2ND; ?>" title="New thread"><img src="<?php ob_start(); ?>threadNewM.png<?php $_iconc56d05c7a62ec6b6e116e2460c2865edbcb03058 = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_iconc56d05c7a62ec6b6e116e2460c2865edbcb03058); ?>" alt="" /> <span>New thread</span></a></li><?php } ?>
						<?php if (isset($this->v['additionalLargeButtons'])) { ?><?php echo $this->v['additionalLargeButtons']; ?><?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	
	<?php if ($this->v['board']->isBoard() || isset($this->v['additionalBoxes'])) { ?>
		<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => 'container-1,container-2', 'print' => false, 'advance' => false), $this); ?>
		<div class="border infoBox">
			<?php if ($this->v['board']->isBoard()) { ?>
				<div class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array(), $this); ?> infoBoxSorting">
					<div class="containerIcon"><img src="<?php ob_start(); ?>sortM.png<?php $_iconc0963567dd27606b40126b2454997a6e59f7055f = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_iconc0963567dd27606b40126b2454997a6e59f7055f); ?>" alt="" /> </div>
					<div class="containerContent">
						<h3>Show</h3>
						<form method="get" action="index.php">
							<div class="threadSort">
								<input type="hidden" name="page" value="Board" />
								<input type="hidden" name="boardID" value="<?php echo $this->v['boardID']; ?>" />
								<input type="hidden" name="pageNo" value="<?php echo $this->v['pageNo']; ?>" />
								
								<div class="floatedElement">
									<label for="sortField">Sort by</label>
									<select name="sortField" id="sortField">
										<option value="topic"<?php if ($this->v['sortField'] == 'topic') { ?> selected="selected"<?php } ?>>Topic</option>
										<option value="username"<?php if ($this->v['sortField'] == 'username') { ?> selected="selected"<?php } ?>>Author</option>
										<option value="time"<?php if ($this->v['sortField'] == 'time') { ?> selected="selected"<?php } ?>>First post</option>
										<option value="replies"<?php if ($this->v['sortField'] == 'replies') { ?> selected="selected"<?php } ?>>Replies</option>
										<option value="views"<?php if ($this->v['sortField'] == 'views') { ?> selected="selected"<?php } ?>>Views</option>
										<option value="lastPostTime"<?php if ($this->v['sortField'] == 'lastPostTime') { ?> selected="selected"<?php } ?>>Latest post</option>
									</select>
									<select name="sortOrder">
										<option value="ASC"<?php if ($this->v['sortOrder'] == 'ASC') { ?> selected="selected"<?php } ?>>ascending</option>
										<option value="DESC"<?php if ($this->v['sortOrder'] == 'DESC') { ?> selected="selected"<?php } ?>>descending</option>
									</select>
								</div>
								
								<div class="floatedElement">
									<input type="image" class="inputImage" src="<?php ob_start(); ?>submitS.png<?php $_icond58d3ec8feba27cfacb48a78cee903c8497eb578 = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icond58d3ec8feba27cfacb48a78cee903c8497eb578); ?>" alt="Submit" />
								</div>
	
								<?php echo SID_INPUT_TAG; ?>
							</div>
						</form>
					</div>
				</div>
			<?php } ?>
	
			<?php if (isset($this->v['additionalBoxes'])) { ?><?php echo $this->v['additionalBoxes']; ?><?php } ?>
		</div>
	<?php } ?>
	
	<div class="pageOptions">
		<?php if ($this->v['board']->isBoard()) { ?>
		
			<?php if (isset($this->v['additionalPageOptions'])) { ?><?php echo $this->v['additionalPageOptions']; ?><?php } ?>
		
			<a href="index.php?action=BoardMarkAsRead&amp;boardID=<?php echo $this->v['boardID']; ?>&amp;t=<?php echo SECURITY_TOKEN; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php ob_start(); ?>boardMarkAsReadS.png<?php $_icon22941c404e44701dcad7a1e1fffc470b28c5f8a2 = ob_get_contents(); ob_end_clean(); echo StyleManager::getStyle()->getIconPath($_icon22941c404e44701dcad7a1e1fffc470b28c5f8a2); ?>" alt="" /> <span>Mark forum as read</span></a>
		<?php } ?>
	</div>
	
	<?php
$outerTemplateName8e4782110dafc4d241fd08a802e0dd31ebfca4e4 = $this->v['tpl']['template'];
$this->includeTemplate("boardQuickJump", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName8e4782110dafc4d241fd08a802e0dd31ebfca4e4;
$this->v['tpl']['includedTemplates']["boardQuickJump"] = 1;
?>
</div>

<?php
$outerTemplateName06593c0ff1752ec7354517045495b33c34790f75 = $this->v['tpl']['template'];
$this->includeTemplate('footer', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName06593c0ff1752ec7354517045495b33c34790f75;
$this->v['tpl']['includedTemplates']['footer'] = 1;
?>
</body>
</html>