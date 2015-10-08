
<?php
/*Template Name: blog*/
?>
<?php get_header();?>
<!-- blog -->
<div class="internas">
                <div class="container">
                    <div class="row">
                        <h1 class="col-md-12">
                            <?php wp_title(''); ?>
                           
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
                        
                            <?php 
                                $args = array( 'post_type' => 'post', 'showposts' => 4, 'paged'=>$paged);
                                $loop = new WP_Query( $args );
                                while ( $loop->have_posts() ) : $loop->the_post();
                            ?>
                            <article class="box-post">
                                <a href="<?php the_permalink()?>"><?php the_post_thumbnail() ?></a>
                                <h2 class="the-title"> <a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2>
                                
                                <p><?php echo get_the_excerpt();?></p>
                                <a class="mk-readmore" href="<?php the_permalink()?>"><i class="icon-arrow-right2"></i>Leia Mais</a>

                            </article>
                            <?php endwhile; ?> 

                            
                        </section> 
                        <!--paginação-->
                        <?php tutsup_paged_post() ?>


                    </div>
                </div>
                
       </div>
<?php get_footer();?>