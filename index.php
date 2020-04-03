<?php
include("includes/init.php");

$title = "homepage";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>David Kim</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/index.js"></script>
  <!-- Keywords, names, properties go here later -->
</head>

<body>
  <!-- If browser has JS disabled -->
  <noscript>
    <div id="no_javascript_msg">
      <p>
        Uh oh... Looks like JavaScript is disabled for your browser. If you want
        to see the full awesomeness this website contains, consider turning it on!
      </p>
    </div>
  </noscript>

  <!-- Header -->
  <header>
    <?php include("includes/header.php"); ?>
  </header>

  <!-- Navigation bar -->
  <nav>
    <?php include("includes/nav.php"); ?>
  </nav>

  <!-- Contents -->
  <main>
    <div class="main-container">
      <div class="outer">
        <div class="inner" id="inner1">
          <h2>Hi! I'm David Kim, a sophomore at <span class="cornell bold">Cornell University.</span></h2>
        </div>
        <div class="inner" id="inner2">
          <h2>Here, you can learn about my <a href="profile">academic pursuits,</a></h2>
        </div>
        <div class="inner" id="inner3">
          <h2>or see <a href="projects">what gets me going</a> when I wake up in the morning.</h2>
        </div>
      </div>

      <div class="external-links">
        <div class="image" id="image1">
          <img src="images/github.png" />
        </div>
        <div class="image" id="image2">
          <img src="images/linkedin.png" />
        </div>
        <div class="image" id="image3">
          <img src="images/spotify.png" />
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer>
    <?php include("includes/footer.php"); ?>
  </footer>
</body>

</html>