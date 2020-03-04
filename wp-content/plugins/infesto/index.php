<?php
/**
 * Plugin Name: Infesto
 * Author: Sergio Gimenez
 * Author URI: https://www.linkedin.com/in/sergiogimenez/
 */

 // ADD CUSTOM POST TYPE: SHOWS
 add_action( 'init', 'create_my_post_types' );
 function create_my_post_types() {
              register_post_type( 'competiciones',
              array(
              'labels' => array(
              'name' => __( 'Competiciones' ),
              'singular_name' => __( 'competicion' ),
              'add_new' => __( 'Add New Competicion' ),
              'add_new_item' => __( 'Add New Show' ),
              'edit' => __( 'Edit' ),
              'edit_item' => __( 'Edit Show' ),
              'new_item' => __( 'New Show' ),
              'view' => __( 'View Show' ),
              'view_item' => __( 'View Show' ),
              'search_items' => __( 'Search Shows' ),
              'not_found' => __( 'No shows found' ),
              'not_found_in_trash' => __( 'No shows found in Trash' ),
              'parent' => __( 'Parent Show' ),
                 ),
              'public' => true,
              'show_ui' => true,
              'publicly_queryable' => true,
              'exclude_from_search' => false,
              'menu_position' => 10,
              'menu_icon' => get_stylesheet_directory_uri() . '/img/nrt-shows.png',
              'hierarchical' => true,
              'query_var' => true,
              'rewrite' => array( 'slug' => 'competiciones', 'with_front' => false ),

              'can_export' => true,
              'supports' => array(
              'post-thumbnails',
              'excerpts',
              'title',
              'page-attributes')
              )
              );
 }




 add_action("admin_init", "price_meta");
 function price_meta(){
  add_meta_box("price", "Puntaje", "Price", "competiciones", "normal", "low");
}

 function price(){
  global $post;
  $custom = get_post_custom($post->ID);
  $granada = $custom["granada"][0];
  $nombre = $custom["nombre"][0];
  $boyaca = $custom["boyaca"][0];
  $bima = $custom["bima"][0];
  $mesitas = $custom["mesitas"][0];
  $carupa = $custom["carupa"][0];
  $tunja = $custom["tunja"][0];
$mesitasCol = $custom["mesitasCol"][0];
$aguaAzul = $custom["aguaAzul"][0];
  ?>

  <label>Nombre:</label>
  <input id="nombre" name="nombre" type="text"  value="<?php echo $nombre; ?>" />
  <br />
  <label>PTO. BOYACA:</label>
  <input id="boyaca" name="boyaca" type="number"  value="<?php echo $boyaca; ?>" />
  <br />

    <label>BIMA:</label>
    <input id="bima" name="bima" type="number"  value="<?php echo $bima; ?>" />
    <br />
    <label>MESITAS:</label>
    <input id="mesitas" name="mesitas" type="number"  value="<?php echo $mesitas; ?>" />
    <br />

    <label>GRANADA:</label>
    <input id="granada" name="granada" type="number"  value="<?php echo $granada; ?>" />
<br />
    <label>C. CARUPA:</label>
    <input id="carupa" name="carupa" type="number"  value="<?php echo $carupa; ?>" />
<br />
    <label>TUNJA:</label>
    <input id="tunja" name="tunja" type="number"  value="<?php echo $tunja; ?>" />
<br />
    <label>MESITAS DEL COLEGIO:</label>
    <input id="mesitasCol" name="mesitasCol" type="number"  value="<?php echo $mesitasCol; ?>" />
<br />
<label>AGUAZUL:</label>
<input id="aguaAzul" name="aguaAzul" type="number"  value="<?php echo $aguaAzul; ?>" />

  <?php
}

add_action('save_post', 'save_meta');
function save_meta(){
  global $post;
  update_post_meta($post->ID, granada, $_POST["granada"]);
  update_post_meta($post->ID, nombre, $_POST["nombre"]);
  update_post_meta($post->ID, boyaca, $_POST["boyaca"]);
  update_post_meta($post->ID, bima, $_POST["bima"]);
  update_post_meta($post->ID, mesitas, $_POST["mesitas"]);
  update_post_meta($post->ID, carupa, $_POST["carupa"]);
  update_post_meta($post->ID, tunja, $_POST["tunja"]);
  update_post_meta($post->ID, mesitasCol, $_POST["mesitasCol"]);
  update_post_meta($post->ID, aguaAzul, $_POST["aguaAzul"]);


}



?>