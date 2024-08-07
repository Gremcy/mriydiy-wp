<?php

namespace PS\Functions\Ajax;

/**
 * Class Forms
 * @package     PS\Functions\Ajax
 * @since       1.0.0
 */
class Forms {

    public function __construct() {
        // enter
        add_action( 'wp_ajax_add_new_enter', array( $this, 'add_new_enter' ) );
        add_action( 'wp_ajax_nopriv_add_new_enter', array( $this, 'add_new_enter' ) );

        // question
        add_action( 'wp_ajax_add_new_question', array( $this, 'add_new_question' ) );
        add_action( 'wp_ajax_nopriv_add_new_question', array( $this, 'add_new_question' ) );

        // call
        add_action( 'wp_ajax_add_new_call', array( $this, 'add_new_call' ) );
        add_action( 'wp_ajax_nopriv_add_new_call', array( $this, 'add_new_call' ) );

        // reviews
        add_action( 'wp_ajax_add_new_reviews', array( $this, 'add_new_reviews' ) );
        add_action( 'wp_ajax_nopriv_add_new_reviews', array( $this, 'add_new_reviews' ) );

        // subscribe
        add_action( 'wp_ajax_add_new_subscribe', array( $this, 'add_new_subscribe' ) );
        add_action( 'wp_ajax_nopriv_add_new_subscribe', array( $this, 'add_new_subscribe' ) );
    }

    // save utm
    public static function save_data($post_id){
        // utm
        $utms = ['utm_medium', 'utm_source', 'utm_campaign', 'utm_term', 'utm_content'];
        foreach($utms as $utm){
            if(isset($_SESSION[$utm])){
                update_field($utm, $_SESSION[$utm], $post_id);
            }
        }
    }

