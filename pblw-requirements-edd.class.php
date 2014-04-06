<?php

class PblwRequirementsEdd {

	/**
	 * Constructor. Attach to hooks as required.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_metaboxes' ) );
		add_action( 'edd_save_download', array( $this, 'save_requirements' ), 10, 2 );
	}

	/**
	 * Attach the metaboxes to the download product page
	 */
	public function add_metaboxes() {
		add_meta_box(
			'pblw-requirements',
			__( 'Requirements', 'pblw_reqs' ),
			array( $this, 'render_metabox' ),
			'download',
			'normal',
			'core'
		);
	}

	public function render_metabox( $download, $metabox ) {
		$requirements = get_post_meta( $download->ID, '_pblw_requirements', true );
	    wp_editor(
	    	$requirements,
	    	'pblwrequirements',
	    	array(
	    		'textarea_name' => 'pblw_requirements',
	    		'media_buttons' => false,
    		)
    	);
	}

	public function save_requirements( $post_id, $post ) {
		$requirements = !empty( $_POST['pblw_requirements'] ) ? $_POST['pblw_requirements'] : '';
		update_post_meta( $post_id, '_pblw_requirements', $requirements );
	}
}
