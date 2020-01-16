<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.3
 */

/**
 * Displays the breadcrumbs on all pages except the homepage.
 *
 * @since 0.1
 *
 * @global $post, $wp_query
 */
 remove_filter( 'the_content', 'wpautop' );
 remove_filter( 'the_excerpt', 'wpautop' );

function bulmawp_breadcrumbs() {
	$custom_taxonomy = '';
	global $post, $wp_query;
	if( !is_front_page() ) {
		echo '<nav class="breadcrumb" aria-label="breadcrumbs">';
		echo '<ul>';
		echo '<li><a href="', get_home_url(), '">';
		echo '<span class="icon"><i class="fas fa-home"></i></span>';
		echo '<span>Home</span></a></li>';
		if( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-calendar"></i></span>';
			echo '<span>', get_the_archive_title(), '</span></a></li>';
		}
		else if( is_archive() && is_tax() && !is_category() && !is_tag() ) {
			$post_type = get_post_type();
			if( $post_type != 'post' ) {
				$post_type_object = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );
				echo '<li><a href="', $post_type_archive, '">', $post_type_object->labels->name, '</a></li>';
			}
			$custom_tax_name = get_queried_object()->name;
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-home"></i></span>';
			echo '<span>', $custom_tax_name, '</span></a></li>';
		}
		else if( is_single() ) {
			$taxonomy_exists = taxonomy_exists( $custom_taxonomy );
			if( empty( $last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists) {
				$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
				$cat_id = $taxonomy_terms[0]->term_id;
				$cat_nicename = $taxonomy_terms[0]->slug;
				$cat_link = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
				$cat_name = $taxonomy_terms[0]->name;
			}
			if( !empty( $last_category ) ) {
				echo $cat_display;
				echo '<li class="is-active"><a href="#" aria-current="page">';
				echo '<span class="icon"><i class="fas fa-home"></i></span>';
				echo '<span>', get_the_title(), '</span></a></li>';
			}
			else if( !empty( $cat_id ) ) {
				echo '<li><a href="', $cat_link, '">', $cat_name, '</a></li>';
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
			else {
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
		}
		else if( is_category() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-file"></i></span>';
			echo '<span>', single_cat_title( '', false), '</span></a></li>';
		}
		else if( is_page() ) {
			if( $post->post_parent ) {
				$anc = get_post_ancestors( $post->ID );
				$anc = array_reverse( $anc );
				if( !isset($parents) ) $parents = null;
				foreach( $anc as $ancestor ) {
					$parents.= '<li><a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
				}
				echo $parents;
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
			else {
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
		}
		else if( is_tag() ) {
			$term_id = get_query_var( 'tag_id' );
			$taxonomy = 'post_tag';
			$args = 'include=' . $term_id;
			$terms = get_terms( $taxonomy, $args );
			$get_term_id = $terms[0]->term_id;
			$get_term_slug = $terms[0]->slug;
			$get_term_name = $terms[0]->name;
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-tag"></i></span>';
			echo '<span>', $get_term_name, '</span></a></li>';
		}
		else if( is_day() ) {
			echo '<li><a href="', get_year_link(get_the_time( 'Y' )), '">', get_the_time( 'Y' ), ' Archives</a></li>';
			echo '<li><a href="', get_month_link(get_the_time( 'Y' ) , get_the_time( 'm' )), '">', get_the_time( 'M' ), ' Archives</a></li>';
			echo '<li class="is-active"><a href="#" aria-current="page">', get_the_time( 'jS' ), '', get_the_time( 'M' ), ' Archives</a></li>';
		}
		else if( is_month() ) {
			echo '<li><a href="', get_year_link(get_the_time( 'Y' )), '">', get_the_time( 'Y' ), ' Archives</a></li>';
			echo '<li>', get_the_time( 'M' ), ' Archives</li>';
		}
		else if( is_year() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">', get_the_time( 'Y' ), ' Archives</a></li>';
		}
		else if( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo '<li class="is-active"><a href="#" aria-current="page">', 'Author:', $userdata->display_name, '</a></li>';
		}
		else if( get_query_var( 'paged' ) ) {
			echo '<li class="is-active"><a href="#" aria-current="page">', __( 'Page ' ), '', get_query_var( 'paged' ), '</a></li>';
		}
		else if( is_search() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-search"></i></span>';
			echo '<span>Search results for: ', get_search_query(), '</span></a></li>';
		}
    echo '</ul>';
    echo '</nav>';
	}
}


/**
 * Enqueues the CSS and JS for the front-end and back-end.
 *
 * @since 0.1
 * @since 0.2.2 Added enqueue "comment-reply"
 */

function bulmawp_enqueue() {
	wp_enqueue_style( 'bulmawp', get_template_directory_uri() . '/assets/css/style.css', '', '0.2.2' );

	wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', '', '3.3.1', true );
	wp_enqueue_script( 'bulmawp-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.5.0/js/all.js', '', '5.5.0', true );

	if( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'bulmawp_enqueue' );


/**
 * Requires theme files needed for front-end and back-end.
 *
 * @since 0.1
 */

require get_template_directory() . '/inc/navbar-walker.php';
require get_template_directory() . '/inc/comment-walker.php';


/**
 * Registers the menus and limits the menu depth to just one child.
 *
 * @since 0.1
 * @since 0.2 Seperate menus for "navbar-start" and "navbar-end"
 */

function bulmawp_register_menus() {
	register_nav_menu( 'navbar_start', 'Navbar Start Menu' );
	register_nav_menu( 'navbar_end', 'Navbar End Menu' );
}

add_action( 'after_setup_theme', 'bulmawp_register_menus' );

/**
 * Limits the menu depth to 1 child as multi-level structures are not supported with Bulma out of the box.
 *
 * @since  0.1
 *
 * @param string $hook
 *
 * @return void
 */

function bulmawp_limit_depth( $hook ) {
	if( $hook != 'nav-menus.php' ) {
		return;
	}
	wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 1;', 'after' );
}

add_action( 'admin_enqueue_scripts', 'bulmawp_limit_depth' );


/**
 * Displays the pagination on the homepage.
 *
 * @since 0.1
 *
 * @global $wp_query
 */

function bulmawp_pagination() {
	if( is_singular() ) {
		return;
	}
	global $wp_query;
	if( $wp_query->max_num_pages <= 1 ) {
		return;
	}
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max = intval( $wp_query->max_num_pages );
	if( $paged >= 1 ) {
		$links[] = $paged;
	}
	if( $paged >= 3 ) {
		$links[] = $paged - 1;
	}
	if( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 1;
	}
	echo '<nav class="pagination" role="navigation" aria-label="pagination">';
	if ( get_previous_posts_link() ) {
		printf( '%s', '', get_previous_posts_link( 'Previous' ) );
	}
	if ( get_next_posts_link() ) {
		printf( '%s', '', get_next_posts_link( 'Next page' ) );
	}
	echo '<ul class="pagination-list">';
	if( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' is-current' : '';
		$aria_current = 1 == $paged ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Goto page 1"%s>%s</a></li>', esc_url( get_pagenum_link( 1 ) ), $class, $aria_current, '1' );
		if ( ! in_array( 2, $links ) ) {
			echo '<li><span class="pagination-ellipsis">&hellip;</span></li>';
		}
	}
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' is-current' : '';
		$aria_current = $paged == $link ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Goto page %s"%s>%s</a></li>', esc_url( get_pagenum_link( $link ) ), $class, $link, $aria_current, $link );
	}
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li><span class="pagination-ellipsis">&hellip;</span></li>';
		}
		$class = $paged == $max ? ' is-current' : '';
		$aria_current = $paged == $max ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Goto page %s"%s>%s</a></li>', esc_url( get_pagenum_link( $max ) ), $class, $max, $aria_current, $max );
	}
	echo '</ul></nav>';
}

add_filter( 'next_posts_link_attributes', 'bulmawp_next_posts_link_class' );
add_filter( 'previous_posts_link_attributes', 'bulmawp_previous_posts_link_class' );

function bulmawp_next_posts_link_class() {
	return 'class="pagination-next"';
}

function bulmawp_previous_posts_link_class() {
	return 'class="pagination-previous"';
}


/**
 * Registers the sidebar.
 *
 * @since 0.1
 */

function bulmawp_sidebar() {
	register_sidebar( array(
		'name' 						=> 'Sidebar',
		'id' 							=> 'sidebar',
	  'before_widget' 	=> '<div class="widget">',
	  'after_widget' 		=> '</div>',
		'before_title' 		=> '<h2 class="menu-label">',
		'after_title' 		=> '</h2>',
	) );
}

add_action( 'widgets_init', 'bulmawp_sidebar' );


/**
 * Adds theme support.
 *
 * @since 0.1
 */

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
));
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
add_theme_support( 'title-tag' );


