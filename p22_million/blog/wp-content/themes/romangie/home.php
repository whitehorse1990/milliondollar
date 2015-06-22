<?php get_header(); ?>
<?php 
	$romangie_left_col_class = "indexpage";
	$romangie_right_col_class= "hidden-xs";
	$romangie_content_class = "content-blog-post format-" . get_post_format();
    $css = 0;
?>
<div id="blog-page">
		<div class="<?php echo $romangie_left_col_class; ?>">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php $romangie_countComments = wp_count_comments(get_the_ID()); ?>
                     <div class="container">
                            <div class="blog-content col-lg-12">
                                <section class="post-meta">
                                    <p class="author-avatar"><img alt=""
                                                                  src="http://0.gravatar.com/avatar/3f1f09305ac6061b96bd3669f4d2f3fa?s=50&amp;d=mm&amp;r=g"
                                                                  srcset="http://0.gravatar.com/avatar/3f1f09305ac6061b96bd3669f4d2f3fa?s=100&amp;d=mm&amp;r=g 2x"
                                                                  class="avatar avatar-50 photo" height="50" width="50">
                                        <ba>
                                            <?php 
                                                $author_id = $post->post_author;
                                                $user_name = get_the_author_meta('display_name', $author_id ); 
                                                echo $user_name;
                                            ?>
                                        </ba>
                                    </p>
                                    <p>
                                        <bd>
                                            <time class="post-date"><?php echo get_the_date(); ?></time>
                                        </bd>
                                    </p>
                                </section>
                                <!-- end of .post-meta -->
                                <header>
                                    <h4 class="post-title"><?php the_title(); ?></h4>
                                </header>
                                <section class="post-entry">
                                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full' ); } the_content( __('Continue Reading', 'romangie') . '<span class="glyphicon glyphicon-chevron-right"></span>'); ?>
                                    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'romangie' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                                    <p><a href="<?php echo get_permalink($post->ID); ?>" class="readmore">Continue Reading...</a></p>
                                </section>
                                <!-- end of .post-entry -->
                            </div>
                    </div>
                        
			<?php endwhile; ?>
			<?php else : ?>

				<h2><?php __( 'Not Found' , 'romangie'); ?></h2>

			<?php endif; ?>
			<div class="pagenav page-links row">
				<div class="next-posts pagination-item col-xs-6 col-sm-offset-3 col-sm-4"><?php next_posts_link('&laquo; ' . __('Older Entries', 'romangie') ) ?></div>
				<div class="prev-posts pagination-item col-xs-6 col-sm-offset-1 col-sm-4"><?php previous_posts_link( __('Newer Entries', 'romangie') . ' &raquo;') ?></div> 
			</div>
		</div>

</div>

<?php get_footer(); ?>
