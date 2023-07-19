<?php

add_action('after_setup_theme', 'esgi_supports', 0);
function esgi_supports() {
    add_theme_support('title-tag');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Menu du pied de page');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
}

/**************************************************/
/*---------------------SCRIPTS--------------------*/
/**************************************************/

function bootstrap_esgi_register_assets_css() {
    //css
    wp_register_style('bootstrap-esgi-css', get_template_directory_uri() . '/src/bootstrap/css/bootstrap.css');
    wp_enqueue_style('bootstrap-esgi-css');
}
add_action('wp_enqueue_scripts', 'bootstrap_esgi_register_assets_css');

//Affichage des fichiers js
function bootstrap_esgi_register_assets_js() {
    //js
    wp_register_script('bootstrap-esgi-js', get_template_directory_uri() . '/src/bootstrap/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap-esgi-js', '', array(), '', true);
}
add_action('wp_enqueue_scripts', 'bootstrap_esgi_register_assets_js');

function esgi_register_assets_css() {
    //css
    wp_register_style('esgi-css', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('esgi-css');
}
add_action('wp_enqueue_scripts', 'esgi_register_assets_css');

function esgi_register_assets_js() {
    //js
    wp_register_script('esgi-js', get_template_directory_uri() . '/app.js');
    wp_enqueue_script('esgi-js', '', array(), '', true);
}
add_action('wp_enqueue_scripts', 'esgi_register_assets_js');

/**************************************************/
/*----------------RÉGLAGES DU THÈME----------------*/
/**************************************************/

/* SECTION */
add_action( 'customize_register', 'pcms_general' );
function pcms_general( $wp_customize ) {
	// Ajouter une section dans customize.php
	$wp_customize->add_section( 'pcms_general', array(
        'title' =>  'Projet CMS - GENERAL',
        'description' => 'Personnalisez votre thème',
        'priority' => 1,
	) );

	// Ajout des réglages du thème
	$wp_customize->add_setting('pcms_main_color', array(
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'default' => '#050A3A',
  		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
		'pcms_main_color', array(
	  	'label' => __( 'Couleur principale du thème.'),
	  	'section' => 'pcms_general',
	) ) );
    
    $wp_customize->add_setting('pcms_main_text_color', array(
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'default' => '#8A8A8A',
  		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
		'pcms_main_text_color', array(
	  	'label' => __( 'Couleur principale des textes du thème.'),
	  	'section' => 'pcms_general',
	) ) );
    
}

/* SECTION */
/*  HEADER */
add_action( 'customize_register', 'pcms_header' );
function pcms_header( $wp_customize ) {
	// Ajouter une section dans customize.php
	$wp_customize->add_section( 'pcms_header', array(
        'title' =>  'Projet CMS - HEADER',
        'description' => 'Personnalisation du haut de page',
        'priority' => 2,
        'section' => 'pcms_header',
	) );

    //bg header when menu close
    $wp_customize->add_setting('pcms_h_bg_menu_close', array(
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'default' => '#FFFFFF',
  		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
		'pcms_h_bg_menu_close', array(
	  	'label' => __( 'BG COLOR - header - close.'),
	  	'section' => 'pcms_header',
	) ) );

    //bg header alpha when menu close
    $wp_customize->add_setting('pcms_h_bg_alpha_menu_close', array(
        'type' => 'theme_mod',
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field', 
        'sanitize_js_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('pcms_h_bg_alpha_menu_close', array(
        'type' => 'range',
        'section' => 'pcms_header', 
        'label' => 'Transparency - header - close',
        'input_attrs' => array(
            'min' => 0,
            'max' => 1,
            'step' => .1,
        ),
    ));
    
   //bg header when menu open
   $wp_customize->add_setting('pcms_h_bg_menu_open', array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => '#050A3A',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
        'pcms_h_bg_menu_open', array(
        'label' => __( 'BG COLOR - header - open.'),
        'section' => 'pcms_header',
    ) ) );

    //bg header alpha when menu open
    $wp_customize->add_setting('pcms_h_bg_alpha_menu_open', array(
        'type' => 'theme_mod',
        'default' => 1,
        'sanitize_callback' => 'sanitize_text_field', 
        'sanitize_js_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('pcms_h_bg_alpha_menu_open', array(
        'type' => 'range',
        'section' => 'pcms_header', 
        'label' => 'Transparency - header - open',
        'input_attrs' => array(
            'min' => 0,
            'max' => 1,
            'step' => .1,
        ),
    ));

    //clr icon - menu opened
    $wp_customize->add_setting('pcms_h_menu_open', array(
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'default' => '#050A3A',
  		'sanitize_callback' => 'sanitize_hex_color',
	));

	$wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
		'pcms_h_menu_open', array(
	  	'label' => __( 'Couleur de l\'icon menu ouvert.'),
	  	'section' => 'pcms_header',
	) ) );

    //image 
    $wp_customize->add_setting("pcms_h_logo_open", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
        'pcms_h_logo_open', 
        array(
            'label'    => 'Logo menu ouvert',
            'section'  => 'pcms_header',
            ) 
        ) 
    );

    //clr icon - menu closed
    $wp_customize->add_setting('pcms_h_menu_close', array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'pcms_h_menu_close', array(
            'label' => __( 'Couleur de l\'icon menu fermé.'),
            'section' => 'pcms_header',
    ) ) );

    //clr icon - menu item
    $wp_customize->add_setting('pcms_h_menu_item', array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => '#FFFFFF',
            'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
            $wp_customize, 
            'pcms_h_menu_item', array(
            'label' => __( 'Couleur des liens.'),
            'section' => 'pcms_header',
    ) ) );
}

