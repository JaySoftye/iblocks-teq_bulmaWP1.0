<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.3
 *
 **/
?>

<section id="primary" class="site-content container-fluid">
  <div class="container">
    <div id="iblock-state-content" class="columns" role="main">


  <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

      <div class="column is-one-third">
        <article class="card iblock-card">
          <div class="card-content">
            <div class="content">
              <h3><?php the_title(); ?></h3>
              <?php the_content(); ?>
            </div>
          </div>
        </article>
      </div>

    <?php endwhile; wp_reset_postdata(); else: ?>
        <article class="card">
          <div class="card-content">
            <div class="content">
              <h3>Coming soon...</h3>
            </div>
          </div>
        </article>
      <?php endif; wp_reset_query(); ?>

      <div class="column section-title">
        <h2><?php single_cat_title(); ?></h2>
      </div>

    </div>
  </div>
</section>

<?php
/***
<section id="primary" class="site-content container-fluid">
  <div class="container">
    <div id="iblock-state-content" class="columns" role="main">

      <?php // The Loop
        if ( have_posts() ) : while ( have_posts() ) : the_post();
      ?>
      <div class="column is-one-third">
        <article class="card iblock-card">
          <div class="card-content">
            <div class="content">
              <h3><?php the_title(); ?></h3>
              <?php the_content(); ?>
            </div>
          </div>
        </article>
      </div>

    <?php endwhile; wp_reset_postdata(); else: ?>
        <article class="card">
          <div class="card-content">
            <div class="content">
              <h3>Coming soon...</h3>
            </div>
          </div>
        </article>
      <?php endif; wp_reset_query(); ?>

      <div class="column section-title">
        <h2><?php single_cat_title(); ?></h2>
      </div>

    </div>
  </div>
</section>
***/
