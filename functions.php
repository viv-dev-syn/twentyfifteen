<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentyfifteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
 
 
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20141212', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );



	////// Add image size for logo image.
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'header_logo_image', 241, 211, true ); //(cropped)
	}
	
	////// Add image size for event image.
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'event_home_image', 135, 68, true ); //(cropped)
	}
	
	////////////// Create a new widget for Home page Full /////////////
	if( function_exists('register_sidebar')){
		register_sidebar(array(
			'name' => 'Home Page Full',
			'id' => 'home-page-full',
			'description' => 'Home Page Full',
			 'before_widget' => '',
			'after_widget' => '',
		));
	}
	
	////////////// Create a new widget for Home page Mobile section /////////////
	if( function_exists('register_sidebar')){
		register_sidebar(array(
			'name' => 'Home Page Mobile',
			'id' => 'home-page-mobile',
			'description' => 'Home Page Mobile',
			 'before_widget' => '',
			'after_widget' => '',
		));
	}
	
	
	////////////// Create a new widget for contact us in footer /////////////
	if( function_exists('register_sidebar')){
		register_sidebar(array(
			'name' => 'Contact Us Footer',
			'id' => 'contact-us-footer',
			'description' => 'Contact Us Footer',
			'before_widget' => '',
			'after_widget' => '',
		));
	}
	
	 
	// add_action( 'vc_before_init', 'homepageWithVC' );
	// function homepageWithVC() {
	   // vc_map( array(
		  // "name" => __( "Bar tag test", "my-text-domain" ),
		  // "base" => "bartag",
		  // "class" => "",
		  // "category" => __( "Content", "my-text-domain"),
		  // 'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		  // 'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		  // "params" => array(
			 // array(
				// "type" => "textfield",
				// "holder" => "div",
				// "class" => "",
				// "heading" => __( "Text", "my-text-domain" ),
				// "param_name" => "foo",
				// "value" => __( "Default param value", "my-text-domain" ),
				// "description" => __( "Description for foo param.", "my-text-domain" )
			 // )
		  // )
	   // ) );
	// }
	
	
	// // [bartag foo="foo-value"]
	// add_shortcode( 'bartag', 'bartag_func' );
	// function bartag_func( $atts ) {
	   // extract( shortcode_atts( array(
		  // 'foo' => 'something'
	   // ), $atts ) );
	  
	   // return "foo = {$foo}";
	// }

	
/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';


//Prevent from removing span from editor
function myextensionTinyMCE($init) {
    // Command separated string of extended elements
    $ext = 'span[id|name|class|style]';

    // Add to extended_valid_elements if it alreay exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // Super important: return $init!
    return $init;
}

add_filter('tiny_mce_before_init', 'myextensionTinyMCE' ); 

//remove auto p 
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );



//------------- Shortcode for Resources Section ----------------------
function events_func( $atts ) {

	if( $atts['num_post'] != '' ){
		$num_post = $atts['num_post'];
	}else{
		$num_post = 3;
	}

	$eventList = get_events ();
	
	$eventList = array_reverse( $eventList );
	
	$html = '';
	if( count( $eventList ) > 0 ){
 
  
  $html .='<div class="container dextop-view">
    <div class="event-product">
      <h1>FEATURED EVENTS <span><a href="'. events_get_events_link ().'">See All</a></span></h1>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="slide-warp">
        <ul>';
		$i=1;
		foreach( $eventList as $event ){
			
			if( $i > $num_post )
				break;
			
			setup_postdata( $event ); 
		
			$id = $event->ID;
		
			$venue = sp_get_venue ( $event->ID );
			$date = sp_get_start_date (  $event->ID = null, $showtime = false, $dateFormat = '' );
			$guid = $event->guid;
			
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' );
			
			$url 	= $thumb['0'];
			
			//echo tribe_event_featured_image( $id, 'full', false );
		
          $html .='<li class="col-lg-4 col-sm-4 col-md-4">
		  
		  <a href="'.$guid.'">
            <div class="event-box">
              <div class="post-date">
                <h2>'.$date.'<span>'.$venue.'</span></h2>';
                
					if( $url != '' ){ 
					$html .='<img src="'.$url.'" alt="" title="" width="135" />';
						}else{
					$html .='<img src="'.get_bloginfo("template_url").'/images/post-pic.png" alt="" title=""/>'; 
					}

				$html .='</div>
              <div class="post-info">
                <p>'.do_shortcode($event->post_content).'</p>
                <h3>'.$venue.'<span>'.$date.'</span></h3>
                <i class="icon-hover"></i> </div>
              <div class="clearfix"></div>
            </div>
			</a>
          </li>';
		  
		  $i++; }
         
        $html .='</ul>
      </div>
    </div>
  </div>';
  
 
	}

	return $html;
}
add_shortcode( 'EVENTS', 'events_func' );

