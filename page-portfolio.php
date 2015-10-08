<?php/*
Template Name: portfolio
*/?>

<?php get_header();?>      
           
          <div class="internas">
                    <div class="container">
                        <div class="row">
                            <h1>Portfolio</h1>
                            <div id="breadcrumbs">
                                <div class="breadcrumbs-inner">
                                    <?php if ( function_exists('yoast_breadcrumb') ) {
                                        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>

            <nav  class="filtro">
                    <div class="container">
                        <div class="row">
                            <header class="">
                                <div id="options" class="mk-grid">
                                    <ul class="align-left">

                                      <?php
                                            $terms = get_terms("portfolio-categories");
                                            $count = count($terms);
                                                echo '<li><a href="javascript:void(0)" title="" rel="all" class="active">All</a></li>';
                                            if ( $count > 0 ){
                                 
                                                foreach ( $terms as $term ) {
                                 
                                                    $termname = strtolower($term->name);
                                                    $termname = str_replace(' ', '-', $termname);
                                                    echo '<li><a href="javascript:void(0)" title="" rel="'.$termname.'">'.$term->name.'</a></li>';
                                                }
                                            }
                                        ?>
                                     
                                    </ul>
                                    
                                </div>
                            </header>
                        </div>
                    </div>
            </nav>
            <div class="container-fluid">
                <div class="row lightbox">
                  <ul class="grid effect-2 slow " id="grid">
                    <?php $args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <?php 
                        $terms = get_the_terms( $post->ID, 'portfolio-categories' );            
                            if ( $terms && ! is_wp_error( $terms ) ) : 
                 
                                $links = array();
                 
                                foreach ( $terms as $term ) {
                                    $links[] = $term->name;
                                }
                 
                                $tax_links = join( " ", str_replace(' ', '-', $links));          
                                $tax = strtolower($tax_links);
                            else :  
                          $tax = '';          
                            endif; 
                        ?>
                    <?php
                    $category = get_the_category(); ?>
                    <?php
                    $image_id = get_post_thumbnail_id();
                    $image = wp_get_attachment_image_src($image_id,$size);
                    
                    $image_url = $image[0];
                    $image_w = $image[1];
                    $image_h = $image[2];
                    
                    ?>

                    <li class="post-box <?php echo $tax ?> " >
                        <figure class="center-block">
                            <a href="#" data-toggle="modal" data-img="<?php echo $image_url ?>" data-w="<?php echo $image_w ?>" data-h="<?php echo $image_h ?>" data-target="#lightbox"><?php the_post_thumbnail() ?></a>
                            
                        </figure>
                    </li>
                    <?php endwhile; ?>                 
                    
                  </ul>
                  
                </div>
            </div>

           <script>
              $(function(){

                var $container = $('#grid');

                $container.isotope({
                  itemSelector: '.post-box'
                });

                $container.imagesLoaded( function() {
                  $container.isotope('layout');
                });

                $('#options').on( 'click', 'button', function() {
                  var filterValue = $(this).attr('data-filter');
                  $container.isotope({ filter: filterValue });
                });

              });
            </script>
            


       
                
           
<?php get_footer();?>