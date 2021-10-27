<?php
/**
 * The template for displaying frontpage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PoliLAB_Theme
 */

get_header(); 
?>

    <section class="site-banner" style="background-image: url(<?php echo get_field('banner_img')['url'] ?>)">
        <div class="container site-banner__mobilebg">
            <div class="site-banner__content">
                <?php if ( get_field('banner_text') ) : ?>
                    <?php echo get_field('banner_text'); ?>
                <?php endif; ?>
                
                <?php if ( get_field('btn_1') ) : ?>
                    <div class="site-banner__mobilebg2">
                        <a class="site-btn" 
                        href="<?php echo get_field('btn_1')['url'] ?>"                     
                        title="<?php echo get_field('btn_1')['title'] ?>"
                        <?php echo get_field('btn_1')['target'] ? 'target='.get_field('btn_1')['target'].' rel="noopener noreferrer"' : '' ?>
                        >
                        
                            <?php echo get_field('btn_1')['title'] ?>
                        </a>
                    </div>
                <?php endif; ?>                
            </div>
        </div>
    </section>

    <?php if ( have_rows('green_boxes') ) : ?>
        <section class="container">
            <div class="info-boxes info-boxes--margin">
            <?php while( have_rows('green_boxes') ) : the_row(); ?>        
                <div class="info-boxes__item">
                    <?php if ( get_sub_field('heading') ) : ?>
                        <h2 class="info-boxes__heading"><?php echo get_sub_field('heading'); ?></h2>
                    <?php endif; ?>           
                    <div class="info-boxes__content">
                        <?php echo wp_get_attachment_image( get_sub_field('icon')['ID'], 'full' ); ?>
                        <?php if ( get_sub_field('desc') ) : ?>
                            <?php echo get_sub_field('desc'); ?>
                        <?php endif; ?>                        
                    </div>
                </div>        
            <?php endwhile; ?>
            </div>       
        </section>
    <?php endif; ?>

    <section class="container aboutus">        
        <?php if ( get_field('image_1') ) : ?>
            <?php echo wp_get_attachment_image( get_field('image_1')['ID'], 'full', '', ["class" => "aboutus__img"] ); ?>
        <?php else: ?>
            <?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', '', ["class" => "aboutus__img"] ); ?>
        <?php endif; ?>
               
        <div class="aboutus__content">
            <?php if ( get_field('heading_1') ) : ?>
                <h2 class="site-heading"><?php echo get_field('heading_1'); ?></h2>
            <?php endif; ?>
            <?php if ( get_field('desc_1') ) : ?>
                <p><?php echo get_field('desc_1'); ?></p>
            <?php endif; ?>
        </div>        
    </section>
    
    <?php if ( have_rows('numbers') ) : ?>
        <section class="numbers" style="background-image: url(<?php echo get_field('bg_1')['url'] ?>)">  
        <?php while( have_rows('numbers') ) : the_row(); ?>
    
            <div class="numbers__item">
                <p class="numbers__counter">
                    <?php the_sub_field('number') ?>
                </p>
                <p class="numbers__desc">
                    <?php the_sub_field('desc') ?>
                </p>
            </div>    
    
        <?php endwhile; ?>
        </section>
    <?php endif; ?>
    
    <section class="how-we-work container">
        <div class="how-we-work__desc">
            <?php if ( get_field('heading_2') ) : ?>
                <h2 class="site-heading"><?php echo get_field('heading_2'); ?></h2>
            <?php endif; ?>
            <?php if ( get_field('desc_2') ) : ?>
                <?php echo get_field('desc_2'); ?>
            <?php endif; ?>
        </div>
        <?php if ( get_field('image_2') ) : ?>
            <?php echo wp_get_attachment_image( get_field('image_2')['ID'], 'full', '', ["class" => "how-we-work__img"] ); ?>
        <?php endif; ?>
    </section>        
    
    <?php
    $loop = new WP_Query( 
        array(
            'post_type' => 'services',
            'posts_per_page' => -1
        )
    );

    if ( $loop->have_posts() ): ?>
        <section>
            <div class="container">
                <h2 class="site-heading site-heading--center">
                    Co możemy <span>dla Ciebie</span> zrobić
                </h2>
            </div>
            <article class="ootb-tabcordion what-we-can-do__tabs">
                <div class="ootb-tabcordion--tabs" role="tablist" aria-label="TabCordion">
                    <?php $i=1; while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <button 
                        class="tab<?php echo $i === 1 ? ' is-active' : '' ?>" 
                        role="tab" 
                        aria-selected="<?php echo $i === 1 ? 'true' : 'false' ?>" 
                        aria-controls="tab<?php echo $i ?>-tab" 
                        id="tab<?php echo $i ?>" 
                        data-title="<?php echo get_the_title() ?>"
                        <?php echo $i !== 1 ? ' tabindex="-1"' : ''; ?>
                    >        
                        <?php echo get_the_post_thumbnail($post->ID); ?>
                        <?php echo get_the_title() ?>
                    </button>

                    <?php $i++; endwhile; ?>
                </div>

                <?php $i=1; while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <section 
                        id="tab<?php echo $i ?>-tab" 
                        class="ootb-tabcordion--entry<?php echo $i === 1 ? ' is-active' : '' ?>" 
                        data-title="<?php echo get_the_title() ?>" 
                        tabindex="<?php echo $i === 1 ? '0' : '1' ?>" 
                        role="tabpanel" 
                        aria-labelledby="tab<?php echo $i ?>"
                    >
                        <div class="ootb-tabcordion--entry-container">
                            <div class="ootb-tabcordion--entry-content">
                                <?php the_content() ?>
                            </div>
                        </div>
                    </section>
                <?php $i++; endwhile; ?>
            </article>
        </section>
    <?php endif;
    wp_reset_query();
    ?>          
        

    
    
<?php 
get_footer();