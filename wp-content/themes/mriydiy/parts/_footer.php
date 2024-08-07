<?php if (!defined('ABSPATH')){exit;} ?>

<footer class="footer">
    <div class="footer-top-fluid">
        <div class="footer-top-centered">
            <div class="footer-left">
                <div class="footer-logo">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/logo.svg" alt="">
                </div>
            </div>

            <?php $footer_menu = get_field('footer_menu', \PS::$option_page); if(is_array($footer_menu) && count($footer_menu)): ?>
                <div class="footer-right">
                    <?php foreach ($footer_menu as $n => $li): ?>
                        <div class="footer-right-column<?php echo $n + 1; ?>">
                            <?php if($n === 0): ?>
                                <?php foreach ($li['submenu'] as $sub_li): ?>
                                    <a href="<?php echo $sub_li['link']; ?>" class="footer-right-column1-item">
                                        <span><?php echo __($sub_li['text']); ?></span>
                                        <p>MRIYDIY</p>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php if($li['title']): ?>
                                    <div class="footer-right-column-heading"><?php echo __($li['title']); ?></div>
                                <?php endif; ?>
                                <?php foreach ($li['submenu'] as $sub_li): ?>
                                    <?php if($sub_li['link'][0] === '+' || $sub_li['link'][0] === '0'): ?>
                                        <a href="tel:<?php echo str_ireplace(' ', '', $sub_li['link']); ?>" class="footer-right-column-item binct-phone-number-1"><?php echo __($sub_li['text']); ?></a>
                                    <?php elseif(strripos($sub_li['link'], '@') !== false): ?>
                                        <a href="mailto:<?php echo $sub_li['link']; ?>" class="footer-right-column-item"><?php echo __($sub_li['text']); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo $sub_li['link']; ?>" class="footer-right-column-item"><?php echo __($sub_li['text']); ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if($n === 1): ?>
                                <div class="footer-right-banks">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/banks.png" alt="">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer-down-fluid">
        <div class="footer-down-centered">
            <div class="footer-down-left">
                <span>© <?php echo date('Y'); ?></span>
                <?php $footer_text = get_field('footer_text', \PS::$option_page); if($footer_text): ?>
                    <p><?php echo __($footer_text); ?></p>
                <?php endif; ?>
            </div>
            <div class="footer-down-right">
                <?php
                $footer_policy_text = get_field('footer_policy_text', \PS::$option_page);
                $footer_policy_file = get_field('footer_policy_file', \PS::$option_page);
                if($footer_policy_text && $footer_policy_file): ?>
                    <a href="<?php echo $footer_policy_file; ?>" class="footer-down-right-item" target="_blank"><?php echo __($footer_policy_text); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>