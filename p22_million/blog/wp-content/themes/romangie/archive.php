<?php get_header(); ?>
<?php if ( is_active_sidebar( 'primary' ) ) {
	$romangie_left_col_class = "col-md-9 indexpage";
	$romangie_right_col_class= "col-md-3 visible-lg visible-md";
	$romangie_content_class = "col-sm-9 content format-" . get_post_format();
} else {
	$romangie_left_col_class = "col-md-12 indexpage";
	$romangie_right_col_class= "hidden-xs";
	$romangie_content_class = "col-sm-12 col-md-8 content format-" . get_post_format();
}
?>
	<div class="row">
		<div class="<?php echo $romangie_left_col_class; ?>">
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $romangie_post so that the_date() works. ?>
            <div id="title_archives" class="entry-title">

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="page-title"><?php _e('Category Archives: ', 'romangie'); single_cat_title(); ?></h2>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="page-title"><?php _e('Tag Archives: ', 'romangie'); single_tag_title(); ?></h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="page-title"><?php _e('Daily Archives:', 'romangie'); the_time('F jS, Y'); ?></h2>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="page-title"><?php _e('Monthly Archives: ', 'romangie'); the_time('F, Y'); ?></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="page-title"><?php _e('Yearly Archives: ', 'romangie'); the_time('Y'); ?></h2>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="page-title"><?php _e('Author Archives: ', 'romangie'); the_author(); ?></h2>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="page-title"><?php _e('Blog Archives:', 'romangie'); ?></h2>
			
			<?php } ?>
			</div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $romangie_countComments = wp_count_comments(get_the_ID()); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('row post-roll'); ?>>
						<div class="<?php echo $romangie_content_class; ?>">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( __('Permalink to %s', 'romangie'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
                            <p><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></p>
                            <div class="entry"><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } the_content( __('Continue Reading', 'romangie') . '<span class="glyphicon glyphicon-chevron-right"></span>'); ?></div>
								<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'romangie' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

						</div>
					 </div>
			<?php endwhile; ?>
			<?php else : ?>

				<h2><?php _e( 'Not Found', 'romangie'); ?></h2>

			<?php endif; ?>
			<div class="pagenav page-links row">
				<div class="next-posts pagination-item col-xs-6 col-sm-offset-3 col-sm-4"><?php next_posts_link('&laquo; ' . __('Older Entries', 'romangie') ) ?></div>
				<div class="prev-posts pagination-item col-xs-6 col-sm-offset-1 col-sm-4"><?php previous_posts_link( __('Newer Entries', 'romangie') . ' &raquo;') ?></div> 
			</div>

		<?php endif; ?>
		</div>
		<div class="<?php echo $romangie_right_col_class; ?>">
			<?php get_sidebar('primary'); ?>
		</div>
</div>

<?php get_footer(); ?>
