<?php

/**
 * Main class. Responsible for setting up the main plugin dependencies.
 * This includes registering the CPT, setting up i18n etc.
 */
class PblwRequirements {

	/**
	 * Constructor. Add hooks and filters
	 */
	public function __construct() {
		// Setup i18n
		add_action( 'init',               array( $this, 'setup_i18n' ), 10 );
		// Register the widget
		add_action( 'widgets_init',       array( $this, 'register_widget' ) );
	}

	/**
	 * Includes the dashicons CSS on the frontend.
	 */
	public function add_dashicons() {
	    wp_register_style( 'pblw_requirements', plugins_url( 'css/frontend.css', __FILE__ ) );
	    wp_enqueue_style( 'pblw_requirements' );
	    wp_enqueue_style( 'dashicons' );
	}

	/**
	 * Sets up the plugin for translation either in the WordPress languages folder, or the plugin's
	 * languages sub-folder
	 */
	public function setup_i18n() {
	    $domain = 'pblw_reqs';
	    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	    load_textdomain(
	    	$domain,
	    	WP_LANG_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/' . $domain . '-' . $locale . '.mo'
    	);
	    load_plugin_textdomain(
	    	$domain,
	    	FALSE,
	    	dirname( plugin_basename( __FILE__ ) ) . '/languages/'
    	);
	}

	/**
	 * Register the widget.
	 * @see  PblwRelatedDocs_Widget
	 */
	public function register_widget() {
		register_widget( 'PblwRequirements_Widget' );
	}

}
