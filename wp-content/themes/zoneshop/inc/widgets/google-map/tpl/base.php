<?php if ( $instance['title'] <> '' ) {
	echo '<h3 class="widget-title">' . esc_attr( $instance['title'] ) . '</h3>';
} ?>
<div class="kcf-module">
	<?php if ( $instance['contact_form']['select_form'] <> '' ) {
		echo do_shortcode( '[contact-form-7 id="' . esc_attr( $instance['contact_form']['select_form'] ) . '" title=""]' );
	}
	?>
	<div
		class="ob-google-map-canvas"
		style="height:<?php echo intval( $height ) ?>px;"
		id="map-canvas-<?php echo esc_attr( $map_id ) ?>"
		<?php foreach ( $map_data as $key => $val ) : ?>
			<?php if ( ! empty( $val ) ) : ?>
				data-<?php echo esc_attr($key) . '="' . esc_attr( $val ) . '"' ?>
			<?php endif ?>
		<?php endforeach; ?>
		></div>
</div>