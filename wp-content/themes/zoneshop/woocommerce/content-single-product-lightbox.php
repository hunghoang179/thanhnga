<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

?>
<div id="content" class="quickview">
	<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" class="row product-info">
		<?php
		global $post, $woocommerce, $product;
		$attachment_ids = $product->get_gallery_attachment_ids();
		?>
		<script type="text/javascript" src="<?php echo TP_THEME_URI; ?>js/plugins.js"></script>
		<script type="text/javascript" src="<?php echo TP_THEME_URI; ?>js/jquery.retina.min.js"></script>
		<script type="text/javascript" src="<?php echo TP_THEME_URI; ?>js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery(".retina").retina({preload: true})
				jQuery('#carousel').flexslider({
					animation    : "slide",
					controlNav   : false,
					animationLoop: false,
					slideshow    : false,
					itemWidth    : 85,
					itemMargin   : 30,
					asNavFor     : '#slider',
					directionNav : false//Boolean: Create navigation for previous/next navigation? (true/false)
				});

				jQuery('#slider').flexslider({
					animation    : "slide",
					controlNav   : false,
					animationLoop: false,
					slideshow    : false,
					sync         : "#carousel",
					directionNav : true,//Boolean: Create navigation for previous/next navigation? (true/false)
					prevText     : "",//String: Set the text for the "previous" directionNav item
					nextText     : "",//String: Set the text for the "next" directionNav item
					start        : function (slider) {
						jQuery('body').removeClass('loading');
					}
				});

			});
		</script>
		<div class="left col-sm-4">
			<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>
		<div class="right col-sm-8 woocommerce">
			<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary_quick' );
			?>
		</div>
		<div class="clear"></div>
	</div>
	<!-- #product-<?php the_ID(); ?> -->
</div>