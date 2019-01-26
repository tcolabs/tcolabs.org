<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="qodef-woocommerce-share-holder">
	<span class="qodef-woocommerce-share-title"><?php esc_html_e('Share: ','startit') ?></span><?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>
</div>
