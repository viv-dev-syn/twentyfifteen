<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	
	<!--=====Footer Sec===!-->
  <footer class="footer-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="footer-logo"> <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/kpmg-logo.jpg" alt="" title=""/></a>
            <p>We are a 501-c3 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
            <button>Donate</button>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6">
          <h2 class="footer-h" id="click1"><a href="javascript:void(0)">Who we are</a></h2>
		  <?php 
		  /////// Show 'Who we are' menu can manage from admin section.
		  $defaults = array(
			'menu'            => 'Who we are',
			'echo'            => true,
			'before'          => '',
			'after'           => '',
			'items_wrap'      => '<ul id="link-list1" class="footer-list">%3$s</ul>',
			'walker'          => ''
		);
				wp_nav_menu( $defaults ); ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="wap-div">
            <h2 class="footer-h" id="click2"><a href="javascript:void(0)">What we do</a></h2>
            
			<?php 
		  /////// Show 'What we do' menu can manage from admin section.
		  $defaults2 = array(
			'menu'            => 'What we do',
			'echo'            => true,
			'before'          => '',
			'after'           => '',
			'items_wrap'      => '<ul id="link-list2" class="footer-list">%3$s</ul>',
			'walker'          => ''
		);
				wp_nav_menu( $defaults2 ); ?>
			
			<!--<ul class="footer-list2">
              <li><a href="#">Catalyze Campus Engagement</a></li>
              <li><a href="#"><span>&middot;</span> Student Civic Learning</a></li>
              <li><a href="#"><span>&middot;</span> Faculty Teaching & Scholarship</a></li>
              <li><a href="#"><span>&middot;</span> Promote Excellence & Innovation</a></li>
              <li class="last-list"><a href="#">Build Communities</a></li>
              <li class="last-list"><a href="#">Promote Learning and Success</a></li>
            </ul> -->
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-6">
          <div class="wap-div2">
            <h2 class="footer-h" id="click3"><a href="javascript:void(0)">Resources</a></h2>
            <ul class="footer-list" id="link-list3">
              <li><a href="#">By Author</a></li>
              <li><a href="#">By Date</a></li>
              <li><a href="#">By Discipline</a></li>
              <li><a href="#">By Topic</a></li>
              <li><a href="#">By Type</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-6">
          <div class="wap-div">
            <h2 class="footer-h" id="click4"><a href="javascript:void(0)">Quick Links</a></h2>
            <?php 
		  /////// Show 'Quick Links' menu can manage from admin section.
		  $defaults4 = array(
			'menu'            => 'Quick Links',
			'echo'            => true,
			'before'          => '',
			'after'           => '',
			'items_wrap'      => '<ul id="link-list4" class="footer-list">%3$s</ul>',
			'walker'          => ''
		);
				wp_nav_menu( $defaults4 ); ?>
			
			 
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6">
          <h2 class="footer-h" id="click5"><a href="javascript:void(0)">Contact Us</a></h2>
          <p class="email-d">info@campuscompact.com</p>
          <p class="email-d2">Phone: 617.357.1881<br/>
            Fax: 617.357.1889i</p>
          <p class="email-d3">Campus Compact National Office 45 Temple PlaceBoston, MA 02111</p>
          <ul class="media-icon">
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/fb.png" alt="" title=""/></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/tw.png" alt="" title=""/></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/go.png" alt="" title=""/></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/in.png" alt="" title=""/></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="footer-se">
        <div class="row">
          <div class="col-lg-8 col-sm-8 col-sm-8">
            <p>Copyright &copy; 2015 All Rights Reserved</p>
          </div>
          <div class="col-lg-4 col-sm-4 col-sm-4">
            <div class="search-section">
             <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
	<!--=====Mobile Footer Sec===!-->
  <footer class="mobile-footer">
    <div class="mob-logo"> <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/kpmg-logo.jpg" alt="" title=""/></a>
      <p>We are a 501-c3 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
      <button>Donate</button>
    </div>
    <div class="quick-link">
      <div class="link-left">
        <h1>Quicl links</h1>
        <ul class="mob-list">
          <li><a href="#">Resources</a></li>
          <li><a href="#">Bookstore</a></li>
          <li><a href="#">Press Releases</a></li>
          <li><a href="#">News & Blogs</a></li>
          <li><a href="#">Events</a></li>
          <li><a href="#">Jobs & Grants</a></li>
          <li><a href="#">Donate</a></li>
          <li><a href="#">Site map</a></li>
        </ul>
      </div>
      <div class="contact-right">
	  
        <!-- contact us call from admin of widget section.-->
		<?php if ( is_active_sidebar( 'contact-us-footer' ) ) : ?>
			<?php dynamic_sidebar( 'contact-us-footer' ); ?>
		<?php endif; ?> 
		
		
        <ul class="mo-media">
          <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/fb.png" alt="" title=""/></a></li>
          <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/tw.png" alt="" title=""/></a></li>
          <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/go.png" alt="" title=""/></a></li>
          <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/in.png" alt="" title=""/></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <div class="mob-button">
        <div class="search-section">
         <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
        </div>
      </div>
    </div>
  </footer>

</div><!-- .site -->

<?php wp_footer(); ?>


<script type="text/javascript">
$('ul.sub-menu li a').prepend('<span>&middot;</span> ');

   $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
	
// Menu Script
	
$('.menu-lick').click (function(){
  $('.top-sec').slideToggle();
});

$('.search-click').click (function(){
  $('.second-part').slideToggle();
});

$('#click1').click (function(){
  $('#link-list1').slideToggle();
});	

$('#click2').click (function(){
  $('.footer-list2').slideToggle();
});

$('#click3').click (function(){
  $('#link-list3').slideToggle();
});

$('#click4').click (function(){
  $('#link-list4').slideToggle();
});

</script>
</body>
</html>