/* SECTION  */
/*  FOOTER */
add_action( 'customize_register', 'pcms_footer' );
function pcms_footer( $wp_customize ) {
	// Ajouter une section dans customize.php
	$wp_customize->add_section( 'pcms_footer', array(
        'title' =>  'Projet CMS - FOOTER',
        'description' => 'Personnalisation du pied de page',
        'priority' => 4,
        'section' => 'pcms_footer',
	) );

    //bg color
    $wp_customize->add_setting('pcms_f_bg', array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => '#050A3A',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'pcms_f_bg', array(
        'label' => __( 'BG footer.'),
        'section' => 'pcms_footer',
    ) ) );

    //text-color
    $wp_customize->add_setting('pcms_f_text_color', array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'pcms_f_text_color', array(
        'label' => __( 'Couleur des textes footer.'),
        'section' => 'pcms_footer',
    ) ) );

    //text-color
    $wp_customize->add_setting('pcms_f_link_color', array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'pcms_f_link_color', array(
        'label' => __( 'Couleur des liens du menu footer.'),
        'section' => 'pcms_footer',
    ) ) );

    //social footer link
    $wp_customize->add_setting('pcms_f_social_link', array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'pcms_f_social_link', array(
        'label' => __( 'Couleur des icons footer.'),
        'section' => 'pcms_footer',
    ) ) );

    //image 
    $wp_customize->add_setting("pcms_f_logo", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
        'pcms_f_logo', 
        array(
            'label'    => 'Logo dans le pied de page',
            'section'  => 'pcms_footer',
            ) 
        ) 
    );

    //membres footer
    $membres = array('membre-1', 'membre-2');
    foreach ($membres as $membre) {
        //demande d'affichage - default : true
        $wp_customize->add_setting("pcms_f_${membre}_enabled", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'default' => true,
        ));

        $wp_customize->add_control(
            "pcms_f_${membre}_enabled",
            array(
                'label' => "Afficher : {$membre}",
                'section' => 'pcms_footer',
                'type' => 'checkbox',
            )
        );

        //Nom Prénom
        $wp_customize->add_setting("pcms_f_${membre}_names", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            "pcms_f_${membre}_names",
            array(
                'label' => "Nom Prénom : ${membre}",
                'section' => 'pcms_footer',
                'type' => 'text',
            )
        );

        //Poste occupé
        $wp_customize->add_setting("pcms_f_${membre}_post", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            "pcms_f_${membre}_post",
            array(
                'label' => "Poste : ${membre}",
                'section' => 'pcms_footer',
                'type' => 'text',
            )
        );

        //Tel
        $wp_customize->add_setting("pcms_f_${membre}_phone", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            "pcms_f_${membre}_phone",
            array(
                'label' => "Tel : ${membre}",
                'section' => 'pcms_footer',
                'type' => 'text',
                'default' => '#',
                'input_attrs' => array(
                    'placeholder' => __( 'format : 0X XX XX XX XX', 'directorist' ),
                )
            )
        );

        //Email
        $wp_customize->add_setting("pcms_f_${membre}_email", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(
            "pcms_f_${membre}_email",
            array(
                'label' => "Email : ${membre}",
                'section' => 'pcms_footer',
                'type' => 'email',
                'default' => '#',
            )
        );
    }

    $icons = array('facebook', 'twitter', 'email', 'linkedin', 'phone');

    foreach ($icons as $icon) {
        // demande d'affichage - default : true
        $wp_customize->add_setting("pcms_f_${icon}_enabled", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'default' => true,
        ));

        $wp_customize->add_control(
            "pcms_f_${icon}_enabled",
            array(
                'label' => "Afficher le lien de : {$icon}",
                'section' => 'pcms_footer',
                'type' => 'checkbox',
            )
        );

        // Icon URL field
        $wp_customize->add_setting("pcms_f_${icon}_link", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(
            "pcms_f_${icon}_link",
            array(
                'label' => "URL pour l'icon : ${icon}",
                'section' => 'pcms_footer',
                'type' => 'text',
                'default' => '#',
            )
        );

        if ($icon == 'email') {
            $wp_customize->add_setting("pcms_f_email_subject", array(
                'type' => 'theme_mod',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Projet CMS',
            ));

            $wp_customize->add_control(
                "pcms_f_email_subject",
                array(
                    'label' => "Sujet de l'email",
                    'section' => 'pcms_footer',
                    'type' => 'text',
                    'default' => 'Projet CMS',
                )
            );
        }
    }
}