/**
 * Allow SVG uploads to media library
 *
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Page Slug Body Class
 *
 */
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// REGISTER custom post type for State-iBlock
function custom_post_type_state_iblocks() {

	$labels = array(
		'name'                => _x( 'stateiblocks', 'Post Type General Name', 'iblocks-teq_bulmaWP' ),
		'singular_name'       => _x( 'stateiblocks', 'Post Type Singular Name', 'iblocks-teq_bulmaWP' ),
		'menu_name'           => __( 'State iBlocks', 'iblocks-teq_bulmaWP' ),
		'parent_item_colon'   => __( 'Parent stateiblocks', 'iblocks-teq_bulmaWP' ),
		'all_items'           => __( 'All State iBlocks', 'iblocks-teq_bulmaWP' ),
		'view_item'           => __( 'View State iBlocks', 'iblocks-teq_bulmaWP' ),
		'add_new_item'        => __( 'Add New State iBlocks', 'iblocks-teq_bulmaWP' ),
		'add_new'             => __( 'Add New', 'iblocks-teq_bulmaWP' ),
		'edit_item'           => __( 'Edit State iBlocks', 'iblocks-teq_bulmaWP' ),
		'update_item'         => __( 'Update State iBlocks', 'iblocks-teq_bulmaWP' ),
		'search_items'        => __( 'Search State iBlocks', 'iblocks-teq_bulmaWP' ),
		'not_found'           => __( 'Not Found', 'iblocks-teq_bulmaWP' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'iblocks-teq_bulmaWP' ),
	);
// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'stateiblocks', 'iblocks-teq_bulmaWP' ),
		'description'         => __( 'stateiblocks', 'iblocks-teq_bulmaWP' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions',),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
    'menu_icon'           => 'dashicons-location-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
    'taxonomies'          => array('category', 'post_tag'),
	);
	// Registering your Custom Post Type
	register_post_type( 'stateiblocks', $args );
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
add_action( 'init', 'custom_post_type_state_iblocks', 0 );

function iblocks_register_user_meta() {
    register_meta('user', 'CardCode', array(
            "type" => "string",
            "show_in_rest" => true
    ));
}

add_action( 'init', 'iblocks_register_user_meta', 0 );

/**
 * ADD SUPPORT FOR CATEGORY PAGE WITH ALL CUSTOM POST TYPES
 *
 */
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('nav_menu_item', 'post', 'stateiblocks');
    		$query->set('post_type',$post_type);
    	return $query;
    }
}

