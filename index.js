

// script.js
$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
      $('.navbar').removeClass('transparent').addClass('scrolled');
    } else {
      $('.navbar').removeClass('scrolled').addClass('transparent');
    }
  });
// script.js



$(document).ready(function() {
  
    $('#nav').on('show.bs.collapse', function() {
        $('.navbar').removeClass('transparent').addClass('scrolled');
    });

    // masonry 
    var $grid = $('.gallery-wrapper').masonry({
      itemSelector: '.grid-item',
      columnWidth: '.grid-sizer',
      percentPosition: true,
      transitionDuration: 0,
    });

    $grid.imagesLoaded().progress( function() {
      $grid.masonry();
    });
    
    //wow js

    new WOW().init();

    var spinner_selector = '#areanews';

    $.ajax({
        type: 'GET',
        url: 'php/get_ameblo.php',
        dataType: 'text',
        beforeSend: function(xhr, settings ) {
          if ($(spinner_selector).length > 0) {
            $(spinner_selector).LoadingOverlay("show");
          }
        },
        timeout: 30000
    }).fail(function (jqxhr, textstatus) {
    
      console.log("[" + textstatus + "][" + JSON.stringify(jqxhr) + "]");
    
    }).always(function (data) {
      
      $(spinner_selector).LoadingOverlay("hide", true);
    
    }).done(function (data) {
      
      $('#newsdata').html(data);
      //console.log(data);
      
    });

    $.ajax({
      type: 'GET',
      url: 'php/get_message.php',
      dataType: 'json',
      timeout: 30000
    }).fail(function (jqxhr, textstatus) {
    
      console.log("[" + textstatus + "][get_message.php][" + JSON.stringify(jqxhr) + "]");
    
    }).done(function (data) {

      if(data.message.length > 0) {

        $('#messagedata').removeClass('d-none');
        $('#messagedata > p').html(data.message.replace(/\n/g, '<br>'));

      }
      
      //console.log(data);
      
    });

  });
    