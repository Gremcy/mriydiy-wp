<?php

namespace PS\Functions\Admin;

/**
 * Class Columns
 * @package PS\Functions\Admin
 */
class Columns {

    /**
     * constructor
     */
    public function __construct() {
        // camp
        add_filter('manage_edit-camps_columns', array( $this, 'columns_head_only_camps'), 15);
        add_filter('manage_camps_posts_custom_column', array( $this, 'columns_content_only_camps'), 10, 2);

        // club
        add_filter('manage_edit-clubs_columns', array( $this, 'columns_head_only_clubs'), 15);
        add_filter('manage_clubs_posts_custom_column', array( $this, 'columns_content_only_clubs'), 10, 2);

        // news
        add_filter('manage_edit-news_columns', array( $this, 'columns_head_only_news'), 15);
        add_filter('manage_news_posts_custom_column', array( $this, 'columns_content_only_news'), 10, 2);

        // video
        add_filter('manage_edit-video_columns', array( $this, 'columns_head_only_video'), 15);
        add_filter('manage_video_posts_custom_column', array( $this, 'columns_content_only_video'), 10, 2);

        // team
        add_filter('manage_edit-team_columns', array( $this, 'columns_head_only_team'), 15);
        add_filter('manage_team_posts_custom_column', array( $this, 'columns_content_only_team'), 10, 2);

        // schools
        add_filter('manage_edit-schools_columns', array( $this, 'columns_head_only_schools'), 15);
        add_filter('manage_schools_posts_custom_column', array( $this, 'columns_content_only_schools'), 10, 2);

        // forms
        add_filter('manage_edit-enter_columns', array( $this, 'columns_head_only_enter'), 15);
        add_filter('manage_enter_posts_custom_column', array( $this, 'columns_content_only_enter'), 10, 2);

        add_filter('manage_edit-question_columns', array( $this, 'columns_head_only_question'), 15);
        add_filter('manage_question_posts_custom_column', array( $this, 'columns_content_only_question'), 10, 2);

        add_filter('manage_edit-call_columns', array( $this, 'columns_head_only_call'), 15);
        add_filter('manage_call_posts_custom_column', array( $this, 'columns_content_only_call'), 10, 2);

        add_filter('manage_edit-reviews_columns', array( $this, 'columns_head_only_reviews'), 15);
        add_filter('manage_reviews_posts_custom_column', array( $this, 'columns_content_only_reviews'), 10, 2);

        add_filter('manage_edit-subscribe_columns', array( $this, 'columns_head_only_subscribe'), 15);
        add_filter('manage_subscribe_posts_custom_column', array( $this, 'columns_content_only_subscribe'), 10, 2);
    }

