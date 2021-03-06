<?php
function cidw_4w4_enqueue() {
// wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css')
wp_enqueue_style('style_css', 
                get_template_directory_uri() . '/style.css', 
                array(), 
                filemtime(get_template_directory() . '/style.css'), false);
                wp_enqueue_style('cidw_4w4_polive_google', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap', false );
} 

add_action("wp_enqueue_scripts", "cidw_4w4_enqueue");

function cidw_4w4_enregistre_mon_menu() {
    register_nav_menus( array(
         'principal'=> __( 'Menu principal', 'cidw_4w4' ),
        'footer'=> __('menu secondaire', 'cidw_4w4' ))
    );
}
//allo git

function cidw_4w4_filtre_le_menu($mon_object) {
    foreach($mon_object as $cle => $valeur){
       
       //$valeur->title = substr($valeur->title, 0, 7);
       $valeur->title = wp_trim_words($valeur->title, 2, "...");
    }

    return $mon_object;
   
}

add_action('after_setup_theme', 'cidw_4w4_enregistre_mon_menu');

?>

