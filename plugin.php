<?php
/**
 * Plugin Name:       GravityView Mod: Add :urlencode Merge Tag Modifier
 * Plugin URI:        https://github.com/katzwebservices/gv-snippets/tree/addon/4395-urlencode-modifier
 * Description:       Add support for a new modifier <code>:urlencode</code> inside Merge Tags. Use like this: <code>{Field Name:ID:urlencode}</code>.
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

add_filter( 'gform_merge_tag_filter', 'gravityview_merge_tag_filter_urlencode_modifier', 10, 5 );

/**
 * Add support for URL-encoding field values in Merge Tag for all fields
 *
 * @see RGFormsModel::get_lead_field_value
 * @see GFCommon::replace_field_variable()
 * @uses wp_specialchars_decode()
 *
 * @param string $value Replacement value that Gravity Forms was going to return
 * @param string|int $input_id The ID of the input being rendered
 * @param string $modifier Text after `:` in a Merge Tag: `{Field Name:ID:modifier}`
 * @param GF_Field $field Current field being replaced as a Merge Tag
 * @param mixed $raw_value Value from RGFormsModel::get_lead_field_value()
 *
 * @return string If `urlencode` modifier exists, urlencoded value. Otherwise, existing value.
 */
function gravityview_merge_tag_filter_urlencode_modifier( $value = '', $input_id = '', $modifier = '', $field = null, $raw_value = '' ) {

	$return = $value;

	if( 'urlencode' === $modifier ) {
		$return = wp_specialchars_decode( $return );
		$return = urlencode( $return );
	}

	return $return;
}