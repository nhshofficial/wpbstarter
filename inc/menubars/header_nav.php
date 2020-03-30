        <div class="nav-container">
        <?php if ( get_theme_mod( 'fixed_nav_setting' ) === 'yes' ) { ?>
            <nav class="sina-nav mobile-sidebar navbar-fixed" data-top="0">
        <?php } else { ?>
            <nav class="sina-nav mobile-sidebar" data-top="0">
        <?php } ?>
                <div class="container">

                <?php if ( get_theme_mod( 'right_search_setting' ) === 'yes' ) : ?>
                    <div class="search-box">
                        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <span class="search-addon close-search"><i class="fa fa-times"></i></span>
                            <div class="search-input">
                                <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wpbstarter' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'wpbstarter' ); ?>">
                            </div>
                            <span class="search-addon search-icon"><i class="fa fa-search"></i></span>
                        </form>
                    </div><!-- .search-box -->
                <?php endif; ?>
                    <div class="extension-nav">
                        <ul>
                        <?php if ( get_theme_mod( 'right_search_setting' ) === 'yes' ) : ?>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'right_menu_setting' ) === 'yes' ) : ?>
                            <li class="widget-bar-btn"><a href="#"><i class="fa fa-bars"></i></a></li>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'social_icon_setting' ) === 'yes' ) {

                            $wpbstarter_customizer_repeater = get_theme_mod('wpbstarter_customizer_repeater', json_encode( array()) );
                            /*decoding json data*/
                            $customizer_repeater_example_decoded = json_decode($wpbstarter_customizer_repeater);
                              foreach($customizer_repeater_example_decoded as $repeater_item){
                                if(!empty($repeater_item->icon_value && $repeater_item->link)) { 
                        ?>

                            <li class="sicon"><a href="<?php echo esc_url( $repeater_item->link ); ?>"><i class="<?php echo esc_html( $repeater_item->icon_value ); ?>"></i></a></li>

                        <?php 
                                    } //if !empty check
                                } //doreach echek
                            } //if icon is activated
                        ?>
                        </ul>
                    </div><!-- .extension-nav Right Side button-->
                    <?php if ( get_theme_mod( 'social_icon_setting' ) === 'yes' ) { ?>
                        <div class="sina-nav-header social-on">
                    <?php 
                        } else if ( get_theme_mod( 'right_search_setting' ) === 'yes' ) {
                    ?>
                        <div class="sina-nav-header search-on">
                    <?php  
                        } else {
                    ?>
                        <div class="sina-nav-header">
                    <?php  }  ?>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>

                            <?php if ( get_theme_mod( 'wpbstarter_logo' ) ): ?>
                                <a class="sina-brand" href="<?php echo esc_url( home_url( '/' )); ?>">
                                    <img src="<?php echo esc_url(get_theme_mod( 'wpbstarter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php else : ?>
                                <a class="sina-brand" href="<?php echo esc_url( home_url( '/' )); ?>"><h2><?php esc_url(bloginfo('name')); ?></h2><p><?php esc_url(bloginfo('description')); ?></p></a>
                            <?php endif; ?>
                    </div><!-- .sina-nav-header -->

                        <!-- Collect the nav links, forms, and other content for toggling -->

                        <?php
                        wp_nav_menu(array(
                        'theme_location'    => 'primary_menu',
                        'container'       => 'div',
                        'container_id'    => 'navbar-menu', //changes
                        'container_class' => 'collapse navbar-collapse', //changes
                        'menu_id'         => false,
                        'menu_class'      => 'sina-menu '.get_theme_mod('main_menu_setting').'', //changes
                        'depth'           => 4,
                        'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                        'walker'          => new wp_bootstrap_navwalker()
                        ));
                        ?>

                </div> <!-- .container -->

            
            <?php if ( get_theme_mod( 'right_menu_setting' ) === 'yes' ) : ?>
                <!-- Start widget-bar -->
                <div class="widget-bar">
                    <a href="#" class="close-widget-bar"><i class="fa fa-times"></i></a>
                    <div class="widget">
                        <?php
                            wp_nav_menu(array(
                            'theme_location'    => 'right_side_menu',
                            'container'       => 'div',
                            'menu_id'         => false,
                            'menu_class'      => 'link', //changes
                            'depth'           => 2,
                            ));
                        ?>
                    </div>
                </div>
                <!-- End widget-bar -->
            <?php endif; ?>

            </nav> <!-- .navend -->
        </div> <!-- .nav-container -->