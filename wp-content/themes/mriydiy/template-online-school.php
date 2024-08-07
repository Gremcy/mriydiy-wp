<?php /* Template Name: Онлайн школа */ ?>
<?php get_header(); ?>
<body class="online-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->
    
    <div class="fluid-wrapper">
        <main class="online-main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="online-first-fluid">
                    <div class="online-first-centered">
                        <div class="online-first-left">
                            <div class="online-first-title">MRIYDIY</div>
                            <?php $text = get_field('title_1'); if($text): ?>
                                <div class="online-first-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_1'); if($text['title'] || $text['text']): ?>
                                <div class="online-first-price"><?php echo $text['title']; ?></div>
                                <div class="online-first-classes"><?php echo $text['text']; ?></div>
                            <?php endif; ?>
                            <?php $button = get_field('button_1'); if($button['active']): ?>
                                <div class="online-first-btn js-modal-link" data-target="entry-online-popup">
                                    <div class="online-first-btn-bg"></div>
                                    <span><?php _e( 'Записатися', \PS::$theme_name ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="online-first-right">
                            <?php $img = get_field('img_1'); if(is_array($img) && count($img)): ?>
                                <div class="online-first-image">
                                    <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <div class="online-first-frame">
                                <svg width="729" height="641" viewBox="0 0 729 641" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_951_10361)"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0.5V640.5H728.5V0.5H0.5ZM24.8793 251.392C15.1655 184.466 44.6816 111.72 77.2229 80.6818C109.764 49.6437 145.364 22 256.554 22C335.235 22 386.164 59.1986 484 35C589.88 8.81153 682.948 77.3441 702.417 206.289C721.886 335.235 672.039 285.469 687.805 418.933C703.571 552.396 614.052 526.479 538.154 585.622C476.267 633.846 363.354 579.557 294.221 605.241C203.441 638.969 127.255 610.688 77.2229 520.398C35.8881 445.804 72.9333 425.386 65.0866 372.635C56.9349 317.833 37.7004 339.726 24.8793 251.392Z" fill="white" stroke="white" /><path class="online-first-line" d="M4.00939 242.133C-4.67159 161.279 43.5418 61.145 113.929 31.4212C157.318 13.0983 264.731 -16.5073 360.765 21.2954C385.996 25.9566 438.866 38.461 510.217 12.6163C534.805 3.71031 587.354 14.0623 625.44 31.4212C681.364 56.9101 746.335 207.609 719.932 286.492C698.264 351.228 696.59 354.061 705.501 454.134C714.413 554.207 601.035 553.242 570.218 585.102C541.508 614.783 495.04 622.754 463.324 622.754C397.745 622.754 345.836 605.123 309.241 618.871C199.939 659.934 147.99 629.291 98.3408 579.792C44.7579 526.371 37.8993 471.961 53.1839 396.911C60.6476 360.263 11.7231 313.977 4.00939 242.133Z" stroke="#FFE18C" stroke-width="6" /></g><defs><clipPath id="clip0_951_10361"><rect width="729" height="641" fill="white" /></clipPath></defs></svg>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php $list = get_field('list_2'); if(is_array($list) && count($list)): ?>
                    <div class="online-about-fluid">
                        <div class="online-about-centered">
                            <div class="online-about-container" style="background-color: <?php the_field('color_2'); ?>">
                                <?php foreach ($list as $block): ?>
                                    <div class="online-about-item">
                                        <div class="online-about-item-text">
                                            <span><?php echo $block['title']; ?></span>
                                            <p><?php echo $block['text']; ?></p>
                                        </div>
                                        <?php if($block['icon']): ?>
                                            <div class="online-about-item-icon">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <?php $list = get_field('list_3'); if(is_array($list) && count($list)): ?>
                    <div class="online-video-fluid">
                        <div class="online-video-centered">
                            <div class="online-video-slider-wrapper">
                                <div class="online-video-slider-arrows">
                                    <div class="slick-prev">
                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr8.svg" alt="">
                                    </div>
                                    <div class="slick-next">
                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr7.svg" alt="">
                                    </div>
                                </div>
                                <div class="online-video-slider">
                                    <?php foreach ($list as $block): ?>
                                        <div class="online-video-slider-item">
                                            <div class="youtube-video">
                                                <?php echo str_ireplace(['iframe', 'width', 'height', '?feature=oembed'], ['iframe class="youtube-video-iframe"', 'data-width', 'data-height', '?feature=oembed&enablejsapi=1&version=3&playerapiid=ytplayer'], $block['video']); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php $list = get_field('list_7', \PS::$front_page); if(is_array($list) && count($list)): ?>
                    <div class="home-values-fluid">
                        <div class="home-values-centered">
                            <?php $text = get_field('title_7', \PS::$front_page); if($text): ?>
                                <div class="home-values-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="home-values-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="home-values-item<?php if($block['popup']['active']): ?> js-modal-link<?php endif; ?>"<?php if($block['popup']['active']): ?> data-target="value-popup-<?php echo $m + 1; ?>"<?php endif; ?>>
                                        <div class="home-values-item-inner" style="background-color: <?php echo $block['color']; ?>;">
                                            <?php if($block['icon']): ?>
                                                <div class="home-values-item-img">
                                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                                </div>
                                            <?php endif; ?>
                                            <div class="home-values-item-name"><?php echo $block['title']; ?></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_5')): ?>
                <?php $list = get_field('list_5'); if(is_array($list) && count($list)): ?>
                    <div class="online-messages-fluid">
                        <div class="online-messages-centered">
                            <?php $text = get_field('title_5'); if($text): ?>
                                <div class="online-messages-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="online-messages-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="online-messages-item"><?php echo $block['title']; ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_6')): ?>
                <?php $list = get_field('video_6'); if(is_array($list) && count($list)): ?>
                    <?php $video_tags = get_terms(['taxonomy' => 'video_tags', 'term_taxonomy_id' => $list]); if(is_array($video_tags) && count($video_tags)): ?>
                        <div class="online-reviews-fluid">
                            <div class="online-reviews-centered">
                                <?php $text = get_field('title_6'); if($text): ?>
                                    <div class="online-reviews-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <div class="online-reviews-slider-wrapper">
                                    <div class="online-reviews-slider-arrows">
                                        <div class="slick-prev">
                                            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 2L2 14L14 26" stroke="#FF5C00" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                        </div>
                                        <div class="slick-next">
                                            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 26L14 14L2 2" stroke="#FF5C00" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                        </div>
                                    </div>

                                    <?php
                                    global $wp_query;
                                    \PS\Functions\Helper\Helper::get_video($list);
                                    $custom_query = $wp_query;
                                    ?>
                                    <?php if ( $custom_query->have_posts() ): ?>
                                        <div class="online-reviews-slider">
                                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                <div class="online-reviews-item js-modal-link" data-target="youtube-popup-<?php echo get_the_ID(); ?>">
                                                    <?php $video = get_field('video'); if($video): ?>
                                                        <div class="online-reviews-item-image">
                                                            <img loading="lazy" src="https://i.ytimg.com/vi_webp/<?php preg_match('/src="([^"]+)"/', $video, $match); echo str_ireplace(['https://www.youtube.com/embed/', '?feature=oembed'], '', $match[1]); ?>/maxresdefault.webp" alt="">
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="online-reviews-item-icon">
                                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/youtube-icon.png" alt="">
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_7')): ?>
                <div class="online-orange-fluid">
                    <div class="online-orange-centered">
                        <div class="online-orange-container">
                            <div class="online-orange-item">
                                <span>ДЛЯ КОГО</span>
                                <p>Для учнів
                                </p>
                                <p>1 - 11 класів</p>
                            </div>
                            <div class="online-orange-item">
                                <span>ВАРТІСТЬ НАВЧАННЯ</span>
                                <p>6500 грн./місяць</p>
                            </div>
                            <div class="online-orange-item">
                                <span>КОЛИ МОЖНА ВСТУПИТИ</span>
                                <p>Вже зараз</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_8')): ?>
                <div class="online-faq-fluid">
                    <div class="online-faq-centered">
                        <div class="online-faq-title">
                            відповіді на часті запитання
                        </div>
                        <div class="online-faq-container">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="line">
                                        <span>Якщо батьки хочуть долучитися до онлайн навчання - наступний їхній крок?</span>
                                        <svg width="28" height="16" viewBox="0 0 28 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 2L14 14L26 2" stroke="#FF5C00" stroke-width="4" stroke-linecap="round"
                                                  stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="panel-collapse">
                                    <div class="panel-body">
                                        <p>
                                            Батьки зголошуються щодо зарахування дитини
                                            до онлайн-школи, заповнюючи е-заяву. Школа
                                            формує класи і повідомляє батьків про зарахування
                                            дитини до 29 серпня. Наприкінці серпня
                                            організовуємо батьківські збори й повідомляємо
                                            про особливості освітнього процесу, знайомимося
                                            з учителями, їхніми підходами тощо.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="line">
                                        <span>Чи буде якесь попереднє оцінювання?</span>
                                        <svg width="28" height="16" viewBox="0 0 28 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 2L14 14L26 2" stroke="#FF5C00" stroke-width="4" stroke-linecap="round"
                                                  stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="panel-collapse">
                                    <div class="panel-body">
                                        <p>
                                            Батьки зголошуються щодо зарахування дитини
                                            до онлайн-школи, заповнюючи е-заяву. Школа
                                            формує класи і повідомляє батьків про зарахування
                                            дитини до 29 серпня. Наприкінці серпня
                                            організовуємо батьківські збори й повідомляємо
                                            про особливості освітнього процесу, знайомимося
                                            з учителями, їхніми підходами тощо.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="line">
                  <span>Яким чином діти будуть оцінюватися
                    в онлайн-школі?</span>
                                        <svg width="28" height="16" viewBox="0 0 28 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 2L14 14L26 2" stroke="#FF5C00" stroke-width="4" stroke-linecap="round"
                                                  stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="panel-collapse">
                                    <div class="panel-body">
                                        <p>
                                            Батьки зголошуються щодо зарахування дитини
                                            до онлайн-школи, заповнюючи е-заяву. Школа
                                            формує класи і повідомляє батьків про зарахування
                                            дитини до 29 серпня. Наприкінці серпня
                                            організовуємо батьківські збори й повідомляємо
                                            про особливості освітнього процесу, знайомимося
                                            з учителями, їхніми підходами тощо.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="online-faq-more">
                            <div class="online-faq-more-bg">
                            </div>
                            <div class="online-faq-more-btn">
                                більше
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_9')): ?>
                <div class="home-request-fluid">
                    <div class="home-request-centered">
                        <div class="home-request-left">
                            <?php $text = get_field('title_9'); if($text): ?>
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
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'online']); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_10')): ?>
                <?php get_template_part('parts/elements/social'); ?>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <div class="modal modal--sm js-modal" data-modal="entry-online-popup">
            <div class="modal__overlay js-close-modal"></div>
            <div class="entry-popup-content">
                <div class="entry-popup-close js-close-modal">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close1.svg" alt="">
                </div>
                <div class="entry-popup-inner">
                    <?php $text = get_field('title_9'); if($text): ?>
                        <div class="entry-popup-title"><?php echo $text; ?></div>
                    <?php else: ?>
                        <div class="entry-popup-title"><?php _e(get_field('form_entry_title', \PS::$option_page)); ?></div>
                    <?php endif; ?>
                    <div class="entry-popup-form">
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'online']); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if(get_field('active_4')): ?>
            <?php $list = get_field('list_7', \PS::$front_page); if(is_array($list) && count($list)): ?>
                <?php foreach ($list as $m => $block): ?>
                    <?php if($block['popup']['active']): ?>
                        <div class="value-popup modal modal--sm js-modal" data-modal="value-popup-<?php echo $m + 1; ?>">
                            <div class="modal__overlay js-close-modal"></div>
                            <div class="knowledge-popup-content" style="background-color: <?php echo $block['color']; ?>">
                                <div class="knowledge-popup-close js-close-modal">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close2.svg" alt="">
                                </div>
                                <div class="knowledge-popup-inner">
                                    <div class="knowledge-popup-title"><?php echo $block['title']; ?></div>
                                    <?php echo str_ireplace(['width', 'height'], ['data-width', 'data-height'], $block['popup']['text']); ?>
                                </div>
                                <div class="knowledge-next-button popup-next" data-type="value-popup">
                                    <span><?php _e( 'Далі', \PS::$theme_name ); ?></span>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="16" fill="#0CC4E9" /><path d="M11.8154 7.38477L20.1847 16.0002L11.8154 24.6155" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php if(get_field('active_6')): ?>
        <?php $list = get_field('video_6'); if(is_array($list) && count($list)): ?>
            <?php
            global $wp_query;
            \PS\Functions\Helper\Helper::get_video($list);
            $custom_query = $wp_query;
            ?>
            <?php if ( $custom_query->have_posts() ): ?>
                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                    <div class="modal modal--sm js-modal" data-modal="youtube-popup-<?php echo get_the_ID(); ?>">
                        <div class="modal__overlay js-close-modal"></div>
                        <div class="youtube-popup-content">
                            <div class="youtube-popup-close js-close-modal">
                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close5.svg" alt="">
                            </div>
                            <div class="youtube-popup-video">
                                <div class="youtube-video"><?php echo str_ireplace(['iframe', 'width', 'height', '?feature=oembed'], ['iframe class="youtube-video-iframe"', 'data-width', 'data-height', '?feature=oembed&enablejsapi=1&version=3&playerapiid=ytplayer'], get_field('video')); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>
    <?php endif; ?>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>