<?php

namespace PS\Functions\Assets;

/**
 * Class Files
 * @package PS\Functions\Assets
 * @since   1.0.0
 */
class Files {

    /**
     * constructor.
     */
    public function __construct() {
        //
        add_action( 'wp_print_styles', array( $this, 'load_styles_on_site' ) ); // css
        add_action( 'wp_enqueue_scripts', array($this, 'load_scripts_on_site' ) ); // js
        add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts_in_admin' ) ); // admin css and js
    }

    /**
     * css
     */
    public function load_styles_on_site() {
        // css
        if(is_front_page() || is_page(\PS::$camps_page) || get_post_meta(get_the_ID(), '_wp_page_template', true) === 'template-kindergarten.php'){
            wp_enqueue_style('datetimepicker_css', \PS::$assets_url.'styles/min/jquery.datetimepicker.min.css', array(), '1.0.0');
        }
        wp_enqueue_style('slick_css', \PS::$assets_url.'styles/min/slick.min.css', array(), '1.8.1');
        wp_enqueue_style('main_css', \PS::$assets_url.'styles/main.css', array(), '1.0.53');
    }

    /**
     * js
     */
    public function load_scripts_on_site() {
        // jquery
        wp_deregister_script('jquery'); wp_register_script('jquery', \PS::$assets_url.'js/min/jquery-3.6.3.min.js', false, '3.6.3', true); wp_enqueue_script('jquery');

        // js
        if(is_front_page() || is_page(\PS::$camps_page) || get_post_meta(get_the_ID(), '_wp_page_template', true) === 'template-kindergarten.php'){
            wp_enqueue_script('datetimepicker_js', \PS::$assets_url.'js/min/jquery.datetimepicker.full.min.js', array('jquery'), '1.0.1', true);
        }
        wp_enqueue_script('imagesloaded_js', \PS::$assets_url.'js/min/imagesloaded.pkgd.min.js', array('jquery'), '5.0.0', true);
        wp_enqueue_script('parsley_js', \PS::$assets_url.'js/min/parsley.min.js', array('jquery'), '2.9.2', true);
        wp_enqueue_script('inputmask_js', \PS::$assets_url.'js/min/inputmask.min.js', array('jquery'), '5.0.8', true);
        wp_enqueue_script('main_js', \PS::$assets_url.'js/main.js', array('jquery'), '1.0.53', true);
    }

    /**
     * css/js in admin panel
     */
    public function load_scripts_in_admin() {
        wp_enqueue_script('admin_js', \PS::$assets_url.'js/admin/admin.js', array('jquery'), '1.0.0');
        wp_enqueue_style('admin_css', \PS::$assets_url.'styles/admin/admin.css', array(), '1.0.6');
    }
}