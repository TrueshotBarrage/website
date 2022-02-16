<?php
include("includes/init.php");

$title = "resume";

function work_gen($company, $opt_link = "", $role, $datestr, $location, $description_array)
{
  $link_provided = $opt_link != "";
?>
  <div class="project-title">
    <<?php echo $link_provided ? "a href=\"" . $opt_link . "\"" : "span"; ?> class="bold">
      <?php echo $company; ?> &#183;
    </<?php echo $link_provided ? "a" : "span"; ?>>
    <span class="smaller"><?php echo $role; ?></span>
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
  <?php include("includes/gtm-head.php"); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords($title) ?> | David Kim</title>
  <!-- Favicon -->
  <?php include("includes/favicon.php"); ?>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/resume.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="fonts/fonts.css">
  <!-- Scripts -->
  <?php include("includes/gtm.php"); ?>
  <!-- Keywords, names, properties go here later -->
</head>

<body>
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
          <img src="images/resume/phone.svg" />(334) 430-7609
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
          <div id="school" class="bold bigger">Cornell University</div>
          <div class="subtitle major-related">
            <span class="unset">Aug. '18 - Dec. '22&#8192;&#9702;</span>
            &#8192;Ithaca, NY
          </div>
          <div>B.S. Computer Science</div>
          <div class="major-related">B.S. Electrical and Computer Engineering</div>
          <div>GPA:</div>
          <div class="major-related smaller">
            <span class="inline">Overall: 3.697</span>
            <span class="inline">CS: 3.949</span>
            <span class="inline">ECE: 3.714</span>
          </div>
          <div class="smaller">- Dean's List FA20 - FA21</div>
          <div class="smaller">- SP22 ELI Undergraduate Research Scholar</div>
        </div>
        <div id="selected-projects">
          <div class="section-title">Selected Projects</div>
          <div class="project-title">
            <a href="midi-visualizer.php">MIDI Visualizer</a>
          </div>
          MIDI file parser. Synthesizes sound and generates real-time piano
          keypress effects using JavaScript.
          <div class="project-title">
            <a href="cypria.php">Cypria</a>
          </div>
          Programming language: developed in OCaml, interprets to SQL.
          Headache-proofs complicated queries with functional constructs:
          map and reduce.
          <div class="project-title">
            <a href="led-tetris.php">LED Tetris</a>
          </div>
          Full LED Tetris game for the Arduino Mega 2560. Organized with a
          finite state machine.
          <div class="project-title">
            <a href="https://github.com/TrueshotBarrage/oscrabbl">OScrabbl</a>
          </div>
          Fully-functional Scrabble game for the command-line interface,
          written in OCaml.
          <div class="project-title">
            <a href="https://thymekeep.com">ThymeKeep</a>
          </div>
          Scheduling app for group events. React frontend topped with Google
          Calendar API + OAuth backend.
          <div class=" project-title">
            <a href="index.php">The resume you're looking at</a>
          </div>
          Completely custom built with lots and lots of CSS grid.
          No satisfaction guarantee with Internet Explorer.
        </div>
        <div id="skills">
          <div class="section-title">Skills</div>
          <div class="bold">Programming Languages:</div>
          <div class="smaller spaced">Java, Python, JavaScript, PHP, OCaml, SQL, C/C++</div>
          <div>
            <div class="bold">Other: </div>
            <span class="smaller">
              Git, Linux, Docker, Node, React, ROS
            </span>
          </div>
        </div>
      </div>
      <div class="right-column">
        <div id="work-experience">
          <div class="section-title">Relevant Employment</div>
          <!-- <div class="project-title">
            <a class="bold" href="https://wasabi.com/">Wasabi Technologies, Inc. &#183;</a>
            <span class="smaller">SWE Intern</span>
          </div>
          <div class="subtitle">
            <span class="unset">May '20 - Aug. '20&#8192;&#9702;</span>&#8192;Boston, MA
          </div>
          <ul>
            <li>
              Scripted Python to export daily MySQL db data into CSV files, and
              utilized AWS S3 services to import data onto different DBMS platforms.
            </li>
          </ul> -->
          <?php
          work_gen(
            "Amazon.com, Inc.",
            "https://amazon.com",
            "SDE Intern",
            "Jun. '21 - Aug. '21",
            "Nashville, TN",
            array(
              // "Created API client to retrieve customer info 
              // and store the data into DynamoDB data lake.",
            )
          );
          work_gen(
            "Amazon Robotics",
            "https://amazonrobotics.com",
            "Firmware Co-op",
            "Jan. '21 - May '21",
            "North Reading, MA",
            array(
              // "Led development of floor detection & removal algorithm for 3D 
              // point cloud data.",
              // "Designed Python script to process camera and radar sensor 
              // capture data to be visualized."
            )
          );
          work_gen(
            "Wasabi Technologies, Inc.",
            "https://wasabi.com/",
            "SWE Intern",
            "May '20 - Aug. '20",
            "Boston, MA",
            array(
              // "Scripted Python to export daily MySQL db data into CSV files, and
              // utilized AWS S3 services to import data onto different DBMS platforms."
            )
          );
          work_gen(
            "Cornell Engineering",
            "",
            "Teaching Assistant",
            "Jan. '19 - Current",
            "Ithaca, NY",
            array(
              "CS 4780: Machine Learning",
              "CS 3110: Functional Programming",
              "ECE 2300: Digital Logic & Computer Org.",
              "ECE 1210: Computing Technology in Smartphones",
              "PHYS 1112: Intro Physics: Mechanics & Heat"
            )
          ); ?>
        </div>
        <div id="extracurriculars">
          <div class="section-title">Extracurriculars</div>
          <?php
          work_gen(
            "EmPRISE Lab",
            "https://emprise.cs.cornell.edu/",
            "Research Assistant",
            "Sept. '21 - Current",
            "Ithaca, NY",
            array(
              "Developed a sensorized & actuated dental mouth model for testing feeding algorithms.",
            )
          );
          work_gen(
            "Cornell Data Science",
            "https://cornelldata.science",
            "Team Lead",
            "Sept. '19 - Current",
            "Ithaca, NY",
            array(
              "Lead and manage the Data Engineering team.",
              "Designed Cypria frontend and 
              <a href='https://www.mycourseindex.com'>MCI</a> backend."
            )
          );
          work_gen(
            "Suh Research Group",
            "https://tsg.ece.cornell.edu/",
            "Research Assistant",
            "May '19 - May '20",
            "Ithaca, NY",
            array(
              "Designed a method to compute partial convolutions of CNNs 
              with PyTorch."
            )
          ); ?>
        </div>
        <div id="relevant-coursework">
          <div class="section-title">Relevant Coursework</div>
          <div class="courses-grid">
            <div class="course-codes">
              <div>CS 4820</div>
              <div>CS 4780</div>
              <div>ECE 4750</div>
              <div>ECE 5725</div>
              <div>ECE 4960</div>
            </div>
            <div class="course-names">
              <div>Theory of Algorithms</div>
              <div>Machine Learning</div>
              <div>Computer Architecture</div>
              <div>Embedded Operating Systems</div>
              <div>Fast Robots</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="bottom-padding"></div>
</body>

</html>