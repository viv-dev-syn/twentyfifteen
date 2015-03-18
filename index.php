<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div class="full-bg">
    
	<?php if ( is_active_sidebar( 'home-page-full' ) ) : ?>
		<?php dynamic_sidebar( 'home-page-full' ); ?>
	<?php endif; ?> 
  </div>
  <div class="mobile-section">
    <ul>
      <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/mass-img.png" alt="" title=""/>Newsletter</a></li>
      <li><a href="#">Get Involved</a></li>
    </ul>
    <div class="clearfix"></div>
    <div class="mobile-info">
      <?php if ( is_active_sidebar( 'home-page-mobile' ) ) : ?>
		<?php dynamic_sidebar( 'home-page-mobile' ); ?>
	<?php endif; ?> 
    </div>
  </div>
  <!--=====Full Sec End===!-->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="graph-pic"><img src="<?php bloginfo('template_url'); ?>/images/graph-img.png" alt="" title=""/></div>
      </div>
    </div>
  </div>
  <!--=====Middle Sec===!-->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="product-box">
          <ul>
            <li>
              <div class="hover-icon"></div>
              <div class="inside-div"> <i><img src="<?php bloginfo('template_url'); ?>/images/flag-pic.png" alt="" title=""/></i>
                <h1 class="heading1">A coalition of</h1>
                <h2 class="price-tag">1,100</h2>
                <p>colleges & universities <span>including public, private, two- and four-year institutions with 34 state and regional affiliates</span></p>
                <button><span>Learn how to</span> <span class="strong">get your students engaged</span></button>
              </div>
            </li>
            <li>
              <div class="hover-icon"></div>
              <div class="inside-div"> <i><img src="<?php bloginfo('template_url'); ?>/images/cap-img.png" alt="" title=""/></i>
                <h1 class="heading1">Representing more than</h1>
                <h2 class="price-tag">1,800,000</h2>
                <p>students involved in community engagement programs </p>
                <button><span>Learn how to</span> <span class="strong">get your students engaged</span></button>
              </div>
            </li>
            <li>
              <div class="hover-icon"></div>
              <div class="inside-div"> <i><img src="<?php bloginfo('template_url'); ?>/images/watch.png" alt="" title=""/></i>
                <h1 class="heading1">Investing more than</h1>
                <h2 class="price-tag">6,600,000</h2>
                <p> hours to improve <br/>
                  communities</p>
                <button class="button2"><span>Learn how to</span> <span class="strong">get your students engaged</span></button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--=====EVENT Sec===!-->
  <div class="container dextop-view">
    <div class="event-product">
      <h1>FEATURED EVENTS <span><a href="#">See All</a></span></h1>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="slide-warp">
        <ul>
          <li class="col-lg-4 col-sm-4 col-md-4">
            <div class="event-box">
              <div class="post-date">
                <h2>July 14 2014 <span>Los Vegas</span></h2>
                <img src="<?php bloginfo('template_url'); ?>/images/post-pic.png" alt="" title=""/> </div>
              <div class="post-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <h3>Los Vegas <span> July 14 2014</span></h3>
                <i class="icon-hover"></i> </div>
              <div class="clearfix"></div>
            </div>
          </li>
          <li class="col-lg-4 col-sm-4 col-md-4">
            <div class="event-box">
              <div class="post-date">
                <h2>July 14 2014 <span>Los Vegas</span></h2>
                <img src="<?php bloginfo('template_url'); ?>/images/post-pic.png" alt="" title=""/> </div>
              <div class="post-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <h3>Los Vegas <span> July 14 2014</span></h3>
                <i class="icon-hover"></i> </div>
              <div class="clearfix"></div>
            </div>
          </li>
          <li class="col-lg-4 col-sm-4 col-md-4">
            <div class="event-box">
              <div class="post-date">
                <h2>July 14 2014 <span>Los Vegas</span></h2>
                <img src="<?php bloginfo('template_url'); ?>/images/post-pic.png" alt="" title=""/> </div>
              <div class="post-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <h3>Los Vegas <span> July 14 2014</span></h3>
                <i class="icon-hover"></i> </div>
              <div class="clearfix"></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--=====Resources Sec===!-->
  <div class="container">
    <div class="event-product">
      <h1>RESOURCES <span><a href="#">See All</a></span></h1>
      <div class="clearfix"></div>
    </div>
    <div class="rsesources-sec">
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7">
          <ul class="featured-list">
            <li><a href="#">featured</a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/drop.png" alt="" title=""/></a></li>
          </ul>
          <ul class="filter-mob">
            <li><a href="#">filter by</a>
              <ul>
                <li><a href="#">Research</a></li>
                <li><a href="#">Program model</a></li>
                <li><a href="#">Syllabi</a></li>
                <li><a href="#">More >></a></li>
              </ul>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-5">
          <ul class="filter-list">
            <li>filter by</li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Program model</a></li>
            <li><a href="#">Syllabi</a></li>
            <li><a href="#">More >></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="<?php bloginfo('template_url'); ?>/images/pic1.jpg" alt="" title=""/>
            <h3>Uniting for Health</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Program Model</a> <span>Read More</span></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="<?php bloginfo('template_url'); ?>/images/pic2.jpg" alt="" title=""/>
            <h3>Leaders across Campus</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Featured Grant</a> <span>Read More</span></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="<?php bloginfo('template_url'); ?>/images/pic3.jpg" alt="" title=""/>
            <h3>Impact Assessments</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Research Report</a> <span>Read More</span></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="<?php bloginfo('template_url'); ?>/images/pic4.jpg" alt="" title=""/>
            <h3>Thumbnail label</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Student Profile</a> <span>Read More</span></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="<?php bloginfo('template_url'); ?>/images/pic5.jpg" alt="" title=""/>
            <h3>It&rsquo;s Time For Practical</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">President&rsquo;s Blog</a> <span>Read More</span></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="<?php bloginfo('template_url'); ?>/images/pic6.jpg" alt="" title=""/>
            <h3 class="spacial-heading">ServIce LEarning In the Old-School Sense</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Grant</a> <span>Read More</span></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box">
            <div class="icon-img"><img src="<?php bloginfo('template_url'); ?>/images/cap-img.png" alt="" title=""/></div>
            <h3>Travel Service Learning</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Article</a> <span>Read More</span></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="<?php bloginfo('template_url'); ?>/images/pic8.jpg" alt="" title=""/>
            <h3 class="spacial-heading">Economic ImpAct Of VolunTeerism</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Syllabus</a> <span>Read More</span></h4>
          </div>
        </div>
      </div>
      <button class="load-more">Load More +</button>
    </div>
  </div><!-- .content-area -->

<?php get_footer(); ?>
