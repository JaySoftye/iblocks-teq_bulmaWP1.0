$(document).ready(function() {

  /* Open up the Hamburger Menu */
  $('.iblocks-navbar-burger').click(function() {
    $('.iblocks-navbar-burger').toggleClass('is-active');
    $('.iblocks-navbar').toggleClass('is-active');
    $('.on-canvas').toggleClass('is-active');
  });

  /* Close that Hamburger Menu */
  $('.main-nav-link').click(function() {
    $('.iblocks-navbar-burger').toggleClass('is-active');
    $('.iblocks-navbar').toggleClass('is-active');
    $('.on-canvas').toggleClass('is-active');
  });

  /* Expand and Collapse content */
  $('.expand-content-container').each( function(i) {

    var expandContent = $(this).find('span.expanded-content');

    $(this).click(function() {
      $(this).toggleClass('expanded');
      expandContent.toggle();
    });

  });

  /* Close Messages */
  $('button.delete').click(function() {
    $(this).parent().remove();
  });

  /* Every time the window is scrolled something will fade into the window */
  $(window).scroll( function() {

    $('.main-section').each( function(i) {

      /* Check the location of each main-section parent element */
      var bottom_of_object = ( $(this).offset().top + $(this).outerHeight() / 2 );
      var bottom_of_window = $(window).scrollTop() + $(window).height();

      if( bottom_of_window >= bottom_of_object ){

        /* Fade in th hidden objects if element is in half view */
        $(this).find('.hidden-object').animate({'opacity':'1'},750);

        /* Find element get the attribut data-target */
        var widthAmount = $(this).find('.background-grow').attr('data-target');
        /* Get the element and animate the width to data-target variable */
        $(this).find('.background-grow').animate({'width': widthAmount + '%'},250);
      }
    });
  });

  /* SVG map functions */

  $(".modal-close").click(function(){
      $(".approval-info").removeClass("is-active");
      $(".modal-content.box").fadeOut(100);
    });
    $(".modal-background").click(function(){
      $(".approval-info").removeClass("is-active");
      $(".modal-content.box").fadeOut(100);
    });

    $(".approval-btn").click(function(){
      var stateInfo = $(this).attr("rel");
        $("#map-legend").slideUp();
        $('#' + stateInfo).addClass("is-active");
        $(".modal-content.box").fadeIn(250);
    });

    /* Loop function for custom text
     * Get children elements of discover
     * Loop through each element fadeIn/fadeOut
     */
    (function() {
      var a = $('.customHtml').children();
      var index = 0;
      run()

      function run() {
        a.filter('.active').fadeOut(1750).removeClass('active');
        a.eq(index).fadeIn(1750).addClass('active');
        index = (index + 1) % a.length; // Wraps around if it hits the end
        setTimeout(run, 3500);
      }
    }) ();

    /* AJAX click function to load category contents
     * Enable Modal Active
     * Empty and Close Modal Contents
     */
    $("svg g.state-select.approval-btn").click(function(){
      var state = $(this).attr('rel');
        $(".iblock-content").load("/category/"+state+"/#content");
        $(".modal").addClass("is-active");
    });

    $("select.state-menu").change(function(){
      var data = $(this).val();
        $(".iblock-content").load(data);
        $(".modal").addClass("is-active");
    });

    $("ul.broad-categories-list li a").click(function(){
      var state = $(this).attr('rel');
        $(".iblock-content").load("/category/"+state+"/#content");
        $("div#iblock-state-modal div.modal-content.iblock-content").addClass("iblock-category-container");
        $(".modal").addClass("is-active iblock-category-content");
    });

    $("select.category-menu").change(function(){
      var data = $(this).val();
        $(".iblock-content").load(data);
        $("div#iblock-state-modal div.modal-content.iblock-content").addClass("iblock-category-container");
        $(".modal").addClass("is-active iblock-category-content");
    });

    $(".modal-background, .modal-close").click(function(){
        $( ".iblock-content" ).empty();
        $("div#iblock-state-modal div.modal-content.iblock-content").removeClass("iblock-category-container");
        $(".modal").removeClass("is-active");
    });

});
