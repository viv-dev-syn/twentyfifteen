<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- Font-link-->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300" type="text/css" media="screen" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Philosopher:400,700" type="text/css" media="screen" />
	<!-- Font-link-->
	
	<!-- Add css -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" type="text/css" media="screen" />
	<!-- Add css -->
	
	<!-- Add JS -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider.js"></script>
	<!-- Add JS -->
	
	
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<script>(function(){document.documentElement.className='js'})();</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--===================Main Container============================-->
<div id="main-container">
  <!--=====Header start====-->
  <header>
    <div class="banner-main">
	<!-- Show banners from admin section using reverse slider. -->
	<?php if( is_page('Home') ): ?>
      <div class="flexslider">
        <?php echo do_shortcode( '[rev_slider home_page]' ); ?>
      </div>
	  <?php else: ?>
	  <div class="inside-banner"></div>
	  <?php endif; ?>
      <!--==================Menu Start=================--->
      <nav class="menu-part">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
              <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src='<?php echo get_header_image('header_logo_image'); ?>' alt="<?php //echo( get_bloginfo( 'title' ) ); ?>" > </a></div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6">
              <ul class="mobile-menu">
                <li class="menu-lick"><img src="<?php bloginfo('template_url'); ?>/images/mob-icon.png" alt="" title=""/></li>
                <li class="search-click"><img src="<?php bloginfo('template_url'); ?>/images/mob-se.png" alt="" title=""/></li>
              </ul>
              <div class="clearfix"></div>
              <div class="top-sec">
                <div class="menu">
                
				<?php 
				/////// Show header menu can manage from admin section.
				wp_nav_menu( array('menu' => 'Header Menu' )); ?>
				<!-- <ul>
                    <li><a href="#">News & Blogs </a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">BookStore</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul> -->
                </div>
                <div class="mealing-part">
                  <input type="text" placeholder="Join Our Mailing list"/>
                  <button class="sub-butt">Submit</button>
                </div>
                <div class="get-part"><a href="#">Get Involved</a></div>
                <div class="clearfix"></div>
              </div>
              <div class="second-part">
                <div class="sec-list">
				<?php 
				  /////// Show 'Who we are' menu can manage from admin section.
				  $bannerMenu = array(
					'menu'            => 'Menu at banner',
					'echo'            => true,
					'before'          => '',
					'after'           => '',
					'items_wrap'      => '<ul>%3$s</ul>',
					'walker'          => ''
				);
						wp_nav_menu( $bannerMenu ); ?>
				
                  <!--<ul>
                    <li><a href="#">Who we are</a></li>
                    <li><a href="#">What we do</a></li>
                    <li><a href="#">Resources</a></li>
                  </ul> -->
                  <div class="clearfix"></div>
                </div>
                <div class="search-part">
                  
				  
                  
				  
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		
		<input class="search-submit" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<input type="submit" class="sumit-serch" id="searchsubmit" value="" />
	</div>
</form>
				  
				</div>
              </div>
            </div>
          </div>
		<?php if(!is_page('home')): ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
				  <h1 class="inside-pageHeading"><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->ID  ); //$post->post_parent ?></h1>
				</div>
            </div>
		<?php endif; ?>
	   </div>
      </nav>
      <!--==================Menu Start=================--->
    </div>
  </header>
  
	 
  
  <!--=====Header End===!-->
  
  
  <?php if(!is_page('home')): ?>
	<div class="new-menu">
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
			  <?php echo qt_custom_breadcrumbs(); ?>
			  <div class="clearfix"></div>
			</div>
		  </div>
		</div>
  </div>
		<?php endif; ?>