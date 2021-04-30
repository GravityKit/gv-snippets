<?php
/**
 * Plugin Name:       	GravityView - Add FooBox Lightbox
 * Plugin URI:        	https://gravityview.co
 * Description:       	Add FooBox lightbox option to GravityView
 * Version:             1.0
 * Author:            	GravityView
 * Author URI:        	https://gravityview.co
 * Text Domain:       	gravityview-foobox
 * License:           	GPLv2 or later
 * License URI: 		http://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:			/languages
 */

add_action( 'plugins_loaded', 'gravityview_load_featherlight_lightbox_provider', 9 );

function gravityview_load_featherlight_lightbox_provider() {

	if ( ! class_exists( 'GravityView_Lightbox_Provider' ) ) {
		return;
	}

	include_once plugin_dir_path( __FILE__ ) . 'class-gravityview-lightbox-provider-foobox.php';

	add_filter( 'gravityview/settings/fields', 'gravityview_add_foobox_lightbox_setting' );
}

/**
 * Add a Featherlight lightbox setting to GravityView
 *
 * @param array $settings_fields
 *
 * @return array
 */
function gravityview_add_foobox_lightbox_setting( $settings_fields = array() ) {

	$foobox_choice = array(
		'label' => _x( 'FooBox (Requires the FooBox plugin)', 'Setting: On or off', 'gravityview-foobox' ),
		'value' => 'foobox',
	);

	$has_field_already = false;
	foreach ( $settings_fields as $settings_field ) {
		if ( 'lightbox' === \GV\Utils::get( $settings_field, 'name' ) ) {
			$settings_field['choices'][] = $foobox_choice;
			$has_field_already = true;
		}
	}

	if ( $has_field_already ) {
		return $settings_fields;
	}

	$settings_fields[] = array(
		'name' => 'lightbox',
		'type' => 'radio',
		'label' => __( 'Lightbox Script', 'gravityview-foobox' ),
		'default_value' => 'fancybox',
		'horizontal' => 1,
		'choices' => array(
			array(
				'label' => _x( 'FancyBox', 'Setting: On or off', 'gravityview-foobox' ),
				'value' => 'fancybox',
			),
			$foobox_choice,
		),
		'description'   => '', // TODO
	);

	return $settings_fields;
}