    /**
     * camp
     */
    public function columns_head_only_camps($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['img'] = 'Фото';
        $defaults['title'] = 'Заголовок';
        $defaults['price'] = 'Вартість';
        $defaults['dates'] = 'Зміни';
        $defaults['online_pay'] = '[Онлайн-оплата]';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_camps($column_name, $post_ID) {
        // image
        if ($column_name == 'img') {
            $img = get_field('img', $post_ID);
            echo (is_array($img) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "-");
        }
        // price
        elseif ($column_name == 'price') {
            $price = get_field('price', $post_ID);
            echo ($price ?: "-");
        }
        // dates
        elseif ($column_name == 'dates') {
            $dates = get_field('dates', $post_ID); if(is_array($dates) && count($dates)){
                foreach ($dates as $date){
                    echo date('d.m', strtotime($date['start'])) . ($date['end'] ? ' - ' . date('d.m', strtotime($date['end'])) : '') . '<br>';
                }
            }
        }
        // payment
        elseif ($column_name == 'online_pay') {
            $payment_active = (bool)get_field( 'payment_active', $post_ID );
            $payment_sum = (int)get_field( 'payment_sum', $post_ID );
            echo ($payment_active && $payment_sum ? $payment_sum . ' грн' : "-");
        }
    }

    /**
     * club
     */
    public function columns_head_only_clubs($defaults) {
        unset($defaults['title']);
        unset($defaults['taxonomy-direction']);
        unset($defaults['taxonomy-age']);
        unset($defaults['date']);
        $defaults['img'] = 'Фото';
        $defaults['title'] = 'Заголовок';
        $defaults['price'] = 'Вартість';
        $defaults['schools'] = 'Заклад';
        $defaults['taxonomy-direction'] = 'Напрямок';
        $defaults['taxonomy-age'] = 'Вік';
        $defaults['online_pay'] = '[Онлайн-оплата]';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_clubs($column_name, $post_ID) {
        // image
        if ($column_name == 'img') {
            $img = get_field('img', $post_ID);
            echo (is_array($img) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "-");
        }
        // price
        elseif ($column_name == 'price') {
            $info = get_field('info');
            echo ($info['price'] ?: "-");
        }
        // schools
        elseif ($column_name == 'schools') {
            $schools = get_field('schools'); if(is_array($schools) && count($schools)){
                foreach($schools as $m => $school_id){
                    echo get_the_title($school_id) . (($m + 1) < count($schools) ? '<br>' : '');
                }
            }
        }
        // payment
        elseif ($column_name == 'online_pay') {
            $payment_active = (bool)get_field( 'payment_active', $post_ID );
            $payment_sum = (int)get_field( 'payment_sum', $post_ID );
            echo ($payment_active && $payment_sum ? $payment_sum . ' грн' : "-");
        }
    }

    /**
     * news
     */
    public function columns_head_only_news($defaults) {
        unset($defaults['title']);
        unset($defaults['taxonomy-news_tags']);
        unset($defaults['date']);
        $defaults['img'] = 'Фото';
        $defaults['title'] = 'Заголовок';
        $defaults['taxonomy-news_tags'] = 'Категорія';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_news($column_name, $post_ID) {
        // image
        if ($column_name == 'img') {
            $img = get_field('img', $post_ID);
            echo (is_array($img) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "-");
        }
    }

    /**
     * video
     */
    public function columns_head_only_video($defaults) {
        unset($defaults['title']);
        unset($defaults['taxonomy-video_tags']);
        unset($defaults['date']);
        $defaults['img'] = 'Фото';
        $defaults['title'] = 'Заголовок';
        $defaults['taxonomy-video_tags'] = 'Категорія';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_video($column_name, $post_ID) {
        // image
        if ($column_name == 'img') {
            $video = get_field('video', $post_ID);
            preg_match('/src="([^"]+)"/', $video, $match);
            echo ($video ? "<img src='https://i.ytimg.com/vi_webp/" . str_ireplace(['https://www.youtube.com/embed/', '?feature=oembed'], '', $match[1]) . "/maxresdefault.webp'>" : "-");
        }
    }

    /**
     * team
     */
    public function columns_head_only_team($defaults) {
        unset($defaults['title']);
        unset($defaults['taxonomy-team_tags']);
        unset($defaults['date']);
        $defaults['img'] = 'Фото';
        $defaults['title'] = 'Ім\'я';
        $defaults['school'] = 'Школа';
        $defaults['taxonomy-team_tags'] = 'Категорія';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_team($column_name, $post_ID) {
        if ($column_name == 'img') {
            $img = get_field('img', $post_ID);
            echo (is_array($img) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "");
        }elseif ($column_name == 'school') {
            $schools = get_field('school', $post_ID);
            if(is_array($schools) && count($schools)){
                foreach ($schools as $m => $school){
                    echo get_the_title($school);
                    echo (count($schools) > 1 && $m + 1 < count($schools) ? '<br>' : '');
                }
            }
        }
    }

    /**
     * schools
     */
    public function columns_head_only_schools($defaults) {
        unset($defaults['title']);
        unset($defaults['taxonomy-city']);
        unset($defaults['taxonomy-schools_type']);
        unset($defaults['date']);
        $defaults['img'] = 'Фото';
        $defaults['title'] = 'Адреса';
        $defaults['taxonomy-schools_type'] = 'Тип закладу';
        $defaults['taxonomy-city'] = 'Місто';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_schools($column_name, $post_ID) {
        // image
        if ($column_name == 'img') {
            $img = get_field('img', $post_ID);
            echo (is_array($img) ? "<img src='" . $img['sizes']['100x100'] . "'>" : "-");
        }
    }

    /**
     * forms
     */
    public function columns_head_only_enter($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['title'] = 'ID';
        $defaults['type'] = 'Тип заявки';
        $defaults['name'] = 'Ім\'я';
        $defaults['phone'] = 'Телефон';
        $defaults['email'] = 'E-mail';
        $defaults['payment'] = 'Оплата';
        $defaults['honeypot'] = 'Honeypot ';
        $defaults['utm_source'] = 'utm_source';
        $defaults['utm_medium'] = 'utm_medium';
        $defaults['utm_campaign'] = 'utm_campaign';
        $defaults['utm_term'] = 'utm_term';
        $defaults['utm_content'] = 'utm_content';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_enter($column_name, $post_ID) {
        // type
        if ($column_name == 'type') {
            echo '<strong style="text-transform: uppercase">' . get_field('type', $post_ID)['label'] . '</strong>';
        }
        // name
        elseif ($column_name == 'name') {
            echo get_field('name', $post_ID);
        }
        // phone
        elseif ($column_name == 'phone') {
            echo get_field('phone', $post_ID);
        }
        // email
        elseif ($column_name == 'email') {
            echo get_field('email', $post_ID);
        }
        // payment
        elseif ($column_name == 'payment') {
            $pay_status = get_field('pay_status', $post_ID);
            $pay_info = get_field('pay_info', $post_ID);

            if($pay_status === 'wait_payment'){
                echo '[очікування оплати]';
            }elseif($pay_status === 'success_payment'){
                echo '<span style="color:#58bc00">' . '[успішно оплачено]' . '</span>';
            }else{
                echo '[не оплачено]';
            }

            if($pay_info){
                echo '<br><span style="color:grey">(' . $pay_info . ')</span>';
            }
        }
        // honeypot
        elseif ($column_name == 'honeypot') {
            echo get_field('fax_number', $post_ID) . '<br>' . get_field('phone_second', $post_ID);
        }
        // utm
        elseif ($column_name == 'utm_medium') {
            echo get_field('utm_medium', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_source') {
            echo get_field('utm_source', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_campaign') {
            echo get_field('utm_campaign', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_term') {
            echo get_field('utm_term', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_content') {
            echo get_field('utm_content', $post_ID) ?: '-';
        }
    }

    public function columns_head_only_question($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['title'] = 'ID';
        $defaults['name'] = 'Ім\'я';
        $defaults['phone'] = 'Телефон';
        $defaults['email'] = 'E-mail';
        $defaults['utm_source'] = 'utm_source';
        $defaults['utm_medium'] = 'utm_medium';
        $defaults['utm_campaign'] = 'utm_campaign';
        $defaults['utm_term'] = 'utm_term';
        $defaults['utm_content'] = 'utm_content';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_question($column_name, $post_ID) {
        // name
        if ($column_name == 'name') {
            echo get_field('name', $post_ID);
        }
        // phone
        elseif ($column_name == 'phone') {
            echo get_field('phone', $post_ID);
        }
        // email
        elseif ($column_name == 'email') {
            echo get_field('email', $post_ID);
        }
        // utm
        elseif ($column_name == 'utm_medium') {
            echo get_field('utm_medium', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_source') {
            echo get_field('utm_source', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_campaign') {
            echo get_field('utm_campaign', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_term') {
            echo get_field('utm_term', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_content') {
            echo get_field('utm_content', $post_ID) ?: '-';
        }
    }

    public function columns_head_only_call($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['title'] = 'ID';
        $defaults['name'] = 'Ім\'я';
        $defaults['phone'] = 'Телефон';
        $defaults['utm_source'] = 'utm_source';
        $defaults['utm_medium'] = 'utm_medium';
        $defaults['utm_campaign'] = 'utm_campaign';
        $defaults['utm_term'] = 'utm_term';
        $defaults['utm_content'] = 'utm_content';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_call($column_name, $post_ID) {
        // name
        if ($column_name == 'name') {
            echo get_field('name', $post_ID);
        }
        // phone
        elseif ($column_name == 'phone') {
            echo get_field('phone', $post_ID);
        }
        // utm
        elseif ($column_name == 'utm_medium') {
            echo get_field('utm_medium', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_source') {
            echo get_field('utm_source', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_campaign') {
            echo get_field('utm_campaign', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_term') {
            echo get_field('utm_term', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_content') {
            echo get_field('utm_content', $post_ID) ?: '-';
        }
    }

    public function columns_head_only_reviews($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['title'] = 'ID';
        $defaults['name'] = 'Ім\'я';
        $defaults['phone'] = 'Телефон';
        $defaults['email'] = 'E-mail';
        $defaults['active'] = 'Показувати на сайті?';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_reviews($column_name, $post_ID) {
        // name
        if ($column_name == 'name') {
            echo get_field('name', $post_ID);
        }
        // phone
        elseif ($column_name == 'phone') {
            echo get_field('phone', $post_ID);
        }
        // email
        elseif ($column_name == 'email') {
            echo get_field('email', $post_ID);
        }
        // active
        elseif ($column_name == 'active') {
            echo get_field('active', $post_ID) ? 'так' : '-';
        }
    }

    public function columns_head_only_subscribe($defaults) {
        unset($defaults['title']);
        unset($defaults['date']);
        $defaults['title'] = 'ID';
        $defaults['name'] = 'Ім\'я';
        $defaults['email'] = 'E-mail';
        $defaults['utm_source'] = 'utm_source';
        $defaults['utm_medium'] = 'utm_medium';
        $defaults['utm_campaign'] = 'utm_campaign';
        $defaults['utm_term'] = 'utm_term';
        $defaults['utm_content'] = 'utm_content';
        $defaults['date'] = 'Дата';
        return $defaults;
    }

    public function columns_content_only_subscribe($column_name, $post_ID) {
        // name
        if ($column_name == 'name') {
            echo get_field('name', $post_ID);
        }
        // email
        elseif ($column_name == 'email') {
            echo get_field('email', $post_ID);
        }
        // utm
        elseif ($column_name == 'utm_medium') {
            echo get_field('utm_medium', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_source') {
            echo get_field('utm_source', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_campaign') {
            echo get_field('utm_campaign', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_term') {
            echo get_field('utm_term', $post_ID) ?: '-';
        }elseif ($column_name == 'utm_content') {
            echo get_field('utm_content', $post_ID) ?: '-';
        }
    }

}