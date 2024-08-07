<?php if (!defined('ABSPATH')){exit;} ?>

<div class="home-social-fluid" id="social">
    <div class="home-social-centered">
        <div class="home-social-container">
            <?php $fb = get_field('fb') ?: get_field('fb', \PS::$contacts_page); if($fb): ?>
                <div data-link="<?php echo $fb; ?>"  class="home-social-item target-link">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/fb.svg" alt="">
                </div>
            <?php endif; ?>
            <?php $yt = get_field('yt') ?: get_field('yt', \PS::$contacts_page); if($yt): ?>
                <div data-link="<?php echo $yt; ?>"  class="home-social-item target-link">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/yt.svg" alt="">
                </div>
            <?php endif; ?>
            <?php $in = get_field('in') ?: get_field('in', \PS::$contacts_page); if($in): ?>
                <div data-link="<?php echo $in; ?>"  class="home-social-item target-link">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/insta.svg" alt="">
                </div>
            <?php endif; ?>
            <?php $li = get_field('li') ?: get_field('li', \PS::$contacts_page); if($li): ?>
                <div data-link="<?php echo $li; ?>"  class="home-social-item target-link">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/in.svg" alt="">
                </div>
            <?php endif; ?>
            <?php $tik = get_field('tik') ?: get_field('tik', \PS::$contacts_page); if($tik): ?>
                <div data-link="<?php echo $tik; ?>"  class="home-social-item target-link">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/tik.svg" alt="">
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>