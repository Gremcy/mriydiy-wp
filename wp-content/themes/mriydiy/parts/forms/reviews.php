<?php if (!defined('ABSPATH')){exit;} ?>

<form class="send-review-popup-inner parsley-form">
    <input name="action" value="add_new_reviews" type="hidden">
    <input name="page" value="<?php echo get_the_title(); ?>" type="hidden">
    <input name="url" value="<?php echo get_the_permalink(); ?>" type="hidden">

    <div class="send-review-popup-bg">
        <img src="<?php echo \PS::$assets_url; ?>images/icon108.svg" alt="" />
    </div>
    <div class="send-review-popup-title"><?php _e(get_field('form_reviews_title', \PS::$option_page)); ?></div>
    <div class="send-review-popup-input">
        <input name="name" type="text" placeholder="<?php _e( 'Ваше імʼя', \PS::$theme_name ); ?> *" class="gtm-name parsley-check" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="send-review-popup-input half">
        <input name="phone" type="tel" placeholder="<?php _e( 'Телефон', \PS::$theme_name ); ?> *" class="gtm-phone phone_mask parsley-check" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="send-review-popup-input half">
        <input name="email" type="text" placeholder="<?php _e( 'E-mail', \PS::$theme_name ); ?> *" class="gtm-email parsley-check" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="send-review-popup-input">
        <input name="child_name" type="text" placeholder="<?php _e( 'Імʼя вашої дитини', \PS::$theme_name ); ?>" autocomplete="off">
    </div>
    <div class="send-review-popup-input">
        <input name="child_age" type="text" placeholder="<?php _e( 'Скільки років вашій дитині?', \PS::$theme_name ); ?>" autocomplete="off">
    </div>
    <div class="send-review-popup-textarea">
        <textarea name="text" placeholder="<?php _e( 'Напишіть відгук', \PS::$theme_name ); ?>"></textarea>
    </div>
    <button class="send-review-popup-submit" type="submit" data-wait="<?php _e( 'Зачекайте', \PS::$theme_name ); ?>.." data-default="<?php _e( 'Надіслати', \PS::$theme_name ); ?>"><?php _e( 'Надіслати', \PS::$theme_name ); ?></button>
</form>