<?php
/**
 * Product loop sale flash
 *
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<div class="icon-sale">
	<?php if ( $product->is_on_sale() ) : ?>

		<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>

	<?php endif; ?>
	<?php
	$product_new = get_post_meta( $post->ID, 'thim_product_new', true );
	$product_hot = get_post_meta( $post->ID, 'thim_product_hot', true );
	if ( $product_new!='false'  &&  $product_new!='' ) {
		echo '<span class="onsale new">' . __( 'New', 'thim' ) . '</span>';
	}
	if ( $product_hot!='false' &&  $product_hot!='' ) {
		echo '<span class="onsale hot">' . __( 'Hot', 'thim' ) . '</span>';
	}
	?>
	<!-- html hot new -->
 </div>