//Get excerpt character length
function custom_excerpt_length( $length ) {
	return 160;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Get excerpt read more 
function custom_excerpt_more( $more ) {
	return '...';
}


//To reduce charactor length if exceeds 38
add_filter( 'excerpt_more', 'custom_excerpt_more' );

add_shortcode('wp_trim_title', 'trim_shortcode');
function trim_shortcode($atts, $content = '') {
  	
  $content = wpv_do_shortcode($content);
  if (strlen($content) > 38) {
    $content = substr($content, 0, 38) . '...';
  }
  return $content;
}

//To show taxonomy if there are multiple
add_shortcode('trim_taxonomy', 'trim_taxonomy_content');
add_shortcode('taxonomy_image','trim_taxonomy_image');
function trim_taxonomy_content($atts, $content = '') {
  $content = wpv_do_shortcode($content);
  $content = explode(',',$content);

  if (strlen($content) > 45) {
  //  $content = substr($content, 0, 45) . '...';
  }
 $tax_slug =  $content[0];
 $query = get_term_by('slug',$tax_slug,'resource-type');
 $tid = $query->term_id;
 $tname = $query->name;
 $images = get_option( 'cfi_alternate_images' );
 $attachment = wp_get_attachment_image_src( $images[$tid], array(32,32) );
 $str ="";
 if( $attachment !== FALSE )
       $str = '<img  width=32 height=32 class="tax-image" src="'.$attachment[0].'" >';
 $str .= $tname;
 return $str ;
}

function trim_taxonomy_image($atts, $content = '') {
  $content = wpv_do_shortcode($content);
  $content = explode(',',$content);

  if (strlen($content) > 45) {
  //  $content = substr($content, 0, 45) . '...';
  }
 $tax_slug =  $content[0];
 $query = get_term_by('slug',$tax_slug,'resource-type');
 $tid = $query->term_id;
 $tname = $query->name;
 $images = get_option( 'cfi_featured_images' );
 $attachment = wp_get_attachment_image_src( $images[$tid],'large' );
 $str ="";
 if( $attachment !== FALSE )
       $str = '<div class="alternate_image" style="background:url('.$attachment[0].') no-repeat scroll center;">&nbsp;</div>';
else
	$str = '<div class="alternate_image _no_image" >&nbsp;</div>';
 return $str ;
}

 
function qt_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  //$delimiter = '&raquo;'; // delimiter between crumbs
  $delimiter = '<i></i>'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  // $before = '<span class="current">'; // tag before the current crumb
  // $after = '</span>'; // tag after the current crumb
  $before = '<li><span></span> <a href="javascript:void(0);">'; // tag before the current crumb
  $after = '</a>' . $delimiter . '</li>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
	echo '<ul>';
    echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<li><span></span><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' </li>';
      echo '<li><span></span><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<li><span></span><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' </li>';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><span></span><a href="' . $homeLink . '/' . $slug['slug'] . '>' . $post_type->labels->singular_name . '</a>' . $delimiter . '</li>';
        if ($showCurrent == 1) echo   $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><span></span><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter . '</li>';
      if ($showCurrent == 1) echo  $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><span></span><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>' . $delimiter . '</li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo   $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</ul>';
 
  }
}

wp_enqueue_script( 'tinysort-js', get_template_directory_uri() . '/js/tinysort.js', array(), '1.0.0' );

add_shortcode('wpv-post-sorting', 'wpv_post_sorting_shortcode');
function wpv_post_sorting_shortcode($atts)
{
    extract( shortcode_atts( array(
         'sort' => '',
         'dir' => '',
         'numeric' => '',
    ), $atts ) );
    if(isset($_REQUEST['wpv_column_sort_dir'])&&$_REQUEST['wpv_column_sort_dir']=='DESC')
    {
        $dir = 'ASC';
    }
  
    //Added line to enable numeric sortings
    if($numeric == 'yes'){
         $sort = (int)$sort;
    }
  
    $args = array(
        'wpv_column_sort_id' => $sort,
        'wpv_column_sort_dir' => $dir,
    );
    return add_query_arg($args);
}
   
