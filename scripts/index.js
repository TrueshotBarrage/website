$(document).ready(function () {
  var $nav = $("nav");
  var leftToRight = checkSize();

  // Toggles the nav bar when clicking the nav-intersect icon.
  $("#nav-intersect").click(() => {
    if (leftToRight) {
      $nav.animate({ width: 'toggle' }, 350); // Big screens
    } else {
      $nav.slideToggle(350); // Small screens
    }
  });

  $(window).resize(() => {
    leftToRight = checkSize();
  });
});

// If screen size is 500px or greater, return true
function checkSize() {
  return $("nav").css("--small") != 1;
}