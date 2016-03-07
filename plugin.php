<?php
/**
 * Plugin Name:       GravityView Mod: Redirect users to the single entry view after updating entry
 * Plugin URI:        https://github.com/gravityview/gv-snippets/tree/addon/5161-redirect-edit-entry-to-single-entry
 * Description:       Redirect users to the single entry view after updating entry
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

class GV_Snippet_5161 {

	public static $ID = 5161;

	private static $_instance = null;

	public static function instance(){
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct(){
		add_action( 'gravityview/edit_entry/after_update', 'redirect_after_update', 10, 2  );
	}

	function redirect_after_update( $form, $entry_id ) {
		?>
		<script>
			jQuery(document).ready( function() {
				window.location.replace( window.location.href.split('?')[0] );
			});
		</script>
		<?php
	}


}

add_action( 'plugins_loaded', array( 'GV_Snippet_5161', 'instance' ), 15 );