<?php

add_action('init', 'main_menu');

function main_menu()
{
    register_nav_menu('main_menu', 'Menu principal');
}

function theme_styles() {
    wp_enqueue_style('main_font', get_template_directory_uri().'/styles/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style('main_style', get_template_directory_uri().'/styles/css/app.css');

	wp_enqueue_script('main_toto', get_template_directory_uri().'/scripts/js/script.js');
}

add_action('wp_enqueue_scripts','theme_styles');

add_theme_support('post-thumbnails');


function drawMenu()
{
    wp_nav_menu(array(
        'theme_location' => 'main_menu',
        'menu' => 'main_menu',
        'container' => '',
        'container_class' => false,
        'container_id' => false,
        'menu_class' => 'font-robot _pull-right ',
        'menu_id' => '',
        'echo' => true,
        'fallback_cb' => 'wp_page_menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="%1$s" class="%2$s _container-flex navbar">%3$s</ul>',
        'depth' => 0,
        'walker' => ''
    ));
}

function drawBurger(){
    wp_nav_menu(array(
        'theme_location' => 'main_menu',
        'menu' => 'main_menu',
        'container' => '',
        'container_class' => false,
        'container_id' => false,
        'menu_class' => 'font-robot',
        'menu_id' => '',
        'echo' => true,
        'fallback_cb' => 'wp_page_menu',
        'before' => '',
        'after' => '',
        'link_before' => '',
        'link_after' => '',
        'items_wrap' => '<ul id="%1$s" class="%2$s _hide mobile-menu">%3$s</ul>',
        'depth' => 0,
        'walker' => ''
    ));
}
/* Zones de widgets */
function my_sidebars() {
    register_sidebar(array(
        'name' 		  => 'Barre latérale',
        'id'    	  => 'sidebar-1',
        'description' => 'Cela apparait sur toutes les pages, pour l\'instant...'
    ));
}

add_action('widgets_init', 'my_sidebars');

//Créer son widget

class Link_Widget extends WP_Widget {

    function __construct() {

        parent::__construct(
            'my-link',  // Base ID
            'Reseau-social'   // Name
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Link_Widget' );
        });

    }

    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function widget( $args, $instance ) {
        switch ($instance["title"]){
            case "facebook":
                echo '<a href="'.$instance['url'].'"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>';
                break;
            case "instagram":
                echo  '<a href="'.$instance['url'].'"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
                break;
        }
    }

    public function form( $instance ) {
        //Ce qui s'affiche en back

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $url = ! empty( $instance['url'] ) ? $instance['url'] : esc_html__( '', 'text_domain' );

        echo '
        <p>
        	<label for="'.$this->get_field_id('title').'">
        	Choix du réseau social : </label>
        	<select name="'.$this->get_field_name('title').'"  id="'.$this->get_field_id('title').'" >
              <option  value="facebook">Facebook</option> 
              <option  value="instagram">Instagram</option>
            </select>
        </p>
        <p>
        	<label for="'.$this->get_field_id('url').'">
        	Cible (URL) du lien : </label>
        	<input type="text" id="'.$this->get_field_id('url').'" name="'.$this->get_field_name('url').'" value="'.$url.'">
        </p>
        ';



    }

    public function update( $new_instance, $old_instance ) {

        // sauvegarde en bdd

        $instance = array();

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['url'] = ( !empty( $new_instance['url'] ) ) ? $new_instance['url'] : '';

        return $instance;
    }

}
$my_widget = new Link_Widget();














?>