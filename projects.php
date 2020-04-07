<?php
include("includes/init.php");

$title = "projects";

function create_project_entries($p)
{
  $sizes = array("medium", "small", "big", "small", "big", "medium", "big", "big", "small");
  for ($i = 0; $i < count($p); $i++) { ?>
    <div class="contents hidden project <?php echo $sizes[$i % 9]; ?>" id="p<?php echo ($i + 1); ?>">
      <div class="container">
        <div class="inner-container">
          <h2><?php echo $p[$i]; ?></h2>
        </div>
      </div>
    </div>
<?php }
}

$projects = array(
  "Project Tempo",
  "MIDI Visualizer",
  "LED Tetris",
  "Crawl-o-Bot",
  "StudyBuddy",
  "Sir Mix-A-Lot",
  "GPA Calculator",
);
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
      <div class="projects">
        <?php create_project_entries($projects); ?>
      </div>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>