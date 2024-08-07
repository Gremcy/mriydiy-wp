<?php if (!defined('ABSPATH')){exit;} ?>

<?php
$type = 'other';
if(isset($args['type'])){
    $type = $args['type'];
}
if(get_the_ID() === \PS::$preschool_page){
    $type = 'preschool';
}elseif(get_the_ID() === \PS::$familyspace_page){
    $type = 'familyspace';
}
?>

<form class="home-request-form parsley-form">
    <input name="action" value="add_new_enter" type="hidden">
    <input name="page" value="<?php echo get_the_title(); ?>" type="hidden">
    <input name="url" value="<?php echo get_the_permalink(); ?>" type="hidden">
    <input name="post_id" value="" type="hidden">
    <input name="type" value="<?php echo $type; ?>" type="hidden">

    <div class="home-request-input">
        <input name="name" type="text" placeholder="<?php _e( 'Ваше імʼя', \PS::$theme_name ); ?> *" class="gtm-name parsley-check" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="home-request-input">
        <input name="phone" type="tel" placeholder="<?php _e( 'Телефон', \PS::$theme_name ); ?> *" class="gtm-phone phone_mask parsley-check" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="home-request-input">
        <input name="email" type="text" placeholder="<?php _e( 'E-mail', \PS::$theme_name ); ?> *" class="gtm-email parsley-check" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="home-request-input">
        <input name="age" type="text" placeholder="<?php _e( 'Скільки років вашій дитині?', \PS::$theme_name ); ?>" autocomplete="off">
    </div>
    <?php if(isset($args['select']) && count($args['select']['options'])): ?>
        <div class="externat-form-select">
            <select name="<?php echo $args['select']['name']; ?>" class="select-css">
                <option value=""><?php echo $args['select']['default']; ?></option>
                <?php foreach ($args['select']['options'] as $post_id => $option): ?>
                    <option value="<?php echo $option; ?>"<?php if(isset($args['type']) && in_array($args['type'], ['camp', 'club'])): ?> data-post_id="<?php echo $post_id; ?>"<?php endif; ?>><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?>
    <?php if(isset($args['type']) && in_array($args['type'], ['school', 'kindergarten'])): ?>
        <?php $cities = get_terms(['taxonomy' => 'city']); if(is_array($cities) && count($cities)): ?>
            <div class="externat-form-select">
                <select name="city" class="gtm-city select-css parsley-check" data-parsley-required="true">
                    <option value=""><?php _e( 'Оберіть місто', \PS::$theme_name ); ?> *</option>
                    <?php foreach ($cities as $city): ?>
                        <option value="<?php echo $city->name; ?>"><?php echo $city->name; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="home-request-input">
        <input name="fax_number" type="text" placeholder="Номер факсу *" class="parsley-check form-input">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="home-request-input">
        <input name="phone_second" type="text" placeholder="Додатковий телефон *" class="parsley-check form-input">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>

    <button class="home-request-button" type="submit" data-wait="<?php _e( 'Зачекайте', \PS::$theme_name ); ?>.." data-default="<?php _e( 'Надіслати', \PS::$theme_name ); ?>"><?php _e( 'Надіслати', \PS::$theme_name ); ?></button>
</form>