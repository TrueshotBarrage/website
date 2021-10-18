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
  "Sep 2019",
  "Dec 2019",
  "Mar 2020",
  "Apr 2020",
  "May 2020",
  "Dec 2020",
  "Jan 2021",
  "Jun 2021",
  "Aug 2021"
);
$descriptions = array(
  "Began attending <span class=\"cornell\">Cornell University</span><br>
  <ul><li>B.S. in Computer Science</li>
  <li>B.S. in Electrical and Computer Engineering</li></ul>",
  "Joined Hearthstone Team and Korean Church at Cornell",
  "Taught Introductory Mechanics as a T.A. for PHYS 1112",
  "Started work on <a href=\"project-tempo.php\">Project Tempo</a>, a random 
  music generator",
  "Developed <a href=\"https://github.com/TrueshotBarrage/studybuddy\" 
  target=\"_blank\"> StudyBuddy</a>, an iOS app to coordinate schedules 
  with peers",
  "Joined <a href=\"https://tsg.ece.cornell.edu/\" target=\"_blank\">
  Suh Research Group</a> as a research assistant for secure convolutional neural nets",
  "Taught Digital Logic and Computer Organization as a T.A. for ECE 2300<br>
  <ul><li>Received 4.79 / 5.00 for midterm teaching evaluation</li>",
  "Joined <a href=\"https://cornelldata.science/\" target=\"_blank\">
  Cornell Data Science</a>, a competitive CS project team<br>
  <ul><li>Data Engineering Subteam member</li>",
  "Designed and coded an <a href=\"led-tetris.php\">LED Tetris game</a> 
  for Arduino Mega 2560",
  "Developed <a href=\"midi-visualizer.php\">MIDI Visualizer</a>, a d3.js web
  app to animate music files",
  "Scrapped old website and launched this <span class=\"rainbow\">beauty</span>
  <ul><li>A delicious blend of HTML5, CSS, JavaScript (jQuery), and PHP</li>",
  "Started summer internship at <a class=\"wasabi\" href=\"https://wasabi.com\" 
  target=\"_blank\">Wasabi</a>, the hot cloud storage company",
  "Launched new website <a href=\"blog.php\">blog</a>",
  "Began spring co-op at <a class=\"amazon\" href=\"https://amazonrobotics.com\" 
  target=\"_blank\">Amazon Robotics</a>, tinkering with embedded stuff",
  "Ran simulations for a summer internship at <a class=\"amazon\" href=\"https://amazon.com\" 
  target=\"_blank\">Amazon</a> as an SDE intern for Last Mile Planning",
  "Started building robots to improve the lives of people with disabilities at
  <a href=\"https://emprise.cs.cornell.edu/\" target=\"_blank\">EmPRISE Lab</a>"
);
?>

<div class="container dual-grid">
  <div class="bold" id="resume-label">
    <h2>Timeline</h2>
  </div>
  <div class="resume-text">
    <?php create_entries($dates, $descriptions); ?>
  </div>
</div>