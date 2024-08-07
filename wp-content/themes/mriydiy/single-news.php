<?php get_header(); ?>
<?php
$kids_popup = false;
$camp_popup = false;

// save view
$post_id = get_the_ID();
\PS\Functions\Helper\Helper::save_news_view($post_id);
?>
<body class="one-news-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="one-news-main">
            <?php get_template_part('parts/_header'); ?>

            <div class="one-news-fluid">
                <div class="one-news-centered">
                    <?php $news_tags = get_field('news_tags'); if(isset($news_tags->term_id) && $news_tags->term_id === 9): ?>
                        <?php $dates = get_field('dates'); if(is_array($dates) && count($dates)): ?>
                            <div class="one-news-date"><?php foreach ($dates as $m => $date): ?><?php echo date('d/m/Y', strtotime($date['start'])); ?><?php if($m < (count($dates) - 1)): ?>, <?php endif; ?><?php endforeach; ?></div>
                        <?php else: ?>
                            <div class="one-news-date"><?php echo get_the_time('d/m/Y'); ?></div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="one-news-date"><?php echo get_the_time('d/m/Y'); ?></div>
                    <?php endif; ?>

                    <h1 class="one-news-title"><?php echo get_the_title(); ?></h1>

                    <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                        <div class="one-news-images">
                            <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                        </div>
                    <?php endif; ?>

                    <div class="one-news-views">
                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon87.svg" alt="">
                        <span><?php echo (int)get_option('news_view_' . $post_id); ?></span>
                    </div>

                    <?php $text = get_field('text'); if(is_array($text) && count($text)): ?>
                        <?php foreach ($text as $block): ?>
                            <?php if($block['acf_fc_layout'] == 'text'): ?>

                                <?php echo str_ireplace(['<ul>'], ['<ul class="one-news-list">'], $block['text']); ?>

                            <?php elseif($block['acf_fc_layout'] == 'img'): ?>

                                <div class="one-news-images">
                                    <img loading="lazy" src="<?php echo $block['img']['sizes']['960x0']; ?>" alt="">
                                </div>

                            <?php elseif($block['acf_fc_layout'] == 'video'): ?>

                                <div class="one-news-youtube">
                                    <div class="youtube-video"><?php echo str_ireplace(['<iframe', 'width', 'height'], ['<iframe class="youtube-video-iframe"', 'data-width', 'data-height'], $block['video']); ?></div>
                                </div>

                            <?php elseif($block['acf_fc_layout'] == 'quote'): ?>

                                <div class="one-quote <?php echo $block['color_1']; ?>">
                                    <div class="one-quote-content">
                                        <?php if($block['author']['active']): ?>
                                            <div class="one-quote-left <?php echo $block['color_3']; ?>">
                                                <?php if(is_array($block['author']['img']) && count($block['author']['img'])): ?>
                                                    <div class="one-quote-left-photo">
                                                        <img loading="lazy" src="<?php echo $block['author']['img']['sizes']['480x0']; ?>" alt="" />
                                                    </div>
                                                <?php endif; ?>
                                                <?php if($block['author']['name']): ?>
                                                    <div class="one-quote-left-name"><?php echo $block['author']['name']; ?></div>
                                                <?php endif; ?>
                                                <?php if($block['author']['about']): ?>
                                                    <div class="one-quote-left-post"><?php echo $block['author']['about']; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="one-quote-right">
                                            <div class="one-quote-icon <?php echo $block['color_2']; ?>">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon92.svg" alt="" />
                                            </div>
                                            <?php echo $block['text']; ?>
                                        </div>
                                    </div>
                                </div>

                            <?php elseif($block['acf_fc_layout'] == 'button'): ?>

                                <div class="one-news-request">
                                    <?php if($block['text']): ?><p><?php echo $block['text']; ?></p><?php endif; ?>
                                    <?php if($block['type'] === 'link'): ?>
                                        <?php if(mb_strripos($block['button_link'], site_url()) === false): ?>
                                            <div data-link="<?php echo $block['button_link']; ?>" class="one-news-request-btn<?php if($block['design'] === 'fill'): ?>2<?php endif; ?> target-link">
                                                <span><?php echo $block['button_text']; ?></span>
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon70.svg" alt="">
                                            </div>
                                        <?php else: ?>
                                            <a href="<?php echo $block['button_link']; ?>" class="one-news-request-btn<?php if($block['design'] === 'fill'): ?>2<?php endif; ?>">
                                                <span><?php echo $block['button_text']; ?></span>
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon70.svg" alt="">
                                            </a>
                                        <?php endif; ?>
                                    <?php elseif($block['type'] === 'school'): ?>
                                        <a href="javascript:void(0)" class="one-news-request-btn<?php if($block['design'] === 'fill'): ?>2<?php endif; ?> js-modal-link" data-target="entry-popup">
                                            <span><?php echo $block['button_text']; ?></span>
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon70.svg" alt="">
                                        </a>
                                    <?php elseif($block['type'] === 'kids'): ?>
                                        <a href="javascript:void(0)" class="one-news-request-btn<?php if($block['design'] === 'fill'): ?>2<?php endif; ?> js-modal-link" data-target="entry-kindergarten-popup">
                                            <span><?php echo $block['button_text']; ?></span>
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon70.svg" alt="">
                                        </a>

                                        <?php $kids_popup = true; ?>
                                    <?php elseif($block['type'] === 'camp'): ?>
                                        <a href="javascript:void(0)" class="one-news-request-btn<?php if($block['design'] === 'fill'): ?>2<?php endif; ?> js-modal-link" data-target="entry-camp-popup">
                                            <span><?php echo $block['button_text']; ?></span>
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon70.svg" alt="">
                                        </a>

                                        <?php $camp_popup = true; ?>
                                    <?php endif; ?>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php
            global $wp_query;
            \PS\Functions\Helper\Helper::get_other_news(get_the_ID());
            $custom_query = $wp_query;
            ?>
            <?php if ( $custom_query->have_posts() ): ?>
                <div class="one-news-interesting-fluid">
                    <div class="one-news-interesting-centered">
                        <div class="one-news-interesting-title"><?php _e('ВАМ МОЖЕ БУТИ ЦІКАВО', \PS::$theme_name ); ?></div>
                        <div class="one-news-interesting-slider">
                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                <?php get_template_part('parts/elements/news'); ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <?php if($kids_popup): ?>
            <div class="modal modal--sm js-modal" data-modal="entry-kindergarten-popup">
                <div class="modal__overlay js-close-modal"></div>
                <div class="entry-popup-content">
                    <div class="entry-popup-close js-close-modal">
                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close1.svg" alt="">
                    </div>
                    <div class="entry-popup-inner">
                        <div class="entry-popup-title"><?php _e(get_field('form_entry_title', \PS::$option_page)); ?></div>
                        <div class="entry-popup-form">
                            <?php get_template_part('parts/forms/enter', null, ['type' => 'kindergarten']); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($camp_popup): ?>
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

            <div class="modal modal--sm js-modal" data-modal="entry-camp-popup">
                <div class="modal__overlay js-close-modal"></div>
                <div class="entry-popup-content">
                    <div class="entry-popup-close js-close-modal">
                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close1.svg" alt="">
                    </div>
                    <div class="entry-popup-inner">
                        <div class="entry-popup-title"><?php _e(get_field('form_entry_title', \PS::$option_page)); ?></div>
                        <div class="entry-popup-form">
                            <?php get_template_part('parts/forms/enter', null, ['type' => 'camp', 'select' => ['name' => 'camp', 'default' => __( 'Оберіть табір', \PS::$theme_name ), 'options' => $camps]]); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>