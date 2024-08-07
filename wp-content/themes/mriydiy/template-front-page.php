<?php /* Template Name: Про школу */ ?>
<?php get_header(); ?>
<body class="home-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="home-main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="home-first-fluid" id="preview">
                    <div class="home-first-centered">
                        <div class="home-first-left">
                            <div class="home-first-left-title">MRIYDIY</div>
                            <?php $text = get_field('title_1'); if($text): ?>
                                <div class="home-first-left-heading"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_1'); if($text): ?>
                                <div class="home-first-left-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $button = get_field('button_1'); if($button['active']): ?>
                                <div class="home-first-left-btn">
                                    <div class="home-first-left-btn-bg js-modal-link" data-target="entry-popup"></div>
                                    <span><?php _e( 'Записатися', \PS::$theme_name ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php $imgs = get_field('imgs_1'); if(is_array($imgs) && count($imgs)): ?>
                            <div class="home-first-right">
                                <div class="home-first-anim-img img7">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/7.png" alt="">
                                </div>
                                <div class="home-first-anim-img img6">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/6.png" alt="">
                                </div>
                                <div class="home-first-anim-img img3">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/3.png" alt="">
                                </div>
                                <div class="home-first-anim-img img2">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/2.png" alt="">
                                </div>
                                <?php foreach ($imgs as $m => $img): ?>
                                    <div class="home-first-anim-img img<?php echo str_ireplace([0, 1, 2], [5, 4, 1], $m); ?>">
                                        <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php $list = get_field('list_2'); if(is_array($list) && count($list)): ?>
                    <div class="home-second-fluid" style="background-color: <?php the_field('color_2'); ?>" id="about">
                        <div class="home-second-centered">
                            <?php foreach ($list as $block): ?>
                                <div class="home-second-item">
                                    <div class="home-second-item-heading"><?php echo $block['title']; ?></div>
                                    <div class="home-second-item-text1"><?php echo $block['text']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <div class="home-knowledge-fluid" id="icons">
                    <div class="home-knowledge-centered">
                        <?php $text = get_field('title_3'); if($text): ?>
                            <div class="home-knowledge-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_3'); if($text): ?>
                            <div class="home-knowledge-description"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_3'); if(is_array($list) && count($list)): ?>
                            <div class="home-knowledge-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="home-knowledge-item<?php if($block['popup']['active']): ?> js-modal-link<?php endif; ?>"<?php if($block['popup']['active']): ?> data-target="knowledge-popup-<?php echo $m + 1; ?>"<?php endif; ?> style="background-color: <?php echo $block['color']; ?>">
                                        <?php if($block['icon']): ?>
                                            <div class="home-knowledge-item-icon">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="home-knowledge-item-name"><?php echo $block['title']; ?></div>
                                        <div class="home-knowledge-item-text"><?php echo $block['text']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php $list = get_field('video_4'); if(is_array($list) && count($list)): ?>
                    <?php $video_tags = get_terms(['taxonomy' => 'video_tags', 'term_taxonomy_id' => $list]); if(is_array($video_tags) && count($video_tags)): ?>
                        <div class="home-videos-fluid" id="video">
                            <div class="home-videos-centered">
                                <div class="home-videos-top">
                                    <?php $text = get_field('title_4'); if($text): ?>
                                        <div class="home-videos-top-title"><?php echo $text; ?></div>
                                    <?php endif; ?>
                                </div>

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

            <?php if(get_field('active_5')): ?>
                <?php $list = get_field('list_5'); if(is_array($list) && count($list)): ?>
                    <div class="home-experience-fluid" id="experience">
                        <div class="home-experience-centered">
                            <?php $text = get_field('title_5'); if($text): ?>
                                <div class="home-experience-title"><?php echo $text; ?></div>
                            <?php endif; ?>

                            <div class="home-experience-wrapper">
                                <div class="home-experience-slider-arrows">
                                    <div class="slick-prev">
                                        <svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 2L2 14L14 26" stroke="#FF5C00" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    </div>
                                    <div class="slick-next">
                                        <svg width="16" height="28" viewBox="0 0 16 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 26L14 14L2 2" stroke="#FF5C00" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    </div>
                                </div>
                                <div class="home-experience-slider">
                                    <?php foreach ($list as $m => $block): ?>
                                        <div class="home-experience-slider-item">
                                            <div class="home-experience-slider-item-inner">
                                                <?php if(is_array($block['img']) && count($block['img'])): ?>
                                                    <div class="home-experience-slider-item-img">
                                                        <img loading="lazy" src="<?php echo $block['img']['sizes']['960x0']; ?>" alt="">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="home-experience-slider-item-down">
                                                    <div class="home-experience-slider-item-down-num"><?php echo $m + 1; ?></div>
                                                    <div class="home-experience-slider-item-down-text">
                                                        <span><?php echo $block['title']; ?></span>
                                                        <p><?php echo $block['text']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_6')): ?>
                <div class="home-calendar-fluid" id="events">
                    <div class="home-calendar-centered">
                        <div class="home-calendar-left">
                            <?php $text = get_field('title_6'); if($text): ?>
                                <div class="home-calendar-left-title"><?php echo $text; ?></div>
                            <?php endif; ?>

                            <div class="home-calendar-left-name"><?php echo get_field('text_6'); ?></div>
                            <ul class="camps-calendar-schedule-list" style="display: none"></ul>
                        </div>
                        <div class="home-calendar-right">
                            <input id="datetimepicker_v2" type="text">
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_7')): ?>
                <?php $list = get_field('list_7'); if(is_array($list) && count($list)): ?>
                    <div class="home-values-fluid" id="values">
                        <div class="home-values-centered">
                            <?php $text = get_field('title_7'); if($text): ?>
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

            <?php if(get_field('active_8')): ?>
                <?php $list = get_field('list_8'); if(is_array($list) && count($list)): ?>
                    <div class="home-methods-fluid" id="methods">
                        <div class="home-methods-centered">
                            <?php $text = get_field('title_8'); if($text): ?>
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

            <?php if(get_field('active_17')): ?>
                <?php $type_17 = get_field('type_17'); if($type_17 === 'text'): ?>
                    <div class="home-text-rewievs-fluid">
                        <div class="home-text-rewievs-centered">
                            <div class="online-reviews-top">
                                <?php $text = get_field('title_17'); if($text): ?>
                                    <div class="online-reviews-top-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <div class="online-reviews-top-btn js-modal-link" data-target="send-review-popup"><?php _e( 'Залишити відгук', \PS::$theme_name ); ?></div>
                            </div>
                            <?php
                            global $wp_query;
                            \PS\Functions\Helper\Helper::get_reviews();
                            $custom_query = $wp_query;
                            ?>
                            <?php if ( $custom_query->have_posts() ): ?>
                                <div class="home-text-rewievs-slider">
                                    <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                        <div class="home-text-rewievs-slider-item">
                                            <?php $text = get_field('name'); if($text): ?>
                                                <div class="home-text-rewievs-slider-item-name"><?php echo $text; ?></div>
                                            <?php endif; ?>
                                            <?php $child_name = get_field('child_name'); $child_age = get_field('child_age'); if($child_name || $child_age): ?>
                                                <div class="home-text-rewievs-slider-item-post">
                                                    <?php if($child_name): ?><?php echo $child_name; ?><?php endif; ?><?php if($child_age): ?>, <?php echo $child_age; ?><?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php $text = get_field('text'); if($text): ?>
                                                <div class="home-text-rewievs-slider-item-message"><?php echo $text; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <?php wp_reset_query(); ?>
                        </div>
                    </div>
                <?php elseif($type_17 === 'video'): ?>
                    <div class="online-reviews-fluid index">
                        <div class="online-reviews-centered">
                            <div class="online-reviews-top">
                                <?php $text = get_field('title_17'); if($text): ?>
                                    <div class="online-reviews-top-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <div class="online-reviews-top-btn js-modal-link" data-target="send-review-popup"><?php _e( 'Залишити відгук', \PS::$theme_name ); ?></div>
                            </div>
                            <?php $list = get_field('video_17'); if(is_array($list) && count($list)): ?>
                                <?php
                                global $wp_query;
                                \PS\Functions\Helper\Helper::get_video($list);
                                $custom_query = $wp_query;
                                ?>
                                <?php if ( $custom_query->have_posts() ): ?>
                                    <div class="online-reviews-slider-wrapper">
                                        <div class="online-reviews-slider">
                                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                <div class="online-reviews-item js-modal-link" data-target="youtube-popup-<?php echo get_the_ID(); ?>">
                                                    <div class="online-reviews-item-top">
                                                        <?php $video = get_field('video'); if($video): ?>
                                                            <div class="online-reviews-item-image">
                                                                <img loading="lazy" src="https://i.ytimg.com/vi_webp/<?php preg_match('/src="([^"]+)"/', $video, $match); echo str_ireplace(['https://www.youtube.com/embed/', '?feature=oembed'], '', $match[1]); ?>/maxresdefault.webp" alt="">
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="online-reviews-item-icon">
                                                            <img src="<?php echo \PS::$assets_url; ?>images/youtube-icon.png" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="online-reviews-item-center">
                                                        <?php $term = get_field('video_tags'); if(isset($term->name)): ?>
                                                            <div class="online-reviews-item-center-tag"><?php echo $term->name; ?></div>
                                                        <?php endif; ?>
                                                        <div class="online-reviews-item-center-date"><?php echo get_the_time('d.m.Y'); ?></div>
                                                    </div>
                                                    <div class="online-reviews-item-bottom">
                                                        <p><?php echo get_the_title(); ?></p>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php elseif($type_17 === 'google'): ?>
                    <div class="home-methods-fluid">
                        <div class="home-methods-centered">
                            <div class="online-reviews-top">
                                <?php $text = get_field('title_17'); if($text): ?>
                                    <div class="online-reviews-top-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <div class="online-reviews-top-btn js-modal-link" data-target="send-review-popup"><?php _e( 'Залишити відгук', \PS::$theme_name ); ?></div>
                            </div>
                            <div>
                                <?php echo do_shortcode('[trustindex no-registration=google]'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_9')): ?>
                <div class="home-request-fluid" id="form">
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
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'school']); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_10')): ?>
                <div class="home-news-fluid" style="background-color: <?php the_field('color_10'); ?>;" id="news">
                    <div class="home-news-centered">
                        <div class="home-news-top">
                            <?php $text = get_field('title_10'); if($text): ?>
                                <div class="home-news-top-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $news_tags = get_terms(['taxonomy' => 'news_tags']); if(is_array($news_tags) && count($news_tags)): ?>
                                <div class="home-news-top-links">
                                    <a href="<?php echo get_the_permalink(\PS::$news_page); ?>" class="home-news-top-links-item"><?php _e( 'Усі матеріали', \PS::$theme_name ); ?></a>
                                    <?php foreach ($news_tags as $news_tag): ?>
                                        <a href="<?php echo get_the_permalink(\PS::$news_page); ?>filter/<?php echo $news_tag->slug; ?>/" class="home-news-top-links-item"><?php echo $news_tag->name; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php
                        global $wp_query;
                        \PS\Functions\Helper\Helper::get_news();
                        $custom_query = $wp_query;
                        ?>
                        <?php if ( $custom_query->have_posts() ): ?>
                            <div class="home-news-container">
                                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                    <?php get_template_part('parts/elements/news'); ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>

                        <div class="home-news-more">
                            <a href="<?php echo get_the_permalink(\PS::$news_page); ?>" class="home-news-more-bg"></a>
                            <div class="home-news-more-btn"><?php _e( 'Більше', \PS::$theme_name ); ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_11')): ?>
                <div class="home-team-fluid" id="team">
                    <div class="home-team-centered">
                        <div class="home-team-left">
                            <div class="home-team-left-top">
                                <?php $text = get_field('title_11'); if($text): ?>
                                    <div class="home-team-left-title"><?php echo $text; ?></div>
                                <?php endif; ?>
                                <?php $text = get_field('text_11'); if($text): ?>
                                    <div class="home-team-left-text"><?php echo $text; ?></div>
                                <?php endif; ?>
                            </div>
                            <?php $button = get_field('button_11'); if($button['active']): ?>
                                <a href="<?php echo $button['link']; ?>" class="home-team-left-btn">
                                    <div class="home-team-left-btn-bg"></div>
                                    <span><?php echo $button['text']; ?></span>
                                </a>
                            <?php endif; ?>
                        </div>

                        <?php $list = get_field('list_11'); if(is_array($list) && count($list)): ?>
                            <div class="home-team-container" id="team">
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

                        <?php $button = get_field('button_11'); if($button['active']): ?>
                            <a href="<?php echo $button['link']; ?>" class="home-team-left-btn-mob">
                                <div class="home-team-left-btn-bg"></div>
                                <span><?php echo $button['text']; ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_12')): ?>
                <div class="home-virtual" id="virtual">
                    <div class="home-virtual-walk">
                        <?php $img = get_field('img_12'); if(is_array($img) && count($img)): ?>
                            <div class="home-virtual-walk-img">
                                <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <div class="home-virtual-walk-content">
                            <?php $text = get_field('subtitle_12_1'); if($text): ?>
                                <div class="home-virtual-walk-tag"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('title_12_1'); if($text): ?>
                                <div class="home-virtual-walk-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $button = get_field('button_12'); if($button['active']): ?>
                                <a href="<?php echo $button['link']; ?>" class="home-virtual-walk-button">
                                    <div class="home-virtual-walk-button-bg"></div>
                                    <span><?php echo $button['text']; ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="home-virtual-excursion">
                        <div class="home-virtual-excursion-content">
                            <?php $text = get_field('subtitle_12_2'); if($text): ?>
                                <div class="home-virtual-excursion-tag"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('title_12_2'); if($text): ?>
                                <div class="home-virtual-excursion-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_12_2'); if($text): ?>
                                <div class="home-virtual-excursion-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $button = get_field('button_12_2'); if($button['active']): ?>
                                <div class="home-virtual-excursion-btn js-modal-link" data-target="call-me-popup">
                                    <div class="home-virtual-excursion-btn-bg"></div>
                                    <span><?php echo $button['text']; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_13')): ?>
                <div class="home-price-fluid" id="price">
                    <div class="home-price-centered">
                        <div class="home-price-bg-1">
                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon15.svg" alt="">
                        </div>
                        <div class="home-price-bg-2">
                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon15.svg" alt="">
                        </div>
                        <?php $text = get_field('subtitle_13'); if($text): ?>
                            <div class="home-price-tag"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('title_13'); if($text): ?>
                            <div class="home-price-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_13'); if($text): ?>
                            <div class="home-price-description"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $button = get_field('button_13'); if($button['active']): ?>
                            <a href="<?php echo $button['link']; ?>" class="home-price-btn">
                                <span><?php echo $button['text']; ?></span>
                                <div class="home-price-btn-bg"></div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_14')): ?>
                <div class="home-formats-fluid" id="formats">
                    <div class="home-formats-centered">
                        <?php $text = get_field('title_14'); if($text): ?>
                            <div class="home-formats-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_14'); if(is_array($list) && count($list)): ?>
                            <div class="home-formats-cards">
                                <?php foreach ($list as $m => $block): ?>
                                    <a href="<?php echo $block['link']; ?>" class="home-formats-cards-item">
                                        <div class="home-formats-cards-item-name"><?php echo $block['title']; ?></div>
                                        <div class="home-formats-cards-item-arrow">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon17.svg" alt="">
                                        </div>
                                        <div class="home-formats-cards-item-bg-img">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/logo.svg" alt="">
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_16')): ?>
                <?php $list = get_field('list_16'); if(is_array($list) && count($list)): ?>
                    <?php
                    global $wp_query;
                    \PS\Functions\Helper\Helper::get_schools_by_ids($list);
                    $custom_query = $wp_query;
                    ?>
                    <?php if ( $custom_query->have_posts() ): ?>
                        <div class="kindergarten-branches-fluid" id="schools">
                            <div class="kindergarten-branches-centered">
                                <?php $text = get_field('title_16'); if($text): ?>
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

            <?php if(get_field('active_15')): ?>
                <?php get_template_part('parts/elements/social'); ?>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <?php if(get_field('active_3')): ?>
            <?php $list = get_field('list_3'); if(is_array($list) && count($list)): ?>
                <?php foreach ($list as $m => $block): ?>
                    <?php if($block['popup']['active']): ?>
                        <div class="knowledge-popup modal modal--sm js-modal" data-modal="knowledge-popup-<?php echo $m + 1; ?>">
                            <div class="modal__overlay js-close-modal"></div>
                            <div class="knowledge-popup-content" style="background-color: <?php echo $block['color']; ?>">
                                <div class="knowledge-popup-close js-close-modal">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close2.svg" alt="">
                                </div>
                                <div class="knowledge-popup-inner">
                                    <div class="knowledge-popup-title"><?php echo $block['title']; ?></div>
                                    <?php echo str_ireplace(['width', 'height'], ['data-width', 'data-height'], $block['popup']['text']); ?>
                                </div>
                                <div class="knowledge-next-button popup-next" data-type="knowledge-popup">
                                    <span><?php _e( 'Далі', \PS::$theme_name ); ?></span>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="16" cy="16" r="16" fill="#0CC4E9" /><path d="M11.8154 7.38477L20.1847 16.0002L11.8154 24.6155" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if(get_field('active_4')): ?>
            <?php $list = get_field('video_4'); if(is_array($list) && count($list)): ?>
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

        <?php if(get_field('active_7')): ?>
            <?php $list = get_field('list_7'); if(is_array($list) && count($list)): ?>
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

        <?php if(get_field('active_11')): ?>
            <?php $list = get_field('list_11'); if(is_array($list) && count($list)): ?>
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

        <?php if(get_field('active_17')): ?>
            <?php $list = get_field('video_17'); if(is_array($list) && count($list)): ?>
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

        <div class="modal modal--sm js-modal" data-modal="send-review-popup">
            <div class="modal__overlay js-close-modal"></div>
            <div class="send-review-popup-content">
                <div class="send-review-popup-close js-close-modal">
                    <img src="<?php echo \PS::$assets_url; ?>images/close8.svg" alt="" />
                </div>
                <?php get_template_part('parts/forms/reviews'); ?>
            </div>
        </div>
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