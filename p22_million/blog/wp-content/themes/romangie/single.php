<?php get_header(); ?>
<?php 
	$romangie_left_col_class = "indexpage blog-content";
	$romangie_right_col_class= "hidden-xs";
	$romangie_content_class = "content-blog-post format-" . get_post_format();

?>
<div class="single-post">
		<div class="<?php echo $romangie_left_col_class; ?>">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $romangie_countComments = wp_count_comments(get_the_ID()); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(' post-roll'); ?>>
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( __('Permalink to %s', 'romangie'), get_the_title()); ?>"><?php the_title(); ?></a>
                            </h2>
                        </header>
                        <div class="entry-summary">
                            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } the_content( __('Continue Reading', 'romangie') . '<span class="glyphicon glyphicon-chevron-right"></span>'); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'romangie' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                        </div>
                        <div class="entry-meta">
                            <p><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></p>
                        </div>
                    </article>
					<div class="comments">
							<?php comments_template( '', true ); ?>
					</div>
					 
			<?php endwhile; ?>
			<?php else : ?>

				<h2>Not Found</h2>

			<?php endif; ?>
		</div>

</div>

<?php get_footer(); ?>
