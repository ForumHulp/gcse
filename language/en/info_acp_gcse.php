<?php
/**
*
* Google Custom Search Engine (CSE)
*
* @copyright (c) 2015 ForumHulp.com <http://forumhulp.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	// ACP Module
	'ACP_CSE_TITLE'			=> 'Google CSE search',
	'CSE_ENGINE_ID'			=> 'Engine id',
	'CSE_ENGINE_ID_EXPLAIN'	=> 'Your Engine id at Google',
	'CSE_COF'				=> 'Ad positions',
	'CSE_COF_EXPLAIN'		=> 'Ad positions in result view',
	'CSE_Q'					=> 'Results',
	'CSE_Q_EXPLAIN'			=> 'Results for pagination',

	'GCSE_NOTICE'			=> '<div style="width:80%%;margin:20px auto;"><p style="text-align:left;">Config setting of this extension are in %1$s » %2$s » %3$s.</p></div>',
));
