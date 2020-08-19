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
        'default'   => get_theme_default('hero-filter-color'),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'hero-image-control', array(
        'label'         => '封面圖片',
        'section'       => 'front-page-section',
        'settings'      => 'hero-image',
        'width'         => 1440,
        'height'        => 700,
    ) ) );

    $wp_customize->add_setting('hero-filter-color', array(
        'default'   => '#3C2F26',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero-filter-color-control', array(
        'label'      => '封面圖片濾鏡',
        'section'   => 'front-page-section',
        'settings'  => 'hero-filter-color',
    )));

    $wp_customize->add_setting( 'hero-filter-opacity' , array(
        'default'   => get_theme_default('hero-filter-opacity'),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hero-filter-opacity-control', array(
        'label'      => '封面圖片濾鏡不透明度',
        'description'   => '預設不透明度66%',
        'section'    => 'front-page-section',
        'settings'   => 'hero-filter-opacity',
        'type'      =>  'text',
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


    $wp_customize->add_panel( 'contact-panel', array(
        'title'       => '聯絡資料' ,
        'title_tagline' => 'hi',
        'description' => 'This is my shiny new panel.',
        'priority'   => 2,
    ) );

    $wp_customize->add_section( 'contact-section' , array(
        'title'      =>  '同工簡介設定',
        'description' => '更改HTML程式碼內的文字即可，如需要添加，請複製整個HTML Tag，再修改裏面的文字。 <br> e.g. &lt;p>黃錦雲牧師&lt;/p>',
        'priority'   => 1,
        'panel' => 'contact-panel',
    ) );

    $wp_customize->add_setting( 'staffs-1' , array(
        'default'   => get_theme_default( 'staffs-1' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'staffs-1-control', array(
        'label'      => '堂主任',
        'section'    => 'contact-section',
        'settings'   => 'staffs-1',
        'type'      =>  'textarea',
    ) ) );

    $wp_customize->add_setting( 'staffs-2' , array(
        'default'   => get_theme_default( 'staffs-2' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'staffs-2-control', array(
        'label'      => '傳道同工',
        'section'    => 'contact-section',
        'settings'   => 'staffs-2',
        'type'      =>  'textarea',
    ) ) );

    $wp_customize->add_setting( 'staffs-3' , array(
        'default'   => get_theme_default( 'staffs-3' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'staffs-3-control', array(
        'label'      => '幹事',
        'section'    => 'contact-section',
        'settings'   => 'staffs-3',
        'type'      =>  'textarea',
    ) ) );

    $wp_customize->add_section( 'contact-2-section' , array(
        'title'      =>  '聯絡方法',
        'priority'   => 2,
        'panel' => 'contact-panel',
    ) );

    $wp_customize->add_setting( 'phone' , array(
        'default'   => get_theme_default( 'phone' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'phone-control', array(
        'label'      => '電話',
        'section'    => 'contact-2-section',
        'settings'   => 'phone',
        'type'      =>  'text',
    ) ) );

    $wp_customize->add_setting( 'fax' , array(
        'default'   => get_theme_default( 'fax' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fax-control', array(
        'label'      => '傳真',
        'section'    => 'contact-2-section',
        'settings'   => 'fax',
        'type'      =>  'text',
    ) ) );

    $wp_customize->add_setting( 'email' , array(
        'default'   => get_theme_default( 'email' ),
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'email-control', array(
        'label'      => '電郵地址',
        'section'    => 'contact-2-section',
        'settings'   => 'email',
        'type'      =>  'text',
    ) ) );

    $wp_customize->add_section( 'contact-3-section' , array(
        'title'      =>  '奉獻方法',
        'description' => '更改HTML程式碼內的文字即可，&lt;h3>&lt;/h3>代表標題、如需要添加，請複製整個HTML Tag，再修改裏面的文字。 <br> e.g. &lt;p>郵寄支票回教會&lt;/p>',
        'priority'   => 3,
        'panel' => 'contact-panel',
    ) );

    $wp_customize->add_setting('mail', array(
        'default'   => get_theme_default( 'mail'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mail-control', array(
        'label'      => '郵寄',
        'section'    => 'contact-3-section',
        'settings'   => 'mail',
        'type'      =>  'textarea',
    ) ) );

    $wp_customize->add_setting('transfer', array(
        'default'   => get_theme_default( 'transfer'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'transfer-control', array(
        'label'      => '轉帳',
        'section'    => 'contact-3-section',
        'settings'   => 'transfer',
        'type'      =>  'textarea',
    ) ) );

    $wp_customize->add_section( 'map-section' , array(
        'title'      =>  '地圖設定',
        'description' => '',
        'priority'   => 3,
    ) );

    for ($index = 1; $index < 4; $index++) {
        $wp_customize->add_setting('marker-'.$index.'-title', array(
            'default'   => get_theme_default( 'marker-'.$index.'-title'),
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marker-'.$index.'-title-control', array(
            'label'      => '地圖'.$index.'標題',
            'section'    => 'map-section',
            'settings'   => 'marker-'.$index.'-title',
            'type'      =>  'text',
        ) ) );

        $wp_customize->add_setting('marker-'.$index.'-name', array(
            'default'   => get_theme_default( 'marker-'.$index.'-name'),
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marker-'.$index.'-name-control', array(
            'label'      => '地圖'.$index.'名稱',
            'section'    => 'map-section',
            'settings'   => 'marker-'.$index.'-name',
            'type'      =>  'text',
        ) ) );

        $wp_customize->add_setting('marker-'.$index.'-address', array(
            'default'   => get_theme_default( 'marker-'.$index.'-address'),
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marker-'.$index.'-address-control', array(
            'label'      => '地圖'.$index.'地址',
            'section'    => 'map-section',
            'settings'   => 'marker-'.$index.'-address',
            'type'      =>  'text',
        ) ) );

        $wp_customize->add_setting('marker-'.$index.'-phone', array(
            'default'   => get_theme_default( 'marker-'.$index.'-phone'),
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marker-'.$index.'-phone-control', array(
            'label'      => '地圖'.$index.'電話',
            'section'    => 'map-section',
            'settings'   => 'marker-'.$index.'-phone-title',
            'type'      =>  'text',
        ) ) );

        $wp_customize->add_setting('marker-'.$index.'-lat', array(
            'default'   => get_theme_default( 'marker-'.$index.'-lat'),
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marker-'.$index.'-lat-control', array(
            'label'      => '地圖'.$index.'-lat',
            'section'    => 'map-section',
            'settings'   => 'marker-'.$index.'-lat',
            'type'      =>  'text',
        ) ) );

        $wp_customize->add_setting('marker-'.$index.'-lng', array(
            'default'   => get_theme_default( 'marker-'.$index.'-lng'),
            'transport' => 'refresh',
        ));
    
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'marker-'.$index.'-lng-control', array(
            'label'      => '地圖'.$index.'-lng',
            'section'    => 'map-section',
            'settings'   => 'marker-'.$index.'-lng',
            'type'      =>  'text',
        ) ) );
    }
 }

