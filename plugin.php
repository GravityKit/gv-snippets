<?php
/**
 * Plugin Name:       GV Addon: __description__
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/__ID__
 * Description:       __description__
 * Version:           0.1.0
 * Author:            __author__
 * Author URI:        __author_url__
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

class GV_Snippet_ID {
	public static $ID = ID;

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
add_action( 'plugins_loaded', array( 'GV_Snippet_ID', 'instance' ), 15 );