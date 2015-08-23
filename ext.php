<?php
/**
*
* Google Custom Search Engine (CSE)
*
* @copyright (c) 2015 ForumHulp.com <http://forumhulp.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace forumhulp\gcse;

class ext extends \phpbb\extension\base
{
	function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				global $user;
				$user->add_lang_ext('forumhulp/gcse', 'info_acp_gcse');
				$user->lang['EXTENSION_ENABLE_SUCCESS'] .= (isset($user->lang['GCSE_NOTICE']) ? sprintf($user->lang['GCSE_NOTICE'], $user->lang['ACP_CAT_GENERAL'], $user->lang['ACP_BOARD_SETTINGS'], $user->lang['ACP_CSE_TITLE']) : '');

				// Run parent enable step method
				return parent::enable_step($old_state);
			
			break;
			
			default:
			
				// Run parent enable step method
				return parent::enable_step($old_state);
				
			break;
		}
	}
}