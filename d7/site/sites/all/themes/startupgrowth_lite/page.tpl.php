<!-- #page-container -->
<div id="page-container">

    <?php if (theme_get_setting('scrolltop_display')): ?>
    <div id="toTop"><i class="fa fa-angle-up"></i></div>
    <?php endif; ?>

    <!-- #header -->
    <header id="header"  role="banner" class="clearfix">
        <div class="container">

            <!-- #header-inside -->
            <div id="header-inside" class="clearfix">
                <div class="row">

                    <div class="col-md-4">
                        <!-- #header-inside-left -->
                        <div id="header-inside-left" class="clearfix">

                        <?php if ($logo):?>
                        <div id="logo">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"> <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /> </a>
                        </div>
                        <?php endif; ?>

                        <?php if ($site_name):?>
                        <div id="site-name">
                        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
                        </div>
                        <?php endif; ?>

                        <?php if ($site_slogan):?>
                        <div id="site-slogan">
                        <?php print $site_slogan; ?>
                        </div>
                        <?php endif; ?>

                        <?php if ($page['header']) :?>
                        <?php print render($page['header']); ?>
                        <?php endif; ?>  

                        </div>
                        <!-- EOF:#header-inside-left -->
                    </div>

                    <div class="col-md-8">
                        <!-- #header-inside-right -->
                        <div id="header-inside-right" class="clearfix">

                            <?php if ($page['search_area']) :?>
                            <div id="search-area" class="clearfix">
                            <?php print render($page['search_area']); ?>
                            </div>
                            <?php endif; ?>

                            <!-- #main-navigation -->
                            <div id="main-navigation" class="clearfix <?php if ($page['search_area']) { ?> with-search-bar <?php } ?>">
                                <nav role="navigation"> 
                                    <?php if ($page['navigation']) :?>
                                    <?php print render($page['navigation']); ?>
                                    <?php else : ?>
                                    <div id="main-menu">
                                    <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('main-menu', 'menu'), ), 'heading' => array('text' => t('Main menu'), 'level' => 'h2', 'class' => array('element-invisible'), ), )); ?>
                                    </div>
                                    <?php endif; ?>
                                </nav>
                            </div>
                            <!-- EOF: #main-navigation -->

                        </div>
                        <!-- EOF:#header-inside-right -->                        
                    </div>

                </div>
            </div>
            <!-- EOF: #header-inside -->

        </div>
    </header>
    <!-- EOF: #header -->

    <?php if ($page['banner']) : ?>
    <!-- #banner -->
    <div id="banner" class="clearfix">

        <!-- #banner-inside -->
        <div id="banner-inside" class="clearfix">
            <div class="banner-area">
            <?php print render($page['banner']); ?>
            </div>
        </div>
        <!-- EOF: #banner-inside -->        

    </div>
    <!-- EOF:#banner -->
    <?php endif; ?>

    <?php include 'includes/internal-banner.inc'; ?>

    <!-- #page -->
    <div id="page" class="clearfix">

        <!-- #messages-console -->
        <?php if ($messages):?>
        <div id="messages-console" class="clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php print $messages; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- EOF: #messages-console -->

        <?php if ($page['top_content']):?>
        <!-- #top-content -->
        <div id="top-content" class="clearfix">
            <div class="container">

                <!-- #top-content-inside -->
                <div id="top-content-inside" class="clearfix">
                    <div class="row">
                        <div class="col-md-12">
                        <?php print render($page['top_content']); ?>
                        </div>
                    </div>
                </div>
                <!-- EOF:#top-content-inside -->

            </div>
        </div>
        <!-- EOF: #top-content -->
        <?php endif; ?>

        <?php if ($page['highlighted']):?>
        <!-- #highlighted -->
        <div id="highlighted">
            <div class="container">

                <!-- #highlighted-inside -->
                <div id="highlighted-inside" class="clearfix">
                    <div class="row">
                        <div class="col-md-12">
                        <?php print render($page['highlighted']); ?>
                        </div>
                    </div>
                </div>
                <!-- EOF:#highlighted-inside -->

            </div>
        </div>
        <!-- EOF: #highlighted -->
        <?php endif; ?>

        <!-- #main-content -->
        <div id="main-content">
            <div class="container">

                <div class="row">

                    <?php if ($page['sidebar_first']):?>
                    <aside class="<?php print $sidebar_grid_class; ?>">
                        <!--#sidebar-->
                        <section id="sidebar-first" class="sidebar clearfix">
                        <?php print render($page['sidebar_first']); ?>
                        </section>
                        <!--EOF:#sidebar-->
                    </aside>
                    <?php endif; ?>

                    <section class="<?php print $main_grid_class; ?>">

                        <!-- #main -->
                        <div id="main" class="clearfix">

                            <?php print render($title_prefix); ?>
                            <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                            <?php print render($title_suffix); ?>

                            <!-- #tabs -->
                            <?php if ($tabs):?>
                                <div class="tabs">
                                <?php print render($tabs); ?>
                                </div>
                            <?php endif; ?>
                            <!-- EOF: #tabs -->

                            <?php print render($page['help']); ?>

                            <!-- #action links -->
                            <?php if ($action_links):?>
                                <ul class="action-links">
                                <?php print render($action_links); ?>
                                </ul>
                            <?php endif; ?>
                            <!-- EOF: #action links -->

                            <?php if (theme_get_setting('frontpage_content_print') || !drupal_is_front_page()):?> 
                            <?php print render($page['content']); ?>
                            <?php print $feed_icons; ?>
                            <?php endif; ?>

                        </div>
                        <!-- EOF:#main -->

                    </section>

                    <?php if ($page['sidebar_second']):?>
                    <aside class="<?php print $sidebar_grid_class; ?>">
                        <!--#sidebar-->
                        <section id="sidebar-second" class="sidebar clearfix">
                        <?php print render($page['sidebar_second']); ?>
                        </section>
                        <!--EOF:#sidebar-->
                    </aside>
                    <?php endif; ?>

                </div>

            </div>
        </div>
        <!-- EOF:#main-content -->

    </div>
    <!-- EOF: #page -->

    <?php if ($page['highlighted_bottom_left'] || $page['highlighted_bottom_right']):?>
    <!-- #highlighted-bottom -->
    <div id="highlighted-bottom">
        <div id="highlighted-bottom-transparent-bg"></div>

            <div class="container">

                <!-- #highlighted-bottom-inside -->
                <div id="highlighted-bottom-inside" class="clearfix">
                    <div class="row">
                        <?php if ($page['highlighted_bottom_left']):?>
                        <div class="<?php print $highlighted_bottom_left_grid_class?>">
                            <div id="highlighted-bottom-left">
                                <?php print render($page['highlighted_bottom_left']); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($page['highlighted_bottom_right']):?>
                        <div class="<?php print $highlighted_bottom_right_grid_class?>">
                            <div id="highlighted-bottom-right">                        
                            <?php print render($page['highlighted_bottom_right']); ?>
                            </div>
                        </div>
                        <?php endif; ?>                    
                    </div>
                </div>
                <!-- EOF:#highlighted-bottom-inside -->

            </div>

    </div>
    <!-- EOF: #highlighted-bottom -->
    <?php endif; ?>

    <?php if ($page['bottom_content']):?>
    <!-- #bottom-content -->
    <div id="bottom-content" class="clearfix">
        <div class="container">

            <!-- #bottom-content-inside -->
            <div id="bottom-content-inside" class="clearfix">
                <div class="row">
                    <div class="col-md-12">
                    <?php print render($page['bottom_content']); ?>
                    </div>
                </div>
            </div>
            <!-- EOF:#bottom-content-inside -->

        </div>
    </div>
    <!-- EOF: #bottom-content -->
    <?php endif; ?>

    <?php if ($page['footer_top']):?>
    <!-- #footer-top -->
    <div id="footer-top" class="clearfix">
        <div class="container">

            <!-- #footer-top-inside -->
            <div id="footer-top-inside" class="clearfix">
                <div class="row">
                    <div class="col-md-12">
                    <?php print render($page['footer_top']); ?>
                    </div>
                </div>
            </div>
            <!-- EOF:#footer-top-inside -->

        </div>
    </div>
    <!-- EOF: #footer-top -->
    <?php endif; ?>    

    <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third'] || $page['footer_fourth']):?>
    <!-- #footer -->
    <footer id="footer" class="clearfix">
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                    <?php if ($page['footer_first']):?>
                    <div class="footer-area">
                    <?php print render($page['footer_first']); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="col-sm-3">
                    <?php if ($page['footer_second']):?>
                    <div class="footer-area">
                    <?php print render($page['footer_second']); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="col-sm-3">
                    <?php if ($page['footer_third']):?>
                    <div class="footer-area">
                    <?php print render($page['footer_third']); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="col-sm-3">
                    <?php if ($page['footer_fourth']):?>
                    <div class="footer-area">
                    <?php print render($page['footer_fourth']); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </footer> 
    <!-- EOF #footer -->
    <?php endif; ?>

    <?php if ($page['sub_footer_left'] || $page['footer']):?>
    <div id="subfooter" class="clearfix">
        <div class="container">

            <!-- #subfooter-inside -->
            <div id="subfooter-inside" class="clearfix">
                <div class="row">
                    <div class="col-md-4">
                        <!-- #subfooter-left -->
                        <?php if ($page['sub_footer_left']):?>
                        <div class="subfooter-area left">
                        <?php print render($page['sub_footer_left']); ?>
                        </div>
                        <?php endif; ?>
                        <!-- EOF: #subfooter-left -->
                    </div>
                    <div class="col-md-8">
                        <!-- #subfooter-right -->
                        <?php if ($page['footer']):?>
                        <div class="subfooter-area right">
                        <?php print render($page['footer']); ?>
                        </div>
                        <?php endif; ?>
                        <!-- EOF: #subfooter-right -->
                        
                        <?php if (theme_get_setting('credits_display')): ?>
                        <!-- #credits -->  
                        <div class="subfooter-area">
                        <div class="block">
                        <p>Startup Growth Lite is a free theme, contributed to the Drupal Community by <a href="http://www.morethanthemes.com/&mt-referral=startupgrowthlite" target="_blank">More than Themes</a>.</p></div></div>
                        <!-- EOF: #credits -->
                        <?php endif; ?>
                    
                    </div>
                </div>
            </div>
            <!-- EOF: #subfooter-inside -->

        </div>
    </div><!-- EOF:#subfooter -->
    <?php endif; ?>
    
</div>
<!-- EOF:#page-container -->