/**
 * ADD DEFAULT SEARCH QUERY BY TITLE FOR MAIN POST QUERIES
 *
 */
function category_modify_query_order( $query ) {
    if ( $query->is_category() && $query->is_main_query() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'category_modify_query_order' );

/*
 * DISABLE TOOLBAR AND WORDPRESS DASHBOARD ACCESS FOR ALL USERS EXCEPT ADMIN
 */
	 add_action('after_setup_theme', 'remove_admin_bar');
	 	function remove_admin_bar() {
			if ( ! current_user_can('administrator') && ! is_admin() ) {
				show_admin_bar(false);
			}
		}
		function wpabsolute_block_users_backend() {
			if ( is_admin() && ! current_user_can( 'administrator' ) && ! wp_doing_ajax() ) {
				wp_redirect( home_url() );
				exit;
			}
		}
		add_action( 'init', 'wpabsolute_block_users_backend' );

/* LOGIN VALIDATION | PAGE VARIABLES | ARRAY COLLECTION */
		$page_id = '';
		$login_pages_args = array (
			'meta_key' 		=> '_wp_page_template',
			'meta_value' 	=> 'page-login.php'
		);
		$login_pages = get_pages( $login_pages_args );

		foreach ( $login_pages as $login_page ) {
			$page_id.= $login_page->ID;
		}

/* LOGIN VALIDATION | FAILED LOGIN ATTEMPT */
		function login_failed() {
			global $page_id;
			$login_page = home_url('/login');
				wp_redirect( $login_page . '?login=failed' );
					exit;
		}
		add_action( 'wp_login_failed', 'login_failed' );

/* LOGIN VALIDATION | EMPTY FIELDS */
		function blank_username_password( $user, $username, $password ) {
			global $page_id;
			$login_page = home_url('/login');
			if( $username == "" || $password == "" ) {
					wp_redirect( $login_page . "?login=blank" );
						exit;
			}
		}
		add_filter( 'authenticate', 'blank_username_password', 1, 3);

/* LOGIN VALIDATION | LOGGED OUT */
		function logout_page() {
			global $page_id;
			$login_page = home_url('/login');
				wp_redirect( $login_page . "?login=false" );
					exit;
		}
		add_action('wp_logout', 'logout_page');

/* LOGIN SUCCESS | REDIRECT NON-ADMINS | ADMINS GET DASHBOARD */
		function page_login_redirect( $url, $request, $user ){

			if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
				if( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) {
					$url = admin_url();
				} else if( is_array( $user->roles ) && in_array( 'contributor', $user->roles ) ) {
          $url = site_url('/ula/');
				} else {
					$current_user = wp_get_current_user();
					$url = get_author_posts_url($user->ID,$curauth->user_login);
				}
			}
			return $url;
		}
		add_filter('login_redirect', 'page_login_redirect', 10, 3 );

