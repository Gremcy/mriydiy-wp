<?php

namespace PS\Functions\Post_Types;

/**
 * Class Clubs
 * @package PS\Functions\Post_Types
 */
class Clubs {

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
            'name'               => __( 'Клуби', \PS::$theme_name ),
            'add_new'            => __( 'Додати клуб', \PS::$theme_name ),
            'new_item'           => __( 'Новий клуб', \PS::$theme_name )
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

        register_post_type( 'clubs', $args );
    }

    public function register_taxonomies(){
        // type
        $labels = array(
            'name'              => __( 'Напрямок', \PS::$theme_name ),
            'add_new_item'      => __( 'Додати напрямок', \PS::$theme_name ),
            'new_item_name'     => __( 'Новий напрямок', \PS::$theme_name )
        );

        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_admin_column' => true
        );

        register_taxonomy( 'direction', 'clubs', $args );

        // city
        $labels = array(
            'name'              => __( 'Вік', \PS::$theme_name ),
            'add_new_item'      => __( 'Додати вік', \PS::$theme_name ),
            'new_item_name'     => __( 'Новий вік', \PS::$theme_name )
        );

        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_admin_column' => true
        );

        register_taxonomy( 'age', 'clubs', $args );
    }

}