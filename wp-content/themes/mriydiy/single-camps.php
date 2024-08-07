<?php get_header(); ?>
<body class="camp-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="camp-main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="camp-hero-fluid">
                    <div class="camp-hero-centered">
                        <div class="camp-hero-left">
                            <div class="camp-hero-left-title"><?php echo get_the_title(); ?></div>
                            <?php $text = get_field('text_1'); if($text): ?>
                                <div class="camp-hero-left-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="camp-hero-left-btns">
                                <?php $button = get_field('button_1'); if($button['active']): ?>
                                    <a href="javascript:void(0)" class="camp-hero-left-btns-sign js-modal-link" data-target="entry-camp-popup">
                                        <div class="camp-hero-left-btns-sign-bg"></div>
                                        <span><?php _e( 'Записатися', \PS::$theme_name ); ?></span>
                                    </a>
                                <?php endif; ?>

                                <?php /*
                                <a href="#about" class="camp-hero-left-btns-more">
                                    <div class="camp-hero-left-btns-more-bg"></div>
                                    <span><?php _e( 'Дізнатися більше', \PS::$theme_name ); ?></span>
                                </a>
                                */ ?>

                                <?php if(\PS\Functions\Payment\Init::check_payment_active(get_the_ID())): ?>
                                    <div class="camp-hero-left-btns-pay-wrapper">
                                        <a href="javascript:void(0)" class="camp-hero-left-btns-pay js-modal-link" data-target="entry-camp-popup">
                                            <div class="camp-hero-left-btns-pay-bg"></div>
                                            <span><?php _e( 'Оплатити', \PS::$theme_name ); ?></span>
                                        </a>
                                        <div class="camp-hero-left-btns-pay-logos">
                                            <div class="camp-hero-left-btns-pay-logos-img">
                                                <img loading="lazy" src="<?php echo PS::$assets_url; ?>images/81.png" alt="">
                                            </div>
                                            <div class="camp-hero-left-btns-pay-logos-img">
                                                <img loading="lazy" src="<?php echo PS::$assets_url; ?>images/82.png" alt="">
                                            </div>
                                            <div class="camp-hero-left-btns-pay-logos-img">
                                                <img loading="lazy" src="<?php echo PS::$assets_url; ?>images/83.png" alt="">
                                            </div>
                                            <div class="camp-hero-left-btns-pay-logos-img">
                                                <img loading="lazy" src="<?php echo PS::$assets_url; ?>images/84.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                            <div class="camp-hero-right">
                                <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <div id="about" class="kindergarten-integrated-fluid"<?php $text = get_field('color_2'); if($text): ?> style="background-color: <?php echo $text; ?>;"<?php endif; ?>>
                    <div class="kindergarten-integrated-centered">
                        <?php $text = get_field('title_2'); if($text): ?>
                            <div class="kindergarten-integrated-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_2'); if($text): ?>
                            <div class="kindergarten-integrated-text"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <div class="kindergarten-integrated-icon">
                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon72.svg" alt="">
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_15')): ?>
                <?php $list_15 = get_field('list_15'); if(is_array($list_15) && count($list_15)): ?>
                    <div class="camps-conception-fluid">
                        <div class="camps-conception-centered">
                            <?php $text = get_field('title_15'); if($text): ?>
                                <div class="camps-conception-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="camps-conception-container">
                                <?php foreach ($list_15 as $m => $li): ?>
                                    <div class="camps-conception-item js-modal-link" data-target="tags-popup-<?php echo $m + 1; ?>">
                                        <?php if(is_array($li['img']) && count($li['img'])): ?>
                                            <div class="camps-our-item-image">
                                                <div class="camps-conception-item-image">
                                                    <img loading="lazy" src="<?php echo $li['img']['sizes']['960x0']; ?>" alt="">
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="camps-conception-item-down">
                                            <span><?php echo $li['title']; ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="20" viewBox="0 0 13 20" fill="none"><path d="M2 2L11 10L2 18" stroke="#FF5C00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <?php $list = get_field('list_3'); if(is_array($list) && count($list)): ?>
                    <div class="camp-cards-fluid">
                        <div class="camp-cards-centered">
                            <div class="camp-cards-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="camp-cards-item" style="background-color: <?php echo $block['color']; ?>">
                                        <?php if($block['icon']): ?>
                                            <div class="camp-cards-item-icon">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="camp-cards-item-name"><?php echo $block['title']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <div class="kindergarten-schedule-fluid">
                    <div class="kindergarten-schedule-centered">
                        <?php $text = get_field('title_4'); if($text): ?>
                            <div class="kindergarten-schedule-title js-stager-trigger"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_4'); if(is_array($list) && count($list)): ?>
                            <div class="kindergarten-schedule-content">
                                <div class="kindergarten-schedule-left">
                                    <?php foreach ($list as $m => $block): ?>
                                        <div class="kindergarten-schedule-left-item js-stager-anim">
                                            <div class="kindergarten-schedule-left-item-time">
                                                <div class="kindergarten-schedule-left-item-time-start"><?php echo $block['start']; ?></div>
                                                <div class="kindergarten-schedule-left-item-time-end"><?php echo $block['end']; ?></div>
                                            </div>
                                            <div class="kindergarten-schedule-left-item-text"><?php echo $block['title']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_5')): ?>
                <div class="camp-program-fluid">
                    <div class="camp-program-centered">
                        <?php $text = get_field('title_5'); if($text): ?>
                            <div class="camp-program-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_5'); if($text): ?>
                            <?php echo $text; ?>
                        <?php endif; ?>
                        <?php $list = get_field('list_5'); if(is_array($list) && count($list)): ?>
                            <div class="camp-program-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="camp-program-item">
                                        <?php if(is_array($block['img']) && count($block['img'])): ?>
                                            <div class="camp-program-item-left">
                                                <img loading="lazy" src="<?php echo $block['img']['sizes']['960x0']; ?>" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="camp-program-item-right">
                                            <div class="camp-program-item-right-day"><?php echo $m + 1; ?> <?php _e( 'день', \PS::$theme_name ); ?></div>
                                            <div class="camp-program-item-right-name"><?php echo $block['title']; ?></div>
                                            <div class="camp-program-item-right-text"><?php echo $block['text']; ?></div>
                                            <?php if($block['popup']['active']): ?>
                                                <div class="camp-program-item-right-btn js-modal-link" data-target="camp-program-popup-<?php echo $m + 1; ?>">
                                                    <span><?php _e( 'Детальніше', \PS::$theme_name ); ?></span>
                                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon82.svg" alt="i">
                                                </div>
                                            <?php endif; ?>
                                            <div class="camp-program-item-right-number"><?php echo sprintf( '%02d', ($m + 1) ); ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_6')): ?>
                <div class="camp-get-fluid">
                    <div class="camp-get-centered">
                        <?php $text = get_field('title_6'); if($text): ?>
                            <div class="camp-get-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_6'); if($text): ?>
                            <div class="camp-get-text"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_6'); if(is_array($list) && count($list)): ?>
                            <div class="camp-get-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="camp-get-item">
                                        <div class="camp-get-item-inner" style="background-color: <?php echo $block['color']; ?>">
                                            <?php if($block['icon']): ?>
                                                <div class="camp-get-item-icon">
                                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                                </div>
                                            <?php endif; ?>
                                            <div class="camp-get-item-title"><?php echo $block['title']; ?></div>
                                            <div class="camp-get-item-text"><?php echo $block['text']; ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_7')): ?>
                <?php $date = get_field('date_7'); if($date): ?>
                    <div class="camp-timers-fluid">
                        <div class="camp-timers-centered">
                            <div class="camp-timer" data-timer="<?php echo $date; ?>">
                                <?php $text = get_field('title_7'); if($text): ?>
                                    <div class="camp-timer-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <div class="camp-timer-container">
                                    <div class="camp-timer-el">
                                        <div id="countdown-days" class="camp-timer-el-num"></div>
                                        <div class="camp-timer-el-caption"><?php _e( 'днів', \PS::$theme_name ); ?></div>
                                    </div>
                                    <div class="camp-timer-colon">:</div>
                                    <div class="camp-timer-el">
                                        <div id="countdown-hours" class="camp-timer-el-num"></div>
                                        <div class="camp-timer-el-caption"><?php _e( 'годин', \PS::$theme_name ); ?></div>
                                    </div>
                                    <div class="camp-timer-colon">:</div>
                                    <div class="camp-timer-el">
                                        <div id="countdown-minutes" class="camp-timer-el-num"></div>
                                        <div class="camp-timer-el-caption"><?php _e( 'хвилин', \PS::$theme_name ); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_8')): ?>
                <div class="camp-about-fluid">
                    <div class="camp-about-centered">
                        <div class="camp-about-left">
                            <?php $whom = get_field('whom'); if($whom): ?>
                                <div class="camp-about-left-item">
                                    <div class="camp-about-left-item-title"><?php _e( 'ДЛЯ КОГО', \PS::$theme_name ); ?></div>
                                    <div class="camp-about-left-item-taxt"><?php echo $whom; ?></div>
                                </div>
                            <?php endif; ?>
                            <?php $price = get_field('price'); if($price): ?>
                                <div class="camp-about-left-item">
                                    <div class="camp-about-left-item-title"><?php _e( 'ВАРТІСТЬ', \PS::$theme_name ); ?></div>
                                    <div class="camp-about-left-item-taxt"><?php echo $price; ?></div>
                                    <?php $price_notice = get_field('price_notice'); if($price_notice): ?>
                                        <div class="camp-about-left-item-info"><?php echo $price_notice; ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="camp-about-right">
                            <?php $dates = get_field('dates'); if(is_array($dates) && count($dates)): ?>
                                <div class="camp-about-left-item">
                                    <div class="camp-about-right-title"><?php _e( 'КОЛИ', \PS::$theme_name ); ?></div>
                                    <ul class="camp-about-right-list">
                                        <?php foreach ($dates as $date): ?>
                                            <?php if($date['end']): ?>
                                                <li><?php _e( 'з', \PS::$theme_name ); ?> <?php echo date('j', strtotime($date['start'])); ?> <?php echo \PS\Functions\Helper\Helper::get_month(date('n', strtotime($date['start']))); ?> <?php _e( 'до', \PS::$theme_name ); ?> <?php echo date('j', strtotime($date['end'])); ?> <?php echo \PS\Functions\Helper\Helper::get_month(date('n', strtotime($date['end']))); ?></li>
                                            <?php else: ?>
                                                <li><?php echo date('j', strtotime($date['start'])); ?> <?php echo \PS\Functions\Helper\Helper::get_month(date('n', strtotime($date['start']))); ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php $place = get_field('place'); if($place): ?>
                                <div class="camp-about-left-item">
                                    <div class="camp-about-left-item-title"><?php _e( 'ЛОКАЦІЯ', \PS::$theme_name ); ?></div>
                                    <div class="camp-about-left-item-taxt"><?php echo $place; ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_9')): ?>
                <div class="home-team-fluid">
                    <div class="home-team-centered">
                        <div class="home-team-left">
                            <div class="home-team-left-top">
                                <?php $text = get_field('title_9'); if($text): ?>
                                    <div class="home-team-left-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <?php $text = get_field('text_9'); if($text): ?>
                                    <div class="home-team-left-text"><?php echo $text; ?></div>
                                <?php endif; ?>
                            </div>
                            <?php $button = get_field('button_9'); if($button['active']): ?>
                                <a href="<?php echo $button['link']; ?>" class="home-team-left-btn">
                                    <div class="home-team-left-btn-bg"></div>
                                    <span><?php echo $button['text']; ?></span>
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php $list = get_field('list_9'); if(is_array($list) && count($list)): ?>
                            <div class="home-team-container">
                                <?php
                                global $wp_query;
                                \PS\Functions\Helper\Helper::get_team($list);
                                $custom_query = $wp_query;
                                ?>
                                <?php if ( $custom_query->have_posts() ): ?>
                                    <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                        <div class="home-team-item js-modal-link" data-target="stuff-popup-<?php echo get_the_ID(); ?>">
                                            <div class="home-team-item-name"><?php echo get_the_title(); ?></div>
                                            <?php $position = get_field('position'); if($position): ?>
                                                <div class="home-team-item-separator"></div>
                                                <div class="home-team-item-post"><?php echo $position; ?></div>
                                            <?php endif; ?>
                                            <div class="home-team-item-photo">
                                                <?php $icon = get_field('icon'); if($icon): ?>
                                                    <div class="home-team-item-photo-icon">
                                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $icon; ?>.svg" alt="">
                                                    </div>
                                                <?php endif; ?>
                                                <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                                                    <div class="home-team-item-photo-image">
                                                        <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                        <?php endif; ?>

                        <?php $button = get_field('button_9'); if($button['active']): ?>
                            <a href="<?php echo $button['link']; ?>" class="home-team-left-btn-mob">
                                <div class="home-team-left-btn-bg"></div>
                                <span><?php echo $button['text']; ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_10')): ?>
                <div class="kindergarten-desktop-slider-fluid">
                    <div class="kindergarten-desktop-slider-wrapper">
                        <?php $text = get_field('title_10'); if($text): ?>
                            <div class="kindergarten-desktop-slider-mobile-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $imgs = get_field('imgs_10'); if(is_array($imgs) && count($imgs)): ?>
                            <?php $slides = array_chunk($imgs, 3); ?>
                            <div class="kindergarten-desktop-slider-arrows">
                                <div class="slick-prev">
                                    <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_920_8839)"><path fill-rule="evenodd" clip-rule="evenodd" d="M32.5 2.84124e-06C14.5507 4.41042e-06 -4.41042e-06 14.5507 -2.84124e-06 32.5C-1.27206e-06 50.4493 14.5507 65 32.5 65C50.4493 65 65 50.4493 65 32.5C65 14.5507 50.4493 1.27206e-06 32.5 2.84124e-06ZM22.5 35L39.5 52.5C41.0543 54.1 42.8143 52.8333 43.5 52C44.7 50.4 44 49 43.5 48.5L28 32.5L43 17C45 15 44 13.25 43 12.5C41.4 11.3 39.6667 12 39 12.5L22.5 29.5C19.5 32 21.5 34 22.5 35Z" fill="#FF5C00" /><path d="M22.5 35L39.5 52.5C41.0543 54.1 42.8143 52.8333 43.5 52C44.7 50.4 44 49 43.5 48.5L28 32.5L43 17C45 15 44 13.25 43 12.5C41.4 11.3 39.6667 12 39 12.5L22.5 29.5C19.5 32 21.5 34 22.5 35Z" fill="white" /></g><defs><clipPath id="clip0_920_8839"><rect width="65" height="65" fill="white" transform="translate(65 65) rotate(180)" /></clipPath></defs></svg>
                                </div>
                                <div class="slick-next">
                                    <svg width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_920_8841)"><path fill-rule="evenodd" clip-rule="evenodd" d="M32.5 65C50.4493 65 65 50.4493 65 32.5C65 14.5507 50.4493 8.82084e-06 32.5 5.68248e-06C14.5507 2.54413e-06 -2.54413e-06 14.5507 -5.68248e-06 32.5C-8.82084e-06 50.4493 14.5507 65 32.5 65ZM42.5 30L25.5 12.5C23.9457 10.9 22.1857 12.1667 21.5 13C20.3 14.6 21 16 21.5 16.5L37 32.5L22 48C20 50 21 51.75 22 52.5C23.6 53.7 25.3333 53 26 52.5L42.5 35.5C45.5 33 43.5 31 42.5 30Z" fill="#FF5C00" /><path d="M42.5 30L25.5 12.5C23.9457 10.9 22.1857 12.1667 21.5 13C20.3 14.6 21 16 21.5 16.5L37 32.5L22 48C20 50 21 51.75 22 52.5C23.6 53.7 25.3333 53 26 52.5L42.5 35.5C45.5 33 43.5 31 42.5 30Z" fill="white" /></g><defs><clipPath id="clip0_920_8841"><rect width="65" height="65" fill="white" /></clipPath></defs></svg>
                                </div>
                            </div>
                            <div class="kindergarten-desktop-slider">
                                <?php foreach ($slides as $slide): ?>
                                    <div class="kindergarten-desktop-slider-item">
                                        <div class="kindergarten-desktop-slider-item-inner">
                                            <div class="kindergarten-desktop-slider-item-left">
                                                <?php $text = get_field('title_10'); if($text): ?>
                                                    <div class="kindergarten-desktop-slider-item-left-name"><?php echo $text; ?></div>
                                                <?php endif; ?>
                                                <?php if(isset($slide[0])): ?>
                                                    <div class="kindergarten-desktop-slider-item-left-img">
                                                        <img loading="lazy" src="<?php echo $slide[0]['sizes']['960x0']; ?>" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="kindergarten-desktop-slider-item-right">
                                                <?php if(isset($slide[1])): ?>
                                                    <div class="kindergarten-desktop-slider-item-right-img1">
                                                        <img loading="lazy" src="<?php echo $slide[1]['sizes']['960x0']; ?>" alt="">
                                                    </div>
                                                <?php endif; ?>
                                                <?php if(isset($slide[2])): ?>
                                                    <div class="kindergarten-desktop-slider-item-right-img2">
                                                        <img loading="lazy" src="<?php echo $slide[2]['sizes']['960x0']; ?>" alt="">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_11')): ?>
                <div class="camp-get2-fluid">
                    <div class="camp-get2-centered">
                        <?php $text = get_field('title_11'); if($text): ?>
                            <div class="camp-get2-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_11'); if(is_array($list) && count($list)): ?>
                            <div class="camp-cards-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="camp-cards-item" style="background-color: <?php echo $block['color']; ?>">
                                        <?php if($block['icon']): ?>
                                            <div class="camp-cards-item-icon">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="camp-cards-item-name"><?php echo $block['title']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_12')): ?>
                <?php $type = get_field('type_12'); if($type === 'video'): ?>
                    <div class="camps-parents-fluid">
                        <div class="camps-parents-centered">
                            <?php $text = get_field('title_12'); if($text): ?>
                                <div class="camps-parents-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $list = get_field('list_12'); if(is_array($list) && count($list)): ?>
                                <div class="camps-parents-slider-wrapper">
                                    <div class="camps-parents-slider-arrows">
                                        <div class="slick-prev">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr11.svg" alt="">
                                        </div>
                                        <div class="slick-next">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr10.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="camps-parents-slider">
                                        <?php foreach ($list as $m => $block): ?>
                                            <div class="camps-parents-slider-item js-modal-link" data-target="youtube-popup-review-<?php echo $m; ?>">
                                                <div class="camps-parents-slider-item-inner">
                                                    <div class="camps-parents-slider-item-photo">
                                                        <img loading="lazy" src="https://i.ytimg.com/vi_webp/<?php preg_match('/src="([^"]+)"/', $block['video'], $match); echo str_ireplace(['https://www.youtube.com/embed/', '?feature=oembed'], '', $match[1]); ?>/maxresdefault.webp" alt="">
                                                    </div>
                                                    <div class="camps-parents-slider-item-icon">
                                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon67.svg" alt="">
                                                    </div>
                                                    <?php /*
                                                    <div class="camps-parents-slider-item-logo">
                                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon68.svg" alt="">
                                                    </div>
                                                    */ ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php elseif($type === 'text'): ?>
                    <div class="camps-reviews-fluid">
                        <div class="camps-reviews-centered">
                            <?php $text = get_field('title_12'); if($text): ?>
                                <div class="camps-parents-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $list = get_field('list_12_2'); if(is_array($list) && count($list)): ?>
                                <div class="camps-reviews-slider-wrapper">
                                    <div class="camps-reviews-slider-arrows">
                                        <div class="slick-prev">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr11.svg" alt="">
                                        </div>
                                        <div class="slick-next">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr10.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="camps-reviews-slider">
                                        <?php foreach ($list as $m => $block): ?>
                                            <div class="camps-reviews-slider-item">
                                                <div class="camps-reviews-slider-item-inner">
                                                    <div class="camps-reviews-slider-item-top">
                                                        <?php if(is_array($block['img']) && count($block['img'])): ?>
                                                            <div class="camps-reviews-slider-item-top-left">
                                                                <img loading="lazy" src="<?php echo $block['img']['sizes']['960x0']; ?>" alt="">
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="camps-reviews-slider-item-top-right">
                                                            <div class="camps-reviews-slider-item-top-name"><?php echo $block['name']; ?></div>
                                                            <div class="camps-reviews-slider-item-top-post"><?php echo $block['subtitle']; ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="camps-reviews-slider-item-text"><?php echo $block['text']; ?></div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php
            $camps = [];
            global $wp_query;
            \PS\Functions\Helper\Helper::get_camps();
            $custom_query = $wp_query;
            if ( $custom_query->have_posts() ) {
                while ($custom_query->have_posts()) {
                    $custom_query->the_post();
                    $camps[get_the_ID()] = get_the_title();
                }
            }
            wp_reset_query();
            ?>

            <?php if(get_field('active_13')): ?>
                <div class="home-request-fluid" id="home-request">
                    <div class="home-request-centered">
                        <div class="home-request-left">
                            <?php $text = get_field('title_13'); if($text): ?>
                                <div class="home-request-title">
                                    <?php echo $text; ?>
                                    <div class="request-gif-img">
                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arrow-gif.gif" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="home-request-background">
                                <div class="home-request-bg1 js-request-anim">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon13.svg" alt="">
                                </div>
                                <div class="home-request-bg2 js-request-anim">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon13.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'camp', 'select' => ['name' => 'camp', 'default' => __( 'Оберіть табір', \PS::$theme_name ), 'options' => $camps]]); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_14')): ?>
                <?php get_template_part('parts/elements/social'); ?>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <div class="modal modal--sm js-modal" data-modal="entry-camp-popup">
            <div class="modal__overlay js-close-modal"></div>
            <div class="entry-popup-content">
                <div class="entry-popup-close js-close-modal">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close1.svg" alt="">
                </div>
                <div class="entry-popup-inner">
                    <?php $text = get_field('title_13'); if($text): ?>
                        <div class="entry-popup-title"><?php echo $text; ?></div>
                    <?php else: ?>
                        <div class="entry-popup-title"><?php _e(get_field('form_entry_title', \PS::$option_page)); ?></div>
                    <?php endif; ?>
                    <div class="entry-popup-form">
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'camp', 'select' => ['name' => 'camp', 'default' => __( 'Оберіть табір', \PS::$theme_name ), 'options' => $camps]]); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if(get_field('active_15')): ?>
            <?php $list_15 = get_field('list_15'); if(is_array($list_15) && count($list_15)): ?>
                <?php foreach ($list_15 as $m => $li): ?>
                    <div class="tags-popup modal modal--sm js-modal" data-modal="tags-popup-<?php echo $m + 1; ?>">
                        <div class="modal__overlay js-close-modal"></div>
                        <div class="conception-popup-content">
                            <div class="conception-popup-close js-close-modal">
                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon89.svg" alt="">
                            </div>
                            <div class="conception-popup-container">
                                <?php if(is_array($li['img']) && count($li['img'])): ?>
                                    <div class="conception-popup-left">
                                        <img loading="lazy" src="<?php echo $li['img']['sizes']['960x0']; ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="conception-popup-right">
                                    <div class="conception-popup-right-title"><?php echo $li['title']; ?></div>
                                    <div class="conception-popup-right-list"><?php echo $li['text']; ?></div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="conception-popup-next-btn popup-next" data-type="tags-popup">
                                <span><?php _e( 'Далі', \PS::$theme_name ); ?></span>
                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon90.svg" alt="">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(get_field('active_5')): ?>
            <?php $list = get_field('list_5'); if(is_array($list) && count($list)): ?>
                <?php foreach ($list as $m => $block): ?>
                    <?php if($block['popup']['active']): ?>
                        <div class="camp_program-popup modal modal--sm js-modal" data-modal="camp-program-popup-<?php echo $m + 1; ?>">
                            <div class="modal__overlay js-close-modal"></div>

                            <div class="camp-program-popup-content">
                                <div class="camp-program-popup-close js-close-modal">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon84.svg" alt="">
                                </div>
                                <div class="camp-program-popup-title"><?php echo $m + 1; ?> <?php _e( 'день', \PS::$theme_name ); ?>. <?php echo $block['title']; ?></div>
                                <?php echo str_ireplace(['<ul>', '<p>', '</p>'], ['<ul class="camp-program-popup-list">', '<div class="camp-program-popup-name">', '</div>'], $block['popup']['text']); ?>
                                <a href="javascript:void(0)" class="camp-program-popup-next-btn popup-next" data-type="camp_program-popup">
                                    <span><?php _e( 'Далі', \PS::$theme_name ); ?></span>
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon82.svg" alt="">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(get_field('active_9')): ?>
            <?php $list = get_field('list_9'); if(is_array($list) && count($list)): ?>
                <?php
                global $wp_query;
                \PS\Functions\Helper\Helper::get_team($list);
                $custom_query = $wp_query;
                ?>
                <?php if ( $custom_query->have_posts() ): ?>
                    <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                        <div class="modal modal--sm js-modal" data-modal="stuff-popup-<?php echo get_the_ID(); ?>">
                            <div class="modal__overlay js-close-modal"></div>
                            <div class="stuff-popup-content">
                                <div class="stuff-popup-close js-close-modal">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close3.svg" alt="">
                                </div>
                                <div class="stuff-popup-left">
                                    <?php $icon = get_field('icon'); if($icon): ?>
                                        <div class="stuff-popup-left-icon">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $icon; ?>.svg" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                                        <div class="stuff-popup-left-photo">
                                            <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="stuff-popup-right">
                                    <div class="stuff-popup-right-top">
                                        <div class="stuff-popup-right-name"><?php echo get_the_title(); ?></div>
                                        <?php $position = get_field('position'); if($position): ?>
                                            <div class="stuff-popup-right-line"></div>
                                            <div class="stuff-popup-right-post"><?php echo $position; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php $text = get_field('text'); if($text): ?>
                                        <div class="stuff-popup-right-text"><?php echo $text; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(get_field('active_12')): ?>
            <?php $type = get_field('type_12'); if($type === 'video'): ?>
                <?php $list = get_field('list_12'); if(is_array($list) && count($list)): ?>
                    <?php foreach ($list as $m => $block): ?>
                        <div class="modal modal--sm js-modal" data-modal="youtube-popup-review-<?php echo $m; ?>">
                            <div class="modal__overlay js-close-modal"></div>
                            <div class="youtube-popup-content">
                                <div class="youtube-popup-close js-close-modal">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close5.svg" alt="">
                                </div>
                                <div class="youtube-popup-video">
                                    <div class="youtube-video"><?php echo str_ireplace(['iframe', 'width', 'height', '?feature=oembed'], ['iframe class="youtube-video-iframe"', 'data-width', 'data-height', '?feature=oembed&enablejsapi=1&version=3&playerapiid=ytplayer'], $block['video']); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>
    <script>
        $(document).ready(function (){
            if($('select[name="camp"]').length){
                $('select[name="camp"]').val('<?php echo get_the_title(); ?>').trigger('change');
            }
        });
    </script>
    <?php /* END */ ?>

</body>
</html>