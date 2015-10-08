<?php



//Remove a barra do admim para usuarios logados

show_admin_bar(false);


//Ativa Thumbnails

//verifica se a função existe 

if (function_exists('add_theme_support')) {

add_theme_support( 'post-thumbnails' ); //adiciona o suporte ao Post Thumbanils 

//set_post_thumbnail_size(450, 200, true); // define um valor padrão para o thumbail 

add_image_size('banner-slider', 1150, 550, true); //cria um novo tamanho de imagem 
add_image_size('portfolio_mini', 371, 180, true); //cria um novo tamanho de imagem 

} 

//menu

function header_menu() {

  register_nav_menu('header-menu',__( 'Header Menu' ));

}

add_action( 'init', 'header_menu' );



function footer_menu() {

  register_nav_menu('footer-menu',__( 'Footer Menu' ));

}


add_action( 'init', 'footer_menu' );

function portfolio_menu() {

  register_nav_menu('portfolio_menu',__( 'Portfolio Menu' ));

}

add_action( 'init', 'portfolio_menu' );




//Define o tamanho do resumo/excerpt

function get_the_box_excerpt(){

$excerpt = get_the_content();

$excerpt = strip_shortcodes($excerpt);

$excerpt = strip_tags($excerpt);

$the_str = substr($excerpt, 0, 98);

return $the_str;

}


//Add Custom post type portfolio



add_action( 'init', 'create_post_type_portfolio' );

function create_post_type_portfolio() {

	$labels_portfolio = array(

    'name' => _x('portfolio', 'post type general name'),

    'singular_name' => _x('Portfolio', 'post type singular name'),

    'add_new' => _x('Adicionar Novo', 'Portfolio'),

    'add_new_item' => __('Adicionar novo Portfolio'),

    'edit_item' => __('Edite o Portfolio'),

    'new_item' => __('Novo Portfolio'),

    'all_items' => __('Todos os portfolio'),

    'view_item' => __('Veja o Portfolio'),

    'search_items' => __('Procurar portfolio'),

    'not_found' =>  __('Nenhum Portfolio cadastrado'),

    'not_found_in_trash' => __('Nenhuma Portfolio na lixeira'),

    'parent_item_colon' => '',

    'menu_name' => 'portfolio'

);

    register_post_type( 'portfolio',

        array(

            'labels' => $labels_portfolio,

            'public' => true,

            'menu_icon' => 'dashicons-archive',

            'has_archive' => true,

            'menu_position' => 5,
            //'taxonomies' => array('category'),

            'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),

        )

    );

}

register_taxonomy( "portfolio-categories", 
    array(  "portfolio" ), 
    array(  "hierarchical" => true,
            "labels" => array('name'=>"Filtros",'add_new_item'=>"Adicionar novo Filtro"), 
            "singular_label" => __( "Field" ), 
            "rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
                            'with_front' => false)
         ) 
);

//Add Custom post type Banners

add_action( 'init', 'create_post_type_banner' );

function create_post_type_banner() {

    $labels_banner = array(

    'name' => _x('banner', 'post type general name'),

    'singular_name' => _x('Banner', 'post type singular name'),

    'add_new' => _x('Adicionar Novo', 'Banner'),

    'add_new_item' => __('Adicionar novo Banner'),

    'edit_item' => __('Edite o Banner'),

    'new_item' => __('Novo Banner'),

    'all_items' => __('Todos os banner'),

    'view_item' => __('Veja o Banner'),

    'search_items' => __('Procurar banner'),

    'not_found' =>  __('Nenhum Banner cadastrado'),

    'not_found_in_trash' => __('Nenhuma Banner na lixeira'),

    'parent_item_colon' => '',

    'menu_icon' => 'dashicons-format-gallery',

    'menu_name' => 'Banner'

);



    $args = array(

    'labels' => $labels_banner,

    'public' => true,

    'publicly_queryable' => true,

    'show_ui' => true, 

    'show_in_menu' => true, 

    'query_var' => true,

    'rewrite' => true,

    'capability_type' => 'post',

    'has_archive' => true, 

    'hierarchical' => false,

    'menu_position' => 5,

    'menu_icon' => 'dashicons-images-alt',
    'taxonomies' => array('category'),

    'supports' => array( 'title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail' ),

  ); 





    register_post_type( 'banner', $args  );

}

