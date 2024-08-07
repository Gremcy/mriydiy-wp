<?php

namespace PS\Functions\Plugins;

/**
 * Class ACF
 * @package PS\Functions\Plugins
 */
class ACF {

    /**
     * constructor
     */
    public function __construct() {
        // option page
        add_action('init', array( $this, 'register_option_page' ), 20);
		
        // translating
        add_filter('acf/prepare_field/type=text', array( $this, 'my_acf_prepare_field' ));
        add_filter('acf/prepare_field/type=textarea', array( $this, 'my_acf_prepare_field' ));
		
        // fix for object/relationship fields
        add_filter('acf/fields/post_object/query', array( $this, 'fix_relationship_query'), 10, 3);
        add_filter('acf/fields/relationship/query', array( $this, 'fix_relationship_query'), 10, 3);
		
        // fix for translating of object/relationship field
        add_filter('acf/fields/post_object/result', array( $this, 'my_relationship_result'), 10, 4);
        add_filter('acf/fields/relationship/result', array( $this, 'my_relationship_result'), 10, 4);

        // wysiwyg field
        add_filter( 'acf/fields/wysiwyg/toolbars', array( $this, 'my_toolbars') );

        // colors / icons
        add_filter('acf/load_field/type=button_group', array( $this, 'my_acf_load_color_field'));

        // saving post
        add_action( 'acf/save_post', array( $this, 'my_acf_save_post' ), 20 );
    }

    // option page
    public function register_option_page(){
        if( function_exists('acf_add_options_page') ) {
            acf_add_options_page(array(
                'page_title' 	=> __( 'Налаштування', \PS::$theme_name ),
                'menu_slug' 	=> 'other'
            ));
        }
    }

    // translating
    public function my_acf_prepare_field( $field ) {
        if(isset($field['wrapper']['class'])){
            $class_arr = explode(' ', $field['wrapper']['class']);
            if( !in_array('not_translate_it', $class_arr)) {
                $field['class'] = 'i18n-multilingual';
            }
        }
        return $field;
    }

    // fix relationship/object query
    public function fix_relationship_query( $args, $field, $post_id ) {
        // remove itself
        $args['post__not_in'] = array($post_id);
        // return
        return $args;
    }

    // fix for translating of object/relationship field
    public function my_relationship_result( $title, $post, $field, $post_id ) {
        // check for qtranlate format
        if(stripos($title, '[:') !== false){
            $title = substr($title, 5, stripos($title, '[:', 5) - 5);
        }
        // return
        return $title;
    }

    /**
     * Wysiwyg field
     */
    public function my_toolbars( $toolbars ){
        // change
        $toolbars['Basic'][1] = [
            'bold',
            'link',
            'bullist',
            'alignleft',
            'aligncenter',
            'alignright',
            'pastetext',
            'removeformat'
        ];

        $toolbars['Full'][1] = [
            'formatselect',
            'bold',
            'italic',
            'underline',
            'strikethrough',
            'forecolor',
            'alignleft',
            'aligncenter',
            'alignright',
            'bullist',
            'numlist',
            'link',
            'pastetext',
            'removeformat'
        ];
        $toolbars['Full'][2] = [];

        return $toolbars;
    }

    // colors / icons
    public function my_acf_load_color_field( $field ) {
        if($field['wrapper']['class'] === 'color'){
            $field['required'] = true;
            $field['choices'] = array(
                '#FFF7E1' => 'жовтий',
                '#DCF9F0' => 'зелений',
                '#DAF9FF' => 'синій',
                '#FFF3EC' => 'червоний',
                '#F5F5F5' => 'сірий'
            );
        }

        elseif($field['wrapper']['class'] === 'icons'){
            $field['default_value'] = '0';

            $field['choices'] = [
                '0' => '-'
            ];
            for($n = 1; $n <= 62; $n++){
                $field['choices'][$n] = '<img src="' . \PS::$assets_url . 'images/admin/big-icons/icon' . $n . '.svg">';
            }
        }

        return $field;
    }

    /**
     * Saving post
     */
    public function my_acf_save_post( $post_id ) {
        // generate sitemap.xml
        \PS\Functions\Helper\Cron::generate_sitemap();

        // news
        if ( get_post_type( $post_id ) == 'news' ) {
            $dates = get_field('dates', $post_id); if(is_array($dates) && count($dates)){
                $data = array(
                    'ID' => $post_id,
                    'post_date' => $dates[0]['start'] . ' 00:00:00',
                    'post_date_gmt' => $dates[0]['start'] . ' 00:00:00'
                );
                wp_update_post( $data );
            }
        }
    }

}