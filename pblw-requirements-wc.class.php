<?php

class PblwRequirementsWc {

	/**
	 * Constructor. Attach to hooks as required.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_metaboxes' ) );
		add_action( 'woocommerce_process_product_meta', array( $this, 'save_requirements' ) );
	}

	/**
	 * Attach the metaboxes to the download product page
	 */
	public function add_metaboxes() {
		add_meta_box(
			'pblw-requirements',
			__( 'Requirements', 'pblw_reqs' ),
			array( $this, 'render_metabox' ),
			'product',
			'normal',
			'core'
		);
	}

	/**
	 * Render the metabox on the product edit page.
	 * @param  object  $product  The product being edited.
	 * @param  array   $metabox  The full metabox array.
	 */
	public function render_metabox( $product, $metabox ) {
		$requirements = get_post_meta( $product->ID, '_pblw_requirements', true );
	    wp_editor(
	    	$requirements,
	    	'pblwrequirements',
	    	array(
	    		'textarea_name' => 'pblw_requirements',
	    		'media_buttons' => false,
    		)
    	);
	}

	public function save_requirements( $post_id ) {
		if ( !isset ( $_POST['pblw_requirements'] ) )
			return;
		update_post_meta( $post_id, '_pblw_requirements', $_POST['pblw_requirements'] );
	}
}
