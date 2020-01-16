<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.3
 */
?>

<div id="iblock-state-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-content iblock-content container"></div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<header class="topics-map-header">
  <div class="container">
    <div class="columns padding-top">
      <div class="column is-two-fifths"></div>
      <div class="column padding">
        <h1 class="level-item"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/iblocks-topics-map-text.png" alt="iBlocks Topics Map" /></a></h1>
      </div>
    </div>
  </div>
</header>

<div class="section topics-map padding-bottom">
  <div class="container padding-bottom">
    <div class="columns">
      <div class="column content nopadding padding-bottom">
        <?php while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
    <div class="columns">
      <div class="column is-3 nopadding">
        <h2 class="is-size-5"><strong>Search by<br />Categories:</strong></h2>
        <div class="mobile-nav">
          <select class="state-select state-menu">
            <option value="" selected="selected">select your state</option>
            <?php   $args = array(
                'orderby' => 'name',
                'parent' => 0,
                "exclude"   => 121,
              );
              $categories = get_categories( $args );

                foreach ( $categories as $category ) { ?>
                  <option value="<?php echo get_category_link( $category->term_id ); ?>"><?php echo get_cat_name( $category->term_id ); ?></option>
                <?php  } ?>
          </select>
        </div>
      </div>
      <div class="column nopadding">
        <h2 class="is-size-5"><strong>Search by State:</strong></h2>
        <div class="mobile-nav">
          <select class="state-select category-menu">
            <option value="" selected="selected">select your category</option>
            <?php   $args = array(
                'orderby' => 'name',
                'parent' => 121,
              );
              $categories = get_categories( $args );

                foreach ( $categories as $category ) { ?>
                  <option value="<?php echo get_category_link( $category->term_id ); ?>"><?php echo get_cat_name( $category->term_id ); ?></option>
                <?php  } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="columns" id="desktopusmap">
      <div class="column content broad-categories">
        <ul class="broad-categories-list">
          <?php $args = array(
            'orderby' => 'name',
            'parent' => 121,
          );
          $categories = get_categories( $args );
          foreach ( $categories as $category ) {
          ?>
            <li><a class="is-size-6" rel="<?php echo get_category_link( $category->term_id ); ?>"><?php echo get_cat_name( $category->term_id ); ?></a></li>
          <?php  } ?>
        </ul>
      </div>
      <div id="map-container" class="column content is-full">
        <?php include( get_template_directory() . '/inc/svg-states.php'); ?>
        <?php include( get_template_directory() . '/inc/svg-map.php'); ?>
      </div>
    </div>
    <nav id="mobileusmap" class="columns panel"></nav>

  </div>
</div>
