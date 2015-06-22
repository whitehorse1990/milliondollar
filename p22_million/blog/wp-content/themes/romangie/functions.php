<?php

	//Register the menu
	function romangie_register_my_menus() {
		register_nav_menus(
            array(	'header-menu' => __( 'Header Menu', 'romangie' )
            )
        );
	}
	add_action( 'init', 'romangie_register_my_menus' );

	// Register scripts
	function romangie_scripts() {
		wp_enqueue_script(
			'romangie-bootstrap',
			get_stylesheet_directory_uri() . '/js/bootstrap.min.js',
			array( 'jquery' )
		);

		wp_enqueue_style(
			'romangie-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'romangie-bootstrap', 'romangie-bootstrap-theme' )
		);

		wp_enqueue_script( 'comment-reply' );
		
		wp_enqueue_style( 
			'romangie-bootstrap', 
			get_stylesheet_directory_uri() . '/css/bootstrap.min.css' 
		);
		
		wp_enqueue_style( 
			'romangie-bootstrap-theme', 
			get_stylesheet_directory_uri() . '/css/bootstrap-theme.min.css' 
		);
	}
	add_action( 'wp_enqueue_scripts', 'romangie_scripts' );


	// Add home to the link list and to the main menu
	function romangie_page_menu_args( $romangie_args ) {
	if ( ! isset( $romangie_args['show_home'] ) )
		$romangie_args['show_home'] = true;
	return $romangie_args;
	}
	add_filter( 'wp_page_menu_args', 'romangie_page_menu_args' );

	/** Support Post Formats */
	add_theme_support('post-formats',
		array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	//Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );

    // Support different languages
    load_theme_textdomain('romangie', get_template_directory() . '/languages' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */	
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

    /* Include featured Images in theme */
    add_theme_support( 'post-thumbnails' );


	/* Set content Width */
	if ( ! isset( $content_width ) ) $content_width = 500;

	/* Custom Continue Reading Link */
	function romangie_new_excerpt_more( $romangie_more ) {
		return ' <a class="more-link excerpt-link" href="'. get_permalink( get_the_ID() ) . '">' . __('Continue Reading', 'romangie') . '<span class="glyphicon glyphicon-chevron-right"></span></a>';
	}
	add_filter( 'excerpt_more', 'romangie_new_excerpt_more' );


	/* Add the class img-circle to the avatar */
	function romangie_change_avatar_css($romangie_class) {
		$romangie_class = str_replace("class='avatar", "class='author_gravatar img-circle", $romangie_class) ;
		return $romangie_class;
	}
	add_filter('get_avatar','romangie_change_avatar_css');


	// Register the sidebar 

	function romangie_register_sidebar() {
		// Register primary sidebar
		register_sidebar(
			array(
				'id' => 'primary',
				'name' => __('Primary Sidebar', 'romangie'),
				'description' => __( 'This is the righthanded sidebar', 'romangie', 'romangie'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

		// Register left footer widget
		register_sidebar(
			array(
				'id' => 'leftfooter',
				'name' => __('Left Footer', 'romangie'),
				'description' => __( 'This is the widget area for the left part of the footer', 'romangie'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

		// Register middle footer widget
		register_sidebar(
			array(
				'id' => 'middlefooter',
				'name' => __('Middle Footer', 'romangie'),
				'description' => __( 'This is the widget area for the center part of the footer', 'romangie'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

		// Register left footer widget
		register_sidebar(
			array(
				'id' => 'rightfooter',
				'name' => __('Right Footer', 'romangie'),
				'description' => __( 'This is the widget area for the right part of the footer', 'romangie'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

	}	

	add_action( 'widgets_init', 'romangie_register_sidebar');

	/** My own comment design */
 	function romangie_magazin_comment($comment, $args, $depth) {
   	$GLOBALS['comment'] = $comment; ?>
   	<div <?php comment_class('row new-comment'); ?> >
	   	<div id="li-comment-<?php comment_ID() ?>">
	   		<?php $posttype = get_comment_type(); if ($posttype == 'comment') { ?>
		    <div class="meta col-sm-3 info">
		    <?php } else { ?>
   		    <div class="meta col-sm-4 info">
   		    <?php } ?>
				<div id="comment-<?php comment_ID(); ?>">
		    		<div class="comment-author vcard">
		    			<?php $posttype = get_comment_type(); if ($posttype == 'comment') { ?>
			        	<div class="meta-item hidden-xs"><?php echo get_avatar($comment,$size='48'); ?></div>
			        	<div class="meta-item"><span data-icon="&#xe08a;" class="info-icon"></span><?php echo get_comment_author_link() ?></div>
			        	<?php } else { ?>
			        	<div class="meta-item"><span data-icon="&#xe0e3;" class="info-icon"></span><?php echo get_comment_author_link() ?></div>
			        	<?php } ?>
			        	<div class="hidden-xs">
				        	<div class="meta-item"><span data-icon="&#xe023;" class="info-icon"></span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf('%1$s', get_comment_date()) ?></a></div>
				        	<div class="meta-item"><span data-icon="&#x7d;" class="info-icon"></span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf('%1$s', get_comment_time()) ?></a></div>
	                    </div>			
	                    <?php if( is_admin() ) { ?><div class="meta-item"><div data-icon="&#x6c;" class="info-icon"></div><?php edit_comment_link(__('(Edit)' , 'romangie'),'  ','') ?></div><?php } ?>
						<div class="meta-item"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'add_below' => 'comment-content', 'reply_text' => '<span data-icon="&#x4a" class="info-icon"></span> ' . __('Reply', 'romangie')))) ?></div>

	                    <?php cancel_comment_reply_link(); ?>
		    		</div>

					
			   	</div>
			</div>

			<?php $posttype = get_comment_type(); if ($posttype == 'comment') { ?>
		    <div class="comment-content col-sm-9">
		    <?php } else { ?>
		    <div class="comment-content col-sm-8">
   		    <?php } ?>
		    	<?php if ($comment->comment_approved == '0') : ?>
					<div class="alert alert-warning" style="margin-top: -12px"><em style="font-size: 13px"><?php _e('Your comment is awaiting moderation.', 'romangie') ?></em></div>
				<?php endif; ?>
		    	<div id="comment-content-<?php comment_ID() ?>">
					<?php comment_text() ?>
				</div>
		    </div>
		</div>
	</div>
	<?php } 


/* Sets own title to page */
function romangie_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'romangie' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'romangie_wp_title', 10, 2 );




?>
