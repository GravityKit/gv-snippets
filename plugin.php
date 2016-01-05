<?php
/*
Plugin Name: GravityView - Limit DataTables to 250 Entries
Plugin URI: http://github.com/gravityview/gv-snippets/tree/addon/4549-datatables-limit-entries
Description: Remove "All" from the options, and replace it with 250 Entries per screen
Version: 1.0
Author: Katz Web Services, Inc.
Author URI: https://gravityview.co
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

add_filter( 'gravityview_datatables_lengthmenu', 'restrict_gravityview_datatables_lengthmenu', 10, 2 );

function restrict_gravityview_datatables_lengthmenu( $values ) {

	unset( $values[-1] );

	$values[ 250 ] = 250;

	return $values;
}