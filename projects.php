<?php
include("includes/init.php");

$title = "projects";
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
  <link rel="stylesheet" type="text/css" href="css/projects.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
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
    <div class="main-container">
      <!-- Coming soon! -->
      <div class="coming-soon contents">
        <h2>Projects section coming soon! Currently redesigning the entire
          website, so hang tight during this COVID-19 season. Good things are coming.</h2>
      </div>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>

  <!-- Google Firebase setup -->
  <?php include("includes/firebase.php"); ?>
</body>

</html>