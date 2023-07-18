<?php
/* 
    The header.
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- START HEADER -->
    <header id="site-header">
        <div class="container px-0 py-4">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <?= get_custom_logo()?>
                </div>
                <div class="menu-navigation">
                    <button id="navigation-button" class="border-0 bg-transparent">
                        <svg id="menu-button-open" class="d-block" width="40" height="10" viewBox="0 0 40 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="3" fill="" />
                            <rect x="19" y="7" width="21" height="3" fill="" />
                        </svg>
                        <svg id="menu-button-close" class="d-none" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2.13605" y="0.0147705" width="21" height="3" transform="rotate(45 2.13605 0.0147705)" fill=""/>
                            <rect x="16.9706" y="2.12134" width="21" height="3" transform="rotate(135 16.9706 2.12134)" fill=""/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="py-4 d-none" id="menu-container">
                <?php 
                    wp_nav_menu(
                        [
                            'theme_location'  => 'header',
                            'menu_class'      => 'list-nav list-unstyled d-flex flex-column align-items-end gap-2',
                        ]
                    );
                ?>
            </div> 
        </div>
    </header>
    <!-- END HEADER -->

    <!-- START MAIN CONTENT-->
    <main id="main">
        <div class="container px-0 py-4">