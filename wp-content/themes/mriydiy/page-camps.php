<?php get_header(); ?>
<?php $camps = []; ?>
<body class="camps-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="camps-main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="camps-first-fluid">
                    <div class="camps-first-centered">
                        <div class="camps-first-left">
                            <div class="camps-first-left-title">MRIYDIY</div>
                            <?php $text = get_field('title_1'); if($text): ?>
                                <div class="camps-first-left-tag"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_1'); if($text): ?>
                                <div class="camps-first-left-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="camps-first-left-btns">
                                <?php $button = get_field('button_1'); if($button['active']): ?>
                                    <a href="javascript:void(0)" class="camps-first-left-btns-sign js-modal-link" data-target="entry-camp-popup">
                                        <div class="camps-first-left-btns-sign-bg"></div>
                                        <span><?php _e( 'Записатися', \PS::$theme_name ); ?></span>
                                    </a>
                                <?php endif; ?>
                                <a href="#camps-shedule" class="camps-first-left-btns-schedule">
                                    <div class="camps-first-left-btns-schedule-bg"></div>
                                    <span><?php _e( 'Розклад', \PS::$theme_name ); ?></span>
                                </a>
                            </div>
                        </div>
                        <?php $img = get_field('img_1'); if(is_array($img) && count($img)): ?>
                            <div class="camps-first-right">
                                <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php $list_2 = get_field('list_2'); if(is_array($list_2) && count($list_2)): ?>
                    <div class="camps-conception-fluid">
                        <div class="camps-conception-centered">
                            <?php $text = get_field('title_2'); if($text): ?>
                                <div class="camps-conception-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="camps-conception-container">
                                <?php foreach ($list_2 as $m => $li): ?>
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
                    <div class="camps-progress-fluid">
                        <div class="camps-progress-centered">
                            <?php foreach ($list as $m => $block): ?>
                                <div class="camps-progress-item">
                                    <div class="camps-progress-item-num"><?php echo $block['number']; ?></div>
                                    <div class="camps-progress-item-text"><?php echo $block['text']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php
                global $wp_query;
                \PS\Functions\Helper\Helper::get_camps();
                $custom_query = $wp_query;
                ?>
                <?php if ( $custom_query->have_posts() ): ?>
                    <div class="camps-list-fluid">
                        <div class="camps-shedule-anchor" id="camps-shedule"></div>
                        <div class="camps-list-centered">
                            <?php $text = get_field('title_4'); if($text): ?>
                                <div class="camps-list-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="camps-list-container">
                                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                    <?php $camps[get_the_ID()] = get_the_title(); ?>

                                    <?php get_template_part('parts/elements/camp'); ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>

            <?php if(get_field('active_15')): ?>
                <?php $list = get_field('list_15'); if(is_array($list) && count($list)): ?>
                    <div class="home-methods-fluid">
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

            <?php if(get_field('active_5')): ?>
                <?php $imgs = get_field('imgs_5'); if(is_array($imgs) && count($imgs)): ?>
                    <div class="camps-bubble-fluid">
                        <div class="camps-bubble-centered">
                            <?php $text = get_field('title_5'); if($text): ?>
                                <div class="camps-bubble-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="camps-bubble-container">
                                <?php foreach ($imgs as $img): ?>
                                    <div class="camps-bubble-item">
                                        <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_6')): ?>
                <?php $list = get_field('list_6'); if(is_array($list) && count($list)): ?>
                    <div class="camps-actions-fluid"<?php $text = get_field('color_6'); if($text): ?> style="background-color: <?php echo $text; ?>;"<?php endif; ?>>
                        <div class="camps-actions-centered">
                            <?php foreach ($list as $m => $block): ?>
                                <div class="camps-actions-item">
                                    <?php if($block['icon']): ?>
                                        <div class="camps-actions-item-icon">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                        </div>
                                    <?php endif; ?>
                                    <div class="camps-actions-item-text"><?php echo $block['title']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_7')): ?>
                <div class="camps-get-fluid">
                    <div class="camps-get-centered">
                        <?php $text = get_field('title_7'); if($text): ?>
                            <div class="camps-get-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_7'); if(is_array($list) && count($list)): ?>
                            <div class="camps-get-wrap">
                                <div class="camps-get-container">
                                    <?php foreach ($list as $m => $block): ?>
                                        <div class="camps-get-item" style="background-color: <?php echo $block['color']; ?>">
                                            <?php if($block['icon']): ?>
                                                <div class="camps-get-item-icon">
                                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                                </div>
                                            <?php endif; ?>
                                            <div class="camps-get-item-text"><?php echo $block['title']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_8')): ?>
                <div class="home-calendar-fluid">
                    <div class="home-calendar-centered">
                        <div class="home-calendar-left">
                            <?php $text = get_field('title_8'); if($text): ?>
                                <div class="home-calendar-left-title" style="color: #ff5c00"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="home-calendar-left-name"><?php echo get_field('text_8'); ?></div>
                            <ul class="camps-calendar-schedule-list" style="display: none"></ul>
                        </div>
                        <div class="home-calendar-right">
                            <input id="datetimepicker_v2" type="text">
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_9')): ?>
                <?php $list = get_field('video_9'); if(is_array($list) && count($list)): ?>
                    <?php $video_tags = get_terms(['taxonomy' => 'video_tags', 'term_taxonomy_id' => $list]); if(is_array($video_tags) && count($video_tags)): ?>
                        <div class="home-videos-fluid">
                            <div class="home-videos-centered">
                                <?php $text = get_field('title_9'); if($text): ?>
                                    <div class="home-videos-top">
                                        <div class="home-videos-top-title"><?php echo $text; ?></div>
                                    </div>
                                <?php endif; ?>
                                <?php
                                global $wp_query;
                                \PS\Functions\Helper\Helper::get_video($list);
                                $custom_query = $wp_query;
                                ?>
                                <?php if ( $custom_query->have_posts() ): ?>
                                    <div class="home-videos-slider">
                                        <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                            <?php get_template_part('parts/elements/video'); ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_10')): ?>
                <?php $type = get_field('type_10'); if($type === 'video'): ?>
                    <div class="camps-parents-fluid">
                        <div class="camps-parents-centered">
                            <?php $text = get_field('title_10'); if($text): ?>
                                <div class="camps-parents-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $list = get_field('list_10'); if(is_array($list) && count($list)): ?>
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
                                                    <div class="camps-parents-slider-item-logo">
                                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon68.svg" alt="">
                                                    </div>
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
                            <?php $text = get_field('title_10'); if($text): ?>
                                <div class="camps-parents-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $list = get_field('list_10_2'); if(is_array($list) && count($list)): ?>
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

            <?php if(get_field('active_11')): ?>
                <div class="home-request-fluid" id="home-request">
                    <div class="home-request-centered">
                        <div class="home-request-left">
                            <?php $text = get_field('title_11'); if($text): ?>
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

            <?php if(get_field('active_12')): ?>
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
                    <?php $text = get_field('title_12'); if($text): ?>
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

        <?php if(get_field('active_2')): ?>
            <?php $list_2 = get_field('list_2'); if(is_array($list_2) && count($list_2)): ?>
                <?php foreach ($list_2 as $m => $li): ?>
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

        <?php if(get_field('active_9')): ?>
            <?php $list = get_field('video_9'); if(is_array($list) && count($list)): ?>
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

        <?php if(get_field('active_10')): ?>
            <?php $type = get_field('type_10'); if($type === 'video'): ?>
                <?php $list = get_field('list_10'); if(is_array($list) && count($list)): ?>
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
    <?php $calendar = []; ?>
    <?php if ( is_array($camps) && count($camps) ): ?>
        <?php foreach ($camps as $camp_id => $camp_title): ?>
            <?php $dates = get_field('dates', $camp_id); if(is_array($dates) && count($dates)): ?>
                <?php foreach ($dates as $date): ?>
                    <?php $calendar[$date['start']]['html'][] = '<li class="camps-calendar-schedule-list-item"><a href="' . get_the_permalink($camp_id) . '"><div class="camps-calendar-schedule-list-item-link-wrapper"><img loading="lazy" src="' . \PS::$assets_url . 'images/45.svg" alt=""/><span><strong style="font-weight: 600">' . (date('d.m', strtotime($date['start'])) . ($date['end'] ? ' - ' . date('d.m', strtotime($date['end'])) : '')) . '</strong><br>' . $camp_title . '</span></div><div class="camps-calendar-schedule-list-item-more"><span>' . __( 'Детальніше', \PS::$theme_name ) . '</span><img src="' . \PS::$assets_url . 'images/arr19.svg" alt="" /></div></a></li>'; ?>
                    <?php $calendar[$date['start']]['color'] = get_field('color', $camp_id) ?: 'orange'; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
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
        });
    </script>
    <?php /* END */ ?>

</body>
</html>