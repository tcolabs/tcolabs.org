<?php get_header(); ?>
<?php get_template_part( 'title' ); ?>
<div class="<?php echo qode_startit_blog_archive_pages_classes(qode_startit_get_default_blog_list())['holder']; ?>">
<?php do_action('qode_startit_after_container_open'); ?>
	<div class="<?php echo  qode_startit_blog_archive_pages_classes(qode_startit_get_default_blog_list())['inner']; ?>">
		<?php qode_startit_get_blog(qode_startit_get_default_blog_list()); ?>
	</div>
<?php do_action('qode_startit_before_container_close'); ?>
</div>
<?php get_footer(); ?>