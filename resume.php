<?php
include("includes/init.php");

$title = "resume";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php //include("includes/gtm-head.php"); 
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords($title) ?> | David Kim</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- CSS -->
  <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
  <link rel="stylesheet" type="text/css" href="css/resume.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/nav-header.css"> -->
  <!-- Scripts -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script> -->
  <!-- <script type="text/javascript" src="scripts/main.js"></script> -->
  <?php //include("includes/gtm.php"); 
  ?>
  <!-- Keywords, names, properties go here later -->
</head>

<body>
  <!-- If browser has JS disabled -->
  <?php //include("includes/noscript.php"); 
  ?>

  <!-- Header -->
  <!-- <header> -->
  <?php //include("includes/header.php"); 
  ?>
  <!-- </header> -->

  <!-- Navigation bar -->
  <!-- <nav> -->
  <?php //include("includes/nav.php"); 
  ?>
  <!-- </nav> -->

  <!-- Project navigation bar -->
  <!-- <div id="project-nav"> -->
  <?php //include("includes/project-nav.php"); 
  ?>
  <!-- </div> -->

  <div class="main-container">
    <div class="heading">
      <div id="name">David Kim</div>
      <div id="contact">
        <a href="mailto:jk2537@cornell.edu">
          <img src="images/resume/mailto.svg" />jk2537@cornell.edu
        </a>
        <a href="http://heydavid.kim">
          <img src="images/resume/chrome.svg" />heydavid.kim
        </a>
        <span>
          <img src="images/resume/phone.svg" />334-430-7609
        </span>
        <br>
        <a href="https://www.linkedin.com/in/davidkim2106/">
          <img src="images/resume/linkedin.svg" />linkedin.com/in/davidkim2106
        </a>
        <a href="https://www.github.com/TrueshotBarrage">
          <img src="images/resume/github.svg" />TrueshotBarrage
        </a>
      </div>
    </div>
  </div>
</body>

</html>