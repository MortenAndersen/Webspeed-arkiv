<?php
// Custom Taxonomy = 'webarkiv-type'

    function custom_taxonomy_arkiv() {

    $labels = array(
        'name'                       => _x( 'Typer', 'Taxonomy General Name', 'websepeed-arkiv-domain' ),
        'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'websepeed-arkiv-domain' ),
        'menu_name'                  => __( 'Type', 'websepeed-arkiv-domain' ),
        'all_items'                  => __( 'All Items', 'websepeed-arkiv-domain' ),
        'parent_item'                => __( 'Parent type', 'websepeed-arkiv-domain' ),
        'parent_item_colon'          => __( 'Parent type:', 'websepeed-arkiv-domain' ),
        'new_item_name'              => __( 'New Item Name', 'websepeed-arkiv-domain' ),
        'add_new_item'               => __( 'Add New type', 'websepeed-arkiv-domain' ),
        'edit_item'                  => __( 'Edit Item', 'websepeed-arkiv-domain' ),
        'update_item'                => __( 'Update Item', 'websepeed-arkiv-domain' ),
        'view_item'                  => __( 'View Item', 'websepeed-arkiv-domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'websepeed-arkiv-domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'websepeed-arkiv-domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'websepeed-arkiv-domain' ),
        'popular_items'              => __( 'Popular Items', 'websepeed-arkiv-domain' ),
        'search_items'               => __( 'Search Items', 'websepeed-arkiv-domain' ),
        'not_found'                  => __( 'Not Found', 'websepeed-arkiv-domain' ),
        'no_terms'                   => __( 'No items', 'websepeed-arkiv-domain' ),
        'items_list'                 => __( 'Items list', 'websepeed-arkiv-domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'websepeed-arkiv-domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'                          => true,

    );
    register_taxonomy( 'webarkiv-type', array( 'webspeedarkiv' ), $args );
}

add_action( 'init', 'custom_taxonomy_arkiv', 2 );