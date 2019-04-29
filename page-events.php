<?php

/*

Template Name:Events Template

*/

?>

<?php get_header(); ?>


<div class="main-container page-event">
    <div class="main wrapper clearfix">
        <div id="contentwrapper">
            <article>
                <section>
                    <div id="slider clearfix"> 
                        <?php //echo get_new_royalslider(4); ?>
                        <?php the_field('slider'); ?>
                    </div>              
                    <div id="content">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                            <?php

                                $events = get_field('events');
                                $count = 1;
                           
                                ?>
                                <?php
                                 if (!empty($events)) {
                                    foreach($events as $event) {

                                     $bottom_link =$event['event_more_link'] ;
                                ?>
                                    <div class="event <?=$addClass?>">
                                      <div class="event-title"><?=$event['event_title'] ?></div>
                                       <div class="event-content">
                                            <div class="event-thumb">                                      

                                                <?php
                                                echo '<img src=' . $event['event_thumbnail'] . '>';                                    
                                                ?>
                                                   
                                            </div>
                                            <?php if(( $event['event_date'] != "" ) || ( $event['event_location'] != "" )) {
                                            ?>
                                            <?php if( $event['event_date'] != "" ) {
                                                echo "<strong>" . $event['event_date'] . "</strong>" ."</br>";
                                            }
                                            ?>

                                            <?php if( $event['event_location'] != "" ) {
                                                echo  $event['event_location']  . "</br>";
                                            }
                                            ?>
                                            <?
                                            echo "</br>";
                                            }
                                            ?>
                                            <?=$event['event_description'] ?>
                                            
                                            <?php
                                           
                                            if ($bottom_link) { 
                                            ?>
                                            <a href="<?=$event['event_more_link']; ?>" class="row_link"><?=$event['event_more_text']; ?></a>
                                            <?php } ?>
                                            <?php
                                   
                                            if ($event['read_more_1_title'] != "") { 
                                                if($event['read_more_1_link_doc']!="") {
                                            ?>
                                            <a target="_blank" href="<?=$event['read_more_1_link_doc']; ?>" class="row_link"><?=$event['read_more_1_link_title']; ?></a>
                                            <?php 
                                                } elseif ($event['read_more_1_link_url']!="") {
                                            ?>
                                            <a target="_blank" href="<?=$event['read_more_1_link_url']; ?>" class="row_link"><?=$event['read_more_1_link_title']; ?></a>
                                            <?php    
                                                } 
                                            }
                                            ?>

                                        </div>

                                        <br clear="all" />
                                    </div>
                                <?php
                                        $count++;   
                                        }
                                    }                                           
                                ?>
                                                      
                            <?php endwhile; ?>

                        <?php endif; ?>

                    </div>
                    </section>
                </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>