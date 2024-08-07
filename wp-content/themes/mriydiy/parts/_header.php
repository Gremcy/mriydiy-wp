<?php if (!defined('ABSPATH')){exit;} ?>

<header class="header-fluid">
    <div class="header-top">
        <div class="header-top-centered">
            <?php $phone = get_field('phone', \PS::$contacts_page); if(is_array($phone) && count($phone)): ?>
                <div class="header-top-phone">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon110.svg" alt="" />
                    <a href="tel:<?php echo $phone[0]['phone']; ?>"><?php echo $phone[0]['phone']; ?></a>
                </div>
            <?php endif; ?>

            <?php $languages = \PS\Functions\Plugins\Qtranslate::get_languages(); if(is_array($languages) && count($languages) > 1): ?>
                <div class="header-lang">
                    <?php foreach ($languages as $m => $language): ?>
                        <?php if($m > 0): ?><div class="header-lang-separator"></div><?php endif; ?>
                        <a href="<?php echo $language['url']; ?>" class="header-lang-item<?php if($language['active']): ?> active<?php endif; ?>"><?php echo $language['name']; ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="header-bottom">
        <div class="header-centered">
            <a href="<?php echo get_the_permalink(\PS::$front_page); ?>" class="header-logo">
                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/logo.svg" alt="">
            </a>

            <?php $header_menu = get_field('header_menu', \PS::$option_page); if(is_array($header_menu) && count($header_menu)): ?>
                <div class="header-menu">
                    <?php foreach ($header_menu as $li): ?>
                        <?php if($li['submenu_active']): ?>
                            <div class="header-menu-item has-drop">
                                <span><?php echo __($li['text']); ?></span>
                                <svg width="14" height="5" viewBox="0 0 14 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 0.5L7 4.5L13 0.5" stroke="#232323" stroke-linecap="round" stroke-linejoin="round" /></svg>
                                <?php if(is_array($li['submenu']) && count($li['submenu'])): ?>
                                    <div class="header-dropdown-menu">
                                        <?php foreach ($li['submenu'] as $sub_li): ?>
                                            <a href="<?php echo $sub_li['link']; ?>" class="header-dropdown-menu-item"><?php echo __($sub_li['text']); ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <a href="<?php echo $li['link']; ?>" class="header-menu-item">
                                <span><?php echo __($li['text']); ?></span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="header-right">
                <?php /*$header_button = get_field('header_button', \PS::$option_page); if($header_button['active']): ?>
                    <div class="header-enroll-btn js-modal-link" data-target="entry-popup">
                        <div class="header-enroll-btn-bg"></div>
                        <span><?php echo __($header_button['text']); ?></span>
                    </div>
                <?php endif;*/ ?>

                <div class="header-right-tablet">
                    <?php if(is_array($phone) && count($phone)): ?>
                        <div class="header-top-phone">
                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon110.svg" alt="" />
                            <a href="tel:<?php echo $phone[0]['phone']; ?>"><?php echo $phone[0]['phone']; ?></a>
                        </div>
                    <?php endif; ?>

                    <?php if(is_array($languages) && count($languages) > 1): ?>
                        <div class="header-lang">
                            <?php foreach ($languages as $m => $language): ?>
                                <?php if($m > 0): ?><div class="header-lang-separator"></div><?php endif; ?>
                                <a href="<?php echo $language['url']; ?>" class="header-lang-item<?php if($language['active']): ?> active<?php endif; ?>"><?php echo $language['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="header-burger">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/burger.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</header>

<?php if(!is_front_page()): ?>
    <div class="breadcrumbs-fluid">
        <div class="breadcrumbs-centered">
            <a href="<?php echo get_the_permalink(\PS::$front_page); ?>" class="breadcrumbs-item active"><?php _e( 'Головна', \PS::$theme_name ); ?></a>
            <?php if(is_singular(['camps'])): ?>
                <div class="breadcrumbs-separator">
                    <img src="<?php echo \PS::$assets_url; ?>images/icon107.svg" alt="" />
                </div>
                <a href="<?php echo get_the_permalink(\PS::$camps_page); ?>" class="breadcrumbs-item active"><?php echo get_the_title(\PS::$camps_page); ?></a>
            <?php elseif(is_singular(['news'])): ?>
                <div class="breadcrumbs-separator">
                    <img src="<?php echo \PS::$assets_url; ?>images/icon107.svg" alt="" />
                </div>
                <a href="<?php echo get_the_permalink(\PS::$news_page); ?>" class="breadcrumbs-item active"><?php echo get_the_title(\PS::$news_page); ?></a>
            <?php endif; ?>
            <div class="breadcrumbs-separator">
                <img src="<?php echo \PS::$assets_url; ?>images/icon107.svg" alt="" />
            </div>
            <div class="breadcrumbs-item"><?php echo get_the_title(); ?></div>
        </div>
    </div>
<?php endif; ?>