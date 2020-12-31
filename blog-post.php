<?php
include("includes/init.php");

// Used for opening PostgreSQL DB
$db = open_postgresql_db($local = false);

$title = "blog_post";
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
  <link rel="stylesheet" type="text/css" href="css/blog.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="fonts/fonts.css">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
  <?php include("includes/gtm.php"); ?>
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

  <!-- Project navigation bar -->
  <div id="project-nav">
    <?php include("includes/project-nav.php"); ?>
  </div>

  <!-- The main contents -->
  <div class="black-bg">
    <div class="main-container">
      <!-- <script type="module" src="blog.js"></script> -->
      <div id="demo"></div>

      <form id="blog-post-form" action="blog-post.php" method="POST">
        <h2>What's on your mind?</h2>
        <input class="form-input" placeholder="Author" name="author" type="text" value="" size="20" required>
        <input class="form-input" placeholder="Title" name="title" type="text" value="" size="40" required>
        <textarea class="form-input" placeholder="Your post" name="content" cols="45" rows="8" required></textarea>
        <button id="form-submit" type="submit">Post Entry</button>
      </form>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>