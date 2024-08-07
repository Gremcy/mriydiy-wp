<?php

namespace PS\Functions\Seo;

/**
 * Class Meta
 * @package PS\Functions\Seo
 */
class Meta {

    protected $separator;
    protected $blogname;

    /**
     * constructor
     */
    public function __construct() {
        $this->separator = ' - ';
        $this->blogname = get_option('blogname');
        //
        add_filter( 'wp_title', array($this, 'seo_title'), 100 ); // set seo
        add_filter( 'PS_get_context', array( $this, 'set_context' ) );
    }

    /**
     * SEO
     */
    private function get_seo($what){
        // get seo value from database

        /* ARCHIVES */
        if(is_post_type_archive()){

            // id of page, where values stored (or 'option')
            $page_id = \PS::$option_page;
            // slug of post type
            $post_type_object = get_queried_object();
            $post_type_slug = (isset($post_type_object->name) ? $post_type_object->name : '');
            // get value
            $return = get_field($post_type_slug.'_seo_'.$what, $page_id);

        }

        /* NEWS */
        elseif(is_page(\PS::$news_page)){
            if(get_query_var('section')){
                $term = get_term_by('slug', get_query_var('section'), 'news_tags');
                if(isset($term->term_id)){
                    // return
                    $default = $what=='title' ? $term->name . $this->separator . $this->blogname : '';
                    $return = (get_field('seo_'.$what, 'term_' . $term->term_id) ?: $default);
                }else{
                    $return = get_field('seo_'.$what);
                }
            }else{
                $return = get_field('seo_'.$what);
            }

            // add page
            if(get_query_var('paged') > 1){
                $return = __('Сторінка', \PS::$theme_name) . ' ' . get_query_var('paged') . ' - ' . $return;
            }
        }

        /* SINGULAR POST */
        elseif(is_singular() && !is_page()){

            if(is_singular('news')){
                // return
                $default = ($what=='title' ? get_the_title() . ' | ' . __('Новини та події MRIYDIY', \PS::$theme_name) : get_the_title() . '. 📆' . __('Опубліковано', \PS::$theme_name) . ' - ' . get_the_time('d/m/Y'));
                $return = (get_field('seo_'.$what) ? get_field('seo_'.$what) : $default);
            }else{
                $post_type = get_post_type_object(get_post_type());
                // return
                $default = ($what=='title' ? get_the_title() . $this->separator . $post_type->labels->name . $this->separator . $this->blogname : '');
                $return = (get_field('seo_'.$what) ? get_field('seo_'.$what) : $default);
            }

        }

        /* TAXONOMY */
        elseif(is_tax()){

            $post_type_object = get_queried_object();
            $page_id = $post_type_object->taxonomy.'_'.$post_type_object->term_id;
            // default value
            $default = ($what=='title' ? $post_type_object->name : '');
            // get value
            $return = (get_field('seo_'.$what, $page_id) ? get_field('seo_'.$what, $page_id) : $default);

        }

        /* OTHER */
        else{

            $return = get_field('seo_'.$what);

        }

        /* RETURN */
        if($what=='title'){ // TITLE
            return $return;
        }elseif($what=='description'){ // DESCRIPTION
            return ($return ?: get_option('blogdescription'));
        }else{ // SEO-TEXT
            return $return;
        }
    }

    /**
     * set SEO
     */
    public function seo_title($title){
        $custom_title = $this::get_seo('title');
        if(is_front_page()){ // mainpage
            return ($custom_title ?: $this->blogname );
        }else{ // others
            return ($custom_title ?: $title . $this->separator . $this->blogname );
        }
    }

    /**
     * return SEO
     */
    public function set_context( $context ) {
        $context['seo_description'] = $this->get_seo('description');
        $context['seo_text'] = $this->get_seo('text');
        return $context;
    }

}