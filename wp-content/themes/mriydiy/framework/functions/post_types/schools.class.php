<?php

namespace PS\Functions\Post_Types;

/**
 * Class Schools
 * @package PS\Functions\Post_Types
 */
class Schools {

    /**
     * constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ), 0 );
    }

    /**
     * post type
     */
    public function register_post_type() {
        $labels = array(
            'name'               => __( 'Наші заклади', \PS::$theme_name ),
            'add_new'            => __( 'Додати заклад', \PS::$theme_name ),
            'new_item'           => __( 'Новий заклад', \PS::$theme_name )
        );

        $args = array(
            'labels'             => $labels,
            'show_ui'             => true,
            'public'              => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'hierarchical'        => false,
            'query_var'           => true,
            'supports'            => array( 'title' ),
            'has_archive'         => false
        );

        register_post_type( 'schools', $args );
    }

    public function register_taxonomies(){
        // type
        $labels = array(
            'name'              => __( 'Тип закладу', \PS::$theme_name ),
            'add_new_item'      => __( 'Додати тип закладу', \PS::$theme_name ),
            'new_item_name'     => __( 'Новий тип закладу', \PS::$theme_name )
        );

        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_admin_column' => true
        );

        register_taxonomy( 'schools_type', 'schools', $args );

        // city
        $labels = array(
            'name'              => __( 'Міста', \PS::$theme_name ),
            'add_new_item'      => __( 'Додати місто', \PS::$theme_name ),
            'new_item_name'     => __( 'Нове місто', \PS::$theme_name )
        );

        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_admin_column' => true
        );

        register_taxonomy( 'city', 'schools', $args );
    }
}