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

  // Index page animation for the three word blocks
  for (let i = 0; i < 3; i++) {
    let inner = "#inner";
    let $innerItem = $(inner + String(i + 1));
    $innerItem.delay(i * 1500).fadeIn(1500);
  }
});

// If screen size is 500px or greater, return true
function checkSize() {
  return $("nav").css("--small") != 1;
}