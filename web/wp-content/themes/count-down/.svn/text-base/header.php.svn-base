<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section and everything up till <div id="main">
*
*/?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=0"/>				
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- Fav and touch icons -->
	<?php if(of_get_option('upload_fav')) { ?>
	<link rel="shortcut icon" href="<?php echo of_get_option('upload_fav');?>">
	<?php } ?>

	<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
	<!-- Body background -->
	<div id="bg" class="bg show0"></div>
	<div class="countdown-header">
	<div class="row container cu-header">
		<!-- Logo -->
		<?php if (of_get_option('show_logo')){ ?>
			<div class="logo show1 three columns">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo of_get_option('upload_logo')?'<img src="'.of_get_option('upload_logo').'" alt="'.get_bloginfo('name').'">':'';?></a>
			</div>
		<?php } else { ?>
		<div class="logo show1 three columns">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>
			</div>
		<?php } ?>
		<!-- End Logo -->
		<nav id="site-navigation" class="main-navigation nine columns" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'countdown' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'countdown' ); ?>"><?php _e( 'Skip to content', 'countdown' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	</div>
	<div class="row container main">