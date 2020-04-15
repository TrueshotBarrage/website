<?php
include("includes/init.php");

$title = "MIDI visualizer";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords($title) ?> | David Kim</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
  <!-- Keywords, names, properties go here later -->
  <!-- Redirect for now -->
  <meta http-equiv="refresh" content="0; url=https://github.com/TrueshotBarrage/midi-visualizer">
  <script type="text/javascript">
    window.location.href = "https://github.com/TrueshotBarrage/midi-visualizer"
  </script>
</head>

<body>
  <!-- If browser has JS disabled -->
  <?php include("includes/noscript.php"); ?>

  <!-- Header -->
  <header>
    <?php include("includes/header.php"); ?>
  </header>

  <!-- Navigation bar -->
  <nav>
    <?php include("includes/nav.php"); ?>
  </nav>

  <!-- Project navigation bar -->
  <div id="project-nav">
    <?php include("includes/project-nav.php"); ?>
  </div>

  <div class="black-bg">
    <!-- The main contents: greeting, intro texts, ext. links, and footer -->
    <div class="main-container">

      If you are not redirected automatically, follow this
      <a href="https://github.com/TrueshotBarrage/midi-visualizer">link to my GitHub</a>!
      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>