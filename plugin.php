<?php
/**
 * Plugin Name:       GravityView Mod: Prevent single entry redirection on front-page
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon
 * Description:       Prevent single entry redirection on front-page when View is embedded on page set as static front-page
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

class GV_Snippet_3509 {

	public static $ID = 3509;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_action( 'template_redirect', array( $this, 'prevent_template_redirect' ), 1 );
	}

	function prevent_template_redirect() {
		$entry = get_query_var( 'entry', false );
		if( $entry && is_front_page() ) {
			remove_action( 'template_redirect', 'redirect_canonical' );
		}
	}


}

add_action( 'plugins_loaded', array( 'GV_Snippet_3509', 'instance' ), 15 );