<?php
/**
*
* Google Custom Search Engine (CSE)
*
* @copyright (c) 2015 ForumHulp.com <http://forumhulp.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace forumhulp\gcse\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'					=> 'common_setup',
			'core.acp_board_config_edit_add'	=> 'add_config',
		);
	}

	/* @var \phpbb\config\config*/
	protected $config;

	protected $request;
	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/**
	* Constructor
	*
	* @param \phpbb\controller\helper	$helper		Controller helper object
	* @param \phpbb\template			$template	Template object
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\request\request $request, \phpbb\controller\helper $helper, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->request = $request;
		$this->helper = $helper;
		$this->template = $template;
	}

	public function common_setup($event)
	{
		if ($this->config['gcse_cx'])
		{
			$this->template->assign_vars(array(
				'GCSE_CX'	=> $this->config['gcse_cx'],
				'GCSE_COF'	=> $this->config['gcse_cof'],
				'GCSE_Q'	=> $this->config['gcse_q'],
				'GCSE_URL'	=> $this->helper->route('forumhulp_gcse_controller', array('route' => 'search.html'))
			));
		}
	}

	public function add_config($event)
	{
		if ($event['mode'] == 'settings')
		{
			$display_vars = $event['display_vars'];
			$submit_key = array_search('ACP_SUBMIT_CHANGES', $display_vars['vars']);
			$submit_legend_number = substr($submit_key, 6);
			$display_vars['vars']['legend'.$submit_legend_number] = 'ACP_CSE_TITLE';
			$new_vars = array(
				'gcse_cx'	=> array('lang' => 'CSE_ENGINE_ID',	'validate' => 'string',	'type' => 'text:60:200', 'explain' => true),
				'gcse_cof'	=> array('lang' => 'CSE_COF',	'validate' => 'string',	'type' => 'text:10:10', 'explain' => true),
				'gcse_q'	=> array('lang' => 'CSE_Q',	'validate' => 'string',	'type' => 'text:4:10', 'explain' => true),

				'legend'.($submit_legend_number + 1)	=> 'ACP_SUBMIT_CHANGES',
			);
			$display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $new_vars, array('after' => $submit_key));
			$event['display_vars'] = $display_vars;
		}
	}
}