register_taxonomy( "banner-categories", 
    array(  "banner" ), 
    array(  "hierarchical" => true,
            "labels" => array('name'=>"Filtros",'add_new_item'=>"Adicionar novo Filtro"), 
            "singular_label" => __( "Field" ), 
            "rewrite" => array( 'slug' => 'fields', // This controls the base slug that will display before each term 
                            'with_front' => false)
         ) 
);

// Widget Footer

    register_sidebar(array(

        'name' => __( 'Widget 1' ),

        'id' => '1-widget-area',

        'description' => __( '1 area de widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<span>',

        'after_title' => '</span>',

    ));



        register_sidebar(array(

        'name' => __( 'Widget 2' ),

        'id' => '2-widget-area',

        'description' => __( '2 area de widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<span>',

        'after_title' => '</span>',

    ));



        register_sidebar(array(

        'name' => __( 'Widget 3' ),

        'id' => '3-widget-area',

        'description' => __( '3 area de widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<span>',

        'after_title' => '</span>',

    ));



        register_sidebar(array(

        'name' => __( 'Widget 4' ),

        'id' => '4-widget-area',

        'description' => __( '4 area de widget' ),

        'before_widget' => '<div id="%1$s" class="%2$s">',

        'after_widget' => '</div>',

        'before_title' => '<strong class="title">',

        'after_title' => '</strong>',

    ));



//Posts relacionados



function ll_related_posts() { 

    $args = array(

    'posts_per_page' => 4,

    'post_in'  => get_the_tag_list(),

    'post_type' => array( 'cortinas', 'persianas' )

    ); 

    $the_query = new WP_Query( $args ); 

    while ( $the_query->have_posts() ) : $the_query->the_post();?> 

        <div class="box-mini">

            <?php if ( has_post_thumbnail() ) { ?> 

                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'related-post' ); ?></a>

            <?php } ?> 

            <a href="<?php the_permalink()?>"><strong><?php the_title(); ?></strong></a>

            <p><a href="<?php the_permalink()?>"><?php echo get_the_box_excerpt(); ?>...</a></p>

        </div>

        <?php

    endwhile; 

    echo '<div class="clear"></div></section>'; 

    wp_reset_postdata(); 

}

// CAMPOS DE PERFIL PERSONALIZADOS
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
 
function my_show_extra_profile_fields( $user ) { ?>
 
    <h3>Você nas redes sociais</h3>
 
    <table class="form-table">
 
        <tr>
            <th><label for="twitter">Twitter</label></th>
 
            <td>
                <input type="text" name="twitteruser" id="twitteruser" value="<?php echo esc_attr( get_the_author_meta( 'twitteruser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu nome de usuário do Twitter</span>
            </td>
        </tr>
 
        <tr>
            <th><label for="facebookuser">Facebook</label></th>
 
            <td>
                <input type="text" name="facebookuser" id="facebookuser" value="<?php echo esc_attr( get_the_author_meta( 'facebookuser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu perfil no Facebook (URL)</span>
            </td>
        </tr>  

        <tr>
            <th><label for="googleuser">Google+</label></th>
 
            <td>
                <input type="text" name="googleuser" id="googleuser" value="<?php echo esc_attr( get_the_author_meta( 'googleuser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu perfil no Google+ (URL)</span>
            </td>
        </tr>  

        <tr>
            <th><label for="instauser">Instagram</label></th>
 
            <td>
                <input type="text" name="instauser" id="instauser" value="<?php echo esc_attr( get_the_author_meta( 'instauser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu perfil no Instagram (URL)</span>
            </td>
        </tr>  

        <tr>
            <th><label for="picassauser">Picassa</label></th>
 
            <td>
                <input type="text" name="picassauser" id="picassauser" value="<?php echo esc_attr( get_the_author_meta( 'picassauser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu perfil no Picassa (URL)</span>
            </td>
        </tr>  

        <tr>
            <th><label for="pinterestuser">Pinterest</label></th>
 
            <td>
                <input type="text" name="pinterestuser" id="pinterestuser" value="<?php echo esc_attr( get_the_author_meta( 'pinterestuser', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu perfil no Pinterest (URL)</span>
            </td>
        </tr>     
 
    </table>
 
    <h3>Mais sobre si</h3>
 
    <table class="form-table">
 
        <tr>
            <th><label for="pais">País</label></th>
 
            <td>
                <input type="text" name="pais" id="pais" value="<?php echo esc_attr( get_the_author_meta( 'pais', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">O seu país</span>
            </td>
        </tr>
 
        <tr>
            <th><label for="cidade">Cidade</label></th>
 
            <td>
                <input type="text" name="cidade" id="cidade" value="<?php echo esc_attr( get_the_author_meta( 'cidade', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Cidade onde se encontra</span>
            </td>
        </tr>     
 
    </table>  
<?php } ?>
<?php
// GUARDAR E MANTER INFO DOS CAMPOS
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );
 
function my_save_extra_profile_fields( $user_id ) {
 
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
 
    update_user_meta( $user_id, 'twitteruser', $_POST['twitteruser'] );
    update_user_meta( $user_id, 'facebookuser', $_POST['facebookuser'] );
    update_user_meta( $user_id, 'instauser', $_POST['instauser'] );
    update_user_meta( $user_id, 'picassauser', $_POST['picassauser'] );
    update_user_meta( $user_id, 'pinterestuser', $_POST['instauser'] );
    update_user_meta( $user_id, 'googleuser', $_POST['googleuser'] );
    update_user_meta( $user_id, 'cidade', $_POST['cidade'] );
    update_user_meta( $user_id, 'pais', $_POST['pais'] );
}

//registro da sidebar
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
}

