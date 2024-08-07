<?php get_header(); ?>
<body class="vacancies-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="vacancies-main">
            <?php get_template_part('parts/_header'); ?>

            <?php if(get_field('active_1')): ?>
                <div class="vacancies-hero">
                    <div class="vacancies-hero-centered">
                        <div class="vacancies-hero-left">
                            <div class="vacancies-hero-title">
                                <p>MRIYDIY</p>
                                <?php $text = get_field('title_1'); if($text): ?>
                                    <span><?php echo $text; ?></span>
                                <?php endif; ?>
                            </div>
                            <?php $text = get_field('text_1'); if($text): ?>
                                <div class="vacancies-hero-description"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <?php $button = get_field('button_1'); if($button['active']): ?>
                                <div class="online-first-btn">
                                    <div class="online-first-btn-bg"></div>
                                    <span><?php echo $button['text']; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php $img = get_field('img_1'); if(is_array($img) && count($img)): ?>
                            <div class="vacancies-hero-right">
                                <div class="vacancies-hero-right-image">
                                    <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="" />
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_2')): ?>
                <div class="vacancies-second">
                    <div class="vacancies-second-content">
                        <?php $text = get_field('title_2'); if($text): ?>
                            <div class="vacancies-second-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $text = get_field('text_2'); if($text): ?>
                            <div class="vacancies-second-text"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $img = get_field('img_2'); if(is_array($img) && count($img)): ?>
                            <div class="vacancies-second-image">
                                <img loading="lazy" src="<?php echo $img['sizes']['480x0']; ?>" alt="" />
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_3')): ?>
                <div class="vacancies-offer">
                    <div class="vacancies-offer-centered">
                        <?php $text = get_field('title_3'); if($text): ?>
                            <div class="vacancies-offer-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <?php $list = get_field('list_3'); if(is_array($list) && count($list)): ?>
                            <div class="vacancies-offer-container">
                                <?php foreach ($list as $m => $block): ?>
                                    <div class="vacancies-offer-item">
                                        <?php if($block['icon']): ?>
                                            <div class="vacancies-offer-item-icon">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $block['icon']; ?>.svg" alt="">
                                            </div>
                                        <?php endif; ?>
                                        <div class="vacancies-offer-item-text"><?php echo $block['text']; ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php $text = get_field('video_4'); if($text): ?>
                    <div class="vacancies-youtube">
                        <div class="vacancies-youtube-centered">
                            <div class="vacancies-youtube-video"><?php echo str_ireplace(['iframe', 'width', 'height', '?feature=oembed'], ['iframe class="youtube-video-iframe"', 'data-width', 'data-height', '?feature=oembed&enablejsapi=1&version=3&playerapiid=ytplayer'], $text); ?></div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_5')): ?>
                <div class="vacancies-hire" id="vacancies-hire">
                    <div class="vacancies-hire-centered">
                        <?php $text = get_field('title_5'); if($text): ?>
                            <div class="vacancies-hire-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <div class="vacancies-hire-slider">
                            <div class="vacancies-hire-slider-item">
                                <div class="vacancies-hire-slider-item-name">Вчитель</div>
                                <div class="vacancies-hire-slider-item-address">Адреса школи</div>
                                <div class="vacancies-hire-slider-item-duti">обов’язки:</div>
                                <ul class="vacancies-hire-slider-item-list">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                </ul>
                                <div
                                        class="vacancies-hire-slider-item-btn js-modal-link"
                                        data-target="respondv-popup"
                                >
                                    відгукнутися
                                </div>
                            </div>
                            <div class="vacancies-hire-slider-item">
                                <div class="vacancies-hire-slider-item-name">Вчитель</div>
                                <div class="vacancies-hire-slider-item-address">Адреса школи</div>
                                <div class="vacancies-hire-slider-item-duti">обов’язки:</div>
                                <ul class="vacancies-hire-slider-item-list">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                </ul>
                                <div
                                        class="vacancies-hire-slider-item-btn js-modal-link"
                                        data-target="respondv-popup"
                                >
                                    відгукнутися
                                </div>
                            </div>
                            <div class="vacancies-hire-slider-item">
                                <div class="vacancies-hire-slider-item-name">Вчитель</div>
                                <div class="vacancies-hire-slider-item-address">Адреса школи</div>
                                <div class="vacancies-hire-slider-item-duti">обов’язки:</div>
                                <ul class="vacancies-hire-slider-item-list">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                </ul>
                                <div
                                        class="vacancies-hire-slider-item-btn js-modal-link"
                                        data-target="respondv-popup"
                                >
                                    відгукнутися
                                </div>
                            </div>
                        </div>
                        <div class="online-faq-more">
                            <div class="online-faq-more-bg"></div>
                            <div class="online-faq-more-btn">більше</div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_6')): ?>
                <div class="vacancies-send">
                    <div class="vacancies-send-centered">
                        <?php $text = get_field('title_6'); if($text): ?>
                            <div class="vacancies-send-title"><?php echo $text; ?></div>
                        <?php endif; ?>
                        <div class="vacancies-send-icon">
                            <img src="<?php echo \PS::$assets_url; ?>images/93.png" alt="" />
                        </div>
                        <form action="#" class="vacancies-send-form">
                            <div class="vacancies-send-input">
                                <input type="text" placeholder="email*" id="vacanciesEmail" />
                                <div class="error-text">*це поле є обов’язковим</div>
                            </div>
                            <label class="input-file">
                                <input type="file" name="file" />
                                <span>+ прикріпити резюме</span>
                            </label>
                            <button class="vacancies-send-submit-btn" type="submit">
                                надіслати
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_7')): ?>
                <div class="home-news-fluid">
                    <div class="home-news-centered">
                        <div class="home-news-top">
                            <?php $text = get_field('title_7'); if($text): ?>
                                <div class="home-news-top-title"><?php echo $text; ?></div>
                            <?php endif; ?>
                            <div class="home-news-top-links home-news-top-tabs">
                                <div class="home-news-top-links-item home-news-top-tabs-item" data-tab="news">Новини</div>
                                <div class="home-news-top-links-item home-news-top-tabs-item" data-tab="events">Події</div>
                                <div class="home-news-top-links-item home-news-top-tabs-item" data-tab="articles">Корисні статті</div>
                                <div class="home-news-top-links-item home-news-top-tabs-item active" data-tab="all">Усі матеріали</div>
                            </div>
                        </div>
                        <div class="home-news-container" data-content="news">
                            <div class="home-news-item">
                                <div class="home-news-item-images">
                                    <img src="/images/13.jpg" alt="img" />
                                    <div class="home-news-item-tag">новини</div>
                                </div>
                                <div class="home-news-item-heading">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="home-news-item-date">22/08/2022</div>
                            </div>
                            <div class="home-news-item">
                                <div class="home-news-item-images">
                                    <img src="/images/15.jpg" alt="img" />
                                    <div class="home-news-item-tag">новини</div>
                                </div>
                                <div class="home-news-item-heading">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum
                                    dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="home-news-item-date">22/08/2022</div>
                            </div>
                        </div>
                        <div class="home-news-container" data-content="events">
                            <div class="home-news-item">
                                <div class="home-news-item-images">
                                    <img src="/images/14.jpg" alt="img" />
                                    <div class="home-news-item-tag">події</div>
                                </div>
                                <div class="home-news-item-heading">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="home-news-item-date">22/08/2022</div>
                            </div>
                            <div class="home-news-item">
                                <div class="home-news-item-images">
                                    <img src="/images/15.jpg" alt="img" />
                                    <div class="home-news-item-tag">події</div>
                                </div>
                                <div class="home-news-item-heading">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="home-news-item-date">22/08/2022</div>
                            </div>
                        </div>
                        <div class="home-news-container" data-content="articles">
                            <div class="home-news-item">
                                <div class="home-news-item-images">
                                    <img src="/images/14.jpg" alt="img" />
                                    <div class="home-news-item-tag">корисні статті</div>
                                </div>
                                <div class="home-news-item-heading">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="home-news-item-date">22/08/2022</div>
                            </div>
                            <div class="home-news-item">
                                <div class="home-news-item-images">
                                    <img src="/images/13.jpg" alt="img" />
                                    <div class="home-news-item-tag">корисні статті</div>
                                </div>
                                <div class="home-news-item-heading">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="home-news-item-date">22/08/2022</div>
                            </div>
                            <div class="home-news-item">
                                <div class="home-news-item-images">
                                    <img src="/images/15.jpg" alt="img" />
                                    <div class="home-news-item-tag">корисні статті</div>
                                </div>
                                <div class="home-news-item-heading">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                                <div class="home-news-item-date">22/08/2022</div>
                            </div>
                        </div>

                        <div class="home-news-more">
                            <div class="home-news-more-bg"></div>
                            <div class="home-news-more-btn">Більше</div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('active_8')): ?>
                <?php get_template_part('parts/elements/social'); ?>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>

        <div class="modal modal--sm js-modal" data-modal="respondv-popup">
            <div class="modal__overlay js-close-modal"></div>
            <div class="respondv-container">
                <div class="respondv-close js-close-modal">
                    <img src="/images/icon105.svg" alt="i" />
                </div>
                <div class="respondv-container-inner">
                    <div class="respondv-left">
                        <div class="respondv-left-title">
                            Шукаємо педагога-вихователя раннього розвитку у садок повного дня
                            MRIYDIY.
                        </div>
                        <form action="#" class="home-respondv-form">
                            <div class="home-respondv-form-title">
                                Щоб відгукнутися на вакансію заповніть форму
                            </div>
                            <div class="home-respondv-input error">
                                <input type="text" placeholder="ВАше імʼя*" id="respondvName" />
                                <div class="input-error-text">*це поле є обов’язковим</div>
                            </div>
                            <div class="home-respondv-input">
                                <input
                                        type="text"
                                        placeholder="номер телефону*"
                                        id="respondvPhone"
                                />
                                <div class="input-error-text">*це поле є обов’язковим</div>
                            </div>
                            <div class="home-respondv-input error">
                                <input type="text" placeholder="email*" id="respondvEmail" />
                                <div class="input-error-text">*це поле є обов’язковим</div>
                            </div>
                            <label class="input-file respondv-input-file">
                                <input type="file" name="file" />
                                <span>+ прикріпити резюме</span>
                            </label>
                            <button class="home-respondv-button" type="submit">надіслати</button>
                        </form>
                    </div>
                    <div class="respondv-right">
                        <div class="respondv-right-mob-title">
                            Шукаємо педагога-вихователя раннього розвитку у садок повного дня
                            MRIYDIY.
                        </div>
                        <p>Шукаємо педагогів на 2 форми зайнятості:</p>
                        <ul>
                            <li>Педагог-вихователь на повний день;</li>
                            <li>Помічник вихователя на неповний день (з 15:00 до 19:00).</li>
                        </ul>
                        <h2>Обов’язки Педагога-вихователя:</h2>
                        <ul>
                            <li>проводити заняття для дітей дошкільного віку;</li>
                            <li>
                                постійне перебування з дітьми, активна участь у їхньому розвитку,
                                комунікація, заохочення;
                            </li>
                            <li>
                                організовувати дозвілля дітей (свята, майстер-класи та інші заходи);
                            </li>
                            <li>забезпечувати безпеку дітей;</li>
                            <li>спілкування з батьками.</li>
                        </ul>
                        <h2>Що для нас важливо:</h2>
                        <ul>
                            <li>активна позиція і проактивне відношення до своєї справи;</li>
                            <li>досвід роботи;</li>
                            <li>бажання і вміння працювати з дітьми;</li>
                            <li>
                                освіта соціального педагога, психолога, педагога початкової школи
                                або в сфері медицини;
                            </li>
                            <li>грамотна українська мова;</li>
                            <li>акуратність і відсутність шкідливих звичок.</li>
                        </ul>
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
        $(document).ready(function () {

        });
    </script>
    <?php /* END */ ?>

</body>
</html>