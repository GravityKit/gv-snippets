<?php
/**
 * Plugin Name:       GravityView Mod: Change Edit Entry Update Button Label
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/
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

class GV_Snippet_5041 {

	public static $ID = 5041;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/edit_entry/button_labels', array( $this, 'edit_entry_button_labels' ), 10, 1 );
	}

	function edit_entry_button_labels( $labels ) {
		// $labels['cancel'] = 'something new';
		$labels['submit'] = 'Submit';
		return $labels;
	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_5041', 'instance' ), 15 );