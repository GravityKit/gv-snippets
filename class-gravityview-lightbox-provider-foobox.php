<?php
/**
 * Integrate with the FooBox lightbox and gallery scripts
 * @see https://fooplugins.com/foobox/
 * @since April 30, 2021
 */

/**
 * Register the FooBox lightbox
 *
 * @internal
 */
class GravityView_Lightbox_Provider_Featherlight extends GravityView_Lightbox_Provider {

	public static $slug = 'foobox';

	public static $script_slug = 'gravityview-foobox';

	public static $style_slug = 'gravityview-foobox';

	/**
	 * @inheritDoc
	 */
	public function allowed_atts( $atts = array() ) {

		$atts['data-caption-title'] = null;
		$atts['data-caption-desc']  = null;

		return $atts;
	}

	/**
	 * @inheritDoc
	 */
	public function fileupload_link_atts( $link_atts, $field_compat = array(), $context = null, $additional_details = null ) {

		if ( ! $context->view->settings->get( 'lightbox', false ) ) {
			return $link_atts;
		}

		// Featherlight doesn't like the `rel` used by thickbox
		unset( $link_atts['rel'] );

		$link_atts['class'] = \GV\Utils::get( $link_atts, 'class' );
		$link_atts['class'] .= ' foobox';

		$link_atts['class'] = gravityview_sanitize_html_class( $link_atts['class'] );

		return $link_atts;
	}

}

GravityView_Lightbox::register( 'GravityView_Lightbox_Provider_Featherlight' );
