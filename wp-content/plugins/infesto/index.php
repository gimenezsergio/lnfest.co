<?php
/**
 * Plugin Name: Infesto
 * Author: Sergio Gimenez
 * Author URI: https://www.linkedin.com/in/sergiogimenez/
 */

 // ADD CUSTOM POST TYPE: SHOWS
 add_action( 'init', 'create_my_post_types' );
 function create_my_post_types() {
              register_post_type( 'participaciones',
              array(
              'labels' => array(
              'name' => __( 'participaciones' ),
              'singular_name' => __( 'participacion' ),
              'add_new' => __( 'Agregar nueva participación' ),
              'add_new_item' => __( 'Agregar nueva participación' ),
              'edit' => __( 'Editar' ),
              'edit_item' => __( 'Editar participación' ),
              'new_item' => __( 'Nueva participación' ),
              'view' => __( 'Ver participaciones' ),
              'view_item' => __( 'Ver participación' ),
              'search_items' => __( 'Buscar participaciones' ),
              'not_found' => __( 'No se encontraton resultados' ),
              'not_found_in_trash' => __( 'No se encontraron participaciones en la papelera' ),
              'parent' => __( 'Parent participación' ),
                 ),
              'public' => true,
              'show_ui' => true,
              'publicly_queryable' => true,
              'exclude_from_search' => false,
              'menu_position' => 10,
              'hierarchical' => true,
              'query_var' => true,
              'rewrite' => array( 'slug' => 'participaciones', 'with_front' => false ),
              'can_export' => true,
              'supports' => array(
              'post-thumbnails',
              'excerpts',
              'title',
              'page-attributes')
              )
              );
 }

 //add_action("admin_init", "puntos_meta");
 function puntos_meta(){
    add_meta_box("puntos", "Puntos", "puntos", "participaciones", "normal", "low");
}

function puntos(){
  ?>
    <label>Radio - Altos - Altos medios</label>
    <?php
}


 //add_action("admin_init", "price_meta");
 function price_meta(){
    add_meta_box("price", "Puntaje", "Price", "participaciones", "normal", "low");
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



function lnfest_categorias() {
	register_taxonomy('lnfest_categorias', // The name of the taxonomy
		array('participaciones'), // Name of the object type for the taxonomy object (built-in Post Type or any Custom Post Type)
		array(
			'hierarchical' => true, // Is this taxonomy hierarchical (have descendants) like categories or not hierarchical like tags
			'label' => 'Participaciones', // A plural descriptive name for the taxonomy
			'singular_label' => 'Participacion', // Name for one object of this taxonomy
			'show_in_rest' => true, // Enables REST API for Gutenberg
			'rewrite' => array('slug' => 'participaciones_cat') // Customize the permalink structure slug
		)
	);
}

add_action( 'init', 'lnfest_categorias' );




/**
 * Add new fields above 'Update' button.
 *
 * @param WP_User $user User object.
 */
function tm_additional_profile_fields( $user ) {

    $months 	= array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
    $default	= array( 'day' => 1, 'month' => 'Jnuary', 'year' => 1950, );
    $birth_date = wp_parse_args( get_the_author_meta( 'birth_date', $user->ID ), $default );

    ?>
    <h3>Extra profile information</h3>

    <table class="form-table">
   	 <tr>
   		 <th><label for="birth-date-day">Birth date</label></th>
   		 <td>
   			 <select id="birth-date-day" name="birth_date[day]"><?php
   				 for ( $i = 1; $i <= 31; $i++ ) {
   					 printf( '<option value="%1$s" %2$s>%1$s</option>', $i, selected( $birth_date['day'], $i, false ) );
   				 }
   			 ?></select>
   			 <select id="birth-date-month" name="birth_date[month]"><?php
   				 foreach ( $months as $month ) {
   					 printf( '<option value="%1$s" %2$s>%1$s</option>', $month, selected( $birth_date['month'], $month, false ) );
   				 }
   			 ?></select>
   			 <select id="birth-date-year" name="birth_date[year]"><?php
   				 for ( $i = 1950; $i <= 2015; $i++ ) {
   					 printf( '<option value="%1$s" %2$s>%1$s</option>', $i, selected( $birth_date['year'], $i, false ) );
   				 }
   			 ?></select>
   		 </td>
   	 </tr>
    </table>
    <?php
}

add_action( 'show_user_profile', 'tm_additional_profile_fields' );
add_action( 'edit_user_profile', 'tm_additional_profile_fields' );

?>
