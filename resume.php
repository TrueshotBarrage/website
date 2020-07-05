<?php
include("includes/init.php");

$title = "resume";

function work_gen($company, $role, $datestr, $location, $description_array)
{ ?>
  <div class="project-title">
    <span class="bold"><?php echo $company; ?> &#183;</span>
    <?php echo $role; ?>
  </div>
  <div class="subtitle">
    <span class="unset"><?php echo $datestr; ?>&#8192;&#9702;</span>
    &#8192;<?php echo $location; ?>
  </div>
  <ul>
    <?php foreach ($description_array as $description) { ?>
      <li><?php echo $description; ?></li>
    <?php } ?>
  </ul>
  <div class="spaced"></div>
<?php
}
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

    <div class="contents">
      <div class="left-column">
        <div id="education">
          <div class="section-title">Education</div>
          <div id="school"><span class="bold bigger">Cornell University</span>
            <span> &#183; Aug. '18 - May '22</span></div>
          <div>B.S. Computer Science</div>
          <div>B.S. Electrical and Computer Engineering</div>
          <div>GPA: 3.575</div>
        </div>
        <div id="skills">
          <div class="section-title">Skills</div>
          <div class="bold">Programming Languages:</div>
          <div class="subtitle">Proficient with</div>
          <div>Java, Python, JavaScript, PHP, OCaml, Go</div>
          <div class="subtitle">Have experience with</div>
          <div class="spaced">TypeScript, C, Verilog, Ruby, Swift</div>
          <div><span class="bold">Other: </span>Git, Node.js,
            Linux (Ubuntu/WSL), Docker, Swagger, Grafana, ClickHouse</div>
        </div>
        <div id="selected-projects">
          <div class="section-title">Selected Projects</div>
          <div class="project-title">MIDI Visualizer</div>
          MIDI file parser. Synthesizes sound and generates real-time piano
          keypress effects using JavaScript.
          <div class="project-title">Cypria</div>
          Programming language: developed in OCaml, interprets to SQL.
          Headache-proofs complicated queries with functional constructs:
          map and reduce.
          <div class="project-title">Project Tempo</div>
          Algorithm-driven, music-composing Python program that randomly
          generates "good" music.
          <div class="project-title">LED Tetris</div>
          Full LED Tetris game for the Arduino Mega 2560. Organized with a
          finite state machine.
          <div class="project-title">Crawl-o-Bot</div>
          Data scraper in PHP that decides where to crawl using a
          randomized DFS algorithm.
          <div class="project-title">The resume you're looking at</div>
          Completely custom built with lots and lots of CSS grid.
          No satisfaction guarantee with Internet Explorer.
        </div>
      </div>
      <div class="right-column">
        <div id="work-experience">
          <div class="section-title">Relevant Employment</div>
          <div class="project-title">
            <span class="bold">Wasabi Technologies, Inc. &#183;</span>
            SWE Intern
          </div>
          <div class="subtitle">
            <span class="unset">May 2020 - Current&#8192;&#9702;</span>&#8192;Boston, MA
          </div>
          <ul>
            <li>
              Developed Swagger API to generate server backend for company CDR
              data using Go.
            </li>
            <li>
              Generated over twenty time-series charts with CDR data by
              writing optimized ClickHouse SQL queries on Grafana.
            </li>
          </ul>
          <div class="spaced"></div>
          <?php work_gen(
            "Cornell Engineering",
            "TA",
            "Jan. 2019 - Dec. 2019",
            "Ithaca, NY",
            array(
              "ECE 2300 - Digital Logic & Computer Org.",
              "PHYS 1112 - Mechanics & Heat"
            )
          ); ?>
        </div>
        <div id="extracurriculars">
          <div class="section-title">Extracurriculars</div>
        </div>
        <div id="relevant-coursework">
          <div class="section-title">Relevant Coursework</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>