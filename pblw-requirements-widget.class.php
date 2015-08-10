<?php

class PblwRequirements_Widget extends WP_Widget {

	// Holds the widget defaults
	private $defaults;

    /**
     * Constructor
     **/
    public function PblwRequirements_Widget() {

    	$this->defaults = array(
			'title' => __( 'Requirements', 'pblw_reqs' ),
		);
        $widget_ops = array(
        	'classname' => 'pblw-requirements',
        	'description' => __( 'Widget showing the "requirements" field.', 'pblw_reqs' ),
    	);
        parent::__construct(
        	'pblw-requirements',
        	__( 'Requirements', 'pblw_reqs' ),
        	$widget_ops
    	);

    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance ) {
    	$instance = array_merge( $this->defaults, $instance );
		extract( $args, EXTR_SKIP );
        echo $before_widget;
        echo $before_title;
        echo $instance['title'];
        echo $after_title;
        $this->do_output();
	    echo $after_widget;
    }

    private function do_output() {
    	$post = get_queried_object();
    	$meta = get_post_meta( $post->ID, '_pblw_requirements', true );
    	echo $meta;
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     **/
    public function form( $instance ) {
		$args = array_merge( $this->defaults, $instance );
		extract( $args );
		include( 'templates/pblw-requirements-widget-settings.php' );
    }
}

