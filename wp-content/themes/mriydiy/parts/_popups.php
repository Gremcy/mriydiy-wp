<?php if (!defined('ABSPATH')){exit;} ?>

<div class="menu-wrapper">
    <div class="menu-close js-hide-cursor">
        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close4.svg" alt="">
    </div>

    <div class="menu-content">
        <div class="menu-content-up">
            <div class="menu-header">
                <div class="menu-header-logo">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/logo.svg" alt="">
                </div>
            </div>
            <?php $header_menu = get_field('header_menu', \PS::$option_page); if(is_array($header_menu) && count($header_menu)): ?>
                <?php foreach ($header_menu as $li): ?>
                    <?php if($li['submenu_active']): ?>
                        <div class="menu-opened">
                            <div class="menu-opened-heading">
                                <span><?php echo __($li['text']); ?></span>
                                <svg width="14" height="6" viewBox="0 0 14 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 5L7 1L1 5" stroke="#232323" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            </div>
                            <?php if(is_array($li['submenu']) && count($li['submenu'])): ?>
                                <div class="menu-dropdown">
                                    <?php foreach ($li['submenu'] as $sub_li): ?>
                                        <a href="<?php echo $sub_li['link']; ?>" class="menu-dropdown-link"><?php echo __($sub_li['text']); ?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo $li['link']; ?>" class="menu-simple-link"><?php echo __($li['text']); ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php $phone = get_field('phone', \PS::$contacts_page); if(is_array($phone) && count($phone)): ?>
            <div class="menu-phone">
                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon110.svg" alt="" />
                <a href="tel:<?php echo $phone[0]['phone']; ?>"><?php echo $phone[0]['phone']; ?></a>
            </div>
        <?php endif; ?>

        <?php /*$header_button = get_field('header_button', \PS::$option_page); if($header_button['active']): ?>
            <div class="menu-content-down">
                <div class="menu-content-down-btn js-modal-link" data-target="entry-popup">
                    <span><?php echo __($header_button['text']); ?></span>
                    <div class="menu-content-down-btn-bg"></div>
                </div>
            </div>
        <?php endif;*/ ?>
    </div>
</div>

<div class="modal modal--sm js-modal" data-modal="entry-popup">
    <div class="modal__overlay js-close-modal"></div>
    <div class="entry-popup-content">
        <div class="entry-popup-close js-close-modal">
            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close1.svg" alt="">
        </div>
        <div class="entry-popup-inner">
            <div class="entry-popup-title"><?php _e(get_field('form_entry_title', \PS::$option_page)); ?></div>
            <div class="entry-popup-form">
                <?php get_template_part('parts/forms/enter', null, ['type' => 'school']); ?>
            </div>
        </div>
    </div>
</div>

<div class="modal modal--sm js-modal" data-modal="write-us-popup">
    <div class="modal__overlay js-close-modal"></div>
    <div class="write-us-popup-content">
        <div class="write-us-popup-close js-close-modal">
            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close8.svg" alt="">
        </div>
        <div class="write-us-popup-inner">
            <div class="write-us-popup-left">
                <div class="write-us-popup-title"><?php _e(get_field('form_ask_title', \PS::$option_page)); ?></div>
            </div>
            <div class="write-us-popup-rigth">
                <?php get_template_part('parts/forms/ask', null, ['class' => 'home-request-form']); ?>
            </div>
        </div>

    </div>
</div>

<div class="modal modal--sm js-modal" data-modal="call-me-popup">
    <div class="modal__overlay js-close-modal"></div>
    <div class="write-us-popup-content">
        <div class="write-us-popup-close js-close-modal">
            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/close8.svg" alt="">
        </div>
        <div class="write-us-popup-inner">
            <div class="write-us-popup-left">
                <div class="write-us-popup-title"><?php _e(get_field('form_call_title', \PS::$option_page)); ?></div>
            </div>
            <div class="write-us-popup-rigth">
                <?php get_template_part('parts/forms/call', null, ['class' => 'home-request-form']); ?>
            </div>
        </div>

    </div>
</div>

<?php /*
<div class="modal modal--sm js-modal" data-modal="escort-popup">
    <div class="modal__overlay js-close-modal"></div>

    <div class="escort-popup-content">
        <div class="escort-popup-close js-close-modal">
            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon45.svg" alt="">
        </div>

        <div class="escort-popup-inner">
            <div class="escort-popup-point">Пакет №1</div>
            <div class="escort-popup-title">Організаційний супровід</div>
            <div class="escort-popup-container">
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        ІНДИВІДУАЛЬНиЙ ПЛАН
                    </div>
                    <div class="escort-popup-item-description">
                        Розробляємо та надсилаємо індивідуальний план навчання
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        МАТЕРІАЛИ
                    </div>
                    <div class="escort-popup-item-description">
                        Доступ до навчальних матеріалів
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        КОНСУЛЬТАЦІЇ
                    </div>
                    <div class="escort-popup-item-description">
                        Групові та індивідуальні консультації
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        СЕМЕСТР
                    </div>
                    <div class="escort-popup-item-description">
                        Діагностичні роботи
                        впродовж семестру
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        ЗВОРОТНІЙ ЗВЯЗОК
                    </div>
                    <div class="escort-popup-item-description">
                        Перевірка робіт та надання зворотного зв’язку
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        ОЦІНЮВАННЯ
                    </div>
                    <div class="escort-popup-item-description">
                        Оцінювання результатів наприкінці семестру
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal modal--sm js-modal" data-modal="independent-popup">
    <div class="modal__overlay js-close-modal"></div>

    <div class="escort-popup-content independent">
        <div class="escort-popup-close js-close-modal">
            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon47.svg" alt="">
        </div>

        <div class="escort-popup-inner">
            <div class="escort-popup-point">Пакет №2</div>
            <div class="escort-popup-title">самостійне навчання</div>
            <div class="escort-popup-container">
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        ІНДИВІДУАЛЬНиЙ ПЛАН
                    </div>
                    <div class="escort-popup-item-description">
                        Розробляємо та надсилаємо індивідуальний план навчання
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        МАТЕРІАЛИ
                    </div>
                    <div class="escort-popup-item-description">
                        Доступ до навчальних матеріалів
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        СЕМЕСТР
                    </div>
                    <div class="escort-popup-item-description">
                        Оцінювання результатів наприкінці семестру
                    </div>
                </div>
                <div class="escort-popup-item">
                    <div class="escort-popup-item-name">
                        документи
                    </div>
                    <div class="escort-popup-item-description">
                        Наявність офіційного документа про освіту
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
 */ ?>

<?php if(!isset($_COOKIE['hide-cookies-banner'])): ?>
    <div class="cookie-consent-banner" style="display: flex">
        <div class="cookie-consent-banner-left">
            <p><?php _e(get_field('cookies_text', \PS::$option_page)); ?></p>
            <a href="<?php echo get_the_permalink(5556); ?>"><?php _e( 'Політика конфіденційності', \PS::$theme_name ); ?></a>
        </div>
        <button class="cookie-consent-banner-button cookies-accept-button"><?php _e( 'Прийняти', \PS::$theme_name ); ?></button>
        <div class="cookie-consent-banner-close-btn">
            <img src="<?php echo \PS::$assets_url; ?>images/icon109.svg" alt="" />
        </div>
    </div>
<?php endif; ?>

<div class="menu-overlay"></div>