add_filter('wpv_filter_query', 'sort_by_field_func', 10, 2);
function sort_by_field_func($query, $settings) {

        if(isset($_REQUEST['wpv_column_sort_id']) && isset($_REQUEST['wpv_column_sort_dir']))
        {
            $query['meta_key'] = $_REQUEST['wpv_column_sort_id'];
            $query['orderby'] = 'meta_value_num';
            $query['order'] = $_REQUEST['wpv_column_sort_dir'];
        }
    return $query;
}

// adding featured image to custom taxonomy 
add_action( 'resource-type_edit_form', 'type_resource_edit_form');
add_action( 'edited_resource-type', 'edited_resource_type' );
function type_resource_edit_form()
{	
	wp_enqueue_media();
	$tag_ID = $_GET['tag_ID'];
	$images = get_option( 'cfi_featured_images' );
	if( $images === FALSE ) $images = array();
	$image = isset( $images[$tag_ID] ) ? $images[$tag_ID] : '';
	
	$images1 = get_option( 'cfi_alternate_images' );
	if( $images1 === FALSE ) $images1 = array();
	$image1 = isset( $images1[$tag_ID] ) ? $images1[$tag_ID] : '';
	
?>

<script type='text/javascript'>
jQuery(document).ready( function() {
	

	jQuery('.cfi-change-image').live('click',function(e){
			var cfi_media_upload;
			e.preventDefault();
			var using ="";
			var use = jQuery(this).attr('using');
			
		// If the uploader object has already been created, reopen the dialog
			if( cfi_media_upload ) {
				cfi_media_upload.open();
				return;
			}
		// Extend the wp.media object
			cfi_media_upload = wp.media.frames.file_frame = wp.media({
				title: 'Choose an image',
				button: { text: 'Choose image' },
				multiple: false
			});
			

		//When a file is selected, grab the URL and set it as the text field's value
			cfi_media_upload.on( 'select', function() {
				attachment = cfi_media_upload.state().get( 'selection' ).first().toJSON();
				jQuery('.feature-image').val( attachment.id );
				jQuery('.cfi-thumbnail').empty();
				jQuery('.cfi-thumbnail').append( '<img src="' + attachment.url + '" class="attachment-thumbnail cfi-preview" />' );
			});

		//Open the uploader dialog
			cfi_media_upload.open();
	});
	
	jQuery('.cfi-alternate-image').live('click',function(e){
		var cfi_media_upload1;
		e.preventDefault();
		
	// If the uploader object has already been created, reopen the dialog
		if( cfi_media_upload1 ) {
			cfi_media_upload1.open();
			return;
		}
		
	// Extend the wp.media object
		cfi_media_upload1 = wp.media.frames.file_frame = wp.media({
			title: 'Choose an image',
			button: { text: 'Choose image' },
			multiple: false
		});
		
		//When a file is selected, grab the URL and set it as the text field's value
		cfi_media_upload1.on( 'select', function() {
			attachment1 = cfi_media_upload1.state().get( 'selection' ).first().toJSON();
			jQuery('.alternate-image').val( attachment1.id );
			jQuery('.cfi-alternate').empty();
			jQuery('.cfi-alternate').append( '<img src="' + attachment1.url + '" class="attachment-thumbnail cfi-preview" />' );
		});
	//Open the uploader dialog
		cfi_media_upload1.open();
	});
	

	jQuery('.cfi-remove-image').click(function(e) {
		var using = jQuery(this).attr('using');
		jQuery('.feature-image').val('');
		jQuery('.cfi-thumbnail').empty();
	});
	jQuery('.cfi-remove-alternate-image').click(function(e) {
		var using = jQuery(this).attr('using');
		jQuery('.alternate-image').val('');
		jQuery('.cfi-alternate').empty();
	});
}); </script>

	<table class="form-table">
			
		<tr class="form-field">
			<th valign="top" scope="row">
				<label>Default Featured Image</label>
			</th>
			<td>
				<input id="cfi-featured-image" class="feature-image" using="featured" type="hidden" name="cfi_featured_image" readonly="readonly" value="<?php echo $image; ?>" />
				<input id="cfi-remove-image" using="featured" class="button cfi-remove-image" type="button" value="Remove image" />
				<input id="cfi-change-image" using="featured" class="button cfi-change-image" type="button" value="Change image" />
				<div class="cfi-thumbnail" using="featured"><?php if( !empty( $image ) ) echo wp_get_attachment_image( $image ); ?></div>
				<p class="description">Set a featured image for all the post of this category without a featured image.</p>
			</td>
		</tr>
		
		<tr class="form-field">
			<th valign="top" scope="row">
		<label>Bottom Icon</label>
			</th>
			<td>
				<input id="cfi-alternate-image" class="alternate-image" using="bottom" type="hidden" name="cfi_alternate_image" readonly="readonly" value="<?php echo $image1; ?>" />
				<input id="cfi-remove-image" using="bottom" class="button cfi-remove-alternate-image" type="button" value="Remove image" />
				<input id="cfi-change-image" using="bottom" class="button cfi-alternate-image" type="button" value="Change image" />
				<div id="cfi-thumbnail" class="cfi-alternate"><?php if( !empty( $image1 ) ) echo wp_get_attachment_image( $image1 ); ?></div>
				<p class="description">Set a bottom icon for all the grid view posts.</p>
			</td>
		</tr>
	

		
	</table>
	
<?php
}