/* Paginação */
function paginacao() {
    global $wp_query;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $big = 999999999;
 
    return paginate_links(
        array(
            'base' => @add_query_arg('paged','%#%'),
            'format' => '?paged=%#%',
            'current' => $current,
            'total' => $wp_query->max_num_pages,
            'prev_next'    => false
        )
    );
}

function tutsup_paged_post() {
        
    $defaults = array(
        'before'           => '' . __( '' ),
        'after'            => '',
        'link_before'      => '',
        'link_after'       => '',
        'next_or_number'   => 'number',
        'separator'        => ' ',
        'nextpagelink'     => __( '' ),
        'previouspagelink' => __( '' ),
        'pagelink'         => '%',
        'echo'             => 1
    );
 
    if( wp_link_pages( $defaults ) ) {
        echo '<div class="tutsup-pagination clearfix">';
    
            wp_link_pages( $defaults ); 
 
        echo '</div>';
    }
}

// Add Shortcode

function botao_shortcode( $atts ) {
   // Attributes

    extract( shortcode_atts(

        array(

            'src' => '',

            'titulo' => '',

        ), $atts )

    );
    // Code

return '<a href="'.$src.'" class="button transition">'.$titulo.'</a>';

}

add_shortcode( 'botao', 'botao_shortcode' );

// ----------------------------------
// - REMOVER itens do menu de navegação à esquerda -
// ----------------------------------
 
function pc_remove_links_menu() {
 
     global $menu;
 
     remove_menu_page ('upload.php'); // Mídia
     remove_menu_page ('link-manager.php'); // Links Permanentes
     remove_menu_page ('options-general.php');  // Configurações
     remove_menu_page ('tools.php');  // Ferramentas
}
 
add_action ('admin_menu', 'pc_remove_links_menu');

// ----------------------------
// --  REMOVER ITENS SUB MENUS  --
// ----------------------------
 
function pc_remove_submenus() {
 
  global $submenu;
 
  unset($submenu['themes.php'][5]); // Remove 'Temas'.
  unset($submenu['options-general.php'][15]); // Remove 'Escrita'.
  unset($submenu['options-general.php'][25]); // Remove 'Discussão'.
  unset($submenu['tools.php'][5]); // Remove 'Disponíveis'.
  unset($submenu['tools.php'][10]); // Remove 'Importar'.
  unset($submenu['tools.php'][15]); // Remove 'Exportar'.
}
 
add_action( 'admin_menu', 'pc_remove_submenus' );
 
// Remove Link Aparência > Editor 
 
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
 
add_action('_admin_menu', 'remove_editor_menu', 1);
 
// Remove Link Plugin > Editor
 
function pc_remove_plugin_editor() {
  remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
 
add_action('admin_init', 'pc_remove_plugin_editor');
// Admin Menu

require_once ('admin/index.php');