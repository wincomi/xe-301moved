<?php
/**
 * @file 301moved.addon.php
 * @author Wincomi (admin@wincomi.com)
 * @brief Set PHP Header
*/

if(!defined('__XE__'))
	exit();

if($called_position == 'before_display_content')
{
	$module_info = Context::get('module_info');
	if($module_info->module == 'admin') return;

	$addon_info->error_mid = explode(',', preg_replace("/\s+/", "", $addon_info->error_mid));
	$addon_info->redirect_mid = explode(',', preg_replace("/\s+/", "", $addon_info->redirect_mid));
	if(in_array($module_info->mid, $addon_info->error_mid)) {
		$addon_info->error_mid = array_flip($addon_info->error_mid);
	
		$redirect_url = $addon_info->redirect_mid[$addon_info->error_mid[$module_info->mid]];
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$redirect_url);
		exit();
	}
}
/* End of file 301moved.addon.php */
/* Location: ./addons/301moved */
