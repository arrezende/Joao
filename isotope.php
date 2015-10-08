<?php 
/*
Template Name: isotipe
*/
get_header(); ?>
 <!-- isotope.php -->
  <div id="page">
 
    <ul id="filters">
        <?php
            $terms = get_terms("portfolio-categories");
            $count = count($terms);
                echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active">All</a></li>';
            if ( $count > 0 ){
 
                foreach ( $terms as $term ) {
 
                    $termname = strtolower($term->name);
                    $termname = str_replace(' ', '-', $termname);
                    echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                }
            }
        ?>
    </ul>
 
    <div id="portfolio">
 
    <?php 
       $args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
       $loop = new WP_Query( $args );
         while ( $loop->have_posts() ) : $loop->the_post(); 
 
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
 
        echo '<div class="all portfolio-item '. $tax .'">';
        echo '<a href="'. the_permalink() .'" title="'. the_title_attribute() .'">';
        echo '<div class="thumbnail">'. the_post_thumbnail() .'</div>';
        echo '</a>';
        echo '<h2>'. the_title() .'</h2>';
        echo '<div>'. the_excerpt() .'</div>';
        echo '</div>'; 
      endwhile; ?>
 
   </div><!-- #portfolio -->
 
  </div><!-- #page -->
  <style type="text/css">
  /**** Isotope Filtering ****/

.isotope-item {
  z-index: 2;
}

.isotope-hidden.isotope-item {
  pointer-events: none;
  z-index: 1;
}

/**** Isotope CSS3 transitions ****/

.isotope,
.isotope .isotope-item {
  -webkit-transition-duration: 0.8s;
     -moz-transition-duration: 0.8s;
      -ms-transition-duration: 0.8s;
       -o-transition-duration: 0.8s;
          transition-duration: 0.8s;
}

.isotope {
  -webkit-transition-property: height;
     -moz-transition-property: height;
      -ms-transition-property: height;
       -o-transition-property: height;
          transition-property: height;
}

.isotope .isotope-item {
  -webkit-transition-property: -webkit-transform, opacity;
     -moz-transition-property:    -moz-transform, opacity;
      -ms-transition-property:     -ms-transform, opacity;
       -o-transition-property:      -o-transform, opacity;
          transition-property:         transform, opacity;
}

/**** disabling Isotope CSS3 transitions ****/

.isotope.no-transition,
.isotope.no-transition .isotope-item,
.isotope .isotope-item.no-transition {
  -webkit-transition-duration: 0s;
     -moz-transition-duration: 0s;
      -ms-transition-duration: 0s;
       -o-transition-duration: 0s;
          transition-duration: 0s;
}

  </style>
 <script>
 (function($){
 
  var $container = $('#portfolio'),
 
      // create a clone that will be used for measuring container width
      $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });   
 
  $container.after( $containerProxy );  
 
    // get the first item to use for measuring columnWidth
  var $item = $container.find('.portfolio-item').eq(0);
  $container.imagesLoaded(function(){
  $(window).smartresize( function() {
 
    // calculate columnWidth
    var colWidth = Math.floor( $containerProxy.width() / 2 ); // Change this number to your desired amount of columns
 
    // set width of container based on columnWidth
    $container.css({
        width: colWidth * 2 // Change this number to your desired amount of columns
    })
    .isotope({
 
      // disable automatic resizing when window is resized
      resizable: false,
 
      // set columnWidth option for masonry
      masonry: {
        columnWidth: colWidth
      }
    });
 
    // trigger smartresize for first time
  }).smartresize();
   });
 
// filter items when filter link is clicked
$('#filters a').click(function(){
$('#filters a.active').removeClass('active');
var selector = $(this).attr('data-filter');
$container.isotope({ filter: selector, animationEngine : "css" });
$(this).addClass('active');
return false;
 
});
 
} ) ( jQuery );

 </script>
<?php get_footer(); ?>