function get_theme_default( $setting ) {
    $defaults = array(
        'hero-filter-color' => '#3C2F26',
        'hero-filter-opacity'   => '66%',
        'staffs-1'  => '<p>黃錦雲牧師</p>',
        'staffs-2'  => '<p>鄭惠意姑娘</p>
<p>黎亦芬姑娘</p>
<p>葉謝輝先生</p>
<p>郭海笙先生</p>',
        'staffs-3'  => '<p>王會良弟兄</p>',
        'phone'     => '2623 6316',
        'fax'       => '2719 0108',
        'email'     => 'hautakchurch@gmail.com',
        'mail'      => '<h3>郵寄</h3>
<p class="bold">郵寄支票回教會</p>
<p><span class="highlight">地址： </span>將軍澳厚德邨裕明苑裕榮閣地下</p>
<p><span class="highlight">支票抬頭： </span>基督教宣道會厚德堂/ Christian & Missionary Alliance Hau Tak Church</p>',
        'transfer'  => '<h3>轉帳</h3>
<p class="bold">轉帳至教會中國銀行戶口，並將入數紙拍照或截圖傳送到教會電郵或whatsapp</p>
<p><span class="highlight">戶口號碼： </span>036-744-0-000287-7</p>
<p><span class="highlight">教會電郵： </span>hautakchurch@gmail.com</p>
<p><span class="highlight">Whatsapp： </span>53600779</p>',
        'marker-1-title'     => '主日崇拜及親子崇拜',
        'marker-1-name'     => '陳耀星小學',
        'marker-1-address'     => '九龍將軍澳第二期第三十四區仁濟醫院陳耀星小學(坑口和明苑內)',
        'marker-1-phone'    => '2623 6316',
        'marker-1-lat'      => '22.3154014',
        'marker-1-lng'      => '114.2672707',
        'marker-2-title'     => '週六崇拜及其他聚會',
        'marker-2-name'     => '教會幼稚園',
        'marker-2-address'     => '九龍將軍澳厚德村裕明苑裕榮閣地下',
        'marker-2-phone'    => '2623 6316',
        'marker-2-lat'      => '22.3183149',
        'marker-2-lng'      => '114.2660506',
        'marker-3-title'     => '辦公室',
        'marker-3-name'     => '',
        'marker-3-address'     => '九龍將軍澳坑口村11號B地下',
        'marker-3-phone'    => '2623 6316',
        'marker-3-lat'      => '22.3211118',
        'marker-3-lng'      => '114.2665366',
    );

    return $defaults[$setting];
}
add_action( 'customize_register', 'custom_customize_register' );

function theme_customize_css() {
    ?>
        <style type="text/css">
            .hero::before {
                background-color: <?php echo get_theme_mod('hero-filter-color', get_theme_default('hero-filter-color')) ?>;
                opacity: <?php echo get_theme_mod('hero-filter-opacity', get_theme_default('hero-filter-opacity')) ?>;
            }
        </style>
    <?php
}
add_action('wp_head', 'theme_customize_css');