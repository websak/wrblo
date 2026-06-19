<?php

class GoodwishEdgeWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'edgtf_woocommerce_dropdown_cart', // Base ID
			'Edge Woocommerce Dropdown Cart', // Name
			array( 'description' => esc_html__( 'Edge Woocommerce Dropdown Cart', 'goodwish' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		?>
		<div class="edgtf-shopping-cart-outer">
			<div class="edgtf-shopping-cart-inner">
				<div class="edgtf-shopping-cart-header">
					<a itemprop="url" class="edgtf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
						<i class="icon_bag_alt"></i>
						<span class="edgtf-cart-amount"><?php echo WC()->cart->cart_contents_count; ?></span>
					</a>
					<div class="edgtf-shopping-cart-dropdown">
						<ul>
							<?php if ( ! WC()->cart->is_empty() ) :
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
									
									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>
										<li>
											<div class="edgtf-item-image-holder">
												<?php
												$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
												
												if ( ! $product_permalink ) {
													echo $thumbnail;
												} else {
													printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
												}?>
											</div>
											<div class="edgtf-item-info-holder">
												<div class="edgtf-item-left">
													<?php if ( ! $product_permalink ) {
														echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
													} else {
														echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
													} ?>
													<span class="edgtf-quantity"><?php echo sprintf( esc_html__( 'Quantity: %s', 'goodwish' ), esc_attr( $cart_item['quantity'] ) ); ?></span>
													<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
													<?php echo sprintf( '<a href="%s" class="remove" title="%s">%s</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__( 'Remove this item', 'goodwish' ), '<span class="icon_close"></span>' ); ?>
												</div>
											</div>
										</li>
									<?php } ?>
								<?php endforeach; ?>
								<div class="edgtf-cart-bottom">
									<div class="edgtf-subtotal-holder clearfix">
										<span class="edgtf-total"><?php esc_html_e( 'Total', 'goodwish' ); ?>:</span>
										<span class="edgtf-total-amount"><?php wc_cart_totals_subtotal_html(); ?></span>
									</div>
									<div class="edgtf-btns-holder clearfix">
										<a itemprop="url" href="<?php echo wc_get_cart_url(); ?>" class="edgtf-btn-small view-cart">
											<?php esc_html_e( 'View Cart', 'goodwish' ); ?>
										</a>
										<a itemprop="url" href="<?php echo wc_get_checkout_url(); ?>" class="edgtf-btn-small checkout">
											<?php esc_html_e( 'Checkout', 'goodwish' ); ?>
										</a>
									</div>
								</div>
							<?php else : ?>
								<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'goodwish' ); ?></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

add_filter( 'woocommerce_add_to_cart_fragments', 'goodwish_edge_woocommerce_header_add_to_cart_fragment' );
function goodwish_edge_woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<div class="edgtf-shopping-cart-header">
		<a itemprop="url" class="edgtf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
			<i class="icon_bag_alt"></i>
			<span class="edgtf-cart-amount"><?php echo WC()->cart->cart_contents_count; ?></span>
		</a>
		<div class="edgtf-shopping-cart-dropdown">
			<ul>
				<?php if ( ! WC()->cart->is_empty() ) :
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
						
						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<li>
								<div class="edgtf-item-image-holder">
									<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
									
									if ( ! $product_permalink ) {
										echo $thumbnail;
									} else {
										printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
									}?>
								</div>
								<div class="edgtf-item-info-holder">
									<div class="edgtf-item-left">
										<?php if ( ! $product_permalink ) {
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
										} else {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
										} ?>
										<span class="edgtf-quantity"><?php echo sprintf( esc_html__( 'Quantity: %s', 'goodwish' ), esc_attr( $cart_item['quantity'] ) ); ?></span>
										<?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?>
										<?php echo sprintf( '<a href="%s" class="remove" title="%s">%s</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__( 'Remove this item', 'goodwish' ), '<span class="icon_close"></span>' ); ?>
									</div>
								</div>
							</li>
						<?php } ?>
					<?php endforeach; ?>
					<div class="edgtf-cart-bottom">
						<div class="edgtf-subtotal-holder clearfix">
							<span class="edgtf-total"><?php esc_html_e( 'Total', 'goodwish' ); ?>:</span>
							<span class="edgtf-total-amount"><?php wc_cart_totals_subtotal_html(); ?></span>
						</div>
						<div class="edgtf-btns-holder clearfix">
							<a itemprop="url" href="<?php echo wc_get_cart_url(); ?>"
							   class="edgtf-btn-small view-cart">
								<?php esc_html_e( 'View Cart', 'goodwish' ); ?>
							</a>
							<a itemprop="url" href="<?php echo wc_get_checkout_url(); ?>"
							   class="edgtf-btn-small checkout">
								<?php esc_html_e( 'Checkout', 'goodwish' ); ?>
							</a>
						</div>
					</div>
				<?php else : ?>
					<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'goodwish' ); ?></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

	<?php
	$fragments['div.edgtf-shopping-cart-header'] = ob_get_clean();

	return $fragments;
}

?>