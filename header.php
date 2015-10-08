<?php global $data;?>
<!DOCTYPE html >
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge;chrome=1" />
        <title><?php wp_title(''); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='<?php echo esc_url( get_template_directory_uri() )  ?>/css/bootstrap-lightbox.min.css' rel='stylesheet' type='text/css'>

        <script src='<?php echo esc_url( get_template_directory_uri() )  ?>/js/jquery-latest.js'></script>
        <script src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/jquery.cycle2.js"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/jquery.cycle2.swipe.min.js"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/bootstrap-lightbox.min.js" type="text/javascript"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/isotope.pkgd.min.js"></script>
        
  

    </head>
    <body <?php body_class( ); ?> >
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <header id="topo" class="container-fluid" >
            <div class="menu-top <?php the_title(); ?>">
                <div class="container center">
                    <div class="row">
                        <?php if($data['media_logo'] != ''){ ?>

                            <span  class="logo"><a href="<?php echo esc_url( home_url() ) ?>"><img src="<?php echo $data['media_logo'] ?>" width="175" height="30"></a></span>



                        <?php }else{?>
                            <?php if ( is_front_page() ) : ?>
                            <h1  class="logo"><a href="<?php echo esc_url( home_url() ) ?>"><?php bloginfo('name'); ?></a></h1>
                            <?php else : ?>
                            <span  class="logo"><a href="<?php echo esc_url( home_url() ) ?>"><?php bloginfo('name'); ?></a></span>
                            <?php endif ?>

                        <?php }?>
                        
                        <input type="checkbox" id="control-nav" />
                        <label for="control-nav" class="control-nav"></label>
                        <label for="control-nav" class="control-nav-close"></label>
                        <nav id="menu">
                            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                        </nav>
                    </div>

                </div> 
            </div>
        </header>
        