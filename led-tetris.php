<?php
include("includes/init.php");

$title = "LED tetris";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("includes/gtm-head.php"); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords($title) ?> | David Kim</title>
  <!-- Favicon -->
  <?php include("includes/favicon.php"); ?>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="fonts/fonts.css">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
  <?php include("includes/gtm.php"); ?>
  <!-- Keywords, names, properties go here later -->
  <!-- Redirect for now -->
  <meta http-equiv="refresh" content="0; url=https://github.com/TrueshotBarrage/led-tetris">
  <script type="text/javascript">
    window.location.href = "https://github.com/TrueshotBarrage/led-tetris"
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
      <a href="https://github.com/TrueshotBarrage/led-tetris">link to my GitHub</a>!
      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>