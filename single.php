<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area main-container">
		<!-- <main id="main" class="site-main" role="main"> -->

		<?php
		// Start the loop.
		
	//	while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			 
			  //get_template_part( 'content', get_post_format() );
		
			// If comments are open or we have at least one comment, load up the comment template.
			/* if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; */

			// Previous/next post navigation.
			/* the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) ); */

		// End the loop.
		//endwhile;
		?>

		<!-- </main> -->
		<!-- .site-main -->
		<?php $ptype = $post->post_type;
			?>
		
<div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="resource-serch">
		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_bloginfo('home'); ?>">
          <input type="text" placeholder="Search the Resource Library" name="s" id="s" class="srcch-text"/>
          <input type="submit" value="" class="search-button"/>
		 </form>
          </div>
      </div>
    </div>
    <div class="event-product">
      <h1>SUCCESS STORIES <span><a href="<?php echo get_bloginfo('home') ?>/blog/<?php echo $ptype;?>">See All</a></span></h1>
      <div class="clearfix"></div>
    </div>
	<?php while ( have_posts() ) : the_post(); ?>
    <div class="succes-infoMain">
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-7">
          <div class="succes-infoLeft">
		  <?php
		  $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			?>
            <div class="program-bammer" style="background: url('<?php echo $url; ?>')no-repeat scroll center center rgba(0, 0, 0, 0) !important;"> <a href="#"><img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/red-star.jpg" alt="" title=""/></a>
              <div class="clearfix"></div>
			  <?php $tags =  get_the_category($post->ID); 
				
				if ($tags) {
				$catname = $tags[0]->name; ?>
              <h2><a href="#"><?php echo $catname; ?></a></h2>
			  <?php } ?>
            </div>
            <h3 class="program-date"><?php the_date();?></h3>
            <h4><?php  the_title();?></h4>
            <?php the_content();?>
			<?php  $avatar_url1 = get_avatar( $post->post_author);  ?>
            <div class="by-owder"><?php echo $avatar_url1; ?> <span>by <?php the_author();?></span></div>
          </div>
        </div>
		<?php endwhile; ?>
		
        <div class="col-lg-5 col-md-5 col-sm-5">
          <div class="related-right-box">
            <h1>Related Articles</h1>
            <ul>
              <li>
			  <?php 
				$tags =  get_the_category($post->ID);
				
				if($ptype == 'resource-posts'){
					$arg1 = "resource_type'=>'news',";
				}
				//echo get_post_format();
				if ($tags) {
				$name = $tags[0]->name;
				$first_cat = $tags[0]->term_id;
				$args=array(
				$arg1,
				'post__not_in' => array($post->ID),
				'posts_per_page'=>5,
				'caller_get_posts'=>1,
				'post_type'=>$ptype,
				);
				$my_query = new WP_Query($args); 
				if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post(); 
				$url1=""; 
				 $url1 = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				?> 
                <div class="diffrent-program">
                  <div class="program-box-1"> <?php if(!empty($url1)){ ?> 
				  <img src="<?php echo $url1; ?>" alt="" title=""/>
				  <?php } ?>
                    <div class="red-icom"><a href="#"><img src="<?php echo get_bloginfo('stylesheet_directory');?>/images/red-star.jpg" alt="" title=""/></a></div>
                    <h2><a href="<?php echo get_permalink(); ?>"><?php echo $name; ?></a></h2>
                  </div>
                  <div class="program-boxInfo">
                    <div class="program-date2"><?php the_date(); ?></div>
                    <h1><?php the_title(); ?></h1>
					<?php  $avatar_url = get_avatar( $post->post_author);  ?>
					<div class="by-owder"><?php echo $avatar_url;?>by <?php the_author();?></div> 
					
					
                  </div>
                  <div class="clearfix"></div>
                </div>
				<?php endwhile;  
				}
				wp_reset_query();
				}
				?>
                
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

	</div><!-- .content-area -->

<?php get_footer(); ?>
