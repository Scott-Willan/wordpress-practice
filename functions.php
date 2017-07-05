<?php

function NZRise_resources()
{

    wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'NZRise_resources');


//Get pages top ancestor
function get_top_ancestor_id()
{

    global $post;

    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;

}

//Boolean for pages children
function has_children()
{
    global $post;

    $pages = get_pages('child_of' . $post->ID);

    return count($pages); //0 evaluates to false
}


//Customize excerpt word length
function custom_excerpt_length()
{
    return 30;
}

add_filter('excerpt_length', 'custom_excerpt_length');


//Adding support to themes
function adding_function_modules()
{

    //Navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu')
    ));

    //Add Feature Image Support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180 /* wide */, 120 /* tall */, true /* hard cropping? */);
    add_image_size('banner', 920 /* wide */, 210 /* tall */, true /* hard cropping? */);

    //Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));

//    //Enable Widgets
//    register_sidebar(array(
//        'name' => 'Home right sidebar',
//        'id' => 'home_right_1',
//        'before_widget' => '<div>',
//        'after_widget' => '</div>',
//        'before_title' => '<h2 class="rounded">',
//        'after_title' => '</h2>',
//    ));

}

add_action('after_setup_theme', 'adding_function_modules');

//Add Widget Locations
function WidgetInit()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-header">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 1',
        'id' => 'footer1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-header">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 2',
        'id' => 'footer2',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-header">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 3',
        'id' => 'footer3',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-header">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Footer Area 4',
        'id' => 'footer4',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-header">',
        'after_title' => '</h4>'
    ));
}

add_action('widgets_init', 'WidgetInit');

//Customiize appearance options
function NZRise_customize_register_standard_colors($wp_customize)
{

    //Section
    $wp_customize->add_section('NZR_standard_colors', array(
        'title' => __('Standard Colors', 'NZRise_Custom'),
        'priority' => 30,
    ));

    //Link Color
    $wp_customize->add_setting('NZR_link_color', array(
        'default' => '#faa61a',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'NZR_link_color_control', array(
        'label' => __('Link Colour', 'NZRise_Custom'),
        'section' => 'NZR_standard_colors',
        'settings' => 'NZR_link_color',
    )));


    //Button Color
    $wp_customize->add_setting('NZR_button_color', array(
        'default' => '#faa61a',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'NZR_button_color_control', array(
        'label' => __('Button Colour', 'NZRise_Custom'),
        'section' => 'NZR_standard_colors',
        'settings' => 'NZR_button_color',
    )));


    //Background Color
    $wp_customize->add_setting('NZR_background_color', array(
        'default' => '#fff',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'NZR_background_color_control', array(
        'label' => __('Background Colour', 'NZRise_Custom'),
        'section' => 'NZR_standard_colors',
        'settings' => 'NZR_background_color',
    )));

    //Paragraph Font Color
    $wp_customize->add_setting('NZR_paragraph_font_color', array(
        'default' => '#888888',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'NZR_paragraph_font_color_control', array(
        'label' => __('Paragraph Font Colour', 'NZRise_Custom'),
        'section' => 'NZR_standard_colors',
        'settings' => 'NZR_paragraph_font_color',
    )));

    //Paragraph Font Color
    $wp_customize->add_setting('NZR_paragraph_font_color', array(
        'default' => '#888888',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'NZR_paragraph_font_color_control', array(
        'label' => __('Paragraph Font Colour', 'NZRise_Custom'),
        'section' => 'NZR_standard_colors',
        'settings' => 'NZR_paragraph_font_color',
    )));

    //Heading Font Color
    $wp_customize->add_setting('NZR_heading_font_color', array(
        'default' => '#555555',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'NZR_heading_font_color_control', array(
        'label' => __('Heading Font Colour', 'NZRise_Custom'),
        'section' => 'NZR_standard_colors',
        'settings' => 'NZR_heading_font_color',
    )));


}

add_action('customize_register', 'NZRise_customize_register_standard_colors');

function NZRise_customize_register_standard_dimensions($wp_customize)
{
    //Section
    $wp_customize->add_section('NZR_standard_dimensions', array(
        'title' => __('Standard Dimensions', 'NZRise_Custom'),
        'priority' => 30,
    ));

    //Heading Font Color
    $wp_customize->add_setting('NZR_heading_font_size', array(
        'default' => '1.5',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'NZR_heading_font_size_control', array(
        'label' => 'Heading Font Size (rem)',
        'section' => 'NZR_standard_dimensions',
        'settings' => 'NZR_heading_font_size',
    )));
}

add_action('customize_register', 'NZRise_customize_register_standard_dimensions');

//Output Custom CSS
function NZRise_custom_css()
{
    ?>
    <style type="text/css">
        a:link,
        a:visited {
            color: <?php echo get_theme_mod('NZR_link_color'); ?>;
        }

        .btn {
            color: <?php echo get_theme_mod('NZR_button_color'); ?>;
        }

        p{
            color: <?php echo get_theme_mod('NZR_paragraph_font_color'); ?>;
        }

        h2{
            color: <?php echo get_theme_mod('NZR_heading_font_color' ); ?>;
        }

        p{
            font-size: <?php echo get_theme_mod('NZR_heading_font_size'); ?> px;
        }
    </style>

    <?php

}

add_action('wp_head', 'NZRise_custom_css');


//Footer Callout
function NZRise_customize_register_footer_callout($wp_customize)
{
    //Section
    $wp_customize->add_section('NZR-footer-callout-section', array(
        'title' => 'Footer Callout'
    ));


    //Headline
    $wp_customize->add_setting('NZR-footer-callout-headline', array(
        'default' => 'Example Headline Text',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'NZR-footer-callout-headline-control', array(
        'label' => 'HeadLine',
        'section' => 'NZR-footer-callout-section',
        'settings' => 'NZR-footer-callout-headline',
    )));

    //Body Text
    $wp_customize->add_setting('NZR-footer-callout-text', array(
        'default' => 'Example Paragraph Text',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'NZR-footer-callout-paragraph-control', array(
        'label' => 'Body Text',
        'section' => 'NZR-footer-callout-section',
        'settings' => 'NZR-footer-callout-text',
        'type' => 'textarea',
    )));


    //Link
    $wp_customize->add_setting('NZR-footer-callout-link');

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'NZR-footer-callout-link-control', array(
        'label' => 'Link',
        'section' => 'NZR-footer-callout-section',
        'settings' => 'NZR-footer-callout-link',
        'type' => 'dropdown-pages',
    )));


    //Image
    $wp_customize->add_setting('NZR-footer-callout-image');

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'NZR-footer-callout-image-control', array(
        'label' => 'Link',
        'section' => 'NZR-footer-callout-section',
        'settings' => 'NZR-footer-callout-image',
        'width' => 750,
        'height' => 500,
    )));


    //Display Boolean
    $wp_customize->add_setting('NZR-footer-callout-display', array(
        'default' => 'No',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'NZR-footer-callout-display-control', array(
        'label' => 'Display This Section?',
        'section' => 'NZR-footer-callout-section',
        'settings' => 'NZR-footer-callout-display',
        'type' => 'select',
        'choices' => array('No' => 'No', 'Yes' => 'Yes'),
    )));
}

add_action('customize_register', 'NZRise_customize_register_footer_callout');