<?php get_header(); ?>
<body class="team-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="team-main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="team-first-fluid">
                    <div class="team-first-centered">
                        <div class="team-first-left">
                            <div class="team-first-title">MRIYDIY</div>
                            <?php $text = get_field('title_1'); if($text): ?>
                                <div class="team-first-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $text = get_field('text_1'); if($text): ?>
                                <div class="team-first-tagline"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $button = get_field('button_1'); if($button['active']): ?>
                                <a href="<?php echo $button['link']; ?>" class="online-first-btn">
                                    <div class="online-first-btn-bg"></div>
                                    <span><?php echo $button['text']; ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php $img = get_field('img_1'); if(is_array($img) && count($img)): ?>
                            <div class="team-first-right">
                                <div class="team-first-image">
                                    <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                                </div>
                                <div class="team-first-frame">
                                    <svg width="510" height="517" viewBox="0 0 510 517" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M392.077 102.425L347.7 11.9373C344.929 6.28792 338.103 3.95401 332.454 6.7246L241.967 51.1008L146.506 18.5096C140.549 16.4762 134.072 19.6575 132.041 25.6146L99.5109 121.01L8.95571 165.449C3.30818 168.221 0.975679 175.046 3.74568 180.694L48.1243 271.183L15.593 366.583C13.562 372.539 16.7442 379.014 22.6997 381.044L118.099 413.577L162.476 504.063C165.247 509.713 172.073 512.047 177.723 509.276L268.209 464.9L363.671 497.491C369.627 499.525 376.104 496.344 378.136 490.386L410.665 394.991L501.15 350.616C506.8 347.845 509.133 341.017 506.361 335.367L461.923 244.817L494.515 149.352C496.548 143.398 493.368 136.922 487.414 134.889L391.948 102.296L392.077 102.425ZM397.352 141.271L397.352 374.86C397.353 388.881 385.905 400.329 371.884 400.329L138.294 400.328C124.273 400.328 112.825 388.88 112.825 374.859L112.76 141.205C112.759 127.184 124.208 115.736 138.228 115.736L371.818 115.737C385.839 115.737 397.287 127.186 397.287 141.206L397.352 141.271Z" fill="#FBC01A" /></svg>
                                </div>
                                <div class="team-icon">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon38.svg" alt="">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <?php $video = get_field('video_2'); if($video): ?>
                    <div class="team-video-fluid">
                        <div class="team-video-centered">
                            <div class="youtube-video">
                                <?php echo str_ireplace(['iframe', 'width', 'height', '?feature=oembed'], ['iframe class="youtube-video-iframe"', 'data-width', 'data-height', '?feature=oembed&enablejsapi=1&version=3&playerapiid=ytplayer'], $video); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="team-teachers-fluid">
                <div class="team-teachers-centered">
                    <div class="team-teachers-top">
                        <?php
                        global $wp_query;
                        \PS\Functions\Helper\Helper::get_schools();
                        $custom_query = $wp_query;
                        ?>
                        <?php if ( $custom_query->have_posts() ): ?>
                            <div class="team-teachers-school-filters">
                                <div class="home-videos-filters">
                                    <div class="home-videos-filters-btn">
                                        <span><?php _e('Заклади', \PS::$theme_name ); ?></span>
                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr4.svg" alt="">
                                    </div>
                                    <div class="home-filters-drop">
                                        <div class="home-filters-drop-inner">
                                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                <div class="home-filters-drop-item">
                                                    <input class="filter_staff" type="checkbox" id="school_<?php echo get_the_ID(); ?>" data-type="school" data-class="school_<?php echo get_the_ID(); ?>">
                                                    <label for="school_<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></label>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>

                        <?php $team_tags = get_terms(['taxonomy' => 'team_tags']); if(is_array($team_tags) && count($team_tags)): ?>
                            <div class="team-teachers-subdivision-filters">
                                <div class="home-videos-filters">
                                    <div class="home-videos-filters-btn">
                                        <span><?php _e('Підрозділи', \PS::$theme_name ); ?></span>
                                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr4.svg" alt="img">
                                    </div>
                                    <div class="home-filters-drop">
                                        <div class="home-filters-drop-inner">
                                            <?php foreach($team_tags as $term): ?>
                                                <div class="home-filters-drop-item">
                                                    <input class="filter_staff" type="checkbox" id="section_<?php echo $term->term_id; ?>" data-type="section" data-class="section_<?php echo $term->term_id; ?>">
                                                    <label for="section_<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if(is_array($team_tags) && count($team_tags)): ?>
                        <div class="team-teachers-category-container">
                            <div class="team-teachers-category-container-1240">
                                <?php foreach($team_tags as $term): ?>
                                    <div class="team-teachers-category section_<?php echo $term->term_id; ?>" style="margin-top: 40px">
                                        <div class="team-teachers-category-title"><?php echo $term->name; ?></div>
                                        <?php
                                        global $wp_query;
                                        \PS\Functions\Helper\Helper::get_all_team($term->slug);
                                        $custom_query = $wp_query;
                                        ?>
                                        <?php if ( $custom_query->have_posts() ): ?>
                                            <div class="team-teachers-category-cards">
                                                <?php $n = 1; ?>
                                                <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                    <?php get_template_part('parts/elements/team', null, ['n' => $n, 'term_id' => $term->term_id]); ?>
                                                    <?php $n++; ?>
                                                <?php endwhile; ?>
                                            </div>
                                            <?php if($custom_query->found_posts > 4): ?>
                                                <div class="team-teachers-category-more show_all_staff" data-term_id="<?php echo $term->term_id; ?>">
                                                    <div class="team-teachers-category-more-bg"></div>
                                                    <div class="team-teachers-category-more-btn"><?php _e('Більше', \PS::$theme_name ); ?></div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php wp_reset_query(); ?>
                                    </div>
                                <?php endforeach; ?>

                                <div class="team-teachers-category nothing_found" style="display:none;margin-top: 40px;">
                                    <div class="team-teachers-category-title"><?php _e('Нічого не знайдено.', \PS::$theme_name ); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if(get_field('active_3')): ?>
                <div class="team-question-fluid">
                    <div class="team-question-centered">
                        <div class="team-question-top">
                            <?php $text = get_field('title_3'); if($text): ?>
                                <div class="team-question-top-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="team-question-top-icon">
                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon39.svg" alt="">
                            </div>
                        </div>
                        <div class="team-question-btns">
                            <a href="<?php echo get_the_permalink(\PS::$faq_page); ?>" class="team-question-answers"><?php _e('Відповіді на запитання', \PS::$theme_name ); ?></a>
                            <div class="team-question-write-btn js-modal-link" data-target="write-us-popup"><?php _e('Написати нам', \PS::$theme_name ); ?></div>
                            <div class="team-question-call-btn js-modal-link" data-target="call-me-popup"><?php _e('Замовити дзвінок', \PS::$theme_name ); ?></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php get_template_part('parts/elements/social'); ?>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <?php
        global $wp_query;
        \PS\Functions\Helper\Helper::get_all_team();
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
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>
    <script>
        // show staff
        $(document).on('click', '.show_all_staff', function() {
            var term_id = $(this).data('term_id');
            $(this).hide();
            $('.team-teachers-category.section_' + term_id + ' .team-teachers-cards-item').show();

            // school
            var classes = [];
            $('input.filter_staff[data-type="school"]:checked').each(function(){
                classes.push($(this).data('class'));
            });
            if(classes.length){
                $('.team-teachers-category.section_' + term_id + ' .team-teachers-cards-item').each(function(){
                    var schools = $(this).attr('class').split(' ');
                    var intersection = schools.filter(x => classes.includes(x));
                    if(intersection.length === 0){
                        $(this).hide();
                    }
                });
            }

            return false;
        });

        // filter
        $(document).on('change', 'input.filter_staff', function() {
            $('.team-teachers-category, .team-teachers-category .team-teachers-cards-item').show();

            // school
            var classes = [];
            $('input.filter_staff[data-type="school"]:checked').each(function(){
                classes.push($(this).data('class'));
            });
            if(classes.length){
                $('.team-teachers-category .team-teachers-cards-item').each(function(){
                    var schools = $(this).attr('class').split(' ');
                    var intersection = schools.filter(x => classes.includes(x));
                    if(intersection.length === 0){
                        $(this).hide();
                    }
                });
            }

            // section
            var classes = [];
            $('input.filter_staff[data-type="section"]:checked').each(function(){
                classes.push($(this).data('class'));
            });
            if(classes.length){
                $('.team-teachers-category .team-teachers-cards-item:visible').each(function(){
                    if($.inArray( $(this).data('section'), classes) === -1){
                        $(this).hide();
                    }
                });
            }

            // check blocks and buttons
            $('.team-teachers-category').each(function (){
                // block
                if($(this).find('.team-teachers-cards-item:visible').length){
                    $(this).show();
                }else{
                    $(this).hide();
                }

                // button
                if($(this).find('.team-teachers-cards-item:visible').length > 4){
                    $(this).find('.show_all_staff').show();
                }else{
                    $(this).find('.show_all_staff').hide();
                }

                // pages
                var n = 1;
                $(this).find('.team-teachers-cards-item:visible').each(function(){
                    if(n <= 4){
                        $(this).show();
                    }else{
                        $(this).hide();
                    }
                    n++;
                });
            });

            check_empty();

            return false;
        });

        // check empty
        function check_empty(){
            if($('.team-teachers-category-container').find('.team-teachers-cards-item:visible').length){
                $('.team-teachers-category-container').find('.nothing_found').hide();
            }else{
                $('.team-teachers-category-container').find('.nothing_found').show();
            }
        }
    </script>
    <?php /* END */ ?>

</body>
</html>