<?php get_header();?>
       <!-- page -->
        
           <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           <div class="internas">
                    <div class="container">
                        <div class="row">
                            <h1>
                                <?php the_title(); ?>
                            </h1>
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
        	<div class="container">
                        <div class="row">
                            <div class="col-sm-12">

                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
            
                <?php endwhile; ?>                 
                <?php endif; ?>
        

       
                
           
<?php get_footer();?>