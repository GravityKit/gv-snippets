<?php
/**
 * Plugin Name:       GravityView Mod: Disable Field Conditional Logic on Edit
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2726-disable-conditional-logic
 * Description:       Disable the Field Conditional Logic on the Edit Entry View
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

class GV_Snippet_2726 {

	public static $ID = 2726;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/edit_entry/conditional_logic', '__return_false' );
	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_2726', 'instance' ), 15 );