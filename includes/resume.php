<?php

// Automates creating an entry without all the html hassle/confusion.
function create_entries($dates, $desc)
{
  for ($i = 0; $i < count($dates); $i++) { ?>
    <div class="resume-entries" id="rentry<?php echo ($i + 1); ?>">
      <div class="resume-dates" id="date<?php echo ($i + 1); ?>">
        <?php echo $dates[$i]; ?>
      </div>
      <div class="resume-descriptions" id="desc<?php echo ($i + 1); ?>">
        <?php echo $desc[$i]; ?>
      </div>
    </div>
<?php
  }
}

$dates = array(
  "Aug 2018",
  "Oct 2018",
  "Jan 2019",
  "Mar 2019",
  "Apr 2019",
  "May 2019",
  "Aug 2019",
  "Sept 2019",
  "Dec 2019",
  "Mar 2020",
  "Apr 2020"
);
$descriptions = array(
  "Began attending <span class=\"cornell\">Cornell University</span><br>
  <ul><li>B.S. in Computer Science</li>
  <li>B.S. in Electrical and Computer Engineering</li></ul>",
  "Joined Hearthstone A Team, Korean Church at Cornell, Society of Physics 
  Students, and Math Club",
  "Taught Introductory Mechanics as a T.A. for PHYS 1112",
  "Started work on <a href=\"project-tempo.php\">Project Tempo</a>",
  "Developed <a href=\"https://github.com/TrueshotBarrage/studybuddy\" 
  target=\"_blank\"> StudyBuddy</a>, an iOS app to coordinate schedules 
  with peers",
  "Joined <a href=\"https://tsg.ece.cornell.edu/\" target=\"_blank\">
  Suh Research Group</a> as a research assistant to simulate memory access 
  traces with CNN accelerators and to develop a Python API for computing 
  convolutions in small chunks",
  "Taught Digital Logic and Computer Organization as a T.A. for ECE 2300<br>
  <ul><li>Received 4.79 / 5.00 for midterm teaching evaluation</li>",
  "Joined <a href=\"https://cornelldata.science/\" target=\"_blank\">
  Cornell Data Science</a>, a competitive CS project team<br>
  <ul><li>Data Engineering Subteam member</li>",
  "Designed and coded an <a href=\"led-tetris.php\">LED Tetris game</a> 
  for Arduino Mega 2560",
  "Developed <a href=\"midi-visualizer.php\">MIDI Visualizer</a>, a fully 
  modularized d3.js app for browsers that reads and processes MIDI files",
  "Scrapped old website and launched this <span class=\"rainbow\">beauty</span>
  <ul><li>A delicious blend of HTML5, CSS, JavaScript (jQuery), and PHP</li>"
);
?>

<div class="container dual-grid">
  <div class="bold" id="resume-label">
    <h2>Resume</h2>
  </div>
  <div class="resume-text">
    <?php create_entries($dates, $descriptions); ?>
  </div>
</div>