/* SECTION */
/* INDEX */
add_action( 'customize_register', 'pcms_index' );
function pcms_index( $wp_customize ) {
	$wp_customize->add_section( 'pcms_index', array(
        'title' =>  'Projet CMS - INDEX',
        'description' => 'Personnalisez la page d\'accueil',
        'priority' => 5,
	) );

    //affichage ou non sur la page d'accueil des sections
    $parts = array('AboutUs', 'Services', 'Partners');
    $sections_aus = array ('section-1', 'section-2', 'section-3');
    $sections_services = array ('section-1', 'section-2');
    $sections_partners = array ('section-1');
    foreach ($parts as $part) {
        $wp_customize->add_setting("pcms_index_title_${part}", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            "pcms_index_title_${part}",
            array(
                'label' => "Titre : ${part}",
                'section' => 'pcms_index',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting("pcms_index_${part}_enabled", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'default' => true,
        ));

        $wp_customize->add_control(
            "pcms_index_${part}_enabled",
            array(
                'label' => "Afficher : ${part}",
                'section' => 'pcms_index',
                'type' => 'checkbox',
            )
        );

        if ($part == 'AboutUs') {
            foreach ($sections_aus as $section_aus) {
                $wp_customize->add_setting("pcms_index_${part}_${section_aus}_enabled", array(
                    'type' => 'theme_mod',
                    'transport' => 'refresh',
                    'default' => true,
                ));
        
                $wp_customize->add_control(
                    "pcms_index_${part}_${section_aus}_enabled",
                    array(
                        'label' => "Afficher : ${part} : ${section_aus}",
                        'section' => 'pcms_index',
                        'type' => 'checkbox',
                    )
                );
            }
        }

        if ($part == 'Services') {
            foreach ($sections_services as $section_services) {
                $wp_customize->add_setting("pcms_index_${part}_${section_services}_enabled", array(
                    'type' => 'theme_mod',
                    'transport' => 'refresh',
                    'default' => true,
                ));
        
                $wp_customize->add_control(
                    "pcms_index_${part}_${section_services}_enabled",
                    array(
                        'label' => "Afficher : ${part} : ${section_services}",
                        'section' => 'pcms_index',
                        'type' => 'checkbox',
                    )
                );
            }
        }

        if($part == 'Partners') {
            foreach ($sections_partners as $section_partners) {
                $wp_customize->add_setting("pcms_index_${part}_${section_partners}_enabled", array(
                    'type' => 'theme_mod',
                    'transport' => 'refresh',
                    'default' => true,
                ));
        
                $wp_customize->add_control(
                    "pcms_index_${part}_${section_partners}_enabled",
                    array(
                        'label' => "Afficher : ${part} : ${section_partners}",
                        'section' => 'pcms_index',
                        'type' => 'checkbox',
                    )
                );
            }
        }
    }
}

/* SECTION */
/*  ABOUT US */
add_action('customize_register', 'pcms_about_us');
function pcms_about_us ( $wp_customize ) {
    // Ajouter une section dans customize.php
	$wp_customize->add_section( 'pcms_about_us', array(
        'title' =>  'Projet CMS - About Us',
        'description' => 'Customisation : About Us',
        'priority' => 6,
        'section' => 'pcms_about_us',
	) );

    /** ABOUT US - SECTION 1 **/
    // demande d'affichage - default : true
     $wp_customize->add_setting("pcms_aus_s1_enabled", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => true,
    ));

    $wp_customize->add_control(
        "pcms_aus_s1_enabled",
        array(
            'label' => "Afficher la section 1",
            'section' => 'pcms_about_us',
            'type' => 'checkbox',
        )
    );

    //image 
    $wp_customize->add_setting("pcms_aus_s1_image", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
        'pcms_aus_s1_image', 
        array(
            'label'    => 'Image de la section 1',
            'section'  => 'pcms_about_us',
            ) 
        ) 
    );

    //titre
    $wp_customize->add_setting("pcms_aus_s1_title", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        "pcms_aus_s1_title",
        array(
            'label' => "Titre de la section 1",
            'section' => 'pcms_about_us',
            'type' => 'text',
        )
    );

    //description du titre
    $wp_customize->add_setting("pcms_aus_s1_title_description", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(
        "pcms_aus_s1_title_description",
        array(
            'label' => "Description de la section 1",
            'section' => 'pcms_about_us',
            'type' => 'textarea',
        )
    );
    

    /** ABOUT US - SECTION 2 **/
    // demande d'affichage - default : true
    $wp_customize->add_setting("pcms_aus_s2_enabled", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => true,
    ));

    $wp_customize->add_control(
        "pcms_aus_s2_enabled",
        array(
            'label' => "Afficher la section 2",
            'section' => 'pcms_about_us',
            'type' => 'checkbox',
        )
    );

    //image 
    $wp_customize->add_setting("pcms_aus_s2_image", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
        'pcms_aus_s2_image', 
        array(
            'label'    => 'Image de la section 2',
            'section'  => 'pcms_about_us',
            ) 
        ) 
    );

    $infos = array ('info-1', 'info-2', 'info-3');
    foreach ($infos as $info) {
        //demande d'affiche de l'info - default true
        $wp_customize->add_setting("pcms_aus_s2_${info}_enabled", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'default' => true,
        ));

        $wp_customize->add_control(
            "pcms_aus_s2_${info}_enabled",
            array(
                'label' => "Afficher l'info : {$info}",
                'section' => 'pcms_about_us',
                'type' => 'checkbox',
            )
        );

        //titre de l'info
        $wp_customize->add_setting("pcms_aus_s2_${info}_title", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Beautiful Title'
        ));

        $wp_customize->add_control(
            "pcms_aus_s2_${info}_title",
            array(
                'label' => "Titre de l'info : ${info}",
                'section' => 'pcms_about_us',
                'type' => 'text',
            )
        );

         //description de l'info
        $wp_customize->add_setting("pcms_aus_s2_${info}_description", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_textarea_field',
            'default' => 'Extraordinary Description.',
        ));

        $wp_customize->add_control(
            "pcms_aus_s2_${info}_description",
            array(
                'label' => "Description de l'info : {$info}",
                'section' => 'pcms_about_us',
                'type' => 'textarea',
            )
        );
    }

    /** ABOUT US - SECTION 3 **/
    // demande d'affichage - default : true
    $wp_customize->add_setting("pcms_aus_s3_enabled", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => true,
    ));

    $wp_customize->add_control(
        "pcms_aus_s3_enabled",
        array(
            'label' => "Afficher la section 3",
            'section' => 'pcms_about_us',
            'type' => 'checkbox',
        )
    );

     //titre
     $wp_customize->add_setting("pcms_aus_s3_title", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => 'Our Team',
    ));

    $wp_customize->add_control(
        "pcms_aus_s3_title",
        array(
            'label' => "Titre de la section 3",
            'section' => 'pcms_about_us',
            'type' => 'text',
        )
    );

    $s3Infos = array('s3-info-1', 's3-info-2', 's3-info-3', 's3-info-4');
    $icons = array ('email', 'phone', 'linkedin');
    foreach ($s3Infos as $s3Info) {
        //image 
        $infoToUpper = strtoupper($s3Info);

        $wp_customize->add_setting("pcms_aus_s3_${s3Info}_image", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            "pcms_aus_s3_${s3Info}_image",
            array(
                'label'    => "Image du membre : ${infoToUpper}",
                'section'  => 'pcms_about_us',
                ) 
            ) 
        );

        $wp_customize->add_setting("pcms_aus_s3_${s3Info}_membre", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Poste du Membre',
        ));
        
        $wp_customize->add_control(
            "pcms_aus_s3_${s3Info}_membre",
            array(
                'label' => "Poste du membre",
                'section' => 'pcms_about_us',
                'type' => 'text',
            )
        );


        foreach ($icons as $icon) {
            // Icon URL field
            $wp_customize->add_setting("pcms_aus_s3_${s3Info}_${icon}_link", array(
                'type' => 'theme_mod',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '#',
            ));

            $wp_customize->add_control(
                "pcms_aus_s3_${s3Info}_${icon}_link",
                array(
                    'label' => "Lien de : ${icon}",
                    'section' => 'pcms_about_us',
                    'type' => 'text',
                    'default' => '#',
                )
            );

            if ($icon == 'email') {
                $wp_customize->add_setting("pcms_aus_s3_${s3Info}_${icon}_subject", array(
                    'type' => 'theme_mod',
                    'transport' => 'refresh',
                    'sanitize_callback' => 'sanitize_text_field',
                    'default' => 'Projet CMS',
                ));

                $wp_customize->add_control(
                    "pcms_aus_s3_${s3Info}_${icon}_subject",
                    array(
                        'label' => "Sujet de l'email",
                        'section' => 'pcms_about_us',
                        'type' => 'text',
                        'default' => 'Projet CMS',
                    )
                );
            }
        }
    }

}

