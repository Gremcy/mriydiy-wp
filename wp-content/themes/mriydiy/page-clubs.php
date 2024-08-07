<?php get_header(); ?>
<?php $clubs = []; ?>
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

            <div class="camps-first-fluid"></div>

            <?php if(get_field('active_4')): ?>
                <div class="camps-clubs-fluid">
                    <div class="camps-clubs-centered">
                        <div class="camps-clubs-top">
                            <div class="camps-clubs-top-left">
                                <?php $title_4 = get_field('title_4'); if($title_4): ?>
                                    <div class="camps-clubs-title"><?php echo $title_4; ?></div>
                                <?php endif; ?>
                                <?php $text_4 = get_field('text_4'); if($text_4): ?>
                                    <div class="camps-clubs-description"><?php echo $text_4; ?></div>
                                <?php endif; ?>
                            </div>
                            <?php $img_4 = get_field('img_4'); if(is_array($img_4) && count($img_4)): ?>
                                <div class="camps-clubs-top-logo">
                                    <img loading="lazy" src="<?php echo $img_4['sizes']['960x0']; ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="camps-clubs-filters">
                            <div class="team-teachers-school-filters">
                                <?php
                                global $wp_query;
                                \PS\Functions\Helper\Helper::get_schools();
                                $custom_query = $wp_query;
                                ?>
                                <?php if ( $custom_query->have_posts() ): ?>
                                    <div class="home-videos-filters clubs-filter">
                                        <div class="home-videos-filters-btn">
                                            <span><?php _e('Заклад', \PS::$theme_name); ?></span>
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr14.svg" alt="">
                                        </div>
                                        <div class="home-filters-drop">
                                            <div class="home-filters-drop-inner">
                                                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                    <div class="home-filters-drop-item">
                                                        <input class="filter_clubs" type="checkbox" id="schools_<?php echo get_the_ID(); ?>" data-type="schools" data-class="schools_<?php echo get_the_ID(); ?>">
                                                        <label for="schools_<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></label>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>

                                <?php foreach (
                                        [
                                            'direction' => __('Напрямок', \PS::$theme_name ),
                                            'age' => __('Вік', \PS::$theme_name ),
                                        ]
                                        as $taxonomy => $title): ?>
                                    <?php $terms = get_terms(['taxonomy' => $taxonomy]); if(is_array($terms) && count($terms)): ?>
                                        <div class="home-videos-filters clubs-filter">
                                            <div class="home-videos-filters-btn">
                                                <span><?php echo $title; ?></span>
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr14.svg" alt="">
                                            </div>
                                            <div class="home-filters-drop">
                                                <div class="home-filters-drop-inner">
                                                    <?php foreach($terms as $term): ?>
                                                        <div class="home-filters-drop-item">
                                                            <input class="filter_clubs" type="checkbox" id="<?php echo $taxonomy; ?>_<?php echo $term->term_id; ?>" data-type="<?php echo $taxonomy; ?>" data-class="<?php echo $taxonomy; ?>_<?php echo $term->term_id; ?>">
                                                            <label for="<?php echo $taxonomy; ?>_<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <?php
                        global $wp_query;
                        \PS\Functions\Helper\Helper::get_clubs();
                        $custom_query = $wp_query;
                        ?>
                        <?php if ( $custom_query->have_posts() ): ?>
                            <div class="camps-clubs-container">
                                <?php $n = 1; ?>
                                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                    <?php
                                    if(get_field('enter_club') === 'site'){
                                        $clubs[get_the_ID()] = get_the_title();
                                    }
                                    ?>

                                    <?php get_template_part('parts/elements/club', null, ['n' => $n]); ?>

                                    <?php $n++; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>

                        <?php if($custom_query->found_posts > 9): ?>
                            <div class="online-faq-more show_all_clubs" data-page="2">
                                <div class="online-faq-more-bg"></div>
                                <div class="online-faq-more-btn"><?php _e('Більше', \PS::$theme_name ); ?></div>
                            </div>
                        <?php endif; ?>

                        <div class="nothing_found" style="display:none;margin-top: 40px;">
                            <div class="team-teachers-category-title"><?php _e('Нічого не знайдено.', \PS::$theme_name ); ?></div>
                        </div>
                    </div>
                </div>
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

            <?php if(get_field('active_12')): ?>
                <?php get_template_part('parts/elements/social'); ?>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <?php if(get_field('active_4')): ?>
            <?php
            global $wp_query;
            \PS\Functions\Helper\Helper::get_clubs();
            $custom_query = $wp_query;
            ?>
            <?php if ( $custom_query->have_posts() ): ?>
                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                    <div class="modal modal--sm js-modal" data-modal="club-popup-<?php echo get_the_ID(); ?>" data-url="<?php echo \PS\Functions\Helper\Helper::get_slug(get_the_ID()); ?>">
                        <div class="modal__overlay js-close-modal"></div>

                        <div class="club-popup-content <?php echo get_field('color'); ?>">
                            <div class="club-popup-content-close js-close-modal">
                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon69.svg" alt="">
                            </div>
                            <div class="club-popup-content-top">
                                <div class="club-popup-left">
                                    <div class="club-popup-title"><?php echo get_the_title(); ?></div>

                                    <?php $img_2 = get_field('img_2'); if(is_array($img_2) && count($img_2)): ?>
                                        <div class="club-popup-mob-img">
                                            <img loading="lazy" src="<?php echo $img_2['sizes']['960x0']; ?>" alt="" loading="lazy">
                                        </div>
                                    <?php endif; ?>

                                    <?php $info = get_field('info'); if($info['teacher']): ?>
                                        <div class="club-popup-teacher"><?php _e( 'Викладач', \PS::$theme_name ); ?>: <span><?php echo $info['teacher']; ?></span></div>
                                    <?php endif; ?>
                                    <?php if($info['age']): ?>
                                        <div class="club-popup-price"><?php _e( 'Вік', \PS::$theme_name ); ?>: <span><?php echo $info['age']; ?></span></div>
                                    <?php endif; ?>
                                    <?php if($info['price']): ?>
                                        <div class="club-popup-price"><?php _e( 'Вартість', \PS::$theme_name ); ?>: <span><?php echo $info['price']; ?></span></div>
                                    <?php endif; ?>
                                    <?php if($info['schedule']): ?>
                                        <div class="club-popup-age"><?php _e( 'Розклад', \PS::$theme_name ); ?>: <span><?php echo $info['schedule']; ?></span></div>
                                    <?php endif; ?>

                                    <?php $text_1 = get_field('text_1'); if($text_1['title'] || $text_1['text']): ?>
                                        <div class="club-popup-about-teacher">
                                            <div class="club-popup-about-teacher-heading"><?php echo $text_1['title']; ?></div>
                                            <?php echo $text_1['text']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="club-popup-right">
                                    <?php $img_2 = get_field('img_2'); if(is_array($img_2) && count($img_2)): ?>
                                        <div class="club-popup-desk-img">
                                            <img loading="lazy" src="<?php echo $img_2['sizes']['960x0']; ?>" alt="">
                                        </div>
                                    <?php endif; ?>

                                    <?php $text_2 = get_field('text_2'); if($text_2['title'] || $text_2['text']): ?>
                                        <div class="club-popup-about-club">
                                            <div class="club-popup-about-club-title"><?php echo $text_2['title']; ?></div>
                                            <?php echo $text_2['text']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php $enter_club = get_field('enter_club'); if($enter_club === 'site'): // website-form ?>
                                <div class="club-popup-btns">
                                    <div class="club-popup-btn<?php echo get_field('enter_style') === 'no_fill' ? ' border' : ''; ?> js-modal-link" data-target="join-club-popup" data-club="<?php echo get_the_title(); ?>">
                                        <div class="club-popup-btn-bg"></div>
                                        <span><?php echo get_field('enter_text') ?: __( 'Записатися', \PS::$theme_name ); ?></span>
                                    </div>

                                    <?php if(\PS\Functions\Payment\Init::check_payment_active(get_the_ID())): ?>
                                        <a href="javascript:void(0)" class="club-popup-btn-link long js-modal-link" data-target="join-club-popup" data-club="<?php echo get_the_title(); ?>">
                                            <div class="club-popup-btn-link-bg"></div>
                                            <span><?php _e( 'Забронювати місце і оплатити', \PS::$theme_name ); ?></span>
                                        </a>
                                        <div class="club-popup-bottom-logos">
                                            <div class="club-popup-bottom-logos-img">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/81.png" alt="">
                                            </div>
                                            <div class="club-popup-bottom-logos-img">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/82.png" alt="">
                                            </div>
                                            <div class="club-popup-bottom-logos-img">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/83.png" alt="">
                                            </div>
                                            <div class="club-popup-bottom-logos-img">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/84.png" alt="">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php elseif($enter_club === 'google'): // google-form ?>
                                <div class="club-popup-btns">
                                    <a href="<?php echo get_field('enter_link'); ?>" class="club-popup-btn<?php echo get_field('enter_style') === 'no_fill' ? ' border' : ''; ?>" target="_blank" rel="nofollow">
                                        <div class="club-popup-btn-bg"></div>
                                        <span><?php echo get_field('enter_text') ?: __( 'Записатися', \PS::$theme_name ); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>

        <div class="modal modal--sm js-modal" data-modal="join-club-popup">
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
                        <?php get_template_part('parts/forms/enter', null, ['type' => 'club', 'select' => ['name' => 'club', 'default' => __( 'Оберіть клуб', \PS::$theme_name ), 'options' => $clubs]]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>
    <script>
        // show more
        $(document).on('click', '.show_all_clubs', function() {
            var page = parseInt($(this).data('page'));

            check_load_more(page);
            $(this).data('page', page + 1);

            return false;
        });

        // filter
        $(document).on('change', 'input.filter_clubs', function() {
            $('.camps-clubs-container .camps-clubs-item').hide().addClass('visible');

            $.each(['schools', 'direction', 'age'], function( index, value ) {
                var classes = [];
                $('input.filter_clubs[data-type="' + value + '"]:checked').each(function(){
                    classes.push($(this).data('class'));
                });
                if(classes.length){
                    $('.camps-clubs-container .camps-clubs-item.visible').each(function(){
                        var item_classes = $(this).attr('class').split(' ');
                        var intersection = item_classes.filter(x => classes.includes(x));
                        if(intersection.length === 0){
                            $(this).removeClass('visible');
                        }
                    });
                }
            });

            check_load_more(1);
            $('.show_all_clubs').data('page', 2);

            check_empty();

            return false;
        });

        // check load more
        function check_load_more(page){
            var m = 1;
            $('.camps-clubs-container .camps-clubs-item.visible').each(function(){
                if(m <= page * 9){
                    $(this).show();
                }else{
                    $(this).hide();
                }
                m++;
            });

            if(page * 9 < $('.camps-clubs-container .camps-clubs-item.visible').length){
                $('.show_all_clubs').show();
            }else{
                $('.show_all_clubs').hide();
            }
        }

        // check empty
        function check_empty(){
            if($('.camps-clubs-container').find('.camps-clubs-item.visible').length){
                $('.camps-clubs-fluid').find('.nothing_found').hide();
            }else{
                $('.camps-clubs-fluid').find('.nothing_found').show();
            }
        }
    </script>

    <script>
        // form
        $(document).on('click', '[data-target="join-club-popup"]', function (){
            var club = $(this).data('club');
            if(club){
                if($('select[name="club"] option[value="' + club + '"]').length){
                    $('select[name="club"]').val(club).trigger('change');
                }
            }
        });
    </script>

    <script>
        // clubs url
        $(document).on('click', '.js-close-modal', function (){
            // remove hash
            history.pushState('', document.title, window.location.pathname);
        });

        // open club by hash
        $(window).on('load', function(){
            var hash = window.location.hash;
            if($('.modal[data-url="' + hash.substr(1) + '"]').length){
                $('body').addClass('is-hidden');
                $('.modal[data-url="' + hash.substr(1) + '"]').fadeIn(1).addClass('is-open');
            }
        });
    </script>
    <?php /* END */ ?>

</body>
</html>