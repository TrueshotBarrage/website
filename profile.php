<?php
include("includes/init.php");

$title = "about me";
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
  <link rel="stylesheet" type="text/css" href="css/profile.css">
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
      <!-- About me section -->
      <div class="about-me contents">
        <div class="container triple-grid">
          <div class="bold" id="about-me-title">
            <h2>Hello!</h2>
          </div>
          <div id="about-me-photo">
            <img src="images/aboutme.jpg" alt="Photo of David" />
          </div>
          <div id="about-me-text">
            <p>I'm David Kim, a sophomore studying Computer Science and Electrical
              and Computer Engineering at <span class="cornell bold">Cornell University</span>.</p><br>
            <p>At Cornell, I take
              pride in being a member of <span class="bold">Cornell Data Science</span>, a competitive project
              team whose focus is on pushing out really cool data-driven solutions
              to unique problems.</p><br>
            <p>I am also involved in research in the <span class="bold">Suh Research
                Group</span>, where I work on developing algorithms for efficient and secure
              memory accesses for CNN (convolutional neural network) accelerators.</p><br>
            <p>I love teaching! In the past, I have TA'd <span class="ital">ECE 2300</span> (digital
              logic) and <span class="ital">PHYS 1112</span> (intro mechanics).</p><br>
            <p>In my free time, I like to bike around campus, practice piano or
              guitar, and play board games or RPGs with friends. I am also a
              huge Star Wars nerd.</p>
          </div>
        </div>
      </div>

      <!-- Resume section -->
      <div class="resume contents">
        <?php include("includes/resume.php"); ?>
      </div>

      <!-- Courses section -->
      <div class="courses contents">
        <?php include("includes/courses.php"); ?>
      </div>

      <!-- Skills section -->
      <div class="skills contents">
        <div class="container" id="skills-container">
          <div class="bold">
            <h2>Skills</h2>
          </div>
          <div class="dual-grid">
            <div class="skills-label">
              Languages
            </div>
            <p class="skills-text">
              Java &bull; Python &bull; JavaScript &bull; TypeScript &bull; PHP
              &bull; SQL &bull; HTML/CSS &bull; C/C++ &bull; OCaml &bull; Swift
            </p>
          </div>
          <br>
          <div class="dual-grid">
            <div class="skills-label">
              Frameworks & Envs
            </div>
            <p class="skills-text">
              Git &bull; Node &bull; d3.js &bull; CLI &bull; VSCode
            </p>
          </div>
          <br>
          <div class="dual-grid">
            <div class="skills-label">
              Miscellaneous
            </div>
            <p class="skills-text">
              Frontend Development &bull; Communication &bull; Leadership &bull;
              Teaching &bull; YouTube Content Creation &bull; Board Game Mastermind
            </p>
          </div>
        </div>
      </div>

      <!-- Contact section -->
      <div class="contact contents">
        <div class="container">
          <div class="contact-entry dual-grid">
            <div class="bold" id="contact-type">
              <h2>Address</h2>
            </div>
            <div id="contact-info">
              <span class="bold">School</span><br>
              451 Hans Bethe House<br>
              Ithaca, NY 14853<br>
              United States of America
            </div>
          </div>
          <div class="contact-entry dual-grid">
            <div class="bold" id="contact-type">
              <h2>Emails</h2>
              <p>Please, no<span class="rainbow ital"> spam</span> emails!</p>
            </div>
            <div id="contact-info">
              <span class="bold">School</span><br>
              jk2537 (at) cornell (dot) edu<br><br>
              <span class="bold">Personal</span> - business inquiries only<br>
              heydavidkim7 (at) gmail (dot) com
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>