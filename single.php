
<?php get_header();?>
<!-- single -->
<div class="internas">
                <div class="container">
                    <div class="row">
                        <h1 class="col-md-12">
                            <?php //wp_title(''); ?>
<?php echo get_the_title( get_option( 'page_for_posts' ) ); ?>
                           
                        </h1>
                        <div id="breadcrumbs" class="col-md-12">
                            <div class="breadcrumbs-inner">
                                <?php if ( function_exists('yoast_breadcrumb') ) {
                                yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row posts">
                        <section>
                        
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                        
                            <article class="box-post">
                                <?php the_post_thumbnail() ?>
                                <h2 class="the-title"> <?php the_title(); ?></h2>
                                
                                <?php the_content(); ?>
                            </article>
                            <?php endwhile; ?>   
                            <?php endif; ?>
                        </section> 
                    </div>
                </div>
                
       </div>
<?php get_footer();?>