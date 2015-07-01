<?php
/**
 * Plugin Name:       GravityView Mod: Disable assigning the new user to the entry
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2777-disable-user-assignment
 * Description:       When an user is created using the User Registration add-on, Disable assigning the new user to the entry
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

class GV_Snippet_2777 {

	public static $ID = 2777;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview_assign_new_user_to_entry', '__return_false' );
	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_2777', 'instance' ), 15 );