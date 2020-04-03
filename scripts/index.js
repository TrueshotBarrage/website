$(document).ready(function () {
  $nav = $("nav");

  // Toggles the nav bar when clicking the nav-intersect icon.
  $("#nav-intersect").click(() => {
    $nav.animate({ width: 'toggle' }, 350);
  })
});