<li class="qodef-blog-list-item qodef-blog-list-masonry-item">
	<div class="qodef-blog-list-item-inner">
		<div class="qodef-item-image clearfix">
			<a href="<?php echo esc_url(get_permalink()) ?>">
				<?php
					echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>				
			</a>
		</div>	
		<div class="qodef-item-text-holder">
			<<?php echo esc_html( $title_tag)?> class="qodef-item-title ">
				<a href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>
			
			<div class="qodef-item-info-section">
				<?php qode_startit_post_info(array(
					'date' => 'yes',
					'category' => 'yes',
					'author' => 'yes',
					'comments' => 'yes',
					'like' => 'yes'
				)) ?>
			</div>
			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<p class="qodef-excerpt"><?php echo esc_html($excerpt)?>...</p>
			<?php } ?>
		</div>	
	</div>	
</li>