    // enter
    public function add_new_enter() {
        $CyrToLat = new \PS\Functions\Plugins\CyrToLat();
        $return = [
            'success' => false
        ];

        // 1. vars
        $type = isset($_POST['type']) ? wp_strip_all_tags($_POST['type'], true) : '';

        $camp = isset($_POST['camp']) ? wp_strip_all_tags($_POST['camp'], true) : '';
        $club = isset($_POST['club']) ? wp_strip_all_tags($_POST['club'], true) : '';

        $name = isset($_POST['name']) ? wp_strip_all_tags($_POST['name'], true) : '';
        $phone = isset($_POST['phone']) ? wp_strip_all_tags($_POST['phone'], true) : '';
        $email = isset($_POST['email']) ? wp_strip_all_tags($_POST['email'], true) : '';
        $age = isset($_POST['age']) ? wp_strip_all_tags($_POST['age'], true) : '';

        $city = isset($_POST['city']) ? wp_strip_all_tags($_POST['city'], true) : '';

        $page = isset($_POST['page']) ? wp_strip_all_tags($_POST['page'], true) : '';
        $url = isset($_POST['url']) ? wp_strip_all_tags($_POST['url'], true) : '';
        $id = isset($_POST['post_id']) ? wp_strip_all_tags($_POST['post_id'], true) : '';


        /*
         ******************   HONEYPOT   ******************
         */

        $phone_second = isset($_POST['phone_second']) ? wp_strip_all_tags($_POST['phone'], true) : '';
        $fax_number = isset($_POST['fax_number']) ? wp_strip_all_tags($_POST['fax_number'], true) : '';



        if($phone){

            // 2. save letter
            $post_data = array(
                'post_title' => '',
                'post_type'   => 'enter',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $post_id = wp_insert_post($post_data);
            if($post_id){
                // update title
                $update_data = array(
                    'ID'         => $post_id,
                    'post_title' => '#' . sprintf( '%05d', $post_id )
                );
                wp_update_post( $update_data );

                // fields
                update_field("field_63e16186f90f8", $type, $post_id);

                if($type === 'camp'){
                    update_field("field_63e1624a1c647", $camp, $post_id);
                }elseif($type === 'club'){
                    update_field("field_63e1625edb5a2", $club, $post_id);
                }

                update_field("field_63e16214829ee", $name, $post_id);
                update_field("field_63e16221829ef", $phone, $post_id);
                update_field("field_63e1622f829f0", $email, $post_id);
                update_field("field_63e1623ab9cb1", $age, $post_id);

                update_field("field_64748bd505cde", $city, $post_id);

                update_field("field_63e161536df60", $page, $post_id);
                update_field("field_63e1613c8e13a", $url, $post_id);
                update_field("field_6500697d72667", $id, $post_id);


                /*******************   HONEYPOT SAVE  *******************/

                update_field("field_65a13473cb0ea", $phone_second, $post_id);
                update_field("field_65a13448cb0e9", $fax_number, $post_id);


                // save additional data
                self::save_data($post_id);

                // send to CRM
                $Keepincrm = new \PS\Functions\Crm\Keepincrm();
                $Keepincrm->send_to_keepincrm($post_id);

                // send email
                $Email = new \PS\Functions\Helper\Email();
                $Email->send_notification($post_id);

                // success
                $return['success'] = true;
                if($type === 'camp' || $type === 'club'){ // new
                    $camp_slug = \PS\Functions\Helper\Helper::get_slug($id);
                    $return['url'] = get_the_permalink(\PS::$thanks_page) . $type . '/' . ($camp_slug ? $camp_slug . '/' : '') . '?id=' . $post_id;
                }else{
                    $return['url'] = get_the_permalink(\PS::$thanks_page) . $type . '/' . ($city ? mb_strtolower($CyrToLat->ctl_sanitize_title($city)) . '/' : '') . '?id=' . $post_id;
                }
            }
        }

        // echo
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
        exit();
    }

    // question
    public function add_new_question() {
        $return = [
            'success' => false
        ];

        // 1. vars
        $name = isset($_POST['name']) ? wp_strip_all_tags($_POST['name'], true) : '';
        $phone = isset($_POST['phone']) ? wp_strip_all_tags($_POST['phone'], true) : '';
        $email = isset($_POST['email']) ? wp_strip_all_tags($_POST['email'], true) : '';
        $question = isset($_POST['question']) ? wp_strip_all_tags($_POST['question'], true) : '';

        $page = isset($_POST['page']) ? wp_strip_all_tags($_POST['page'], true) : '';
        $url = isset($_POST['url']) ? wp_strip_all_tags($_POST['url'], true) : '';

        if($phone){

            // 2. save letter
            $post_data = array(
                'post_title' => '',
                'post_type'   => 'question',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $post_id = wp_insert_post($post_data);
            if($post_id){
                // update title
                $update_data = array(
                    'ID'         => $post_id,
                    'post_title' => '#' . sprintf( '%05d', $post_id )
                );
                wp_update_post( $update_data );

                // fields
                update_field("field_63e22c33e8474", $name, $post_id);
                update_field("field_63e22c33e84ab", $phone, $post_id);
                update_field("field_63e22c33e84e2", $email, $post_id);
                update_field("field_63e22c33e8507", $question, $post_id);

                update_field("field_63e22c33e8578", $page, $post_id);
                update_field("field_63e22c33e85b3", $url, $post_id);

                // save additional data
                self::save_data($post_id);

                // send to CRM
                $Keepincrm = new \PS\Functions\Crm\Keepincrm();
                $Keepincrm->send_to_keepincrm($post_id);

                // send email
                $Email = new \PS\Functions\Helper\Email();
                $Email->send_notification($post_id);

                // success
                $return['success'] = true;
                $return['url'] = get_the_permalink(\PS::$thanks_page) . 'question' . '/';
            }

        }

        // echo
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
        exit();
    }

    // call
    public function add_new_call() {
        $return = [
            'success' => false
        ];

        // 1. vars
        $name = isset($_POST['name']) ? wp_strip_all_tags($_POST['name'], true) : '';
        $phone = isset($_POST['phone']) ? wp_strip_all_tags($_POST['phone'], true) : '';

        $page = isset($_POST['page']) ? wp_strip_all_tags($_POST['page'], true) : '';
        $url = isset($_POST['url']) ? wp_strip_all_tags($_POST['url'], true) : '';

        if($phone){

            // 2. save letter
            $post_data = array(
                'post_title' => '',
                'post_type'   => 'call',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $post_id = wp_insert_post($post_data);
            if($post_id){
                // update title
                $update_data = array(
                    'ID'         => $post_id,
                    'post_title' => '#' . sprintf( '%05d', $post_id )
                );
                wp_update_post( $update_data );

                // fields
                update_field("field_63e22c6988d5f", $name, $post_id);
                update_field("field_63e22c6988d9d", $phone, $post_id);

                update_field("field_63e22c6988eb9", $page, $post_id);
                update_field("field_63e22c6988ef0", $url, $post_id);

                // save additional data
                self::save_data($post_id);

                // send to CRM
                $Keepincrm = new \PS\Functions\Crm\Keepincrm();
                $Keepincrm->send_to_keepincrm($post_id);

                // send email
                $Email = new \PS\Functions\Helper\Email();
                $Email->send_notification($post_id);

                // success
                $return['success'] = true;
                $return['url'] = get_the_permalink(\PS::$thanks_page) . 'call' . '/';
            }

        }

        // echo
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
        exit();
    }

    // reviews
    public function add_new_reviews() {
        $return = [
            'success' => false
        ];

        // 1. vars
        $name = isset($_POST['name']) ? wp_strip_all_tags($_POST['name'], true) : '';
        $phone = isset($_POST['phone']) ? wp_strip_all_tags($_POST['phone'], true) : '';
        $email = isset($_POST['email']) ? wp_strip_all_tags($_POST['email'], true) : '';
        $child_name = isset($_POST['child_name']) ? wp_strip_all_tags($_POST['child_name'], true) : '';
        $child_age = isset($_POST['child_age']) ? wp_strip_all_tags($_POST['child_age'], true) : '';
        $text = isset($_POST['text']) ? wp_strip_all_tags($_POST['text'], true) : '';

        $page = isset($_POST['page']) ? wp_strip_all_tags($_POST['page'], true) : '';
        $url = isset($_POST['url']) ? wp_strip_all_tags($_POST['url'], true) : '';

        if($phone){
            // 2. save
            $post_data = array(
                'post_title' => '',
                'post_type'   => 'reviews',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $post_id = wp_insert_post($post_data);
            if($post_id){
                // update title
                $update_data = array(
                    'ID'         => $post_id,
                    'post_title' => '#' . sprintf( '%05d', $post_id )
                );
                wp_update_post( $update_data );

                // fields
                update_field("field_66aa1fec7f276", $name, $post_id);
                update_field("field_66aa1fec7f28f", $phone, $post_id);
                update_field("field_66aa1fec7f2c7", $email, $post_id);
                update_field("field_66aa201b7c727", $child_name, $post_id);
                update_field("field_66aa202e7c728", $child_age, $post_id);
                update_field("field_66aa1fec7f2fd", $text, $post_id);

                update_field("field_66aa1fec7f36b", $page, $post_id);
                update_field("field_66aa1fec7f3a1", $url, $post_id);

                // save additional data
                self::save_data($post_id);

                // send email
                $Email = new \PS\Functions\Helper\Email();
                $Email->send_notification($post_id);

                // success
                $return['success'] = true;
                $return['url'] = get_the_permalink(\PS::$thanks_page) . 'reviews' . '/';
            }

        }

        // echo
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
        exit();
    }

    // subscribe
    public function add_new_subscribe() {
        $return = [
            'success' => false
        ];

        // 1. vars
        $name = isset($_POST['name']) ? wp_strip_all_tags($_POST['name'], true) : '';
        $email = isset($_POST['email']) ? wp_strip_all_tags($_POST['email'], true) : '';

        $page = isset($_POST['page']) ? wp_strip_all_tags($_POST['page'], true) : '';
        $url = isset($_POST['url']) ? wp_strip_all_tags($_POST['url'], true) : '';

        if($email){

            // 2. save letter
            $post_data = array(
                'post_title' => '',
                'post_type'   => 'subscribe',
                'post_status' => 'publish',
                'post_author' => 1
            );
            $post_id = wp_insert_post($post_data);
            if($post_id){
                // update title
                $update_data = array(
                    'ID'         => $post_id,
                    'post_title' => '#' . sprintf( '%05d', $post_id )
                );
                wp_update_post( $update_data );

                // fields
                update_field("field_63e22c8785586", $name, $post_id);
                update_field("field_63e22c87855be", $email, $post_id);

                update_field("field_63e22c878562b", $page, $post_id);
                update_field("field_63e22c8785662", $url, $post_id);

                // save additional data
                self::save_data($post_id);

                // success
                $return['success'] = true;
                $return['url'] = get_the_permalink(\PS::$thanks_page) . 'subscribe' . '/';
            }

        }

        // echo
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
        exit();
    }

}