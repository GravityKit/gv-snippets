<?php
/**
 * Plugin Name:       GravityView Mod: Translate Text
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2730-modify-gettext
 * Description:       Translate GravityView text that doesn't already have a filter
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

class GV_Snippet_2730_2 {

	/**
	 * Translate GravityView text that doesn't already have a filter
	 *
	 * Thanks to WooCommerce for the jump start: https://support.woothemes.com/hc/en-us/articles/203105817
	 *
	 * @param string $translated Text as already translated
	 * @param string $text Original text
	 * @param string $domain Translated plugin textdomain (for GravityView, it's "gravityview")
	 *
	 * @return string
	 */
	public static function translate( $translated, $text, $domain = '' ) {

		// Only translate GravityView text
		if( 'gravityview' !== $domain ) {
			return $translated;
		}

		// By default, return the original translation
		$return = $translated;

		// If the text matches any of the cases below, it will be replaced by your new text
		switch( $text ) {

			// Change the "Search" button to "Enquiry"
			case 'Search':
				$return = 'Enquiry';
				break;

			// Modify the example below to add another
			# case 'Example':
			#	$return = 'Another example';
			#	break;
		}

		return $return;
	}

}

add_filter('gettext', array( 'GV_Snippet_2730_2', 'translate' ), 10, 3 );