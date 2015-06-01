<?php

class Thim_Google_Map_Widget extends Thim_Widget {
	function __construct() {
		//if ( is_plugin_active( 'wp-contact-form-7/wp-contact-form-7.php' ) ) {
		$cf7               = get_posts( 'post_type="wpcf7_contact_form"' );
		$contact_forms     = array();
		$contact_forms[''] = 'None';
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[$cform->ID] = $cform->post_title;
			}
		}
		parent::__construct(
			'google-map',
			__( 'Thim: Google Maps', 'thim' ),
			array(
				'description' => __( 'A Google Maps widget.', 'thim' ),
				'help'        => ''
			),
			array(),
			array(
				'title'        => array(
					'type'  => 'text',
					'label' => __( 'Title', 'thim' ),
				),
				'map_center'   => array(
					'type'        => 'textarea',
					'rows'        => 2,
					'label'       => __( 'Map center', 'thim' ),
					'description' => __( 'The name of a place, town, city, or even a country. Can be an exact address too.', 'thim' )
				),
				'settings'     => array(
					'type'        => 'section',
					'label'       => __( 'Settings', 'thim' ),
					'hide'        => false,
					'description' => __( 'Set map display options.', 'thim' ),
					'fields'      => array(
						'height'      => array(
							'type'    => 'text',
							'default' => 480,
							'label'   => __( 'Height', 'thim' )
						),
						'zoom'        => array(
							'type'        => 'slider',
							'label'       => __( 'Zoom level', 'thim' ),
							'description' => __( 'A value from 0 (the world) to 21 (street level).', 'thim' ),
							'min'         => 0,
							'max'         => 21,
							'default'     => 12,
							'integer'     => true,

						),
						'scroll_zoom' => array(
							'type'        => 'checkbox',
							'default'     => true,
							'state_name'  => 'interactive',
							'label'       => __( 'Scroll to zoom', 'thim' ),
							'description' => __( 'Allow scrolling over the map to zoom in or out.', 'thim' )
						),
						'draggable'   => array(
							'type'        => 'checkbox',
							'default'     => true,
							'state_name'  => 'interactive',
							'label'       => __( 'Draggable', 'thim' ),
							'description' => __( 'Allow dragging the map to move it around.', 'thim' )
						)
					)
				),
				'markers'      => array(
					'type'        => 'section',
					'label'       => __( 'Markers', 'thim' ),
					'hide'        => true,
					'description' => __( 'Use markers to identify points of interest on the map.', 'thim' ),
					'fields'      => array(
						'marker_at_center' => array(
							'type'    => 'checkbox',
							'default' => true,
							'label'   => __( 'Show marker at map center', 'thim' )
						),

						'marker_icon'      => array(
							'type'        => 'media',
							'default'     => '',
							'label'       => __( 'Marker Icon', 'thim' ),
							'description' => __( 'Replaces the default map marker with your own image.', 'thim' )
						),

					)
				),
				'contact_form' => array(
					'type'        => 'section',
					'label'       => __( 'Contact Form', 'thim' ),
					'hide'        => true,
					'description' => __( 'Select form to contact form 7', 'thim' ),
					'fields'      => array(
						'select_form' => array(
							'type'    => 'select',
							'default' => '',
							'label'   => __( 'Select Form', 'thim' ),
							'options' => $contact_forms
						),

					)
				),
			)
		);
	}

	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'thim-google-map', TP_THEME_URI . 'inc/widgets/google-map/js/js-google-map.js', array( 'jquery' ), true );
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

	function get_template_variables( $instance, $args ) {
		$settings = $instance['settings'];
		$markers  = $instance['markers'];
		{
			return array(
				'map_id'   => md5( $instance['map_center'] ),
				'height'   => $settings['height'],
				'map_data' => array(
					'address'          => $instance['map_center'],
					'zoom'             => $settings['zoom'],
					'scroll-zoom'      => $settings['scroll_zoom'],
					'draggable'        => $settings['draggable'],
					'marker-icon'      => !empty( $mrkr_src ) ? $mrkr_src[0] : '',
					'marker-at-center' => $markers['marker_at_center'],
				)
			);
		}
	}
}

function thim_google_map_register_widget() {
	register_widget( 'Thim_Google_Map_Widget' );
}

add_action( 'widgets_init', 'thim_google_map_register_widget' );