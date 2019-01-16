<?php 

function soup_taxs() {
    $labels = array(
        'name' => _x( 'Soup Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Soup Type', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Types' ),
        'all_items' => __( 'All Soup Types' ),
        'parent_item' => __( 'Parent Type' ),
        'parent_item_colon' => __( 'Parent Type:' ),
        'edit_item' => __( 'Edit Type' ), 
        'update_item' => __( 'Update Type' ),
        'add_new_item' => __( 'Add New Type' ),
        'new_item_name' => __( 'New Type Name' ),
        'menu_name' => __( 'Soup Types' ),
      ); 	

      register_taxonomy('soups',array('soup'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'soups' ),
      ));
}

add_action('init', 'soup_taxs');

function stew_taxs()
{
  $labels = array(
    'name' => _x('Stew Types', 'taxonomy general name'),
    'singular_name' => _x('stew Type', 'taxonomy singular name'),
    'search_items' => __('Search Types'),
    'all_items' => __('All stew Types'),
    'parent_item' => __('Parent Type'),
    'parent_item_colon' => __('Parent Type:'),
    'edit_item' => __('Edit Type'),
    'update_item' => __('Update Type'),
    'add_new_item' => __('Add New Type'),
    'new_item_name' => __('New Type Name'),
    'menu_name' => __('stew Types'),
  );

  register_taxonomy('stews', array('stew'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'stew-types'),
  ));
}

add_action('init', 'stew_taxs');