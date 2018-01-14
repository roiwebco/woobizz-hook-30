<?php
/*
Plugin Name: Woobizz Hook 30 
Plugin URI: http://woobizz.com
Description: Custom Paypal Text Button on Checkout page
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
Text Domain: woobizzhook30
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook30_load_textdomain' );
function woobizzhook30_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook30', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Hook 30
function woobizzhook30_custom_paypal_text_button( $available_gateways_paypal ) {
    if (! is_checkout() ) return $available_gateways_paypal;  // stop doing anything if we're not on checkout page.
		if (array_key_exists('paypal',$available_gateways_paypal)) {
			
			$available_gateways_paypal['paypal']->order_button_text = __('Pay with Paypal', 'woobizzhook30' );
			
		}
		return $available_gateways_paypal;
}
add_filter( 'woocommerce_available_payment_gateways', 'woobizzhook30_custom_paypal_text_button' );