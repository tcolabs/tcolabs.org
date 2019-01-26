<?php global $product; ?>
<li>
   	<div class="qodef-product-list-widget-image-wrapper">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<?php echo qode_startit_kses_img($product->get_image()); ?>
		</a>
	</div>
	<div class="qodef-product-list-widget-info-wrapper">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
			<span class="qodef-product-title"><?php print $product->get_title(); ?></span>
		</a>
		<?php echo wp_kses_post($product->get_price_html()); ?>
	</div>
</li>