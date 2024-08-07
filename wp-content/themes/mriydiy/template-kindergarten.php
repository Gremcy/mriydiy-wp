<?php /* Template Name: Дитячий садок */ ?>
<?php get_header(); ?>
<body class="kindergarten-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="kindergarten-main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="kindergarten-first-fluid" id="preview">
                    <div class="kindergarten-first-centered">
                        <div class="kindergarten-first-left">
                            <div class="kindergarten-first-title">MRIYDIY</div>
                            <?php $text = get_field('title_1'); if($text): ?>
                                <div class="kindergarten-first-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_1'); if($text): ?>
                                <div class="kindergarten-first-address"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $button = get_field('button_1'); if($button['active']): ?>
                                <div class="online-first-btn js-modal-link" data-target="entry-kindergarten-popup">
                                    <div class="online-first-btn-bg"></div>
                                    <span><?php _e( 'Записатися', \PS::$theme_name ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="kindergarten-first-right">
                            <?php $img = get_field('img_1'); if(is_array($img) && count($img)): ?>
                                <div class="kindergarten-first-image">
                                    <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                </div>
                                <div class="kindergarten-first-frame">
                                    <svg width="630" height="620" viewBox="0 0 630 620" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V620H630V0H0ZM404.88 52.6091C353.051 9.13029 277.454 9.13029 225.626 52.6091C207.76 67.5975 186.281 77.8922 163.427 82.4763C97.3501 95.7281 49.9679 154.774 51.7244 222.222C52.3323 245.534 47.052 268.642 36.371 289.372C5.45482 349.373 22.3897 423.063 76.2601 463.694C94.8655 477.713 109.695 496.268 119.281 517.515C147.047 579.08 215.31 611.779 280.688 595.085C303.303 589.328 327.203 589.328 349.818 595.085C415.197 611.779 483.459 579.08 511.224 517.515C520.81 496.268 535.641 477.713 554.245 463.694C608.113 423.063 625.052 349.373 594.126 289.372C583.453 268.642 578.173 245.534 578.781 222.222C580.539 154.774 533.155 95.7281 467.078 82.4763C444.224 77.8922 422.747 67.5975 404.88 52.6091Z" fill="white" /><path class="kindergarten-first-line" d="M476.943 69.7932L477.533 66.8517L476.943 69.7932C546.257 83.688 595.956 145.602 594.113 216.306C593.449 241.754 599.216 266.98 610.872 289.611L610.873 289.612C643.307 352.511 625.543 429.771 569.041 472.371C548.723 487.675 532.526 507.929 522.057 531.123L524.792 532.357L522.057 531.123C492.935 595.667 421.329 629.957 352.745 612.453L352.743 612.453C328.048 606.168 301.954 606.168 277.259 612.453L277.257 612.453C208.675 629.957 137.068 595.667 107.945 531.123L105.211 532.357L107.945 531.123C97.477 507.93 81.2823 487.675 60.9627 472.372C4.45641 429.772 -13.3032 352.511 19.1214 289.612L16.4633 288.242L19.1214 289.612C30.7869 266.981 36.5537 241.754 35.8898 216.306C34.0477 145.602 83.7454 83.6879 153.059 69.7932L152.521 67.1097L153.059 69.7932C178.016 64.7897 201.47 53.554 220.983 37.1916C275.35 -8.39719 354.652 -8.39722 409.021 37.1916C428.534 53.5539 451.987 64.7897 476.943 69.7932Z" stroke="#FFE18C" stroke-width="6" /></svg>
                                </div>
                            <?php endif; ?>
                            <div class="kindergarten-icon">
                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon37.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php $list = get_field('list_2'); if(is_array($list) && count($list)): ?>
                    <div class="kindergarten-second-fluid" id="icons">
                        <div class="kindergarten-second-centered">
                            <div class="kindergarten-second-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="kindergarten-second-item">
                                        <?php if($block['icon']): ?>
                                            <div class="kindergarten-second-item-icon">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="kindergarten-second-item-title"><?php echo $block['text']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <div class="kindergarten-quotes-fluid" id="about">
                    <div class="kindergarten-quotes-centered">
                        <?php $text = get_field('title_3'); if($text): ?>
                            <div class="kindergarten-quotes-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_3'); if($text): ?>
                            <div class="kindergarten-quotes-description"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_3'); if(is_array($list) && count($list)): ?>
                            <div class="kindergarten-quotes-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="kindergarten-quotes-item">
                                        <div class="kindergarten-quotes-item-bg">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/quote-bg-<?php echo $m + 1; ?>.svg" alt="">
                                        </div>
                                        <div class="kindergarten-quotes-item-text"><?php echo $block['text']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <div class="kindergarten-approach-fluid" id="approach">
                    <div class="kindergarten-approach-centered">
                        <div class="kindergarten-approach-left">
                            <?php $text = get_field('title_4'); if($text): ?>
                                <div class="kindergarten-approach-left-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_4'); if($text): ?>
                                <div class="kindergarten-approach-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                        </div>
                        <?php $list = get_field('list_4'); if(is_array($list) && count($list)): ?>
                            <div class="kindergarten-approach-container kindergarten-approach-slider">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="kindergarten-approach-item<?php if($block['popup']['active']): ?> js-modal-link<?php endif; ?>"<?php if($block['popup']['active']): ?> data-target="approach-popup-<?php echo $m + 1; ?>"<?php endif; ?>>
                                        <div class="kindergarten-approach-item-inner">
                                            <div class="kindergarten-approach-item-num"><?php echo sprintf( '%02d', ($m + 1) ); ?></div>
                                            <div class="kindergarten-approach-item-name"><?php echo $block['title']; ?></div>
                                            <?php if(is_array($block['img']) && count($block['img'])): ?>
                                                <div class="kindergarten-approach-item-image">
                                                    <img loading="lazy" src="<?php echo $block['img']['sizes']['960x0']; ?>" alt="">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_5')): ?>
                <div class="kindergarten-how-fluid" id="how">
                    <div class="kindergarten-how-centered">
                        <div class="kindergarten-how-rectangle"<?php $text = get_field('color_5'); if($text): ?> style="background-color: <?php echo $text; ?>"<?php endif; ?>></div>
                        <?php $img = get_field('img_5'); if(is_array($img) && count($img)): ?>
                            <div class="kindergarten-how-left">
                                <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <div class="kindergarten-how-right">
                            <?php $text = get_field('title_5'); if($text): ?>
                                <div class="kindergarten-how-right-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_5'); if($text): ?>
                                <?php echo str_ireplace(['<ul>'], ['<ul class="kindergarten-how-right-list">'], $text); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_16')): ?>
                <div class="home-calendar-fluid" id="events">
                    <div class="home-calendar-centered">
                        <div class="home-calendar-left">
                            <?php $text = get_field('title_16'); if($text): ?>
                                <div class="home-calendar-left-title"><?php echo $text; ?></div>
                            <?php endif; ?>

                            <div class="home-calendar-left-name"><?php echo get_field('text_16'); ?></div>
                            <ul class="camps-calendar-schedule-list" style="display: none"></ul>
                        </div>
                        <div class="home-calendar-right">
                            <input id="datetimepicker_v2" type="text">
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_6')): ?>
                <div class="kindergarten-schedule-fluid" id="schedule">
                    <div class="kindergarten-schedule-centered">
                        <?php $text = get_field('title_6'); if($text): ?>
                            <div class="kindergarten-schedule-title js-stager-trigger"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_6'); if(is_array($list) && count($list)): ?>
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

            <?php if(get_field('active_15')): ?>
                <?php $list = get_field('list_15'); if(is_array($list) && count($list)): ?>
                    <div class="home-methods-fluid" id="methods">
                        <div class="home-methods-centered">
                            <?php $text = get_field('title_15'); if($text): ?>
                                <div class="home-methods-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="home-methods-content">
                                <div class="home-methods-left">
                                    <div class="tabs">
                                        <div class="tabs__nav">
                                            <?php foreach ($list as $m => $block): ?>
                                                <div class="tabs__nav-btn" data-tab="#tab<?php echo $m + 1; ?>"><span><?php echo $block['title']; ?></span></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="home-methods-right tabs__content">
                                    <?php foreach ($list as $m => $block): ?>
                                        <div class="tabs__item" id="tab<?php echo $m + 1; ?>">
                                            <div class="home-methods-right-inner-title"><?php echo $block['title']; ?></div>
                                            <div class="home-methods-right-inner-content"><?php echo str_ireplace(['width', 'height'], ['data-width', 'data-height'], $block['text']); ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_7')): ?>
                <div class="kindergarten-integrated-fluid" id="text">
                    <div class="kindergarten-integrated-centered">
                        <?php $text = get_field('title_7'); if($text): ?>
                            <div class="kindergarten-integrated-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_7'); if($text): ?>
                            <div class="kindergarten-integrated-text"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $icon = get_field('icon_7'); if($icon): ?>
                            <div class="kindergarten-integrated-icon">
                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $icon; ?>.svg" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_8') || get_field('active_9') || get_field('active_10')): ?>
                <div class="kindergarten-gray-wrapper" id="virtual">
                    <?php if(get_field('active_8')): ?>
                        <div class="kindergarten-virtual-fluid">
                            <div class="kindergarten-virtual-centered">
                                <?php $img = get_field('img_8'); if(is_array($img) && count($img)): ?>
                                    <div class="kindergarten-virtual-image-bg">
                                        <img loading="lazy" src="<?php echo $img['sizes']['1600x0']; ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="kindergarten-virtual-content">
                                    <?php $text = get_field('subtitle_8'); if($text): ?>
                                        <div class="kindergarten-virtual-tag"><?php echo $text; ?></div>
                                    <?php endif; ?>
                                    <?php $text = get_field('title_8'); if($text): ?>
                                        <div class="kindergarten-virtual-title"><?php echo $text; ?></div>
                                    <?php endif; ?>
                                    <?php $button = get_field('button_8'); if($button['active']): ?>
                                        <a href="<?php echo $button['link']; ?>" class="kindergarten-virtual-button">
                                            <div class="kindergarten-virtual-walk-button-bg"></div>
                                            <span><?php echo $button['text']; ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(get_field('active_9')): ?>
                        <div class="kindergarten-desktop-slider-fluid" id="photo">
                            <div class="kindergarten-desktop-slider-wrapper">
                                <?php $text = get_field('title_9'); if($text): ?>
                                    <div class="kindergarten-desktop-slider-mobile-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <?php $imgs = get_field('imgs_9'); if(is_array($imgs) && count($imgs)): ?>
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
                                                        <?php $text = get_field('title_9'); if($text): ?>
                                                            <div class="kindergarten-desktop-slider-item-left-name"><?php echo $text; ?></div>
                                                        <?php endif; ?>
                                                        <?php if(isset($slide[0])): ?>
                                                            <div class="kindergarten-desktop-slider-item-left-img">
                                                                <img loading="lazy" src="<?php echo $slide[0]['sizes']['960x0']; ?>" alt="img">
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

                    <?php if(get_field('active_10')): ?>
                        <div class="home-team-fluid" id="team">
                            <div class="home-team-centered">
                                <div class="home-team-left">
                                    <div class="home-team-left-top">
                                        <?php $text = get_field('title_10'); if($text): ?>
                                            <div class="home-team-left-title"><?php echo $text; ?></div>
                                        <?php endif; ?>
                                        <?php $text = get_field('text_10'); if($text): ?>
                                            <div class="home-team-left-text"><?php echo $text; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php $button = get_field('button_10'); if($button['active']): ?>
                                        <a href="<?php echo $button['link']; ?>" class="home-team-left-btn">
                                            <div class="home-team-left-btn-bg"></div>
                                            <span><?php echo $button['text']; ?></span>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <?php $list = get_field('list_10'); if(is_array($list) && count($list)): ?>
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

                                <?php $button = get_field('button_10'); if($button['active']): ?>
                                    <a href="<?php echo $button['link']; ?>" class="home-team-left-btn-mob">
                                        <div class="home-team-left-btn-bg"></div>
                                        <span><?php echo $button['text']; ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_11')): ?>
                <div class="home-price-fluid" id="price">
                    <div class="home-price-centered">
                        <div class="home-price-bg-1">
                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon15.svg" alt="">
                        </div>
                        <div class="home-price-bg-2">
                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon15.svg" alt="">
                        </div>
                        <?php $text = get_field('subtitle_11'); if($text): ?>
                            <div class="home-price-tag"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('title_11'); if($text): ?>
                            <div class="home-price-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_11'); if($text): ?>
                            <div class="home-price-description"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $button = get_field('button_11'); if($button['active']): ?>
                            <a href="<?php echo $button['link']; ?>" class="home-price-btn">
                                <span><?php echo $button['text']; ?></span>
                                <div class="home-price-btn-bg"></div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_12')): ?>
                <div class="home-request-fluid" id="form">
                    <div class="home-request-centered">
                        <div class="home-request-left">
                            <?php $text = get_field('title_12'); if($text): ?>
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
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'kindergarten']); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_13')): ?>
                <?php $list = get_field('list_13'); if(is_array($list) && count($list)): ?>
                    <?php
                    global $wp_query;
                    \PS\Functions\Helper\Helper::get_schools_by_ids($list);
                    $custom_query = $wp_query;
                    ?>
                    <?php if ( $custom_query->have_posts() ): ?>
                        <div class="kindergarten-branches-fluid" id="kindergarten">
                            <div class="kindergarten-branches-centered">
                                <?php $text = get_field('title_13'); if($text): ?>
                                    <div class="kindergarten-branches-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <div class="kindergarten-branches-container js-kindergarten-branches-slider">
                                    <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                        <?php get_template_part('parts/elements/school'); ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_14')): ?>
                <?php get_template_part('parts/elements/social'); ?>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <div class="modal modal--sm js-modal" data-modal="entry-kindergarten-popup">
            <div class="modal__overlay js-close-modal"></div>
            <div class="entry-popup-content">
                <div class="entry-popup-close js-close-modal">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close1.svg" alt="">
                </div>
                <div class="entry-popup-inner">
                    <?php $text = get_field('title_12'); if($text): ?>
                        <div class="entry-popup-title"><?php echo $text; ?></div>
                    <?php else: ?>
                        <div class="entry-popup-title"><?php _e(get_field('form_entry_title', \PS::$option_page)); ?></div>
                    <?php endif; ?>
                    <div class="entry-popup-form">
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'kindergarten']); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if(get_field('active_4')): ?>
            <?php $list = get_field('list_4'); if(is_array($list) && count($list)): ?>
                <?php foreach ($list as $m => $block): ?>
                    <?php if($block['popup']['active']): ?>
                        <div class="approach-popup modal modal--sm js-modal" data-modal="approach-popup-<?php echo $m + 1; ?>">
                            <div class="modal__overlay js-close-modal"></div>

                            <div class="approach-popup-content">
                                <div class="approach-popup-close js-close-modal">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close7.svg" alt="">
                                </div>
                                <div class="approach-popup-title"><?php echo $block['title']; ?></div>
                                <?php echo str_ireplace(['<ul>'], ['<ul class="approach-popup-inner">'], $block['popup']['text']); ?>
                                <div class="approach-next-button popup-next" data-type="approach-popup">
                                    <span><?php _e( 'Далі', \PS::$theme_name ); ?></span>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="16" fill="#FBC01A" /><path d="M11.8154 7.38489L20.1847 16.0003L11.8154 24.6157" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(get_field('active_10')): ?>
            <?php $list = get_field('list_10'); if(is_array($list) && count($list)): ?>
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
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>
    <?php $calendar = []; ?>
    <?php
    global $wp_query;
    \PS\Functions\Helper\Helper::get_calendar();
    $custom_query = $wp_query;
    ?>
    <?php if ( $custom_query->have_posts() ): ?>
        <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
            <?php $dates = get_field('dates'); if(is_array($dates) && count($dates)): ?>
                <?php foreach ($dates as $date): ?>
                    <?php $calendar[$date['start']]['html'][] = '<li class="camps-calendar-schedule-list-item"><a href="' . get_the_permalink() . '"><div class="camps-calendar-schedule-list-item-link-wrapper"><img loading="lazy" src="' . \PS::$assets_url . 'images/45.svg" alt=""/><span><strong style="font-weight: 600">' . (date('d.m', strtotime($date['start'])) . '</strong><br>' . get_the_title()) . '</span></div><div class="camps-calendar-schedule-list-item-more"><span>' . __( 'Детальніше', \PS::$theme_name ) . '</span><img loading="lazy" src="' . \PS::$assets_url . 'images/arr19.svg" alt="" /></div></a></li>'; ?>
                    <?php $calendar[$date['start']]['color'] = get_field('color') ?: 'orange'; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

    <script>
        // calendar
        $(document).ready(function(){
            $.datetimepicker.setLocale('<?php echo \PS::$current_language; ?>');
            $('#datetimepicker_v2').datetimepicker({
                format: 'Y-m-d',
                inline: true,
                timepicker: false,
                datepicker: true,
                dayOfWeekStart: 1,
                allowBlank: true,
                closeOnDateSelect: true,
                scrollMonth: false,
                scrollInput: false,
                onGenerate:function( ct ){
                    $(this).find('.xdsoft_date').removeClass('xdsoft_current').removeClass('xdsoft_today');

                    <?php if ( is_array($calendar) && count($calendar) ): ?>
                        <?php foreach ($calendar as $date => $info): ?>
                            $(this)
                                .find('.xdsoft_date[data-date="<?php echo date('j', strtotime($date)); ?>"][data-month="<?php echo (date('n', strtotime($date)) - 1); ?>"][data-year="<?php echo date('Y', strtotime($date)); ?>"]')
                                .addClass('xdsoft_current')
                                .attr('data-html', '<?php echo implode('', $info['html']); ?>')
                                .find('div').addClass('<?php echo $info['color']; ?>');
                        <?php endforeach; ?>
                    <?php endif; ?>
                },
                onChangeDateTime:function( ct ){
                    var date = $('#datetimepicker_v2').val();
                    var cell = $(this).find('.xdsoft_date.xdsoft_current[data-date="' + parseInt(date.substring(8)) + '"][data-month="' + (parseInt(date.substring(5, 7)) - 1) + '"][data-year="' + parseInt(date.substring(0, 4)) + '"]');
                    var html = cell.attr('data-html');
                    if(html){
                        $('.home-calendar-left-name').hide();
                        $('.camps-calendar-schedule-list').html(html).show();
                    }
                }
            });

            setTimeout(function (){
                $('.xdsoft_datetimepicker table').find('td.xdsoft_current').first().trigger('click');
            }, 1000);
        });
    </script>

    <script>
        $(window).on('load', function(){
            var current_hash = window.location.hash;
            if(current_hash.length){
                $('html, body').animate({scrollTop: ($(current_hash).offset().top - $('header').outerHeight())}, 300);
            }
        });
    </script>
    <?php /* END */ ?>

</body>
</html>