<?php
/**
 * Plugin Name:       GravityView Mod: Redirect to Multiple Entries After Edit Entry
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/5101-redirect-edit-to-multiple-entries
 * Description:       Redirects the "Go back" and "Cancel" links to the multiple entries screen instead of the single entry screen
 * Version:           1.0.1
 * Author:            GravityView
 * Author URI:        https://gravityview.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

class GV_Snippet_5101 {

	public static $ID = 5101;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/edit_entry/success', array( $this, 'gv_my_update_message' ), 10, 4 );
		add_filter( 'gravityview/edit_entry/cancel_link', array( $this, 'gv_my_edit_cancel_link' ), 10, 4 );
	}

	/**
	 * Change the update entry success message, including the link
	 *
	 * @param $message string The message itself
	 * @param $view_id int View ID
	 * @param $entry array The Gravity Forms entry object
	 * @param $back_link string Url to return to the original entry
	 */
	function gv_my_update_message( $message, $view_id, $entry, $back_link ) {
		$link = gv_directory_link();
		return 'Entry Updated. <a href="'. esc_url($link) .'">Return to the list</a>';
	}

	/**
	 * Customise the cancel button link
	 *
	 * @param $back_link string
	 *
	 * since 1.11.1
	 */
	function gv_my_edit_cancel_link( $back_link, $form, $entry, $view_id ) {
		return gv_directory_link();
	}


}

add_action( 'plugins_loaded', array( 'GV_Snippet_5101', 'instance' ), 15 );