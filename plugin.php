<?php
/**
 * Plugin Name:       GravityView Mod: Show Custom Content Before Search
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/6691-show-widget-before-search
 * Description:       Show Custom Content widgets before a search is performed, regardless of the "Hide view data until search is performed" View setting
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

/**
 * Show Custom Content widgets before a search is performed, regardless of the View settings
 *
 * @param bool $hide_until_searched Whether to hide the widget until search is performed
 * @param GravityView_Widget $widget GravityView Widget object
 *
 * @return bool false: don't hide widget; true: hide widget
 */
function gravityview_show_custom_content_widget_before_search( $hide_until_searched = false, GravityView_Widget $widget ) {

	if( 'custom_content' === $widget->get_widget_id() ) {
		$hide_until_searched = false;
	}

	return $hide_until_searched;
}

add_filter( 'gravityview/widget/hide_until_searched', 'gravityview_show_custom_content_widget_before_search', 10, 2 );