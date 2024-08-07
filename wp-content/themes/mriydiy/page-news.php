<?php get_header(); ?>
<body class="news-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="news-main">
            <?php get_template_part('parts/_header'); ?>

            <?php
            global $wp_query;
            $current_tag = get_query_var('section');
            \PS\Functions\Helper\Helper::get_all_news($wp_query->query['paged'], $current_tag);
            $custom_query = $wp_query;
            ?>
            <?php if ( $custom_query->have_posts() ): ?>
                <div class="news-fluid">
                    <div class="news-centered">
                        <div class="news-top">
                            <h1 class="news-top-title"><?php if($wp_query->query['paged'] > 1): ?><?php _e('Сторінка', \PS::$theme_name ); ?> <?php echo $wp_query->query['paged']; ?> - <?php endif; ?><?php echo get_the_title(); ?></h1>
                            <?php $news_tags = get_terms(['taxonomy' => 'news_tags']); if(is_array($news_tags) && count($news_tags)): ?>
                                <div class="news-top-tags">
                                    <div class="news-top-tags-inner">
                                        <?php foreach ($news_tags as $news_tag): ?>
                                            <a href="<?php echo get_the_permalink(\PS::$news_page); ?>filter/<?php echo $news_tag->slug; ?>/" class="news-top-tags-item<?php if($current_tag === $news_tag->slug): ?> active<?php endif; ?>"><?php echo $news_tag->name; ?></a>
                                        <?php endforeach; ?>
                                        <a href="<?php echo get_the_permalink(\PS::$news_page); ?>" class="news-top-tags-item<?php if(!$current_tag): ?> active<?php endif; ?>"><?php _e( 'Усі матеріали', \PS::$theme_name ); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="news-container">
                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                <?php get_template_part('parts/elements/news'); ?>
                            <?php endwhile; ?>
                        </div>

                        <?php
                        $pagination = paginate_links(
                            [
                                'prev_next' => false,
                                'mid_size' => 3,
                                'end_size' => 2,
                                'current' => max( 1, $custom_query->query_vars['paged'] ),
                                'total' => $custom_query->max_num_pages
                            ]
                        ); ?>
                        <?php if($pagination): ?>
                            <div class="news-pagination">
                                <?php if(!$custom_query->query_vars['paged']): ?>
                                    <div class="news-pagination-prev disabled">
                                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 18L2 10L10 2" stroke="#FF5C00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url('/news/' . ($current_tag ? 'filter/' . $current_tag . '/' : '') . 'page/'); ?><?php echo $custom_query->query_vars['paged'] - 1; ?>/" class="news-pagination-prev">
                                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 18L2 10L10 2" stroke="#FF5C00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    </a>
                                <?php endif; ?>

                                <?php echo str_ireplace(['page-numbers', 'current'], ['news-pagination-item', 'active'], $pagination); ?>

                                <?php if($custom_query->query_vars['paged'] == $custom_query->max_num_pages): ?>
                                    <div class="news-pagination-next disabled">
                                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2L10 10L2 18" stroke="#FF5C00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo \PS\Functions\Plugins\Qtranslate::current_site_url('/news/' . ($current_tag ? 'filter/' . $current_tag . '/' : '') . 'page/'); ?><?php echo ($custom_query->query_vars['paged'] ?: 1) + 1; ?>/" class="news-pagination-next">
                                        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 2L10 10L2 18" stroke="#FF5C00" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>

            <div class="news-subscribe-fluid">
                <div class="news-subscribe-centered">
                    <div class="news-subscribe-top">
                        <div class="news-subscribe-top-title"><?php _e(get_field('form_subscribe_title', \PS::$option_page)); ?></div>
                        <div class="news-subscribe-top-icon">
                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon30.svg" alt="">
                        </div>
                    </div>
                    <?php get_template_part('parts/forms/subscribe'); ?>
                    <div class="news-subscribe-success-text"><?php _e('Дякуємо! Ваша підписка оформлена.', \PS::$theme_name ); ?></div>
                </div>
            </div>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>