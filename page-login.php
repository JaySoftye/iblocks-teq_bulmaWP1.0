<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.3
 */
 ?>
 <!DOCTYPE html>
  <html <?php language_attributes(); ?>>
    <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
      <?php wp_head(); ?>
      <!-- Custom CSS -->
      <link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/iblock-download.css" rel="stylesheet" type="text/css">
      <!-- Roboto -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet" type="text/css">
    </head>
    <body <?php body_class(); ?>>

      <div class="outer">
        <div class="middle">
          <div class="inner">
            <h1><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/iblocks-teq-logo_transparent.png" alt="iBlocks" /></a></h1>
            <div class=”wp_login_form”>
              <?php

                $page_showing = basename($_SERVER['REQUEST_URI']);

                if (strpos($page_showing, 'failed') !== false) {
                  echo '<div class="block"><span class="tag is-danger error-msg">Invalid Username and/or Password! <button class="delete"></button></span></div>';
                } elseif (strpos($page_showing, 'blank') !== false ) {
                  echo '<div class="block"><span class="tag is-danger error-msg">Username and/or Password is empty.<button class="delete"></button></span></div>';
                } elseif (strpos($page_showing, 'false') !== false ) {
                  echo '<div class="block"><span class="tag is-danger error-msg">You are logged out.<button class="delete"></button></span></div>';
                }

                $args = array(
                  'redirect' => home_url(),
                  'id_username' => 'user',
                  'id_password' => 'pass',
                );

                wp_login_form( $args );
              ?>
            </div>
          </div>
          <div class="footer">
            <p><a href="https://www.teq.com/">teq.com</a>  |  <a href="https://otis.teq.com/">otispd.com</a>  |  <a href="https://iblocks.teq.com/">iblocks.teq.com</a>  |  877.455.9369</p>
          </div>
        </div>
      </div>
    <?php wp_footer(); ?>
    </body>
</html>
