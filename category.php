<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.3
 *
 **/
?>

<script>
$(document).ready(function() {
  $(".card.iblock-card").each(function() {
    $(this).click(function() {
      $(this).find(".card-content.iblocks").slideToggle();
    });
  });
});
</script>

<div id="iblock-state-content" class="columns is-multiline" role="main">

  <h2 class="category-title"><strong><?php single_cat_title(); ?></strong> iBlock Topics</h2>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

      if ( is_category( array('agriculture', 'applied-science', 'arts', 'business', 'energy', 'environment', 'finance', 'health', 'mathematics-and-computer-science', 'transportation') ) ) :

    ?>

      <div class="iblock-category-content column is-full">
        <div class="columns">
          <div class="column is-8">
            <h6 class="iblock-category-title"><?php the_title(); ?></h6>
          </div>
          <div class="column">
            <p class="iblock-category-tags">
              <?php
                $posttags = get_the_tags();
                  if ($posttags) {
                    foreach($posttags as $tag) {
                      echo '<span class="tag is-light">' . $tag->name . '</span>';
                    }
                  }
              ?>
            </p>
          </div>
        </div>
      </div>

      <?php else :
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
      ?>

        <div class="column is-one-third">
          <article class="card iblock-card">
            <div class="card-content">
              <div class="content">
                <h3><?php the_title(); ?></h3>
              </div>
            </div>
            <?php if ( has_post_thumbnail() ) { ?>
                <img src="<?php echo $thumb_url[0]; ?>">
            <?php } ?>
            <div class="card-content iblocks">
              <button class="delete"></button>
              <div class="content">
                <?php the_content(); ?>
                <h6>
                  <?php
                    $posttags = get_the_tags();
                      if ($posttags) {
                        foreach($posttags as $tag) {
                          echo '<span class="tag is-dark">' . $tag->name . '</span> ';
                        }
                      }
                  ?>
                </h6>
              </div>
            </div>
          </article>
        </div>

      <?php endif; endwhile; wp_reset_postdata(); else : ?>

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
