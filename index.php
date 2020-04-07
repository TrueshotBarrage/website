<?php
include("includes/init.php");

$title = "homepage";
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
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/projects.css">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
  <!-- Keywords, names, properties go here later -->
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

  <div class="black-bg">
    <!-- Separates the main content and the projects section. -->
    <div class="main-and-projects-wrapper-grid">
      <!-- The main contents: greeting, intro texts, ext. links, and footer -->
      <div class="main-container">
        <div class="contents greeting hidden" id="intro-text1">
          <h2>Hello</h2>
        </div>
        <div class="contents intro-texts">
          <div class="intro-text hidden" id="intro-text2">
            <h2>I'm David Kim, a sophomore at <span class="cornell bold">Cornell University.</span></h2>
          </div>
          <div class="intro-text hidden" id="intro-text3">
            <h2>Here, you can learn about my <a href="profile.php">academic pursuits,</a></h2>
          </div>
          <div class="intro-text hidden" id="intro-text4">
            <h2>or see <a href="projects.php">what gets me going</a> when I wake up in the morning.</h2>
          </div>
        </div>

        <!-- Links to GitHub, LinkedIn, and Spotify profiles -->
        <?php include("includes/external-links.php"); ?>

        <!-- Footer -->
        <footer>
          <?php include("includes/footer.php"); ?>
        </footer>
      </div>
      <!-- Projects -->
      <?php include("includes/projects.php"); ?>
    </div>

  </div>
</body>

</html>