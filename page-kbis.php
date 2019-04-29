<?php 
/** 
Template Name: KBIS Template 
**/ 
?>

<?php get_header(); ?>


<div class="main-container page-kbis">
     <div class="main wrapper clearfix">
          <div id="contentwrapper">
               <article>
                    <section> 
                      <div id="slider clearfix"> 
                        <!-- Start Slider-->
                        <?php echo get_new_royalslider(3); ?>
                        <!-- End Slider --> 
                      </div>          										 
                      <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?> 
                       
                        <div id="content">                      
                        <div id="content-header">  
                            <h1><?php the_title(); ?></h1>
                          </div> 
                        </div> 
                        <div id="content-body">  
                            <?php the_content(); ?>                                                      
                          </div>
                        <?php endwhile; ?>  
                      <?php endif; ?>       
                    </section>
               </article>
          </div>
     </div>
</div>

<?php get_footer(); ?>