<?php 

/* 
Plugin Name: sohel custom post
Plugin URI:  https://www.sohelsrit.net/sohel_custom_post
Version:     1.0
Author:      Md. Sohel Rana
Description: This plugin is for automatic create custom post type to add in your wordpress website. 
Author URI:  https://www.sohelsrit.net

*/


	function sohel_custom_post_type(){

		register_post_type('sohelcustom',
        array(
            'labels' => array(
                'name' => __( 'Sohelcustom' ),
                'singular_name' => __( 'Custom Content' ),
                'search_items'      => __( 'Custom Content' ),
                'all_items'         => __( 'All Custom Content' ),
                'parent_item'       => __( 'Parent Custom Content' ),
                'parent_item_colon' => __( 'Parent Custom Content' ),
                'edit_item'         => __( 'Edit Custom Content' ),
                'update_item'       => __( 'Update Custom Content' ),
                'add_new_item'      => __( 'Add New Custom Content' ),
                'new_item_name'     => __( 'New Latest Custom Content' ),
                'menu_name'         => __( 'MY Custom' ),
            ),
            'taxonomies' => array('category','post_tag'),
        'public' => true,
        'supports' => array('title','editor','thumbnail', 'excerpt', 'comments'),
        )
    );

	}
	add_action('init','sohel_custom_post_type');

	function c5_sohel_custom(){
		add_shortcode('sohel_custom','sohel_custom_show');
	}
	add_action('wp_head', 'c5_sohel_custom');
	

	function sohel_custom_show(){

	$args = array( 'post_type' => 'sohelcustom', 'posts_per_page' => 5 );

	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) : $loop->the_post();
	?>

	<h1><?php the_title(); ?></h1>

	<?php 
	echo '<div class="entry-content">';
	
	the_post_thumbnail();

	the_content();

	 echo '</div>';

	endwhile;

}






?>