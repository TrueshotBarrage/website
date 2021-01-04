<?php

// Automates creating an entry without all the html hassle/confusion.
function create_course_entries($ids, $names)
{
  for ($i = 0; $i < count($ids); $i++) { ?>
    <div class="course-entries" id="centry<?php echo ($i + 1); ?>">
      <div class="course-ids" id="cid<?php echo ($i + 1); ?>">
        <?php echo $ids[$i]; ?>
      </div>
      <div class="course-names" id="cname<?php echo ($i + 1); ?>">
        <?php echo $names[$i]; ?>
      </div>
    </div>
<?php
  }
}

$course_ids = array(
  "CS 4820",
  "CS 3110",
  "CS 2110",
  "INFO 3300",
  "INFO 2300",
  "ECE 4750",
  "ECE 3140",
  "ECE 3030",
  "ECE 3100",
  "PHYS 1116",
  "HAD 2230"
);
$course_names = array(
  "Introduction to Algorithms (Java)",
  "Functional Programming (OCaml)",
  "Object-Oriented Programming and Data Structures (Java)",
  "Data-Driven Web Applications (d3.js)",
  "Intermediate Web Design (PHP, MySQL)",
  "Computer Architecture (Verilog, Python)",
  "Embedded Systems (C, assembly)",
  "Electromagnetic Fields and Waves",
  "Probability and Inference",
  "Honors Mechanics and Special Relativity",
  "Financial Accounting"
);
?>

<div class="container dual-grid">
  <div class="bold" id="course-label">
    <h2>Relevant Courses</h2>
  </div>
  <div class="course-text">
    <?php create_course_entries($course_ids, $course_names); ?>
  </div>
</div>