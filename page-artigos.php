<?php get_header();?>
<!-- index -->
       <div class="internas">
                <div class="container">
                    <div class="row">
                        <h1 class="col-md-12">
                            Artigos
                           
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
                                <a href="<?php the_permalink()?>"><?php the_post_thumbnail() ?></a>
                                <h2 class="the-title"> <a href="<?php the_permalink()?>"><?php the_title(); ?></a></h2>
                                
                                <p><?php echo get_the_excerpt();?></p>
                                <a class="mk-readmore" href="<?php the_permalink()?>"><i class="icon-arrow-right2"></i>Leia Mais</a>

                            </article>
                            <?php endwhile; ?>   
                            <?php endif; ?>
                        </section>
                        <?php
                            $paginas = paginacao();
                            if ( ! empty( $paginas ) ): 
                        ?> 
                            <div class="paginacao">
                                <?php echo $paginas;?>
                            </div>
                        <?php endif; ?>
                         <!--<aside class="col-md-4">
                            <?php //get_sidebar(); ?>
                        </aside>-->
                    </div>
                </div>
                
       </div>
                
           
<?php get_footer();?>