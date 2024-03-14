/**
* Add Javascript - Fixed Header
*/
jQuery(document).ready(function($) {
  var navItemHeight =  $("#main-navigation ul.menu li a").outerHeight() || 0,
  navHeight =  $("#main-navigation").outerHeight() || 0,
  toolbarHeight =  $("#toolbar-administration").outerHeight() || 0,
  headerHeight = $("#header").outerHeight() || 0;
  if ($(".user-logged-in").length > 0) {
    var toolbarHeight = $("#toolbar-administration").outerHeight() || 0;
  } else {
    var toolbarHeight = 0;
  }

  // fix for Chrome
  if (navHeight > navItemHeight*2) {
    headerHeight = headerHeight - navItemHeight;
  };
  $(".logged-in .tabs.primary a, .logged-in .contextual-links a").click(function() {
    $("body").removeClass("onscroll");
    $("#header-container").css("paddingBottom", (0)+"px");
    $("#header").css("top", (0)+"px");
  });
  if(($(window).width() > 767)) {
    $("body").addClass("fixed-header-enabled");
  } else {
    $("body").removeClass("fixed-header-enabled");
  }
  $(window).resize(function() {
    if(($(window).width() > 767)) {
      $("body").addClass("fixed-header-enabled");
    } else {
      $("body").removeClass("fixed-header-enabled");
    }
  });
  $(window).scroll(function() {
    if (!(($(".transparent-header-active").length>0) && ($("#banner #slideshow-fullscreen").length>0))) {
      if (($(this).scrollTop() > 0) && ($(window).width() > 767)) {
        $("body").addClass("onscroll");
        $("#header-container").css("paddingBottom", (headerHeight)+"px");
        if ($("#toolbar-administration").length > 0) {
          var adminHeight = $('body').css('paddingTop');
          $("#header").css("top", adminHeight);
        }
      } else {
        $("body").removeClass("onscroll");
        $("#header-container").css("paddingBottom", (0)+"px");
        $("#header").css("top", (0)+"px");
      }
    } else {
      if (($(this).scrollTop() > 0) && ($(window).width() > 767)) {
        $("body").addClass("onscroll");
        if ($("#toolbar-administration").length > 0) {
          var adminHeight = $('body').css('paddingTop');
          $("#header").css("top", adminHeight);
        }
      } else {
        $("body").removeClass("onscroll");
        $("#header").css("top", (0)+"px");
      }
    };
  });
});