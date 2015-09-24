<?php
/**
 * Plugin Name:       GravityView Mod: Parse shortcode on post custom field "sections_X_shortcode"
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/parse-shortcode-custom-fields
 * Description:       Force GravityView to parse post custom field "sections_X_shortcode" to load the shortcode
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

class GV_Snippet_3348 {

	public static $ID = 3348;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct() {
		add_filter( 'gravityview/data/parse/meta_keys', array( $this, 'add_meta_keys' ), 10, 1 );
	}

	function add_meta_keys( $keys ) {
		return array( 'sections_0_shortcode', 'sections_1_shortcode', 'sections_2_shortcode' );
	}


}

add_action( 'plugins_loaded', array( 'GV_Snippet_3348', 'instance' ), 15 );