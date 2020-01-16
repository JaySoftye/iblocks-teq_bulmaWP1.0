<?php
/**
 * Hello iBlocks!
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
    <link href="<?php echo get_stylesheet_directory_uri();?>/assets/css/iblocks-teq-style.css" rel="stylesheet" type="text/css">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" rel="stylesheet" type="text/css">
  </head>
  <body <?php body_class(); ?>>
    <nav id="iblocks-navbar-menu" class="navbar iblocks-navbar off-canvas">
      <div class="navbar-brand iblocks-brand">
        <div id="iblocks-menu-icon" class="navbar-burger burger iblocks-navbar-burger" data-target="iblocks-navbar-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="iblocks-menu">
        <?php get_template_part( 'navigation', 'default' ); ?>
     </div>
   </nav>
   <nav id="login">
     <a href="/login/">Login</a>
   </nav>
   <?php if( is_home() ) { ?>
     <div class="vidBackground-container">
       <video class="vidBackground" poster="<?php echo get_template_directory_uri();?>/assets/images/iblocks-teq-mainheader.jpg" playsinline autoplay muted loop></video>
      </div>
      <section class="main-content video on-canvas">
  <?php } elseif ( is_page('Rube Goldberg 5 Hour iBlock') ) { ?>
    <section class="main-content">
  <?php } else { ?>
    <section class="main-content video on-canvas">
  <?php } ?>
