<?php
/**
 * Plugin Name:       GravityView Mod: Conditionally Hide GravityView Widgets
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/2608
 * Description:       Hide all GravityView widgets when there's only a single entry showing and it's not a search
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

class GV_Snippet_2608 {

	/**
	 * @type int Max number of entries to allow hiding of widgets
	 */
	const entry_limit = 1;

	public static function add_hooks() {
		add_action( 'gravityview_before', array('GV_Snippet_2608', 'prevent_render_widget_hooks' ), 1 );
	}

	/**
	 * If there are fewer entries than the entry limit and it's not a search, then don't render GV widgets
	 *
	 * We trigger actions that make the widget hooks not render. It's a hack, but it works.
	 *
	 * @see GravityView_View::render_widget_hooks()
	 * @since 1.0
	 *
	 * @return void
	 */
	static 	function prevent_render_widget_hooks() {
		if( self::entry_limit >= GravityView_View::getInstance()->getTotalEntries() && ! GravityView_frontend::getInstance()->is_searching() ) {

			$view_id = GravityView_View::getInstance()->getViewId();

			// Prevent widgets from displaying, since they check for this hook
			do_action( 'header_' . $view_id . '_widgets' );
			do_action( 'footer_' . $view_id . '_widgets' );
		}
	}
}

add_action( 'plugins_loaded', array( 'GV_Snippet_2608', 'add_hooks' ), 15 );