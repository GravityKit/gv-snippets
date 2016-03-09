<?php
/**
 * Plugin Name:       GravityView Mod: Change the "Entry Updated" link to point to directory instead of the entry
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/5180-modify-updated-entry-link
 * Description:       Redirect users to the single entry view after updating entry
 * Version:           1.0
 * Author:            GravityView
 * Author URI:        https://gravityview.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

/**
 * Change the update entry success message, including the link
 *
 * @param $message string The message itself
 * @param $view_id int View ID
 * @param $entry array The Gravity Forms entry object
 * @param $back_link string Url to return to the original entry
 */
function gv_snippet_my_update_message( $message, $view_id, $entry, $back_link ) {

	// This should never happen.
	if( ! class_exists('GravityView_Post_Types') ) {
		return $message;
	}

	$entry_var = GravityView_Post_Types::get_entry_var_name();

	$link = str_replace( $entry_var.'/'.$entry['id'].'/', '', $back_link );

	return 'Entry Updated. <a href="'.esc_url($link).'">Return to the list</a>';
}

// If you've already added to your functions.php file, remove that
remove_filter( 'gravityview/edit_entry/success', 'gv_my_update_message', 10 );
add_filter( 'gravityview/edit_entry/success', 'gv_snippet_my_update_message', 10, 4 );