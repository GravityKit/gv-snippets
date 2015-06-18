<?php
/**
 * Plugin Name:       GravityView Mod - Modify Search Labels (Requires Edits)
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2665
 * Description:       Change the search labels for inputs in the GravityView Search Widget
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

class GV_Snippet_2665 {

	public static function add_hooks(){
		add_filter( 'gravityview_search_field_label', array( 'GV_Snippet_2665', 'modify_search_field_label' ), 10, 2 );
	}

	/**
	 * Modify the label for a search field
	 *
	 * @param string $label Existing label text
	 * @param array $form_field Gravity Forms field array, as returned by `GFFormsModel::get_field()`
	 *
	 * @return string Possibly modified label
	 */
	public static function modify_search_field_label( $label, $form_field = array() ) {

		// Return the default label name by default
		$return = $label;

		// Then override based on the value of the label.
		switch ( $label ) {
			case 'Company Name':
				$return = 'Company';
				break;

			// Add additional cases here, like:
			case 'First Name':
				$return = 'First';
				break; // Don't forget "break;" after each case
		}

		return $return;
	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_2665', 'add_hooks' ), 15 );