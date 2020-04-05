/**-----------------------------------------------------------
 * name: index.js
 * purpose: jQuery scripts for animations on the main page
 * author: david kim
 * last revised: april 4th, 2020
 * Copyright 2020 David Kim. All rights reserved.
 -----------------------------------------------------------*/

$(document).ready(function () {
  // Not particularly useful atm, since the original idea, with 
  // different nav behavior based on window size, got scrapped.
  var windowIsBig = checkSize();
  $(window).resize(() => {
    windowIsBig = checkSize();
  });

  // Toggles the nav bar when clicking the nav-intersect icon.
  $("#nav-intersect").click(() => {
    $("nav").animate({ width: 'toggle' }, 350); // Big screens
    $(".contents").toggleClass("pushed");
  });

  let i;
  // Index page animation for the n word blocks
  let n = 4;
  for (i = 0; i < n; i++) {
    let inner = "#inner";
    let $innerItem = $(inner + String(i + 1));
    setTimeout(() => {
      $innerItem.removeClass("hidden").addClass("shown");
    }, (i + 1) * 1200);
  }

  // Fades the images in after the word blocks have completed loading, 
  // ordered using imgOrder's contents
  let imgOrder = [1, 3, 2];
  for (let j = 0; j < imgOrder.length; j++) {
    let img = "#image";
    let $imgItem = $(img + String(imgOrder[j]));
    setTimeout(() => {
      $imgItem.removeClass("hidden").addClass("shown");
    }, (i + 1) * 1200 + (j * 200));
  }
});

// If screen size is 500px or greater, return true
function checkSize() {
  return $("nav").css("--small") != 1;
}