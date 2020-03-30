<?php
/**
 * wpbstarter Theme Customizer
 *
 * @package wpbstarter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

 /* =============
 Sanitization 
 ==============*/
 //checkbox sanitize
if ( ! function_exists( 'wpbstarter_checkbox_sanitization' ) ) {
    function wpbstarter_checkbox_sanitization( $checked ) {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
}
        //URL sanitize
        if ( ! function_exists( 'wpbstarter_url_sanitization' ) ) {
                function wpbstarter_url_sanitization( $input ) {
                    if ( strpos( $input, ',' ) !== false) {
                        $input = explode( ',', $input );
                    }
                    if ( is_array( $input ) ) {
                        foreach ($input as $key => $value) {
                            $input[$key] = esc_url_raw( $value );
                        }
                        $input = implode( ',', $input );
                    }
                    else {
                        $input = esc_url_raw( $input );
                    }
                    return $input;
                }
            }

//File sanitize
        if ( ! function_exists( 'wpbstarter_file_sanitization' ) ) {
            function wpbstarter_file_sanitization( $file, $setting ) {
              
                //allowed file types
                $mimes = array(
                    'jpg|jpeg|jpe' => 'image/jpeg',
                    'gif'          => 'image/gif',
                    'png'          => 'image/png',
                    'webp'          => 'image/webp'
                );
                  
                //check file type from file name
                $file_ext = wp_check_filetype( $file, $mimes );
                  
                //if file has a valid mime type return it, otherwise return default
                return ( $file_ext['ext'] ? $file : $setting->default );
            }
        }
/* END of Sanitizations */
  


function wpbstarter_customize_register( $wp_customize ) {


    /*=========================
    Theme Options here
    =========================*/
    // Creating Panel
    $wp_customize->add_panel(
        'wpbstarter_theme_options', 
        array (
            'title' => __('Theme Options', 'wpbstarter'),
            'priority' => 160,
        ));

    // Adding Section in panel
    $wp_customize->add_section(
        'menu_option',
        array(
            'title' => __( 'Navigation Menu Options', 'wpbstarter' ),
            //'description' => __( 'This is a section for the nav', 'wpbstarter' ),
            'panel' => 'wpbstarter_theme_options',
            'priority' => 30,
        )
    );
    // Nav alignment configure
    $wp_customize->add_setting( 
        'main_menu_setting', 
        array(
        'default'   => 'sina-menu-right',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'menu_alignment_setting', array(
        'label' => __( 'Menu Alignment', 'wpbstarter' ),
        'section'    => 'menu_option',
        'settings'   => 'main_menu_setting',
        'type'    => 'select',
        'choices' => array(
            'sina-menu-left' => __('Left', 'wpbstarter'),
            'sina-menu-center' => __('Center', 'wpbstarter'),
            'sina-menu-right' => __('Right', 'wpbstarter'),
        )
    ) ) );

    // Nav Fixed to Top Configure
    $wp_customize->add_setting( 
        'fixed_nav_setting', 
        array(
        'default'   => 'no',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'fixed_nav_setting', array(
        'label' => __( 'Enable Fixed Menu', 'wpbstarter' ),
        'section'    => 'menu_option',
        'settings'   => 'fixed_nav_setting',
        'type'    => 'select',
        'choices' => array(
            'yes' => __( 'Yes', 'wpbstarter' ),
            'no' => __( 'No', 'wpbstarter' ),
        )
    ) ) );

    // Right Search Configure
    $wp_customize->add_setting( 
        'right_search_setting', 
        array(
        'default'   => 'no',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'right_search_setting', array(
        'label' => __( 'Show Right Side Search Option', 'wpbstarter' ),
        'section'    => 'menu_option',
        'settings'   => 'right_search_setting',
        'type'    => 'select',
        'choices' => array(
            'yes' => __( 'Yes', 'wpbstarter' ),
            'no' => __( 'No', 'wpbstarter' ),
        )
    ) ) );

    // Right Menu Configure
    $wp_customize->add_setting( 
        'right_menu_setting', 
        array(
        'default'   => 'no',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'right_menu_setting', array(
        'label' => __( 'Show Right Side Menu', 'wpbstarter' ),
        'section'    => 'menu_option',
        'settings'   => 'right_menu_setting',
        'type'    => 'select',
        'choices' => array(
            'yes' => __( 'Yes', 'wpbstarter' ),
            'no' => __( 'No', 'wpbstarter' ),
        )
    ) ) );

    // Show Social Icons Configure
    $wp_customize->add_setting( 
        'social_icon_setting', 
        array(
        'default'   => 'no',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'social_icon_setting', array(
        'label' => __( 'Show Social Icons', 'wpbstarter' ),
        'section'    => 'menu_option',
        'settings'   => 'social_icon_setting',
        'type'    => 'select',
        'choices' => array(
            'yes' => __( 'Yes', 'wpbstarter' ),
            'no' => __( 'No', 'wpbstarter' ),
        )
    ) ) );

    // Social Icon repeater
    $wp_customize->add_setting( 'wpbstarter_customizer_repeater', array(
         'sanitize_callback' => 'customizer_repeater_sanitize',
         'default' => json_encode( array(
            /*Repeater's first item*/
            array("icon_value" => "fab fa-facebook-f" ,"link" => "https://facebook.com", "id" => "customizer_repeater_56d7ea7f40f56" ), 
            array("icon_value" => "fab fa-twitter" ,"link" => "https://twitter.com", "id" => "customizer_repeater_56d7ea7f40f57" ), 
            array("icon_value" => "fab fa-linkedin-in" ,"link" => "https://linkedin.com", "id" => "customizer_repeater_56d7ea7f40f58" ), 
            ) )
      ));
    $wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'wpbstarter_customizer_repeater', array(
    'label'   => esc_html__('Icons to Show','wpbstarter'),
    'section' => 'menu_option',
    'priority' => 160,
    'customizer_repeater_image_control' => false,
    'customizer_repeater_icon_control' => true,
    'customizer_repeater_title_control' => false,
    'customizer_repeater_subtitle_control' => false,
    'customizer_repeater_text_control' => false,
    'customizer_repeater_link_control' => true,
    'customizer_repeater_shortcode_control' => false,
    'customizer_repeater_repeater_control' => false
 ) ) );


    /*header background section*/
    $wp_customize->add_section(
        'title_bg_section',
        array(
            'title' => __( 'Page Title Customization', 'wpbstarter' ),
            'panel'  => 'wpbstarter_theme_options',
            'priority' => 30,
        )
    );

    // Show Secondary Page and Blog title
    $wp_customize->add_setting( 
        'show_spb_title', 
        array(
        'default'   => 'no',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ) );

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'show_spb_title', array(
        'label' => __( 'Show secondary Page and Blog title', 'wpbstarter' ),
        'section'    => 'title_bg_section',
        'settings'   => 'show_spb_title',
        'type'    => 'select',
        'choices' => array(
            'yes' => __( 'Yes', 'wpbstarter' ),
            'no' => __( 'No', 'wpbstarter' ),
        )
    ) ) );


    //color selection BLOG page
    $wp_customize->add_setting(
        'blog_title_bg_color',
        array(
            'default'     => '#333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            'blog_title_bg_color',
            array(
                'label'      => __( 'Blog page title background color', 'wpbstarter' ),
                'section'    => 'title_bg_section',
                'settings'   => 'blog_title_bg_color',
            ) )
    );


    //image selection BLOG page
        $wp_customize->add_setting( 
            'blog_title_bg_image', 
            array(
                'sanitize_callback' => 'wpbstarter_file_sanitization'
            )
        );
          
          
        $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 
                'blog_title_bg_image', 
                array(
                    'label'      => __( 'Blog page title background image', 'wpbstarter' ),
                    'section'    => 'title_bg_section'                   
                )
            ) 
        );  
    

    //color selection ARCHIVE/CATEGORY/TAG page
    $wp_customize->add_setting(
        'archive_title_bg_color',
        array(
            'default'     => '#333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            'archive_title_bg_color',
            array(
                'label'      => __( 'Archive page title background color', 'wpbstarter' ),
                'section'    => 'title_bg_section',
                'settings'   => 'archive_title_bg_color',
            ) )
    );


    //image selection ARCHIVE/CATEGORY/TAG page
        $wp_customize->add_setting( 
            'archive_title_bg_image', 
            array(
                'sanitize_callback' => 'wpbstarter_file_sanitization'
            )
        );
          
          
        $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 
                'archive_title_bg_image', 
                array(
                    'label'      => __( 'Archive page title background image', 'wpbstarter' ),
                    'section'    => 'title_bg_section'                   
                )
            ) 
        );  
    

    //color selection SEARCH page
    $wp_customize->add_setting(
        'search_title_bg_color',
        array(
            'default'     => '#333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            'search_title_bg_color',
            array(
                'label'      => __( 'Search page title background color', 'wpbstarter' ),
                'section'    => 'title_bg_section',
                'settings'   => 'search_title_bg_color',
            ) )
    );


    //image selection SEARCH page
        $wp_customize->add_setting( 
            'search_title_bg_image', 
            array(
                'sanitize_callback' => 'wpbstarter_file_sanitization'
            )
        );
          
          
        $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 
                'search_title_bg_image', 
                array(
                    'label'      => __( 'Search page title background image', 'wpbstarter' ),
                    'section'    => 'title_bg_section'                   
                )
            ) 
        );  
    

    //color selection 404 page
    $wp_customize->add_setting(
        'nfound_title_bg_color',
        array(
            'default'     => '#333',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
            'nfound_title_bg_color',
            array(
                'label'      => __( '404 page title background color', 'wpbstarter' ),
                'section'    => 'title_bg_section',
                'settings'   => 'nfound_title_bg_color',
            ) )
    );


    //image selection 404 page
        $wp_customize->add_setting( 
            'nfound_title_bg_image', 
            array(
                'sanitize_callback' => 'wpbstarter_file_sanitization'
            )
        );
          
          
        $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 
                'nfound_title_bg_image', 
                array(
                    'label'      => __( '404 page title background image', 'wpbstarter' ),
                    'section'    => 'title_bg_section'                   
                )
            ) 
        );  
    


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // Add control for logo uploader
    $wp_customize->add_setting( 'wpbstarter_logo', array(
        'sanitize_callback' => 'esc_url',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wpbstarter_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'wpbstarter' ),
        'section'  => 'title_tagline',
        'settings' => 'wpbstarter_logo',
    ) ) );

}
add_action( 'customize_register', 'wpbstarter_customize_register' );