/* SECTION */
/*  SERVICES */
add_action('customize_register', 'pcms_services');
function pcms_services ( $wp_customize ) {
    $wp_customize->add_section( 'pcms_services', array(
        'title' =>  'Projet CMS - Services',
        'description' => 'Customisation : Services',
        'priority' => 7,
        'section' => 'pcms_services',
	) );

    /** SERVICES - SECTION 1 **/
    // demande d'affichage - default : true
    $wp_customize->add_setting("pcms_services_s1_enabled", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => true,
    ));

    $wp_customize->add_control(
        "pcms_services_s1_enabled",
        array(
            'label' => "Afficher la section 1",
            'section' => 'pcms_services',
            'type' => 'checkbox',
        )
    );

    $infos = array('info-1', 'info-2', 'info-3', 'info-4');
    foreach ($infos as $info) {

        //titre
        $wp_customize->add_setting("pcms_services_s1_title_${info}", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            "pcms_services_s1_title_${info}",
            array(
                'label' => "Titre : ${info}",
                'section' => 'pcms_services',
                'type' => 'text',
            )
        );

        //image 
        $wp_customize->add_setting("pcms_services_s1_image_${info}", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            "pcms_services_s1_image_${info}", 
            array(
                'label'    => "Image de : ${info}",
                'section'  => 'pcms_services',
                ) 
            ) 
        );
    }
    /** SERVICES - SECTION 2 **/
    // demande d'affichage - default : true
    $wp_customize->add_setting("pcms_services_s2_enabled", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => true,
    ));

    $wp_customize->add_control(
        "pcms_services_s2_enabled",
        array(
            'label' => "Afficher la section 2",
            'section' => 'pcms_services',
            'type' => 'checkbox',
        )
    );

    //titre
    $wp_customize->add_setting("pcms_services_s2_title", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(
        "pcms_services_s2_title",
        array(
            'label' => "Titre de la section 2",
            'section' => 'pcms_services',
            'type' => 'text',
        )
    );

    //description du titre
    $wp_customize->add_setting("pcms_services_s2_title_description", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control(
        "pcms_services_s2_title_description",
        array(
            'label' => "Description de la section 2",
            'section' => 'pcms_services',
            'type' => 'textarea',
        )
    );

    //image 
    $wp_customize->add_setting("pcms_services_s2_image", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
        "pcms_services_s2_image", 
        array(
            'label'    => "Image de la section 2",
            'section'  => 'pcms_services',
            ) 
        ) 
    );
}


