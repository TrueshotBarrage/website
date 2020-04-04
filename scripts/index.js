/**-----------------------------------------------------------
 * name: index.js
 * purpose: jQuery scripts for animations on the main page
 * author: david kim
 * last revised: april 3rd, 2020
 * Copyright 2020 David Kim. All rights reserved.
 -----------------------------------------------------------*/

$(document).ready(function () {
  var $nav = $("nav");
  var leftToRight = checkSize();
  $(window).resize(() => {
    leftToRight = checkSize();
  });

  // Toggles the nav bar when clicking the nav-intersect icon.
  $("#nav-intersect").click(() => {
    if (leftToRight) {
      $nav.animate({ width: 'toggle' }, 350); // Big screens
    } else {
      $nav.slideToggle(350); // Small screens
    }
  });

  let i;
  // Index page animation for the three word blocks
  for (i = 0; i < 4; i++) {
    let inner = "#inner";
    let $innerItem = $(inner + String(i + 1));
    setTimeout(() => {
      $innerItem.removeClass("hidden").addClass("shown");
    }, (i + 1) * 1500);
  }

  // Fades the images in after the word blocks have completed loading
  let $img = $(".external-links");
  setTimeout(() => {
    $img.removeClass("hidden").addClass("shown");
  }, (i + 1) * 1500);
});

// If screen size is 500px or greater, return true
function checkSize() {
  return $("nav").css("--small") != 1;
}