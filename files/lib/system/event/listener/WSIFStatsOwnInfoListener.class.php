<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/MessageParser.class.php');

/**
 * Add StatsOwnInfo
 * 
 * @svn			$Id: WSIFStatsOwnInfoListener.class.php 1665 2011-01-09 17:10:52Z TobiasH87 $
 * @package		de.community4wcf.wsif.statsowninfo
 */
class WSIFStatsOwnInfoListener implements EventListener
{
	/**
	 * @see		EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName)
	{
		//requirements for StatsInfo
		if (INDEX_STATSOWNINFO_ENABLE && WCF::getUser()->getPermission('user.filebase.canViewStatsOwnInfo')) {
		// parse
		WCF::getTPL()->assign(array('message' => MessageParser::getInstance()->parse(INDEX_STATSOWNINFO_CONTENT, INDEX_STATSOWNINFO_ENABLE_SMILEY, INDEX_STATSOWNINFO_ENABLE_HTML, INDEX_STATSOWNINFO_ENABLE_BBCODES)));
		// show
		WCF::getTPL()->append('additionalBoxes', WCF::getTPL()->fetch('statsOwnInfo'));
		}
	}        
}
?>