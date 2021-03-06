<?php
//if ( $this->get_cached_widget( $args ) ) {
//	return;
//}

ob_start();
//extract( $args );
$number_product = $column = 4;
$cats           = '';
$show           = $instance['show'];
$orderby        = $instance['orderby'];
$order          = $instance['order'];
$number_product = $instance['number_product'];
$title          = $instance['title'];
$column         = $instance['column'];
$cats           = $instance['cats'];
$show_rating    = true;
$query_args     = array(
	'posts_per_page' => $number_product,
	'post_status'    => 'publish',
	'post_type'      => 'product',
	'no_found_rows'  => 1,
	'order'          => $order == 'asc' ? 'asc' : 'desc'
);

$query_args['meta_query'] = array();

if ( empty( $instance['show_hidden'] ) ) {
	$query_args['meta_query'][] = WC()->query->visibility_meta_query();
	$query_args['post_parent']  = 0;
}

if ( !empty( $instance['hide_free'] ) ) {
	$query_args['meta_query'][] = array(
		'key'     => '_price',
		'value'   => 0,
		'compare' => '>',
		'type'    => 'DECIMAL',
	);
}

$query_args['meta_query'][] = WC()->query->stock_status_meta_query();
$query_args['meta_query']   = array_filter( $query_args['meta_query'] );
if ( $show == 'category' && $cats <> '' ) {
	$cats_id                 = explode( ',', $cats );
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'term_id',
			'terms'    => $cats_id
		)
	);
}
switch ( $show ) {
	case 'featured' :
		$query_args['meta_query'][] = array(
			'key'   => '_featured',
			'value' => 'yes'
		);
		break;
	case 'onsale' :
		$product_ids_on_sale    = wc_get_product_ids_on_sale();
		$product_ids_on_sale[]  = 0;
		$query_args['post__in'] = $product_ids_on_sale;
		break;
	case 'bestsellers':
		$query_args['meta_query'][] = array(
			'meta_key'      => 'total_sales',
			'orderby'       => 'meta_value_num',
			'no_found_rows' => 1,
		);
		break;
}

switch ( $orderby ) {
	case 'price' :
		$query_args['meta_key'] = '_price';
		$query_args['orderby']  = 'meta_value_num';
		break;
	case 'rand' :
		$query_args['orderby'] = 'rand';
		break;
	case 'sales' :
		$query_args['meta_key'] = 'total_sales';
		$query_args['orderby']  = 'meta_value_num';
		break;
	default :
		$query_args['orderby'] = 'date';
}

$r     = new WP_Query( $query_args );
$class = " product-grid-special";
if ( $instance['layout'] == 'default' ) {
	$class = " category-product-list";
} elseif ( $instance['layout'] == 'list' ) {
	$class = " vertical-showcase";
}
if ( $r->have_posts() ) {
	echo '<div class="thim-widget-product woocommerce">
			<div class="box thim-module">';
	if ( $title ) {
		echo '<div class="box-heading">
			<span>' . esc_attr( $title ) . '</span></div>';
	}
	echo '<ul class="product-grid' . $class . '">';
	while ( $r->have_posts() ) {
		$r->the_post();
		if ( $instance['layout'] == 'default' ) {
			wc_get_template( 'content-widget/content-product.php', array( 'show_rating' => $show_rating, 'column' => $column ) );
		} else {
			wc_get_template( 'content-widget/content-product-special.php', array( 'show_rating' => $show_rating, 'column' => $column ) );
		}
	}
	echo '</ul></div></div>';
}
wp_reset_postdata();

$content = ob_get_clean();

echo ent2ncr( $content );

//$this->cache_widget( $args, $content );
?>