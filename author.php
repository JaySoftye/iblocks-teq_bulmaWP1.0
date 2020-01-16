<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.3
 */
// MUST BE LOGGED IN AS USER TO VIEW THE AUTHOR PAGE

$user = wp_get_current_user();

 if ( !is_user_logged_in() ) {
   global $page_id;
   $login_page = home_url('/login');
     wp_redirect( $login_page . "?login=false" );
       exit;
 } else if ( in_array( 'author', (array) $user->roles ) ) {
 $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
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

  <nav class="navbar columns">
    <div class="navbar-brand column is-8">
      <h1 class="navbar-item navbar-header"><a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php echo $curauth->display_name; ?></a></h1>
    </div>
    <div class="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item search">
          <input class="input" type="text" placeholder="Find an iBlock">
        </div>
        <div class="navbar-item contact">
          <a href="mailto:iblocks@teq.com?subject=iBlock Download Question" title="Contact Us">
            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 viewBox="0 0 80.243 79.92">
            	<path class="white-fill" d="M62.995,35.64c0.018-1.094-0.278-1.906-1.244-2.521c-1.027-0.654-1.956-1.459-2.953-2.161
            		c-0.383-0.27-0.523-0.566-0.519-1.031c0.022-2.271,0.011-4.543,0.008-6.814c0-0.256-0.021-0.511-0.034-0.805
            		c-0.309,0-0.527,0-0.746,0c-3.199,0.002-6.399,0.015-9.598-0.008c-0.361-0.003-0.783-0.118-1.071-0.327
            		c-1.74-1.259-3.45-2.559-5.169-3.847c-0.834-0.624-1.181-0.63-2.023-0.002c-1.624,1.211-3.258,2.41-4.857,3.654
            		c-0.514,0.4-1.029,0.557-1.674,0.549c-2.515-0.032-5.031-0.018-7.547-0.02c-0.798-0.001-1.596,0-2.466,0c0,0.359,0,0.621,0,0.884
            		c0,2.247-0.012,4.494,0.01,6.741c0.004,0.439-0.134,0.707-0.49,0.963c-1.168,0.842-2.299,1.736-3.464,2.582
            		c-0.517,0.376-0.754,0.81-0.754,1.473c0.008,8.695-0.009,17.389-0.019,26.084c-0.001,0.768,0.445,1.225,1.223,1.225
            		c5.373-0.002,10.746-0.014,16.119-0.012c8.646,0.002,17.292,0.01,25.938,0.02c0.893,0.001,1.328-0.431,1.328-1.347
            		c-0.003-5.788-0.005-11.577-0.007-17.365C62.984,40.915,62.951,38.277,62.995,35.64z M58.337,33.568
            		c0.458,0.344,0.827,0.622,1.287,0.968c-0.484,0.3-0.844,0.524-1.287,0.799C58.337,34.722,58.337,34.217,58.337,33.568z
            		 M40.653,20.335c0.806,0.6,1.603,1.192,2.558,1.903c-1.76,0-3.331,0-5.068,0C39.04,21.558,39.825,20.963,40.653,20.335z
            		 M25.449,24.729c10.195,0,20.296,0,30.451,0c0.015,0.227,0.041,0.438,0.041,0.649c0.002,3.639-0.008,7.278,0.011,10.916
            		c0.002,0.428-0.15,0.65-0.496,0.865c-4.766,2.96-9.527,5.929-14.278,8.912c-0.388,0.244-0.658,0.237-1.043-0.005
            		c-4.67-2.928-9.349-5.843-14.037-8.743c-0.461-0.285-0.669-0.584-0.665-1.158C25.464,32.383,25.449,28.6,25.449,24.729z
            		 M23.033,33.553c0,0.636,0,1.186,0,1.84c-0.458-0.289-0.842-0.531-1.324-0.835C22.156,34.218,22.551,33.919,23.033,33.553z
            		 M60.616,58.846c-0.262-0.166-0.455-0.283-0.643-0.409c-3.817-2.547-7.632-5.097-11.453-7.638
            		c-0.703-0.467-1.409-0.349-1.791,0.256c-0.368,0.583-0.192,1.222,0.468,1.7c0.099,0.072,0.198,0.144,0.299,0.212
            		c3.127,2.085,6.255,4.17,9.382,6.256c0.274,0.183,0.54,0.376,0.932,0.649c-11.464,0-22.765,0-34.191,0
            		c0.23-0.178,0.379-0.309,0.543-0.419c3.287-2.198,6.579-4.389,9.86-6.595c0.273-0.183,0.555-0.428,0.698-0.713
            		c0.239-0.473,0.143-0.963-0.275-1.327c-0.464-0.404-0.981-0.413-1.485-0.086c-0.921,0.598-1.83,1.216-2.743,1.825
            		c-2.985,1.992-5.969,3.984-8.954,5.974c-0.12,0.08-0.246,0.15-0.445,0.27c0-7.328,0-14.586,0-21.949
            		c0.237,0.132,0.461,0.244,0.672,0.376c6.068,3.782,12.138,7.56,18.194,11.36c0.695,0.436,1.277,0.417,1.958-0.01
            		c6.015-3.775,12.041-7.532,18.064-11.294c0.264-0.165,0.533-0.322,0.908-0.548C60.616,44.153,60.616,51.431,60.616,58.846z"/>
            	<path class="white-fill" d="M35.916,33.44c0.642,0.067,1.18-0.372,1.271-1.121c0.174-1.428,0.999-2.32,2.311-2.727
            		c1.45-0.449,2.802-0.193,3.93,0.886c1.077,1.03,1.358,3.34-0.803,4.665c-1.627,0.998-2.838,2.254-3.005,4.308
            		c-0.073,0.9,0.168,1.55,0.931,1.665c0.726,0.11,1.283-0.387,1.338-1.273c0.054-0.869,0.433-1.534,1.109-2.048
            		c0.349-0.265,0.715-0.509,1.066-0.773c1.518-1.144,2.482-2.596,2.536-4.742c-0.028-0.23-0.039-0.649-0.136-1.048
            		c-0.748-3.096-4.254-4.919-7.547-3.936c-2.327,0.694-3.972,2.607-4.073,4.735C34.808,32.813,35.231,33.368,35.916,33.44z"/>
            	<path class="white-fill" d="M40.771,43.484c-0.679-0.027-1.228,0.482-1.24,1.148c-0.011,0.636,0.489,1.165,1.125,1.189
            		c0.691,0.027,1.212-0.462,1.224-1.15C41.892,44.01,41.425,43.51,40.771,43.484z"/>
            </svg>
          </a>
        </div>
        <?php if (is_user_logged_in()) : ?>
          <div class="navbar-item logout">
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Logout">
              <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              	 viewBox="0 0 80.243 79.92">
              	<path class="white-fill" d="M48.801,44.079c-1.002,0-1.951,0-2.969,0c0,2.733,0,5.446,0,8.185c-3.582,0-7.094,0-10.637,0
              		c-0.008-0.173-0.021-0.325-0.021-0.477c-0.001-7.418-0.01-14.836,0.011-22.254c0.002-0.862-0.335-1.395-1.071-1.802
              		c-2.282-1.265-4.544-2.566-6.814-3.854c-0.135-0.077-0.267-0.16-0.47-0.282c6.395,0,12.68,0,19.014,0c0,3.533,0,7.033,0,10.552
              		c1.012,0,1.974,0,2.96,0c0.014-0.111,0.036-0.201,0.036-0.292c0-3.865,0.003-7.731-0.008-11.596
              		c-0.003-1.122-0.61-1.695-1.725-1.695c-8.639,0.001-17.278,0.002-25.917,0.001c-1.101,0-1.702,0.606-1.702,1.714
              		c0.002,2.974,0,5.947,0,8.921c0,7.512,0,15.024,0,22.536c0,0.662,0.307,1.125,0.9,1.413c0.294,0.143,0.582,0.302,0.867,0.463
              		c3.861,2.188,7.72,4.381,11.583,6.564c1.165,0.658,2.328-0.028,2.333-1.368c0.006-1.659,0-3.318-0.001-4.977
              		c0-0.167,0-0.333,0-0.538c0.242,0,0.427,0,0.612,0c3.756,0,7.512,0.001,11.268,0c1.21,0,1.782-0.57,1.783-1.783
              		c0.003-2.973,0.001-5.947,0-8.92C48.834,44.425,48.814,44.26,48.801,44.079z"/>
              	<path class="white-fill" d="M61.362,38.23c-1.417-1.029-2.832-2.06-4.25-3.088c-1.228-0.891-2.454-1.783-3.687-2.666
              		c-0.516-0.37-1.11-0.284-1.371,0.212c-0.103,0.196-0.138,0.447-0.141,0.674c-0.013,1.2-0.006,2.401-0.006,3.65
              		c-0.202,0-0.353,0-0.505,0c-2.409,0-4.819,0.003-7.228,0.001c-1.342-0.001-2.328,0.891-2.324,2.111
              		c0.004,1.208,0.965,2.091,2.284,2.092c2.284,0.002,4.569,0.002,6.853,0.003c0.293,0,0.586,0,0.921,0
              		c0,1.219,0.006,2.388-0.003,3.558c-0.004,0.46,0.05,0.881,0.507,1.123c0.469,0.248,0.832,0.013,1.2-0.255
              		c2.578-1.878,5.161-3.751,7.742-5.625C62.167,39.427,62.17,38.817,61.362,38.23z"/>
              </svg>
            </a>
          </div>
        <?php endif;?>
      </div>
    </div>
  </nav>

  <div class="container hero is-fullheight">
    <div class="columns app">
      <div class="column is-multiline iblocks-card-container">

        <div class="iblock card">
          <div class="iblock-card-content">

              <table class="iblock table">
                <tbody>

              <?php

                $args = array( 'post_type' => 'iblocks', 'posts_per_page' => -1, 'order' => 'ASC', 'meta_key' => 'bp-code', 'meta_value' => get_user_meta($user->ID,'CardCode',true) );
                $the_query = new WP_Query( $args );

                  if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();

                      $framework = get_post_meta( $post->ID, 'framework-link', true );
                      $skillsMatrix = get_post_meta( $post->ID, 'skills-matrix-link', true );
                      $studentWorkbook = get_post_meta( $post->ID, 'student-workbook-link', true );
                      $teacherGuide = get_post_meta( $post->ID, 'teachers-guide-link', true );
                      $studentAssessment = get_post_meta( $post->ID, 'student-assessment-link', true );
                      $rubric = get_post_meta( $post->ID, 'rubric-link', true );
                      $lessonPlan = get_post_meta( $post->ID, 'lesson-plan-link', true );

                  ?>

                  <tr class="iblock-table-title">
                    <th class="<?php echo get_post_meta( $post->ID, 'custom_element_grid_class_meta_box', true ); ?>"><?php echo get_post_meta( $post->ID, 'bp-code', true ); ?></th>
                    <th><?php echo get_post_meta( $post->ID, 'custom_element_grid_class_meta_box', true ); ?></th>
                    <td><?php the_title(); ?></td>
                    <td></td>
                  </tr>
                <?php if( !empty($framework) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $framework; ?>/<?php echo $user->ID; ?>">Framework</a></td>
                    <td><a href="<?php echo $framework; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($skillsMatrix) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $skillsMatrix; ?>/<?php echo $user->ID; ?>">Skills Matrix</a></td>
                    <td><a href="<?php echo $skillsMatrix; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($studentWorkbook) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $studentWorkbook; ?>/<?php echo $user->ID; ?>">Student Workbook</a></td>
                    <td><a href="<?php echo $studentWorkbook; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($teacherGuide) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $teacherGuide; ?>/<?php echo $user->ID; ?>">Teacher Guide</a></td>
                    <td><a href="<?php echo $teacherGuide; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($studentAssessment) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $studentAssessment; ?>">Student Assessment</a></td>
                    <td><a href="<?php echo $studentAssessment; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($rubric) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $rubric; ?>/<?php echo $user->ID; ?>">Rubric</a></td>
                    <td><a href="<?php echo $rubric; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($lessonPlan) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $lessonPlan; ?>/<?php echo $user->ID; ?>">Lesson Plan</a></td>
                    <td><a href="<?php echo $lessonPlan; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                  <?php } endwhile; wp_reset_postdata(); else:  ?>

                    <tr class="iblock-table-title">
                      <th>-</th>
                      <th></th>
                      <td><?php _e( 'Sorry, no iblocks available.' ); ?></td>
                      <td></td>
                    </tr>

                  <?php endif; ?>

                </tbody>
              </table>

          </div>
        </div>

        <p class="footer-text"><small>Teq®, It’s all about learning.TM,  iBlocks TM, evoSpaces TM, pBlocks TM, Teq Essentials®, nOw Instructional Support®, OPD Online Professional Development®, Onsite Professional Development®, and Powered by Teq® are trademarks or registered trademarks of Tequipment, Inc. in the US. Other company names and product names appearing here are the trademarks and registered trademarks of their respective companies.</small></p>

      </div>
    </div>
  </div>

<?php
} else if ( in_array( 'administrator', (array) $user->roles ) ) {
  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
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

   <nav class="navbar columns">
     <div class="navbar-brand column is-8">
       <h1 class="navbar-item navbar-header"><a href="<?php echo wp_logout_url(get_permalink()); ?>"><?php echo $curauth->display_name; ?></a></h1>
     </div>
     <div class="navbar-menu">
       <div class="navbar-end">
         <div class="navbar-item search">
           <input class="input" type="text" placeholder="Find an iBlock">
         </div>
         <div class="navbar-item contact">
           <a href="mailto:iblocks@teq.com?subject=iBlock Download Question" title="Contact Us">
             <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             	 viewBox="0 0 80.243 79.92">
             	<path class="white-fill" d="M62.995,35.64c0.018-1.094-0.278-1.906-1.244-2.521c-1.027-0.654-1.956-1.459-2.953-2.161
             		c-0.383-0.27-0.523-0.566-0.519-1.031c0.022-2.271,0.011-4.543,0.008-6.814c0-0.256-0.021-0.511-0.034-0.805
             		c-0.309,0-0.527,0-0.746,0c-3.199,0.002-6.399,0.015-9.598-0.008c-0.361-0.003-0.783-0.118-1.071-0.327
             		c-1.74-1.259-3.45-2.559-5.169-3.847c-0.834-0.624-1.181-0.63-2.023-0.002c-1.624,1.211-3.258,2.41-4.857,3.654
             		c-0.514,0.4-1.029,0.557-1.674,0.549c-2.515-0.032-5.031-0.018-7.547-0.02c-0.798-0.001-1.596,0-2.466,0c0,0.359,0,0.621,0,0.884
             		c0,2.247-0.012,4.494,0.01,6.741c0.004,0.439-0.134,0.707-0.49,0.963c-1.168,0.842-2.299,1.736-3.464,2.582
             		c-0.517,0.376-0.754,0.81-0.754,1.473c0.008,8.695-0.009,17.389-0.019,26.084c-0.001,0.768,0.445,1.225,1.223,1.225
             		c5.373-0.002,10.746-0.014,16.119-0.012c8.646,0.002,17.292,0.01,25.938,0.02c0.893,0.001,1.328-0.431,1.328-1.347
             		c-0.003-5.788-0.005-11.577-0.007-17.365C62.984,40.915,62.951,38.277,62.995,35.64z M58.337,33.568
             		c0.458,0.344,0.827,0.622,1.287,0.968c-0.484,0.3-0.844,0.524-1.287,0.799C58.337,34.722,58.337,34.217,58.337,33.568z
             		 M40.653,20.335c0.806,0.6,1.603,1.192,2.558,1.903c-1.76,0-3.331,0-5.068,0C39.04,21.558,39.825,20.963,40.653,20.335z
             		 M25.449,24.729c10.195,0,20.296,0,30.451,0c0.015,0.227,0.041,0.438,0.041,0.649c0.002,3.639-0.008,7.278,0.011,10.916
             		c0.002,0.428-0.15,0.65-0.496,0.865c-4.766,2.96-9.527,5.929-14.278,8.912c-0.388,0.244-0.658,0.237-1.043-0.005
             		c-4.67-2.928-9.349-5.843-14.037-8.743c-0.461-0.285-0.669-0.584-0.665-1.158C25.464,32.383,25.449,28.6,25.449,24.729z
             		 M23.033,33.553c0,0.636,0,1.186,0,1.84c-0.458-0.289-0.842-0.531-1.324-0.835C22.156,34.218,22.551,33.919,23.033,33.553z
             		 M60.616,58.846c-0.262-0.166-0.455-0.283-0.643-0.409c-3.817-2.547-7.632-5.097-11.453-7.638
             		c-0.703-0.467-1.409-0.349-1.791,0.256c-0.368,0.583-0.192,1.222,0.468,1.7c0.099,0.072,0.198,0.144,0.299,0.212
             		c3.127,2.085,6.255,4.17,9.382,6.256c0.274,0.183,0.54,0.376,0.932,0.649c-11.464,0-22.765,0-34.191,0
             		c0.23-0.178,0.379-0.309,0.543-0.419c3.287-2.198,6.579-4.389,9.86-6.595c0.273-0.183,0.555-0.428,0.698-0.713
             		c0.239-0.473,0.143-0.963-0.275-1.327c-0.464-0.404-0.981-0.413-1.485-0.086c-0.921,0.598-1.83,1.216-2.743,1.825
             		c-2.985,1.992-5.969,3.984-8.954,5.974c-0.12,0.08-0.246,0.15-0.445,0.27c0-7.328,0-14.586,0-21.949
             		c0.237,0.132,0.461,0.244,0.672,0.376c6.068,3.782,12.138,7.56,18.194,11.36c0.695,0.436,1.277,0.417,1.958-0.01
             		c6.015-3.775,12.041-7.532,18.064-11.294c0.264-0.165,0.533-0.322,0.908-0.548C60.616,44.153,60.616,51.431,60.616,58.846z"/>
             	<path class="white-fill" d="M35.916,33.44c0.642,0.067,1.18-0.372,1.271-1.121c0.174-1.428,0.999-2.32,2.311-2.727
             		c1.45-0.449,2.802-0.193,3.93,0.886c1.077,1.03,1.358,3.34-0.803,4.665c-1.627,0.998-2.838,2.254-3.005,4.308
             		c-0.073,0.9,0.168,1.55,0.931,1.665c0.726,0.11,1.283-0.387,1.338-1.273c0.054-0.869,0.433-1.534,1.109-2.048
             		c0.349-0.265,0.715-0.509,1.066-0.773c1.518-1.144,2.482-2.596,2.536-4.742c-0.028-0.23-0.039-0.649-0.136-1.048
             		c-0.748-3.096-4.254-4.919-7.547-3.936c-2.327,0.694-3.972,2.607-4.073,4.735C34.808,32.813,35.231,33.368,35.916,33.44z"/>
             	<path class="white-fill" d="M40.771,43.484c-0.679-0.027-1.228,0.482-1.24,1.148c-0.011,0.636,0.489,1.165,1.125,1.189
             		c0.691,0.027,1.212-0.462,1.224-1.15C41.892,44.01,41.425,43.51,40.771,43.484z"/>
             </svg>
           </a>
         </div>
         <?php if (is_user_logged_in()) : ?>
           <div class="navbar-item logout">
             <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Logout">
               <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               	 viewBox="0 0 80.243 79.92">
               	<path class="white-fill" d="M48.801,44.079c-1.002,0-1.951,0-2.969,0c0,2.733,0,5.446,0,8.185c-3.582,0-7.094,0-10.637,0
               		c-0.008-0.173-0.021-0.325-0.021-0.477c-0.001-7.418-0.01-14.836,0.011-22.254c0.002-0.862-0.335-1.395-1.071-1.802
               		c-2.282-1.265-4.544-2.566-6.814-3.854c-0.135-0.077-0.267-0.16-0.47-0.282c6.395,0,12.68,0,19.014,0c0,3.533,0,7.033,0,10.552
               		c1.012,0,1.974,0,2.96,0c0.014-0.111,0.036-0.201,0.036-0.292c0-3.865,0.003-7.731-0.008-11.596
               		c-0.003-1.122-0.61-1.695-1.725-1.695c-8.639,0.001-17.278,0.002-25.917,0.001c-1.101,0-1.702,0.606-1.702,1.714
               		c0.002,2.974,0,5.947,0,8.921c0,7.512,0,15.024,0,22.536c0,0.662,0.307,1.125,0.9,1.413c0.294,0.143,0.582,0.302,0.867,0.463
               		c3.861,2.188,7.72,4.381,11.583,6.564c1.165,0.658,2.328-0.028,2.333-1.368c0.006-1.659,0-3.318-0.001-4.977
               		c0-0.167,0-0.333,0-0.538c0.242,0,0.427,0,0.612,0c3.756,0,7.512,0.001,11.268,0c1.21,0,1.782-0.57,1.783-1.783
               		c0.003-2.973,0.001-5.947,0-8.92C48.834,44.425,48.814,44.26,48.801,44.079z"/>
               	<path class="white-fill" d="M61.362,38.23c-1.417-1.029-2.832-2.06-4.25-3.088c-1.228-0.891-2.454-1.783-3.687-2.666
               		c-0.516-0.37-1.11-0.284-1.371,0.212c-0.103,0.196-0.138,0.447-0.141,0.674c-0.013,1.2-0.006,2.401-0.006,3.65
               		c-0.202,0-0.353,0-0.505,0c-2.409,0-4.819,0.003-7.228,0.001c-1.342-0.001-2.328,0.891-2.324,2.111
               		c0.004,1.208,0.965,2.091,2.284,2.092c2.284,0.002,4.569,0.002,6.853,0.003c0.293,0,0.586,0,0.921,0
               		c0,1.219,0.006,2.388-0.003,3.558c-0.004,0.46,0.05,0.881,0.507,1.123c0.469,0.248,0.832,0.013,1.2-0.255
               		c2.578-1.878,5.161-3.751,7.742-5.625C62.167,39.427,62.17,38.817,61.362,38.23z"/>
               </svg>
             </a>
           </div>
         <?php endif;?>
       </div>
     </div>
   </nav>

   <div class="container hero is-fullheight">

     <div class="columns app">
       <div class="column is-multiline iblocks-card-container">

         <div class="iblock card">
           <div class="iblock-card-content">

             <table class="iblock table">
               <tbody>

             <?php
               $args = array( 'post_type' => 'iblocks', 'posts_per_page' => -1, 'order' => 'ASC' );
               $the_query = new WP_Query( $args );

                 if ( $the_query->have_posts() ) :
                   while ( $the_query->have_posts() ) : $the_query->the_post();

                     $framework = get_post_meta( $post->ID, 'framework-link', true );
                     $skillsMatrix = get_post_meta( $post->ID, 'skills-matrix-link', true );
                     $studentWorkbook = get_post_meta( $post->ID, 'student-workbook-link', true );
                     $teacherGuide = get_post_meta( $post->ID, 'teachers-guide-link', true );
                     $studentAssessment = get_post_meta( $post->ID, 'student-assessment-link', true );
                     $rubric = get_post_meta( $post->ID, 'rubric-link', true );
                     $lessonPlan = get_post_meta( $post->ID, 'lesson-plan-link', true );

                 ?>

                 <tr class="iblock-table-title">
                   <th class="<?php echo get_post_meta( $post->ID, 'custom_element_grid_class_meta_box', true ); ?>"><?php echo get_post_meta( $post->ID, 'bp-code', true ); ?></th>
                   <th><?php echo get_post_meta( $post->ID, 'custom_element_grid_class_meta_box', true ); ?></th>
                   <td><?php the_title(); ?></td>
                   <td></td>
                 </tr>
                <?php if( !empty($framework) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $framework; ?>/<?php echo $user->ID; ?>">Framework</a></td>
                    <td><a href="<?php echo $framework; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($skillsMatrix) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $skillsMatrix; ?>/<?php echo $user->ID; ?>">Skills Matrix</a></td>
                    <td><a href="<?php echo $skillsMatrix; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($studentWorkbook) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $studentWorkbook; ?>/<?php echo $user->ID; ?>">Student Workbook</a></td>
                    <td><a href="<?php echo $studentWorkbook; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($teacherGuide) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $teacherGuide; ?>/<?php echo $user->ID; ?>">Teacher Guide</a></td>
                    <td><a href="<?php echo $teacherGuide; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($studentAssessment) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $studentAssessment; ?>">Student Assessment</a></td>
                    <td><a href="<?php echo $studentAssessment; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($rubric) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $rubric; ?>/<?php echo $user->ID; ?>">Rubric</a></td>
                    <td><a href="<?php echo $rubric; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                <?php } if( !empty($lessonPlan) ) { ?>
                  <tr>
                    <th></th>
                    <th></th>
                    <td><a href="<?php echo $lessonPlan; ?>/<?php echo $user->ID; ?>">Lesson Plan</a></td>
                    <td><a href="<?php echo $lessonPlan; ?>/<?php echo $user->ID; ?>">Download</a></td>
                  </tr>
                  <?php } endwhile; wp_reset_postdata(); else:  ?>

                   <tr class="iblock-table-title">
                     <th>-</th>
                     <th></th>
                     <td><?php _e( 'Sorry, no iblocks available.' ); ?></td>
                     <td></td>
                   </tr>

                 <?php endif; ?>

               </tbody>
             </table>

           </div>
         </div>

         <p class="footer-text"><small>Teq®, It’s all about learning.TM,  iBlocks TM, evoSpaces TM, pBlocks TM, Teq Essentials®, nOw Instructional Support®, OPD Online Professional Development®, Onsite Professional Development®, and Powered by Teq® are trademarks or registered trademarks of Tequipment, Inc. in the US. Other company names and product names appearing here are the trademarks and registered trademarks of their respective companies.</small></p>

       </div>
     </div>
   </div>

 <?php
   } else {
    global $page_id;
    $login_page = home_url('/login');
      wp_redirect( $login_page . "?login=false" );
        exit;
  }
  wp_footer();
?>

  </body>
</html>
