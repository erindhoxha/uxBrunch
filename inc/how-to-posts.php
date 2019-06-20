
<?php
function how_to_post_type(){

$labels = array(
'name' => 'How to',
'singular_name' => 'How to...',
'add_new' => 'Add New' );

$args = array(
    'label'               => __( 'howto', 'uxBrunch' ),
    'description'         => __( 'How to', 'uxBrunch' ),
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    // You can associate this CPT with a taxonomy or custom taxonomy. 
    'taxonomies'          => array( 'category', 'post_tag'),
    /* A hierarchical CPT is like Pages and can have
    * Parent and child items. A non-hierarchical CPT
    * is like Posts.
    */ 
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-welcome-learn-more',
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
);

register_post_type('howto', $args);
}

add_action('init', 'how_to_post_type');