<?php
/**
 * Plugin Name:       GravityView Mod: Add Entry Notes to View
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/4182
 * Description:       Adds entry notes to the View
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

class GV_Snippet_4182 {

	public static $ID = 4182;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_filter( 'gravityview/fields/custom/content_after', array( $this, 'render_entry_notes' )  );
	}

	/**
	 * Example to add the entry notes to a view
	 * Add a Custom Content field with the content: {entry_id}
	 *
	 * Replace MY_VIEW by the View ID
	 *
	 * @param string $content Existing field content
	 * @return string Modified field content
	 */
	function render_entry_notes( $content ) {
		if( function_exists( 'gravityview_get_view_id' ) && 'MY_VIEW_ID' != gravityview_get_view_id() ) {
			return $content;
		}
		if( class_exists('GravityView_Entry_Notes') ) {
			$notes = GravityView_Entry_Notes::get_notes( $content );
			if( empty( $notes ) ) {
				return '';
			}
			$content = '';
			foreach( $notes as $note ) {
				$content .= '<p>'. esc_html( $note->user_name ) . ' on ' .esc_html( GFCommon::format_date( $note->date_created, false ) ). ': '. esc_html( $note->value ) .'</p>';
			}
		}
		return $content;
	}


}

add_action( 'plugins_loaded', array( 'GV_Snippet_4182', 'instance' ), 15 );