<?php 
//Template Name: Home

get_header(); ?>

  <!--=====Header End===!-->
  
  
  
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			the_content();

		// End the loop.
		endwhile;
	?>
  
  <!--=====EVENT Sec===!-->
  
  <?php 
	$eventList = get_events ();
	
	$eventList = array_reverse( $eventList );
	 
	 if( count( $eventList ) > 0 ){
  ?>
  
  <div class="container dextop-view">
    <div class="event-product">
      <h1>FEATURED EVENTS <span><a href="<?php echo events_get_events_link ();//echo site_url().'/events/'; ?>">See All</a></span></h1>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="slide-warp">
        <ul>
		<?php foreach( $eventList as $event ){
		
			setup_postdata( $event ); 
		
			$id = $event->ID;
		
			$venue = sp_get_venue ( $event->ID );
			$date = sp_get_start_date (  $event->ID = null, $showtime = false, $dateFormat = '' );
			$guid = $event->guid;
			
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' );
			
			$url 	= $thumb['0'];
			
			//echo tribe_event_featured_image( $id, 'full', false );
		?>
		
          <li class="col-lg-4 col-sm-4 col-md-4">
		  
		  <a href="<?php echo $guid;?>">
            <div class="event-box">
              <div class="post-date">
                <h2><?php echo $date;?> <span><?php echo $venue;?></span></h2>
                
					<?php if( $url != '' ){ ?>
					<img src="<?php echo $url;?>" alt="" title="" width="135" />
					<?php }else{ ?> 
					<img src="<?php echo bloginfo('template_url'); ?>/images/post-pic.png" alt="" title=""/> <?php }?>
				</div>
              <div class="post-info">
                <p><?php echo do_shortcode($event->post_content);?></p>
                <h3><?php echo $venue; ?> <span> <?php echo $date;?></span></h3>
                <i class="icon-hover"></i> </div>
              <div class="clearfix"></div>
            </div>
			</a>
          </li>
		  
		  <?php }?>
         
        </ul>
      </div>
    </div>
  </div>
  
 
 <?php }?>
 
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
            <li><a href="#"><img src="images/drop.png" alt="" title=""/></a></li>
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
          <div class="resu-box"> <img src="images/pic1.jpg" alt="" title=""/>
            <h3>Uniting for Health</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Program Model <span>Read More</span></a></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="images/pic2.jpg" alt="" title=""/>
            <h3>Leaders across Campus</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Featured Grant <span>Read More</span></a></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="images/pic3.jpg" alt="" title=""/>
            <h3>Impact Assessments</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Research Report  <span>Read More</span></a></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="images/pic4.jpg" alt="" title=""/>
            <h3>Thumbnail label</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Student Profile <span>Read More</span></a></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="images/pic5.jpg" alt="" title=""/>
            <h3>It’s Time For Practical</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">President’s Blog <span>Read More</span></a></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="images/pic6.jpg" alt="" title=""/>
            <h3 class="spacial-heading">ServIce LEarning In the Old-School Sense</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Grant <span>Read More</span></a></h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box">
            <div class="icon-img"><img src="images/sea-pic.png" alt="" title=""/></div>
            <div class="search-heading">ServIce LEarning In the Old-School Sense</div>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. Lorem ipsum dolor sit amet,</p>
            <div class="new-link"><a href="#">Research Report</a></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="resu-box"> <img src="images/pic8.jpg" alt="" title=""/>
            <h3 class="spacial-heading">Economic ImpAct Of VolunTeerism</h3>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <h4><a href="#">Syllabus <span>Read More</span></a></h4>
          </div>
        </div>
      </div>
      <button class="load-more">Load More +</button>
    </div>
  </div>
  
  
 


<?php get_footer(); ?>