// REGISTER custom post type for State-iBlock
		function custom_post_type_iblocks() {
			$labels = array(
				'name'                => _x( 'iblocks', 'Post Type General Name', 'iblocks-teq_bulmaWP' ),
				'singular_name'       => _x( 'iblocks', 'Post Type Singular Name', 'iblocks-teq_bulmaWP' ),
				'menu_name'           => __( 'iBlocks', 'iblocks-teq_bulmaWP' ),
				'parent_item_colon'   => __( 'Parent iblocks', 'iblocks-teq_bulmaWP' ),
				'all_items'           => __( 'All iBlocks', 'iblocks-teq_bulmaWP' ),
				'view_item'           => __( 'View iBlocks', 'iblocks-teq_bulmaWP' ),
				'add_new_item'        => __( 'Add New iBlocks', 'iblocks-teq_bulmaWP' ),
				'add_new'             => __( 'Add New', 'iblocks-teq_bulmaWP' ),
				'edit_item'           => __( 'Edit iBlocks', 'iblocks-teq_bulmaWP' ),
				'update_item'         => __( 'Update iBlocks', 'iblocks-teq_bulmaWP' ),
				'search_items'        => __( 'Search iBlocks', 'iblocks-teq_bulmaWP' ),
				'not_found'           => __( 'Not Found', 'iblocks-teq_bulmaWP' ),
				'not_found_in_trash'  => __( 'Not found in Trash', 'iblocks-teq_bulmaWP' ),
			);

			$args = array(
				'label'               => __( 'iblocks', 'iblocks-teq_bulmaWP' ),
				'description'         => __( 'iblocks', 'iblocks-teq_bulmaWP' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'author', 'thumbnail', 'revisions','custom-fields'),
				'public'              => true,
				'show_in_admin_bar'   => true,
                                'show_in_rest' => true,
				'menu_position'       => 1,
		    'menu_icon'           => 'dashicons-layout',
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
		    'taxonomies'          => array('category')
			);
// Registering your Custom Post Type
			register_post_type( 'iblocks', $args );
                        register_meta('post', 'bp-code', array(
                            "object_subtype" => "iblocks",
                            "type" => "string",
                            "show_in_rest" => true
                        ));
                        register_meta('post', 'framework-link', array(
                            "object_subtype" => "iblocks",
                            "type" => "string",
                            "show_in_rest" => true
                        ));
                        register_meta('post', 'student-workbook-link', array(
                            "object_subtype" => "iblocks",
                            "type" => "string",
                            "show_in_rest" => true
                        ));
                        register_meta('post', 'skills-matrix-link', array(
                            "object_subtype" => "iblocks",
                            "type" => "string",
                            "show_in_rest" => true
                        ));
                        register_meta('post', 'teachers-guide-link', array(
                            "object_subtype" => "iblocks",
                            "type" => "string",
                            "show_in_rest" => true
                        ));
                        register_meta('post', 'rubric-link', array(
                            "object_subtype" => "iblocks",
                            "type" => "string",
                            "show_in_rest" => true
                        ));
                        register_meta('post', 'lesson-plan-link', array(
                            "object_subtype" => "iblocks",
                            "type" => "string",
                            "show_in_rest" => true
                        ));
		}
		add_action( 'init', 'custom_post_type_iblocks', 0 );