function edited_resource_type( $term_id )
{
	if( isset( $_POST['cfi_featured_image'] ) )
	{
		$images = get_option( 'cfi_featured_images' );
		if( $images === FALSE ) $images = array();
		//$url = trim( $_POST['cfi_featured_image'] );	// URL alternative
		//$images[$term_id] = !empty( $url ) ? esc_url( $url ) : NULL;
		$img_id = trim( $_POST['cfi_featured_image'] );
		$images[$term_id] = !empty( $img_id ) ? $img_id : NULL;
		update_option( 'cfi_featured_images', $images );
	}
	
	if( isset( $_POST['cfi_alternate_image'] ) )
	{
		$images = get_option( 'cfi_alternate_images' );
		if( $images === FALSE ) $images = array();
		$img_id = trim( $_POST['cfi_alternate_image'] );
		$images[$term_id] = !empty( $img_id ) ? $img_id : NULL;
		update_option( 'cfi_alternate_images', $images );
	}
} 

// For showing images in backend resource type.







// Inner page menu for c2c pages. 

add_shortcode('cc_menu','cc_page_menu');
function cc_page_menu(){
	
  $menu_name = 'cc-menu';
  $locations = get_nav_menu_locations();
  
  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
  //echo $menu->term_id;
  
  $menuitems = wp_get_nav_menu_items( '430', array( 'order' => 'DESC' ) );
	/* echo "<pre>";
	print_r($menuitems);
	echo "</pre>"; */
  $str = '';
  $str .='<div class="side-menu">';
  $str .= '<ul>';
  $count = 0;
  $submenu = false;
  if(isset($menuitems) && !empty($menuitems)){
    foreach( $menuitems as $item ):
        $link = $item->url;
        $title = $item->title;
        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):
        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
 		$str .= '<li>';
		$str .='<a href="'.$link.'" class="title">'.$title.'</a>';
		endif;
		
		if ( $parent_id == $item->menu_item_parent ): 
              if ( !$submenu ): $submenu = true; 
            $str .= '<div class="toggle-menu"><ul>';
             endif;
 
              $str .='<li class="item">';
              $str .='<a href="'.$link.'" class="title">'.$title.'</a>';
              $str .='</li>';
              if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): 
            $str .= '</ul></div>';
            $submenu = false; endif;
 
        endif;
 
		if ( $menuitems[$count + 1]->menu_item_parent != $parent_id ):
    $str .= '</li>';
    $submenu = false; 
	endif;
  $count++;
  endforeach;
  }else{
	$str .='Not found';
	}
$str .='</ul>';
$str .='</div>';
echo $str;
}
 add_action('wp_footer','accordion_menu'); 
// add_action( 'wp_enqueue_scripts', 'accordion_menu' );
function accordion_menu(){
	 echo "<script type='text/javascript'>jQuery(document).ready(function(){ 
	jQuery('.menu-cc-menu-container').addClass('side-menu');

	/* jQuery('.toggle-menu').parent('li a').addClass('sub-menu');
	jQuery('.toggle-menu').parent('li').click(function(e){
	
		jQuery('.toggle-menu').slideToggle();
		jQuery('.sub-menu').toggleClass('sub-menu2');
		e.preventDefault();
	}); */
 });</script>";
} 

add_action('wp_head','header_banner'); 

function header_banner()
{
global $post;

$banner_src = get_post_meta($post->ID,'wpcf-_custom_header_image',true);


if($banner_src){
echo '<style>
.custom-header-banner{
background: url("'.$banner_src.'") no-repeat scroll center top / cover hsla(0, 0%, 0%, 0) !important;
}
</style>';
}
}
