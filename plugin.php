<?php
/**
 * Plugin Name:       GravityView Ratings & Reviews Mod: Remove Title and Rating fields
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/2865-remove-title-ratings-fields
 * Description:       Remove Title and Rating fields on Ratings & Reviews extension
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

class GV_Snippet_2865 {

	public static $ID = 2865;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){

		// Remove Title and Rating fields on Ratings & Reviews extension
		add_filter( 'comment_form_field_gv_review_title', '__return_empty_string' );
		add_filter( 'comment_form_field_gv_review_rate', '__return_empty_string' );

	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_2865', 'instance' ), 15 );