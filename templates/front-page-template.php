<?php
/**
 * Template Name: Front Page Template
 */
get_header();


?>

<?php $langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str'); ?>



    
    <!--<img class="absHeaderImg" src="<?php echo bloginfo('template_directory'); ?>/images/intro_bg.png" />-->
    
    
        
    <section class="header">
		<h2 style="display: none;">The Code Design</h2>
        <div class="container">
            <div class="header-menu-block">
                <div class="close-mobile-menu"></div>
                <div class="logo">
                     <img src="<?php echo bloginfo('template_directory'); ?>/images/logoSmall.png" alt="" />
                </div>
                
                <div class="main-menu">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'menu_class' => '',
                            'container' => 'ul'
                        ));
                    ?>
                </div>
                <div class="languages">
                    <?php do_action('icl_language_selector'); ?>
                </div>
            </div>
            <div class="open-mobile-menu"></div>
            <div class="big-logo">
                <img src="<?php echo bloginfo('template_directory'); ?>/images/logoBig.png"  alt="" />
                <div class="text">
                    <?php                

                        $args = array ( 'post_type' => 'post', 'category_name' => 'logo-text', 'post_per_pages' => 1 );
                        $the_query = new WP_Query( $args );              
                        // The Loop
                        if ( $the_query->have_posts() ) {

                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();

                            the_content(); 

                            }
                        } else {
                                // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        <div class="toPageArrow pT150">
            <?php $about =  get_term_by('slug', 'about', 'category'); ?>
            <a data-page='about' class="about">
                <?php echo $about->name; ?>
                <div class="arrowImg">
                    <img src="<?php bloginfo('template_directory'); ?>/images/arrowBottomW.png"  alt="" />
                </div>                
            </a>            
        </div>
    </section>
        
    <section id="about" class="about">
        <div class="container">
		    <h2 style="display:none">We love what we do</h2>
            <?php                

                $args = array ( 'post_type' => 'post', 'category_name' => 'about', 'post_per_pages' => 1 );
                $the_query = new WP_Query( $args );              
                // The Loop
                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();

                    ?>
                        <div class="title">
                            <?php the_content(); ?>
                        </div>
                    <?php

                    }
                } else {
                        // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            ?>

            <div class="content-row">
                <?php                

                $language = ICL_LANGUAGE_CODE;
                $the_query = new WP_Query( 'post_type=about&language=' . $language );
                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                    $the_query->the_post(); 
                ?>
                    <div class="about-item">
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                        ?>
                        <div class="text">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                <?php    }

                } else {
                // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                ?>                 

            </div>
        </div>
        <div class="toPageArrow">
            <?php $services =  get_term_by('slug', 'services', 'category'); ?>
            <a data-page='services' class="services">
                <?php echo $services->name; ?>
                <div class="arrowImg">
                    <img src="<?php bloginfo('template_directory'); ?>/images/arrowBottomB.png"  alt="" />
                </div>                
            </a>            
        </div> 
    </section>
        
    <section id="services" class="services">     
        <div class="container">    
            <?php                
                                           
                $args = array ( 'post_type' => 'post', 'category_name' => 'services' );

                $the_query = new WP_Query( $args );              
                // The Loop
                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        
                    ?>
                            <div class="title">
                                <img src="<?php bloginfo('template_directory'); ?>/images/shape3.png"  alt="" />
                                <h2><?php the_title(); ?></h2>
                                <div class="desc"><?php the_excerpt(); ?></div>
                            </div>
                        <?php

                    }
                } else {
                        // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            ?>            
            
            <div class="services-row">
            <?php                

                $language = ICL_LANGUAGE_CODE;
                $the_query = new WP_Query( 'post_type=services&language=' . $language );
                // The Loop
                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                    $the_query->the_post(); ?>

                    <div class="item">
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                        ?>
                        <h3><?php the_title(); ?></h3>
                        <div class="text">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                <?php    }

                } else {
                // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
            ?> 
            </div>
        </div>       
            
        <div class="toPageArrow">
            <?php $portfolio =  get_term_by('slug', 'portfolio', 'category'); ?>
            <a data-page='portfolio' class="portfolio">
                <?php echo $portfolio->name ?>
                <div class="arrowImg">
                    <img src="<?php bloginfo('template_directory'); ?>/images/arrowBottomB.png"  alt="" />
                </div>                
            </a>            
        </div>        
    </section> 

    <?php                

        $language = ICL_LANGUAGE_CODE;
        $the_query = new WP_Query( 'post_type=portfolio&language=' . $language );
        // The Loop
        $pager = '';
        $portfolioCnt = '';
        $i = 0;
        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $terms = get_the_terms(get_the_ID(), 'protfolio_cat' );
            $catName = $terms[0]->name;

            $pager .= '<a data-slide-index="'.$i.'" href="">
                            <div class="title">'.get_the_title().'</div>
                            <div class="sub">'.$catName.'</div>
                        </a>';

            $portfolioCnt .= '<li>
                                <div class="left">
                                    <div class="title">'.  get_the_title().'</div>
                                    <div class="desc">'.get_the_excerpt().'</div>
                                    <div class="button">
                                        <a class="more" href="#">more about this project</a>
                                    </div>
                                </div>
                                <div class="right">'.get_the_post_thumbnail().'</div>                   
                            </li>';

            $i++;
            }

        } else {
        // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    ?> 

    <section id="portfolio" class="portfolio">
		<h2 style="display: none;">The Code Design Portfolio</h2>
        <div class="container">

            <div id="bx-pager">
                <div class="inner">
                    <?php echo $pager; ?>
                </div>
            </div>

            <ul class="bxslider">
                <?php echo $portfolioCnt; ?>
            </ul>
        </div>  
        <div class="toPageArrow hireUs">
            <?php $hire =  get_term_by('slug', 'hire', 'category'); ?>
            <a data-page='hire' class="hire">
                <?php echo $hire->name; ?>
                <div class="arrowImg">
                    <img src="<?php bloginfo('template_directory'); ?>/images/arrowBottomG.png"  alt="" />
                </div>                
            </a>            
        </div>
    </section> <!-- /#portfolio -->


    <section id="hire" class="hire">
        <div class="form-block">           
            
            <?php echo do_shortcode('[contact-form-7 id="22" title="Contact form 1"]'); ?>
            
        </div>
        <div class="container">
            <div class="footer-row">
                <div class="absRight"></div>
                <div class="absLeft"></div>

                <div class="left">                
                    <img class="footer-logo" src="<?php bloginfo('template_directory'); ?>/images/logoFooter.png" alt="" />

                    <?php                

                        $args = array ( 'post_type' => 'post', 'category_name' => 'footer-text', 'post_per_pages' => 1 );
                        $the_query = new WP_Query( $args );              
                        // The Loop
                        if ( $the_query->have_posts() ) {

                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); ?>

                                <div class="sub"><?php the_title(); ?></div>
                                <div class="text"><?php the_content(); ?></div>

                    <?php        }
                        } else {
                                // no posts found
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    ?>


                    <div class="contacts">
                        <div class="copy">Copyright © 2016 thecodedesign. Privacy Policy</div>
                        <div class="email">mail@thecode.deign</div>
                        <div class="phone">+374 55 510150</div>
                    </div>
                </div>
                <div class="right">
                    <div class="toTopIcon">
                        <img src="<?php bloginfo('template_directory'); ?>/images/go_to_top_button.png" alt="" />
                    </div>

                    <div class="footer-menu">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'menu_class' => '',
                                'container' => 'ul'
                            ));
                        ?>
                    </div>
                    <div class="social-links">
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/icon_gplus.png" alt="" /></a>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/icon_in.png" alt="" /></a>
                        <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/icon_tw.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

<?php get_footer(); ?>