/**
 * CSS3
 *
 * neonCSS  : Front-End Development Framework
 * Copyright (c) SoulChance. (http://www.facebook.com/soulchange)
 *
 * Licensed under The MIT License
 
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) SoulChance. (http://www.facebook.com/soulchange)
 * @link          http://lab.soulchange.com/neoncss
 * @author          SoulChance
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0-alpha
 */
$(document).ready(function(){
/*
**************************
*        Variables        *
**************************
*/



/*------------------*
*       tools       *
*-------------------*/

/*
* modal
*/

$(".modal-content").css({
  "margin":"calc((100vh - "+$(".modal-content").css("height")+") / 2) auto"
});

$(".close-modal").on("click",function(){
  $(".modal").fadeOut();
});
$(".open-modal").on("click",function(){
  $('.modal').fadeIn();
});




/*
* margin-center vh
*/

//marginCenterVH();
function marginCenterVH() {
  $(".mg-center-vh").css({
    "margin":"calc((100vh - "+$(".mg-center-vh").css("height")+") / 2) auto"
  });
}

/*
* header
*/
// var headerWidth = ;

function loadHeaderBtn()
{
  if ($(".header .container")) {
    $(".header .container").append("<a class='btn-menu' href='#'><i class='ti-menu'></i></a>");
  }else {
    $(".header").append("<a class='btn-menu' href='#'><i class='ti-menu'></i></a>");
  }
}

loadHeaderBtn();
loadHeader();
function responsiveHeader()
{
  if ($('body').width() > 767) {
    $(".header .header-menu").slideDown();
    if ($(".btn-menu ti-close")) {
        $(".btn-menu i").addClass("ti-menu").removeClass("ti-close");
    }
  }else {
    if ($(".btn-menu ti-close")) {
        $(".btn-menu i").addClass("ti-menu").removeClass("ti-close");
    }
    $(".header .header-menu").hide();
  }
}
function loadHeader(){
  $(".header .header-menu").css("background-color",$(".header").css("background-color"));
  $(window).resize(function(){
    responsiveHeader();
  });
  responsiveHeader();


  // sticky footer
  if ($(".header").hasClass('fixed-top')) {
  if ($("footer")) {
      $(".content-wrapper").css({
        "min-height":"calc(100vh - "+$('.header').css('height')+" - "+$('footer').css('height')+")",
        "margin-top":$('.header').height()+"px"
      });
    }else {

      $(".content-wrapper").css({
        "min-height":"calc(100vh - "+$('.header').css('height')+")",
        "margin-top":$('.header').height()+"px"
      });
    }
  }else {
      $(".content-wrapper").css({
        "min-height":"calc(100vh - "+$('.header').css('height')+")",
        "margin-top":0
      });
  }
}

$("body").delegate(".header .btn-menu", "click",function(){
  $(".header .header-menu").slideToggle();
  $(".btn-menu i").toggleClass("ti-menu").toggleClass("ti-close");
  return false;
});

/*
**************************
*    browser support     *
**************************
*/


if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  var msViewportStyle = document.createElement('style')
  msViewportStyle.appendChild(
    document.createTextNode(
      '@-ms-viewport{width:auto!important}'
    )
  )
  document.head.appendChild(msViewportStyle)
}
});
