<?php

/**
 * Plugin Name: Assessment
 * Author: Sheikh Abdullah
 * Description: Test Task for IKONIC Solutions
 */


add_action('init','init_hook',1);

function init_hook() {
	//any starting adress which needs to be blocked
	$start_address = '77.29';
	restrict_ip_starting_with($start_address);

	//call the function which will register a new post type
	register_custom_post_type();
	register_custom_taxonomy();

	add_action( 'wp_ajax_nopriv_fetch_projects', 'fetch_projects' );
	add_action( 'wp_ajax_fetch_projects', 'fetch_projects' );

	//call to random coffee function
	echo hs_give_me_coffee();

	//kanye rest api task is done in a new template called Quotes. It is intentional so to show you the diversity of my skills.

}


add_action( 'wp_enqueue_scripts', 'custom_scripts' );

function custom_scripts() {
	wp_enqueue_script('jquery');
	wp_register_script('custom-js',get_stylesheet_directory_uri().'/assets/js/custom.js');
	wp_enqueue_script('custom-js');
	wp_localize_script( 'custom-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

function restrict_ip_starting_with( $start_address ) {
	$user_ip_address = $_SERVER['REMOTE_ADDR'];
	// $user_ip_address = '77.291.124.22';
	if (!empty($start_address)) {
		$start_address_length = strlen($start_address);		
	} else {
		$start_address_length = 0;
	}
	

	if ($user_ip_address && substr($user_ip_address, 0, $start_address_length)==$start_address) {
		wp_redirect('https://www.google.com');
		exit();
	}
}

function register_custom_post_type() {
	$labels = array(
		'name' => __( 'Projects' ),
		'singular_name' => __( 'Projects' )
	);

	$args = array(
		'label'               => 'Projects',
		'description'         => 'Projects description',
		'labels'              => $labels,  
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),     
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest' => true, 
	);


	register_post_type( 'projects', $args	);
}

function register_custom_taxonomy() {
	register_taxonomy('project_types', 'projects', array(

		'hierarchical' => false,
		'labels' => array(
			'name' => 'Project Type',
			'singular_name' => 'Project Type',
			'search_items' =>  __( 'Search Project Types' ),
			'all_items' => __( 'All Project Types' ),
			'parent_item' => __( 'Parent Project Type' ),
			'parent_item_colon' => __( 'Parent Project Type:' ),
			'edit_item' => __( 'Edit Project Type' ),
			'update_item' => __( 'Update Project Type' ),
			'add_new_item' => __( 'Add New Project Type' ),
			'new_item_name' => __( 'New Project Type name' ),
			'menu_name' => __( 'Project Types' ),
		),
		
	));
}

function fetch_projects(){
	$term_slug =  'architecture';
	$term_id = get_term_by('slug', $term_slug , 'project_types');

	
	if (is_user_logged_in()) {
		$post_per_page = 6;
	} else {
		$post_per_page = 3;

	}

	$args = array( 
		'posts_per_page' => $post_per_page, 
		'paged' => $paged,
		'post_type' => 'projects',
		'orderby' => 'post_date',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'project_types',
				'field' => 'term_id',
				'terms' => $term_id
			)
		),
	);
	$projects = get_posts( $args );
	$data_array = array();
	$success = 'false';
	if ($projects) {
		
		$temp_post_array = array();
		foreach($projects as $project) {

			$temp_post_array = array(
				'post_id' => $project->ID,
				'post_title' => $project->post_title,
				'post_link' => get_post_permalink($project->ID)  
			);

			array_push($data_array, $temp_post_array);
		}	
		array_push($data_array,$temp_post_array);
		$success = 'true';
	}

	$final_object = array(
		'success' => $success,
		'data' => $data_array
	);

	echo json_encode($final_object);
	die();
}
function hs_give_me_coffee() {
	$API_RESPONSE = file_get_contents('https://coffee.alexflipnote.dev/random.json');
	
	return json_decode($API_RESPONSE)->file;
	
}