/* SECTION */
/*  PARTNERS */
add_action('customize_register', 'pcms_partners');
function pcms_partners ( $wp_customize ) { 
    $wp_customize->add_section( 'pcms_partners', array(
        'title' =>  'Projet CMS - Partners',
        'description' => 'Customisation : Parteners',
        'priority' => 8,
        'section' => 'pcms_partners',
	) );

    /** PARTNERS - SECTION 1 **/
    // demande d'affichage - default : true
    $wp_customize->add_setting("pcms_partners_s1_enabled", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'default' => true,
    ));

    $wp_customize->add_control(
        "pcms_partners_s1_enabled",
        array(
            'label' => "Afficher la section 1",
            'section' => 'pcms_partners',
            'type' => 'checkbox',
        )
    );

    $partners = array('partner-1', 'partner-2', 'partner-3', 'partner-4', 'partner-5', 'partner-6');
    foreach ($partners as $partner) {
        //lien du site
        $wp_customize->add_setting("pcms_partners_link_${partner}", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(
            "pcms_partners_link_${partner}",
            array(
                'label' => "URL : ${partner}",
                'section' => 'pcms_partners',
                'type' => 'text',
            )
        );

        //logo 
        $wp_customize->add_setting("pcms_partners_logo_${partner}", array(
            'type' => 'theme_mod',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control( 
            $wp_customize, 
            "pcms_partners_logo_${partner}", 
            array(
                'label'    => "Logo de : ${partner}",
                'section'  => 'pcms_partners',
                ) 
            ) 
        );
    }

}

/* CUSTOM CSS */
add_action( 'wp_head', 'pcms_css_output');
function pcms_css_output(){
    $pcms_f_bg = get_theme_mod('pcms_f_bg', '#050A3A');
    $pcms_f_text_color = get_theme_mod('pcms_f_bg_text_color', '#FFFFFF');
    $pcms_f_social_link = get_theme_mod('pcms_f_social_link', '#FFFFFF');
    $pcms_f_link_color = get_theme_mod('pcms_f_link_color', '#FFFFFF');
    $pcms_f_link_member_color = get_theme_mod('pcms_f_link_member_color', '#FFFFFF');
    $pcms_h_menu_item = get_theme_mod('pcms_h_menu_item', '#FFFFFF');
    $pcms_h_bg_menu_close = get_theme_mod('pcms_h_bg_menu_close', '#FFFFFF');
    $pcms_h_bg_menu_close = hexToRgb($pcms_h_bg_menu_close);
    $pcms_h_bg_alpha_menu_close = get_theme_mod('pcms_h_bg_alpha_menu_close', '1');
    $pcms_h_bg_menu_open = get_theme_mod('pcms_h_bg_menu_open', '#050A3A');
    $pcms_h_bg_menu_open = hexToRgb($pcms_h_bg_menu_open);
    $pcms_h_bg_alpha_menu_open = get_theme_mod('pcms_h_bg_alpha_menu_open', '1');
    $pcms_h_menu_close = get_theme_mod('pcms_h_menu_close', '#FFFFFF');
    $pcms_h_menu_open = get_theme_mod('pcms_h_menu_open', '#050A3A');
    $pcms_main_text_color = get_theme_mod('pcms_main_text_color', '#8A8A8A');
	$pcms_main_color = get_theme_mod('pcms_main_color', '#050A3A');
	echo "<style>
			 :root{
                --pcms-h-menu-item : $pcms_h_menu_item;
                --pcms-h-bg-alpha-menu-close : $pcms_h_bg_alpha_menu_close;
                --pcms-h-bg-menu-close : $pcms_h_bg_menu_close;
                --pcms-h-bg-alpha-menu-open : $pcms_h_bg_alpha_menu_open;
                --pcms-h-bg-menu-open : $pcms_h_bg_menu_open;
                --pcms-h-menu-close : $pcms_h_menu_close;
                --pcms-h-menu-open : $pcms_h_menu_open;
			 	--pcms-main-color : $pcms_main_color;
                --pcms-main-text-color: $pcms_main_text_color;  
                --pmcs-f-bg : $pcms_f_bg;
                --pmcs-f-text-color : $pcms_f_text_color;
                --pcms-f-social-link : $pcms_f_social_link;
                --pcms-f-link-color : $pcms_f_link_color;
                --pcms-f-link--member-color : $pcms_f_link_member_color;
			  }
		</style>";
}

//HEX to RGBA
function hexToRgb($hex) {
    // Remove the # symbol if present
    $hex = str_replace('#', '', $hex);

    // Extract the red, green, and blue components
    $red = substr($hex, 0, 2);
    $green = substr($hex, 2, 2);
    $blue = substr($hex, 4, 2);

    // Convert the components from hexadecimal to decimal
    $red = hexdec($red);
    $green = hexdec($green);
    $blue = hexdec($blue);

    // Return the RGBA format
    return "$red, $green, $blue";
}

//ICON footer
function getIcon($icon){

    $facebook = '<svg width="12" height="18" class="social-footer-icon">
    <path d="M3.4008 18L3.375 10.125H0V6.75H3.375V4.5C3.375 1.4634 5.25545 0 7.9643 0C9.26187 0 10.3771 0.0966038 10.7021 0.139781V3.3132L8.82333 3.31406C7.35011 3.31406 7.06485 4.01411 7.06485 5.04139V6.75H11.25L10.125 10.125H7.06484V18H3.4008Z"/>
    </svg>
    ';

    $twitter = '<svg width="18" height="15" viewBox="0 0 18 15" class="social-footer-icon">
    <path d="M18 1.6875C17.325 2.025 16.65 2.1375 15.8625 2.25C16.65 1.8 17.2125 1.125 17.4375 0.225C16.7625 0.675 15.975 0.9 15.075 1.125C14.4 0.45 13.3875 0 12.375 0C10.4625 0 8.775 1.6875 8.775 3.7125C8.775 4.05 8.775 4.275 8.8875 4.5C5.85 4.3875 3.0375 2.925 1.2375 0.675C0.9 1.2375 0.7875 1.8 0.7875 2.5875C0.7875 3.825 1.4625 4.95 2.475 5.625C1.9125 5.625 1.35 5.4 0.7875 5.175C0.7875 6.975 2.025 8.4375 3.7125 8.775C3.375 8.8875 3.0375 8.8875 2.7 8.8875C2.475 8.8875 2.25 8.8875 2.025 8.775C2.475 10.2375 3.825 11.3625 5.5125 11.3625C4.275 12.375 2.7 12.9375 0.9 12.9375C0.5625 12.9375 0.3375 12.9375 0 12.9375C1.6875 13.95 3.6 14.625 5.625 14.625C12.375 14.625 16.0875 9 16.0875 4.1625C16.0875 4.05 16.0875 3.825 16.0875 3.7125C16.875 3.15 17.55 2.475 18 1.6875Z"/>
    </svg>
    ';

    $email = '<svg width="18" height="15" viewBox="0 0 18 15" class="social-footer-icon">
    <path d="M18 1.875C18 0.84375 17.19 0 16.2 0H1.8C0.81 0 0 0.84375 0 1.875V13.125C0 14.1563 0.81 15 1.8 15H16.2C17.19 15 18 14.1563 18 13.125V1.875ZM16.2 1.875L9 6.5625L1.8 1.875H16.2ZM16.2 13.125H1.8V3.75L9 8.4375L16.2 3.75V13.125Z"/>
    </svg>       
    ';

    $linkedin = '<svg width="19" height="18" viewBox="0 0 19 18" class="social-footer-icon">
    <path d="M17.9698 0H1.64687C1.19966 0 0.864258 0.335404 0.864258 0.782609V17.2174C0.864258 17.5528 1.19966 17.8882 1.64687 17.8882H18.0816C18.5289 17.8882 18.8643 17.5528 18.8643 17.1056V0.782609C18.7525 0.335404 18.4171 0 17.9698 0ZM3.54749 15.205V6.70807H6.23072V15.205H3.54749ZM4.8891 5.59006C3.99469 5.59006 3.32389 4.80745 3.32389 4.02484C3.32389 3.13043 3.99469 2.45963 4.8891 2.45963C5.78351 2.45963 6.45432 3.13043 6.45432 4.02484C6.34252 4.80745 5.67171 5.59006 4.8891 5.59006ZM16.0692 15.205H13.386V11.0683C13.386 10.0621 13.386 8.8323 12.0444 8.8323C10.7028 8.8323 10.4792 9.95031 10.4792 11.0683V15.3168H7.79593V6.70807H10.3674V7.82609C10.7028 7.15528 11.5972 6.48447 12.827 6.48447C15.5102 6.48447 15.9574 8.27329 15.9574 10.5093V15.205H16.0692Z"/>
    </svg>
    ';

    $phone = '<svg width="18" height="18" viewBox="0 0 18 18" class="social-footer-icon">
    <path d="M17.1609 2.84417L14.8345 0.519903C14.6704 0.355071 14.4753 0.224288 14.2605 0.135067C14.0457 0.0458453 13.8154 -5.57467e-05 13.5828 5.08096e-08C13.1088 5.08096e-08 12.6632 0.18568 12.3289 0.519903L9.82558 3.0233C9.66075 3.18741 9.52997 3.38247 9.44075 3.59728C9.35153 3.81208 9.30563 4.0424 9.30569 4.275C9.30569 4.74903 9.49136 5.19466 9.82558 5.52888L11.6561 7.35947C11.2276 8.30394 10.6319 9.16315 9.89767 9.89563C9.16527 10.6317 8.30615 11.2296 7.36154 11.6607L5.53099 9.8301C5.36688 9.66527 5.17182 9.53448 4.95702 9.44526C4.74221 9.35604 4.5119 9.31014 4.27931 9.31019C3.80528 9.31019 3.35966 9.49587 3.02544 9.8301L0.519896 12.3313C0.354864 12.4957 0.223971 12.6911 0.134747 12.9063C0.0455227 13.1215 -0.000270693 13.3522 1.2037e-06 13.5852C1.2037e-06 14.0592 0.185678 14.5049 0.519896 14.8391L2.84195 17.1612C3.37495 17.6964 4.1111 18 4.86692 18C5.02638 18 5.17929 17.9869 5.33002 17.9607C8.27463 17.4757 11.1952 15.9095 13.5522 13.5546C15.907 11.2019 17.4711 8.2835 17.9626 5.3301C18.1111 4.42791 17.8119 3.49951 17.1609 2.84417Z"/>
    </svg>

    ';

    return $$icon;

}