<?php
/**
 * Plugin Name:       GravityView Mod: __description__
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/__ID__
 * Description:       __description__
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

class GV_Snippet___ID__ {

	public static $ID = __ID__;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){

	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet___ID__', 'instance' ), 15 );