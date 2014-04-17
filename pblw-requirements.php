<?php
/*
Plugin Name: Product Requirements
Description: Support for products to have "Requirements" recorded against them, then displayed on the product page in a widget.
Plugin URI: http://plugins.leewillis.co.uk
Author: Lee Willis
Author URI: http://www.leewillis.co.uk/
Version: 1.0
License: GPL2
Text Domain: pblw_reqs
Domain Path: /languages
*/

/*

    Copyright (C) 2014  Lee Willis  wordpress.plugins@leewillis.co.uk

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Load necessary files
require_once( 'pblw-requirements.class.php' );
require_once( 'pblw-requirements-widget.class.php' );

// Instantiate the plugin, passing the relationship in
global $pblw_requirements_class;
$pblw_requirements_class = new PblwRequirements();

// EDD Support
if ( defined( 'EDD_VERSION' ) &&
	 version_compare( EDD_VERSION, '1.9' ) ) {
	require_once( 'pblw-requirements-edd.class.php' );
	global $pblw_requirements_ecommerce_class;
	$pblw_requirements_ecommerce_class = new PblwRequirementsEdd();
}
