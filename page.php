  <?php
  /**
   * @package bulmawp
   * @since 0.1
   * @version 0.3
   */
// IS THIS THE iBlock Unlimited License Agreement PAGE?
    if ( is_page('iBlock End-User License Agreement (EULA)') && is_user_logged_in() ) {

      if ( isset($_POST['ula-agreement']) && ($_POST['submitted']) ) {

        $current_user = wp_get_current_user();
        $current_user_id = $current_user->ID;

        $new_user = new WP_User( $current_user_id );
        $new_user->remove_role( 'contributor' );
        $new_user->add_role( 'author' );

        wp_redirect( site_url('/author/' . $current_user->user_login) );
          exit;

      } else if ( !isset($_POST['ula-agreement']) && ($_POST['submitted']) ) {

        $ulaError = '<p><span class="tag is-danger is-large">You forgot to check off the agreement<button class="delete"></button></span></p>';

      }

      get_header();
// MUST LOGGED IN TO SEE THE iBlock Unlimited License Agreement PAGE
    } else if ( is_page('iBlock End-User License Agreement (EULA)') && !is_user_logged_in() ) {
       global $page_id;
       $login_page = home_url('/login');
         wp_redirect( $login_page . "?login=false" );
           exit;
    } else {
// IF NOT THE iBlock Unlimited License Agreement PAGE TREAT AS NORMAL PAGE TEMPLATE
      get_header();
    }

    if ( is_page('Topics Map') ) {
      include( get_template_directory() . '/inc/topics-map.php');
      } elseif ( is_page('Sample Collateral') ) {
          include( get_template_directory() . '/inc/sample-collateral.php');
        } elseif ( is_page('iBlock End-User License Agreement (EULA)') ) {
            include( get_template_directory() . '/inc/ula.php');
          } elseif ( is_page('login') ) {
              include( get_template_directory() . '/page-login.php');
        } else { 

        if( have_posts() ) : while( have_posts() ) : the_post();

            the_content();

        endwhile; endif; } ?>

  <?php get_footer(); ?>
