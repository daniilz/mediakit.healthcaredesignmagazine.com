<?php

/** 
Template Name: Audience Template 
**/

?>

<?php get_header(); ?>

<div id="audience" class="main-container">
    <div class="main wrapper clearfix">
        <div id="contentwrapper">
           <article>
              <section>                    
					<div id="slider clearfix"> 
					  <?php echo get_new_royalslider(2); ?>
					</div> 
					    <?php if (have_posts()) : ?>
					    <?php while (have_posts()) : the_post(); ?>       				
	                    <div class="content">
                        
                        <span class="title"><h3><? the_field('page_title'); ?></h3></span>                     
	                      <div class="main-content">
	                        <?php the_field('main_content'); ?>                        
	                      </div>                 
	                    </div>
	                    <?php if(get_field('pdf_1_title')!="") { ?>   
                        <div class="pdfs-container">
                            <span class="pdf-link"><a href="<? the_field('pdf_1_link'); ?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?  the_field('pdf_1_title'); ?></a></span><br /><br />
                        <?php if(get_field('pdf_2_title')) { ?>    
                            <span class="pdf-link"><a href="<? the_field('pdf_2_link'); ?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?  the_field('pdf_2_title'); ?></a></span><br /><br />
                        <? } ?>   
 						<?php if(get_field('pdf_3_title')) { ?> 
                        <span class="pdf-link"><a href="<? the_field('pdf_3_link'); ?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?  the_field('pdf_3_title'); ?></a></span><br /><br />
                        <? } ?>
                        <?php if(get_field('pdf_4_Title')) { ?> 
                        <span class="pdf-link"><a href="<? the_field('pdf_4_link'); ?>" target="_blank"><img src="/prod/wp-content/themes/hdmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?  the_field('pdf_4_Title'); ?></a></span><br /><br />
                        <? } ?>
                        <?php if(get_field('note')) { ?> 
                        <br /><div class="note">
                            <span><? the_field('note'); ?></span>
                        </div><br />
                      <? } ?>                                                     
                        </div>
                    	<? } ?> 
                         
                    </div>           	
					  <?php endwhile; ?>
					<?php endif; ?>
				</section>
  			</article>
  		</div>
	 </div>	
</div>     
<?php get_footer(); ?>