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
				$this->container->get('user')->add_lang_ext('forumhulp/gcse', 'info_acp_gcse');
				$this->container->get('template')->assign_var('L_EXTENSION_ENABLE_SUCCESS', $this->container->get('user')->lang['EXTENSION_ENABLE_SUCCESS'] .
				(isset($this->container->get('user')->lang['GCSE_NOTICE']) ?
					sprintf($this->container->get('user')->lang['GCSE_NOTICE'],
							$this->container->get('user')->lang['ACP_CAT_GENERAL'],
							$this->container->get('user')->lang['ACP_BOARD_CONFIGURATION'],
							$this->container->get('user')->lang['ACP_CSE_TITLE']) : ''));

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
