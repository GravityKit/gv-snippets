<?php
/**
 * Plugin Name:       GravityView Mod: Disable Conditional Logic Support in Edit Entry (Form #6)
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/4463-disable-conditional-logic
 * Description:       Allow fields that would normally be hidden in Conditional Logic to display in Edit Entry, based on the Edit Entry configuration screen settings. This plugin will only modify this setting for Form #6.
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

add_filter( 'gravityview/edit_entry/conditional_logic', 'gravityview_remove_conditional_logic_from_form_six', 10, 2 );

/**
 * Remove the conditional logic rules from the form button and the form fields if the form is #6
 * @param bool $use_conditional_logic True: Gravity Forms will show/hide fields just like in the original form; False: conditional logic will be disabled and fields will be shown based on configuration. Default: true
 * @param array $form Gravity Forms form
 * @return bool Updated conditional logic
 */
function gravityview_remove_conditional_logic_from_form_six( $use_conditional_logic, $form ) {

	if( 6 === intval( $form['id'] ) ) {
		$use_conditional_logic = false;
	}

	return $use_conditional_logic;
}