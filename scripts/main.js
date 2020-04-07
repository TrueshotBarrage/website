/**-----------------------------------------------------------
 * name: main.js
 * purpose: jQuery scripts for animations on the website
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
  var closed = true;
  $("#nav-intersect").click(() => {
    // Doesn't use toggle functions directly, because
    // "toggle" always means "hide" when stopped mid-animation
    if (closed) {
      $("nav").stop(true, false).animate({ width: 'show' }, 400);
      $(".contents").addClass("pushed");
      $(".main-container").stop(true, false).fadeTo(400, 0.5);
      closed = false;
    } else {
      $("nav").stop(true, false).animate({ width: 'hide' }, 400);
      $(".contents").removeClass("pushed");
      $(".main-container").stop(true, false).fadeTo(400, 1);
      closed = true;
    }
  });

  /** Index page animation for the n word blocks */
  let i;
  let n = 4;
  for (i = 0; i < n; i++) {
    let text = "#intro-text";
    let $textItem = $(text + String(i + 1));
    setTimeout(() => {
      $textItem.removeClass("hidden").addClass("shown");
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

  /** Rainbowizes all elements with class "rainbow". */
  const elements = document.querySelectorAll('.rainbow');
  Array.from(elements).forEach((e, i) => {
    rainbowize($(e));
  });

  animateProjectLoad();
});

// If screen size is 500px or greater, return true
function checkSize() {
  return $("nav").css("--small") != 1;
}

// Colors your word into a beautiful rainbow. Very !important function.
// You can pass in any element with text, but do keep in mind that it 
// converts your text into a nested span element.
function rainbowize($element) {
  let rainbow = ["#ff4136", "#ff851b", "#ffdc00", "#2ecc40", "#0074d9", "#001f3f", "#b10dc9"];
  text = $element.text();
  $rainbowResult = $("<span class='rainbowized'>"
    + "<!-- Rainbowized by David's script --></span>"); // David wuz here
  for (let i = 0; i < text.length; i++) {
    let $colorfulLetter = $("<span></span>")
      .text(text.charAt(i))
      .attr("style", "color:" + rainbow[i % 7]);
    $rainbowResult.append($colorfulLetter);
  }

  $element.html($rainbowResult);
  // this is preferred, but unfortunately removes other classes
  // $element.replaceWith($rainbowResult); 
}

function animateProjectLoad() {
  for (let i = 0; i < 7; i++) {
    let project = "#p";
    let $projectItem = $(project + String(i + 1));
    setTimeout(() => {
      $projectItem.removeClass("hidden").addClass("shown");
      console.log($projectItem);
    }, (i + 1) * 200);
  }
}