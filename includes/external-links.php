<?php
function create_external_link_divs($l, $img)
{
  for ($i = 0; $i < count($l); $i++) { ?>
    <div class="image hidden" id="image<?php echo ($i + 1) ?>">
      <a href="<?php echo $l[$i] ?>" target="_blank">
        <img src="<?php echo $img[$i] ?>" />
      </a>
    </div>
<?php }
}

// Change these to automate adding the links & images.
$links = array(
  "https://github.com/TrueshotBarrage",
  "https://www.linkedin.com/in/davidkim2106/",
  "spotify:user:12122202203"
);
$images = array(
  "images/github.png",
  "images/linkedin.png",
  "images/spotify.png"
);
?>

<div class="external-links">
  <?php create_external_link_divs($links, $images); ?>
</div>