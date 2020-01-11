var rifeFunctions = (function( $ ) {

  var init = function() {
    slider();
    aos();
    rellaxPar();
    toggleLogo();
    toggleFilter();
    shadowHeader();
  },

    slider = function() {
      $('.ri-slider').slick({
          autoplay: false,
          dots: false,
          infinite: true,
          speed: 200,
          cssEase: 'ease-out',
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: true,
          variableWidth: true,
          swipeToSlide: true,
          swipe: true,
          responsive: [
          {
            breakpoint: 800,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
          },
          ]
      });
  },
  
   aos = function() {
    AOS.init({
      offset: 200,
      duration: 600,
      easing: 'ease-out',
      delay: 100,
      disable: 'mobile'
    })
  },

  rellaxPar = function() {
    var rellax = new Rellax('.rellax');
  },

toggleLogo = function() {
  // Fade out logo when clicking toggle button
  $('.navbar-toggle').click(function(event) {
    $('.ri-logo').toggleClass('fade');
  });
},

toggleFilter = function() {
  $('.filter-toggle').click(function(event) {
    event.preventDefault();
    $('.filter-close').show();
    $('.filter-holder').show();
     event.stopPropagation();

  });

  $('.filter-close').click(function(event) {
    event.preventDefault();
    $('.filter-close').hide();
    $('.filter-holder').hide();
    event.stopPropagation();

  });
},

shadowHeader = function() {
  $(window).scroll(function(){
    if($(window).scrollTop() >= 10 ) {
      $( "body:not(.home) .ri-header " ).addClass('shadowit');
    } 
    else {
      $( "body:not(.home) .ri-header " ).removeClass('shadowit');
    }
  });
};

return {
  init: init
};

})( jQuery );
jQuery( document ).ready(rifeFunctions.init );

  // $("#riheader").headroom();


  jQuery(function($) {
    $(document).on({
      ajaxStart: function() { $('.loady').show();    },
      ajaxStop: function() { $('.loady').hide();  }    
    });
  });
// Declare in global scope.
var rife_load_posts;

jQuery(window).ready(function ($) {

  /**
   * Load more posts as cards via AJAX
   *
   * @param {object} $clicked  jQuery object that triggered rife_load_posts
   */
   rife_load_posts = function ( $clicked ) {
    // Increase initial page value by 1.
    rife_vars.pageNumber++;

    $.ajax({
      type: 'GET',
      url: rife_vars.ajaxurl,
      data: {
        pageNumber: rife_vars.pageNumber,
        action: 'rife_load_posts'
      },

      success: function( json ) {
        if ( json.count > 0 ) {
          var $content = $(json.html);
          $( '.rife-posts' ).append($content).masonry( 'appended', $content );
        }
        if ( json.count >= rife_vars.posts_per_page ) {
          $clicked.removeClass( 'disabled' );
        } else {
            // Once we have no more data, the button can go away.
            $clicked.remove();
          }
        },
        error: function( jqXHR, textStatus, errorThrown ) {
          $( '.grid-item' ).append( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
        }
    }); // ajax call.
  }; // rife_load_posts function.


  /**
   * Get more posts click event.
   */
   $( '#more_posts' ).on( 'click', function( e ) {
    // When btn is pressed.
    e.preventDefault();

    var $btn = $( this );

    // Don't try again until the previous request is complete.
    if ( $btn.hasClass( 'disabled' ) ) {
      return false;
    }

    $btn.addClass( 'disabled' );

    rife_load_posts( $btn );
  }); // #more_posts click event.



}); // document ready.


jQuery(window).ready(function ($) {
      // Filter Category
      $( ".js-category" ).on( "change", function() {
        var category = $( '.js-category' ).val();

        data = {
          'action': 'filterposts',
          'category': category,
        };

        $.ajax({
          url: rife_vars.ajaxurl,
          data: data,
          type: 'POST',
          beforeSend: function ( xhr ) {
            $('.filtered-posts').html( 'Loading...' );
            $('.js-category').attr( 'disabled', 'disabled' );
          },
          success: function( data ) {
            if ( data ) {
              $('.filtered-posts').html( data.posts );

              $('.js-category').removeAttr('disabled');
            } else {
              $('.filtered-posts').html( 'No posts found.' );
            }
          }
        });
      });

}); // document ready.





