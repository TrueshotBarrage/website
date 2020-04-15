<?php
include("includes/init.php");

$title = "projects";

function create_project_entries($p, $l)
{
  $sizes = array("medium", "small", "big", "small", "big", "medium", "big", "small", "medium");
  $colors = array("#E9D2D2", "#ACD9F2", "#E1D4E8", "#FFC09A", "#E2F8BD", "#C8CDF0", "#B1F2EC", "#FFCF99", "#F3EAED");
  for ($i = 0; $i < count($p); $i++) { ?>
    <div class="contents project hidden <?php echo $sizes[$i % 9]; ?>" id="p<?php echo ($i + 1); ?>">
      <div class="container" <?php echo " style=\"background-color:" . $colors[$i % 9] . "\"" ?>>
        <a href="<?php echo $l[$i] ?>">
          <div class="inner-container">
            <h2><?php echo $p[$i]; ?></h2>
            <img data-src="images/projects/p<?php echo ($i + 1); ?>.png" />
          </div>
        </a>
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
$links = array(
  "project-tempo.php",
  "midi-visualizer.php",
  "led-tetris.php",
  "https://github.com/TrueshotBarrage/crawl-o-bot",
  "https://github.com/TrueshotBarrage/studybuddy",
  "sir-mix-a-lot.php",
  "https://docs.google.com/spreadsheets/d/13gFiOqcAMy0oDZBiwmrRTxWc00Ag2eL9FyFD5U3VnsA/",
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
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
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

  <!-- Project navigation bar -->
  <div id="project-nav">
    <?php include("includes/project-nav.php"); ?>
  </div>

  <div class="black-bg">
    <div class="main-container">
      <div class="projects">
        <?php create_project_entries($projects, $links); ?>
      </div>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>