<?php
/*
Template Name: Contact Template
*/
?>

<?php get_header(); ?>



<div class="main-container" id="page-contact">

    <div class="main wrapper clearfix">

        <div id="contentwrapper">

            <article>

                <section> 
                    <div id="content">
                        <?php

                        $contacts = get_field('contacts'); 

                        $posttype = get_field('row_type_name'); 

                        if ($posttype) {
                            $args = array( 'post_type' =>  $posttype, 'posts_per_page' => 10, 'orderby' =>'menu_order', 'order' => 'ASC');

                            $loop = new WP_Query( $args );

                            $posts = array(); 
                            foreach ($loop->get_posts() as $post) {
                                $posts[] = (array)$post;
                            }

                            $count = 1;
                            while ( $loop->have_posts() ) : $loop->the_post(); 
                            ?>
                                <div class="location">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php if (get_field("company")) { the_field("company"); echo "<br/>"; }?>
                                    <?php if (get_field("address_1")) { echo "<span class='address'>"; the_field("address_1"); echo "<br/>";  }?>
                                    <?php if (get_field("address_2")) { the_field("address_2"); echo "<br/>";  }?>
                                    <?php if (get_field("address_1")) { the_field("address_1"); echo "</span>"; }?>
                                    </p>
                                </div>
                                <?php
                                foreach($contacts as $contact) {
                                    if(get_the_title()==$contact['location']){
                                ?>
                                    <div class="contact">                        
                                        <h5><?=$contact['occupation'];?></h5>
                                        <p>
                                        <?=$contact['first_name']." ".$contact['last_name'];?><br/>
                                        <?php if($contact['companies'] != '') { echo $contact['companies'] ."<br/>"; } ?>
                                        <?php if($contact['address_1'] != '') { echo $contact['address_1'] ."<br/>"; } ?>
                                        <?php if($contact['address_2'] != '') { echo $contact['address_2'] ."<br/>"; } ?>
                                        <?=$contact['phone'];?><br/>
                                        <a href="mailto:<?=$contact['email'];?>"><?=$contact['email'];?></a>

                                        </p>
                                    </div>
                                <?
                                    }    
                                }
                                ?>  
                            <?php  
                                endwhile; 
                            }

                        ?>                    
                    </div>
                </section>
            </article>
        </div>
    </div>
</div>

<?php get_footer(); ?>