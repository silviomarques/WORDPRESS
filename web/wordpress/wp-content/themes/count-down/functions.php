<?php

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;
	

/**
 * Sets up theme defaults and registers the various WordPress features that
 * countdown supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since countdown 1.0
 */
function countdown_setup() {
	/*
	 * Makes countdown available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on countdown, use a find and replace
	 * to change 'countdown' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'countdown', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'countdown' ) );


	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 630, 9999 ); // Unlimited height, soft crop
	add_image_size( 'blog-thumb', 755, 278, true ); //(cropped)
}
add_action( 'after_setup_theme', 'countdown_setup' );


	/* 
	 * Loads the Options Panel
	 *
	 * If you're loading from a child theme use stylesheet_directory
	 * instead of template_directory
	 */
	 
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
		require_once get_template_directory(). '/inc/options-framework.php';	
		require_once get_template_directory(). '/options.php';
	}
	/* 
	 * This is an example of how to add custom scripts to the options panel.
	 * This one shows/hides the an option when a checkbox is clicked.
	 *
	 * You can delete it if you not using that option
	 */

	add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
	function optionsframework_custom_scripts() { ?>

	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#example_showhidden').click(function() {
			jQuery('#section-example_text_hidden').fadeToggle(400);
		});
		if (jQuery('#example_showhidden:checked').val() !== undefined) {
			jQuery('#section-example_text_hidden').show();
		}
	});
	</script>
 
	<?php
	}
	
	
	function countdown_scripts_styles()
	{
		wp_enqueue_style( 'foundation', get_template_directory_uri() . '/foundation.min.css');
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
		
	?>

		<script type="text/javascript">
			var	setting = {
			 	lastDate: '<?php echo of_get_option('date_count', '01/01/2015').' '.of_get_option('time_count', '00:00').':00';?>',
				timeZone: '<?php echo get_option('gmt_offset', 'null');?>',
				aniEasing:'<?php echo of_get_option('animation_easing', 'linear');?>',
				style:{
					colorStart:'<?php echo of_get_option('background_start', '#3CEAEE');?>'
				}
			}
		</script>

	<?php
		/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
		/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
		wp_enqueue_script( 'cu-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
		wp_enqueue_script('cu_modernizr', get_template_directory_uri().'/js/modernizr.custom.79408.js');  
		wp_enqueue_script('cu_validate', get_template_directory_uri().'/js/jquery.validate.min.js', array('jquery')); 
		wp_enqueue_script('cu_countdown', get_template_directory_uri().'/js/jquery.countdown.min.js', array('jquery')); 
		wp_enqueue_script('cu_custom', get_template_directory_uri().'/js/custom.js', array('jquery','jquery-ui-core','jquery-effects-core')); 
        wp_enqueue_style( 'googleFontsOpen','http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300,600,700,600italic');
	
	}
	add_action( 'wp_enqueue_scripts', 'countdown_scripts_styles' );
	
function countdown_head(){
	if(!is_admin())
	{
		?>
		<style type="text/css">
			body {
				color:<?php echo of_get_option('wrap_text_color', '#111');?>;
			}
			.container,.cu-footer{
				background:<?php echo of_get_option('wrap_background_start', '#fff');?>;
			}
			a {
				color:<?php echo of_get_option('wrap_link_color', '#2BA6CB');?>;
			}
			a:hover {
				color:<?php echo of_get_option('wrap_link_hover_color', '#222222');?>;
			}
			.page-template-count-down-template-php .container.main,.countdown-wrapper,.countdown-wrapper .light,.countdown-wrapper .dark{background:<?php echo of_get_option('countdown_wrap_color', '#222222'); ?>;color:<?php echo of_get_option('countdown_wrap_content_color', '#3CEAEE');?>;}
			#email-submit,input.email-subscribe[type="text"] { border: 1px solid <?php echo of_get_option('countdown_wrap_content_color', '#3CEAEE');?>; }
		</style>
		<?php
	}
}
add_action('wp_head', 'countdown_head');
/**
 * Registers our main widget area and the front page widget areas.
 *
 */
function countdown_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'countdown' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'countdown' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'countdown_widgets_init' );

if ( ! function_exists( 'countdown_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 */
function countdown_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'countdown' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'countdown' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'countdown' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'countdown_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @return void
 */
function countdown_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


if ( ! function_exists( 'countdown_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 */
function countdown_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'countdown' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'countdown' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'countdown' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'Post in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'countdown' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'Post in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'countdown' );
	} else {
		$utility_text = __( 'Post in %3$s<span class="by-author"> by %4$s</span>.', 'countdown' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;


/*
** Custom Page Title
*/
add_filter( 'wp_title', 'countdown_title' );
function countdown_title($title){
	$cnt_title = $title;
	if ( is_home() && !is_front_page() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_front_page() ){
		$cnt_title .=  get_bloginfo('name');
		$cnt_title .= ' | '; 
		$cnt_title .= get_bloginfo('description');
	}
	if ( is_search() ) {
		$cnt_title .=  get_bloginfo('name');
	}
	if ( is_author() ) { 
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_single() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_page() && !is_front_page() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_category() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_year() ) { 
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_month() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_day() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$cnt_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$cnt_title .= get_bloginfo('name');
		}					
	}
	return $cnt_title;
}
?>