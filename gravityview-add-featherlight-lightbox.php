<?php
/**
 * Plugin Name:       	GravityView - Add Featherlight Lightbox
 * Plugin URI:        	https://gravityview.co
 * Description:       	Add Featherlight lightbox option to GravityView
 * Version:             1.0
 * Author:            	GravityView
 * Author URI:        	https://gravityview.co
 * Text Domain:       	gravityview
 * License:           	GPLv2 or later
 * License URI: 		http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:			/languages
 */

add_action( 'plugins_loaded', 'gravityview_load_featherlight_lightbox_provider', 9 );

function gravityview_load_featherlight_lightbox_provider() {

	if ( ! class_exists( 'GravityView_Lightbox_Provider' ) ) {
		return;
	}

	include_once plugin_dir_path( __FILE__ ) . 'class-gravityview-lightbox-provider-featherlight.php';

	add_filter( 'gravityview/settings/fields', 'gravityview_add_featherlight_lightbox_setting' );
}

/**
 * Add a Featherlight lightbox setting to GravityView
 *
 * @param array $settings_fields
 *
 * @return array
 */
function gravityview_add_featherlight_lightbox_setting( $settings_fields = array() ) {

	$settings_fields[] = array(
		'name' => 'lightbox',
		'type' => 'radio',
		'label' => __( 'Lightbox Script', 'gravityview' ),
		'default_value' => 'fancybox',
		'horizontal' => 1,
		'choices' => array(
			array(
				'label' => _x( 'FancyBox', 'Setting: On or off', 'gravityview' ),
				'value' => 'fancybox',
			),
			array(
				'label' => _x( 'Featherlight', 'Setting: On or off', 'gravityview' ),
				'value' => 'featherlight',
			),
		),
		'description'   => '', // TODO
	);

	return $settings_fields;
}