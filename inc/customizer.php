<?php 

function custom_customize_register( $wp_customize ) {
    //All our sections, settings, and controls will be added here
    $wp_customize->add_section( 'front-page-section' , array(
        'title'      =>  '首頁自訂設定',
        'priority'   => 1,
    ) );

    $wp_customize->add_setting( 'h1-heading' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h1-heading-control', array(
        'label'      => '大標題1',
        'section'    => 'front-page-section',
        'settings'   => 'h1-heading',
        'type'      =>  'text',
    ) ) );

    $wp_customize->add_setting( 'h1-heading-2' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h1-heading-2-control', array(
        'label'      => '大標題2',
        'section'    => 'front-page-section',
        'settings'   => 'h1-heading-2',
        'type'      =>  'text',
    ) ) );

    $wp_customize->add_setting( 'h1-heading-3' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h1-heading-3-control', array(
        'label'      => '大標題3',
        'section'    => 'front-page-section',
        'settings'   => 'h1-heading-3',
        'type'      =>  'text',
    ) ) );

    $wp_customize->add_setting( 'h2-heading' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h2-heading-control', array(
        'label'      => '子標題',
        'section'    => 'front-page-section',
        'settings'   => 'h2-heading',
        'type'      =>  'text',
    ) ) );

    $wp_customize->add_setting( 'hero-image' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'hero-image-control', array(
        'label'         => '封面圖片',
        'section'       => 'front-page-section',
        'settings'      => 'hero-image',
        'width'         => 1440,
        'height'        => 700,
    ) ) );

    $wp_customize->add_setting( 'stream-link' , array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'stream-link-control', array(
        'label'      => '直播連結',
        'section'    => 'front-page-section',
        'settings'   => 'stream-link',
        'type'      =>  'text',
    ) ) );
 }
 add_action( 'customize_register', 'custom_customize_register' );