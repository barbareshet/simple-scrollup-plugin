<?php
if (!defined('ABSPATH')){
	exit;
}


function ssp_content(){
    global $ssp_options;
    $scroll_up_icon = $ssp_options['arrow'] ? $ssp_options['arrow'] : 'angle-up';
    $enable = $ssp_options['enable'];
    $color = $ssp_options['ssp_main_color'];
    $bg_color = $ssp_options['ssp_bg_color'];
    if ( $enable ) {
        ob_start(); ?>
        <a href="#top" class="ssp-scrollup" role="button" title="<?php _e('Back to top', 'barbareshet_ssp'); ?>"
           aria-label="<?php _e('Back to top', 'barbareshet_ssp'); ?>" style="display: block;">
            <i class="fas fa-<?php echo $scroll_up_icon; ?>" aria-hidden="true" style="background-color: <?php echo $bg_color;?>; border-color: <?php echo $color;?>; color: <?php echo $color;?>;"></i>
            <span class="sr-only"><?php _e('Back to top', 'barbareshet_ssp'); ?></span>
        </a>
        <?php
        echo ob_get_clean();
    }
}



add_action('wp_footer', 'ssp_content');