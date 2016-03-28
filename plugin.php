<?php
/**
 * Plugin Name:       GravityView Mod: Decode shortcode brackets on custom content field
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/4425
 * Description:       When using a merge tag of a field containing a shortcode on a custom content field, decode the brackets so it process the shortcode correctly
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

class GV_Snippet_4425 {

	public static $ID = 4425;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/fields/custom/decode_shortcodes', '__return_true' );
	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_4425', 'instance' ), 15 );