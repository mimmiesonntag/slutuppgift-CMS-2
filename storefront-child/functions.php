<?php
// show picture on checkout page
add_filter( 'woocommerce_cart_item_name', 'ywp_product_image_on_checkout', 10, 3 );
function ywp_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {
     
    if ( ! is_checkout() )
        return $name;

    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
 
    $thumbnail = $_product->get_image();
 
    $image = '<div class="ywp-product-image" style="width: 50px; height: 30px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>'; 

    return $image . $name;
}

// hide coupon field on the checkout page
function disable_coupon_field_on_checkout( $enabled ) {
	if ( is_checkout() ) {
		$enabled = false;
	}
	return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_checkout' );