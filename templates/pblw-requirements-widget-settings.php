<!-- Title -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'pblw_docs' ); ?></label>
	<input class="widefat" id="<?php esc_attr_e( $this->get_field_id( 'title' ) ); ?>" name="<?php esc_attr_e( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php esc_attr_e( $title ); ?>" />
</p>

<!-- Count -->
<p>
	<label for="<?php esc_attr_e( $this->get_field_id( 'count' ) ); ?>"><?php _e( 'Number of items:', 'pblw_docs' ); ?></label>
	<input class="widefat" id="<?php esc_attr_e( $this->get_field_id( 'count' ) ); ?>" name="<?php esc_attr_e( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php esc_attr_e( $count ); ?>" />
</p>