// GET RID OF PRIVATE: IN FRONT OF POST TITLES
		function the_title_trim($title) {
			$title = attribute_escape($title);
			$findthese = array(
				'#Protected:#',
				'#Private:#'
			);
			$replacewith = array(
				'', // What to replace "Protected:" with
				'' // What to replace "Private:" with
			);
			$title = preg_replace($findthese, $replacewith, $title);
				return $title;
			}
			add_filter('the_title', 'the_title_trim');

// CUSTOM META FIELD FOR IBLOCK TYPE AND LEVEL
      add_action( 'add_meta_boxes', 'so_custom_meta_box' );

      function so_custom_meta_box($post) {
      	add_meta_box('so_meta_box', 'iBlock Type and Grade Level', 'custom_element_grid_class_meta_box', 'iblocks', 'normal' , 'high');
      }
    	add_action('save_post', 'so_save_metabox');

      function so_save_metabox(){
      	 global $post;
      	 	if(isset($_POST["custom_element_grid_class"])){
      	  	$meta_element_class = $_POST['custom_element_grid_class'];
      	    update_post_meta($post->ID, 'custom_element_grid_class_meta_box', $meta_element_class);
      	  }
      }

      function custom_element_grid_class_meta_box($post){
         $meta_element_class = get_post_meta($post->ID, 'custom_element_grid_class_meta_box', true); //true ensures you get just one value instead of an array
       ?>
          <select name="custom_element_grid_class" id="custom_element_grid_class">
      			<option value="default" <?php selected( $meta_element_class, 'default' ); ?>>--</option>
      	    <option value="IBF 10" <?php selected( $meta_element_class, 'IBF 10' ); ?>>iBlock Foundation 10</option>
      		  <option value="IBF 25" <?php selected( $meta_element_class, 'IBF 25' ); ?>>iBlock Foundation 25</option>
      		  <option value="IBF 37" <?php selected( $meta_element_class, 'IBF 37' ); ?>>iBlock Foundation 37</option>
      			<option value="IBFP 10" <?php selected( $meta_element_class, 'IBFP 10' ); ?>>iBlock Foundation Plus 10</option>
      	    <option value="IBFP 25" <?php selected( $meta_element_class, 'IBFP 25' ); ?>>iBlock Foundation Plus 25</option>
      	    <option value="IBFP 37" <?php selected( $meta_element_class, 'IBFP 37' ); ?>>iBlock Foundation Plus 37</option>
      	  	<option value="IBE 10" <?php selected( $meta_element_class, 'IBE 10' ); ?>>iBlock Essential 10</option>
      	    <option value="IBE 25" <?php selected( $meta_element_class, 'IBE 25' ); ?>>iBlock Essential 25</option>
      	    <option value="IBE 37" <?php selected( $meta_element_class, 'IBE 37' ); ?>>iBlock Essential 37</option>
      	  </select>
      	 <?php
      	}
