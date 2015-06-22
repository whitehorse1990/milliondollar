<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.2.min.js"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class( ); ?>>
        <div class="container">
            <div class="top-page">
                <div class="logo col-md-3">
                <a href="<?php echo URL?>"><img src="<?php echo URL?>/img/logo.png" /></a></div>
                <div class="banner col-md-9"><img src="<?php echo URL?>/img/banner.gif" /></div>
            </div>
            <div class="clear"></div>
            <div class="masthead">
            
                <div>
                <nav>
                    <ul class="nav nav-justified">
                        <li><a href="<?php echo URL?>">Home</a></li>
                        <li><a href="<?php echo URL?>blog/">Blog</a></li>
                        <li><a href="<?php echo URL?>users/">Buy Pixel</a></li>
                        <li><a href="<?php echo URL?>pixel-list/">Pixel List</a></li>
                        <li><a href="<?php echo URL?>blog/contact-us/">Contact</a></li>
                    </ul>
                </nav>
                </div>
            </div>
