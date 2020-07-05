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
  "Apr 2020",
  "May 2020"
);
$descriptions = array(
  "Began attending <span class=\"cornell\">Cornell University</span><br>
  <ul><li>B.S. in Computer Science</li>
  <li>B.S. in Electrical and Computer Engineering</li></ul>",
  "Joined Hearthstone Team, Korean Church at Cornell, and Society of Physics 
  Students",
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
  "Started summer internship at <a class=\"wasabi\" href=\"https://wasabi.com\">
  Wasabi</a>, the hot cloud storage company"
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