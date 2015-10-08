<?php
/*
Template Name: home
*/
?>
<?php get_header();?>
            <div class="banner  cycle-slideshow " id="banner" data-cycle-swipe=true
    data-cycle-swipe-fx=scrollHorz>
            <!--<div class="banner  cycle-slideshow " id="banner" data-cycle-fx=scrollHorz data-cycle-timeout=2000 >-->
                <div class="cycle-pager"></div>
                <div class="cycle-prev"></div>
            <div class="cycle-next"></div>
                <?php 
                    $args = array( 'post_type' => 'banner', 'posts_per_page' => 4 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    
                        $valor = get_post_custom_values('rel'); 
                         ?>
                        <?php the_post_thumbnail('banner-slider', array( 'rel' => $valor[0] )) ;
                        //the_post_thumbnail('large', array( 'rel' => 'lorem' ))


                        ?>
                        
                    <?php
                        endwhile;
                    ?>
                    
                
            </div>
        </header>
        <section class="content center chamada container grid">
            <h1><?php if($data['title_destaque']){
                    echo $data['title_destaque'];
                }else{
                    echo "We Provide";
                } ?></h1>
            <hr>
            <p> <?php if($data['text_destaque']){
                    echo $data['text_destaque'];
                }else{
                    echo "From an idea to an unforgettable experience. Always pushing to make beautiful analog
or digital products combined with emotion and produced with excellence.";
                } ?></p>
        </section>
        <section class="section portfolio container-fluid">
            <div class="content center container">
                <div class="row photo-grid" >
                    <?php 
                    $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 6 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <?php
                    $image_id = get_post_thumbnail_id();
                    $image = wp_get_attachment_image_src($image_id,$size);
                    
                    $image_url = $image[0];
                    $image_w = $image[1];
                    $image_h = $image[2];
                    
                    ?>
                        <div class="img col-sm-4">
                            
                                <figure class="center-block">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('portfolio_mini', array('data-img' => 'epaaa' )) ?></a>
                                    <figcaption><span><a href="<?php echo esc_url( home_url() )  ?>/portfolio" ><i class="icon-arrow-right2"></i></a></span><span class="oi"><a href="#" data-toggle="modal" data-img="<?php echo $image_url ?>" data-w="<?php echo $image_w ?>" data-h="<?php echo $image_h ?>" data-target="#lightbox"><i class="icon-plus"></i></a></span></figcaption>
                                </figure>
                            
                        </div>
                        
                        
                    <?php
                        endwhile;
                    ?>
                    
                   
                </div>
                
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 ">
                        <a href="<?php echo esc_url( home_url() )  ?>/portfolio" class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 button transition">Veja Mais</a>
                    </div>
                </div>
            </div>
        </section>

        <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="" alt="" />
                    </div>
                </div>
            </div>
        </div>
       
<?php get_footer();?>