//generate CSS
add_action( 'wp_head', 'wpbstarter_gen_customizer_css');
function wpbstarter_gen_customizer_css()
{
    ?>
    <style type="text/css">
        .blog-title { background-color: <?php echo get_theme_mod('blog_title_bg_color', '#333'); ?>; 
        <?php if(!empty(get_theme_mod('blog_title_bg_image'))) :  ?>
            background-image: url(
        <?php echo get_theme_mod('blog_title_bg_image'); ?>); <?php endif;  ?> }

        .archive-title { background-color: <?php echo get_theme_mod('archive_title_bg_color', '#333'); ?>; 
        <?php if(!empty(get_theme_mod('archive_title_bg_image'))) :  ?>
            background-image: url(
        <?php echo get_theme_mod('archive_title_bg_image'); ?>); <?php endif;  ?> }

        .search-title { background-color: <?php echo get_theme_mod('search_title_bg_color', '#333'); ?>; 
        <?php if(!empty(get_theme_mod('search_title_bg_image'))) : ?>
            background-image: url(
        <?php echo get_theme_mod('search_title_bg_image'); ?>); <?php endif;  ?> }

        .nfound-title { background-color: <?php echo get_theme_mod('nfound_title_bg_color', '#333'); ?>; 
        <?php if(!empty(get_theme_mod('nfound_title_bg_image'))) : ?>
            background-image: url(
        <?php echo get_theme_mod('nfound_title_bg_image'); ?>); <?php endif;  ?> }
    </style>
    <?php
}



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wpbstarter_customize_preview_js() {
    wp_enqueue_script( 'wpbstarter_customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wpbstarter_customize_preview_js' );
