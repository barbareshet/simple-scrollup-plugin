<?php
if (!defined('ABSPATH')){
	exit;
}

if ( !class_exists('SSP_Settings')){

    class SSP_Settings{


        private static $instance = null;

        public $ssp_options;

        public static function get_instance(){

            if( null == self::$instance ){
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function __construct(){
            if ( is_admin() ){
                add_action('admin_menu', array( &$this, 'ssp_options_menu_link'));
            }
        }

        function ssp_options_menu_link(){
            add_options_page(
                    'Simple Scroll-Up',
                    'Simple Scroll-Up',
                    'manage_options',
                    'ssp-options',
                    array( $this, 'ssp_options_content')
            );
        }

        //Create Options page content
        function ssp_options_content(){
            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( _e( 'You do not have sufficient permissions to access this page.' ) );
            }
// init global variable for options
            global $ssp_options;
            $arrow_prefix = 'fas fa';
            $arrows = array(
                $arrow_prefix.'-angle-double-up',
                $arrow_prefix.'-angle-up',
                $arrow_prefix.'-arrow-alt-circle-up',
                $arrow_prefix.'-arrow-alt-circle-up',
                $arrow_prefix.'-arrow-circle-up',
                $arrow_prefix.'-arrow-up',
                $arrow_prefix.'-caret-square-up',
                $arrow_prefix.'-caret-square-up',
                $arrow_prefix.'-caret-up',
                $arrow_prefix.'-chevron-circle-up',
                $arrow_prefix.'-chevron-up',
                $arrow_prefix.'-hand-point-up',
                $arrow_prefix.'-hand-point-up',
                $arrow_prefix.'-level-up-alt',
                $arrow_prefix.'-long-arrow-alt-up',
                $arrow_prefix.'-sort-up',

            );
            ob_start();?>

            <div class="wrap">
                <h2><?php _e('Simple Scroll-Up', SSP_TEXTDOMAIN) ;?></h2>
                <p>
                    <?php _e('Settings For the Simple Scroll-Up', SSP_TEXTDOMAIN) ;?>
                </p>
                <form action="options.php" method="post">

                    <?php settings_fields('ssp_settings_group') ;?>
                    <table class="form-table">
                        <tbody>
                        <tr>
                            <th scope="row">
                                <label for="ssp_settings[enable]">
                                    <?php _e('Enable Simple Scroll-Up', SSP_TEXTDOMAIN) ;?>
                                </label>
                            </th>
                            <td>
                                <input type="checkbox" name="ssp_settings[enable]" value="1" <?php checked( '1', $ssp_options[ 'enable']) ;?> id="ssp_settings[enable]">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="ssp_settings[arrow]">
                                    <?php _e('Select Arrow Up Icon', SSP_TEXTDOMAIN) ;?>
                                </label>
                            </th>
                            <td>
                                <ul class="fa-icons-list">
                                    <?php foreach ( $arrows as $arrow ){
                                        $checked = ( $ssp_options['arrow'] == $arrow ) ? ' checked="checked" ' : '';
                                        ?>
                                        <li>
                                            <span class="fa-wrap">
                                                <input type="radio" <?php echo $checked;?> value="<?php echo $arrow;?>" name="ssp_settings[arrow]"/>
                                                <i class="<?php echo $arrow;?>"></i>&nbsp;<?php echo $arrow;?>
                                            </span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="ssp_settings[ssp_main_color]">
                                    <?php _e('Set Icon Main Color', SSP_TEXTDOMAIN);?>
                                </label>
                            </th>
                            <td>
                                <input type="text" name="ssp_settings[ssp_main_color]" value="<?php echo $ssp_options['ssp_main_color'] ;?>" id="ssp_settings[ssp_main_color]" class="ssp-color-picker"/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="ssp_settings[ssp_bg_color]">
                                    <?php _e('Set Background Color', SSP_TEXTDOMAIN);?>
                                </label>
                            </th>
                            <td>
                                <input type="text" name="ssp_settings[ssp_bg_color]" value="<?php echo $ssp_options['ssp_bg_color'] ;?>" id="ssp_settings[ssp_bg_color]" class="ssp-color-picker"/>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                    <p class="submit">
                        <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', SSP_TEXTDOMAIN) ;?>">
                    </p>
                </form>
            </div>

            <?php

            echo ob_get_clean();


        }
    }
    SSP_Settings::get_instance();
}

