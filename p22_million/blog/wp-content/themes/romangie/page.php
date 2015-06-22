<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('row post-roll'); ?>>
			<div class="post page-content" id="post-<?php the_ID(); ?>">

				<h2 class="entry-title"><?php the_title(); ?></h2>

				<div class="entry">

					<?php the_content(); ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'romangie' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>

				</div>

			</div>
		</div>
		
		<div class="comments">
			<?php comments_template( '', true ); ?>
		</div>
		
		<?php endwhile; endif; ?>

<?php get_footer(); ?>
