<?php
include("includes/init.php");

$title = "homepage";
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
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
  <link rel="stylesheet" type="text/css" href="css/test.css">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
  <script type="text/javascript" src="scripts/index.js"></script>
  <?php //include("includes/gtm.php"); 
  ?>
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
    <!-- The main contents: console and footer -->
    <div class="main-container">
      <div class="terminal">
        <pre id="code-box">
[<?php echo date("m/d/y H:i:s", time()); ?>] /Homepage ➜ cowsay Welcome to my website! | lolcat
<div><span style="color:#ff0000;"> </span><span style="color:#ff0400;">_</span><span style="color:#ff0800;">_</span><span style="color:#ff0c00;">_</span><span style="color:#ff0f00;">_</span><span style="color:#ff1300;">_</span><span style="color:#ff1700;">_</span><span style="color:#ff1b00;">_</span><span style="color:#ff1f00;">_</span><span style="color:#ff2300;">_</span><span style="color:#ff2600;">_</span><span style="color:#ff2a00;">_</span><span style="color:#ff2e00;">_</span><span style="color:#ff3200;">_</span><span style="color:#ff3600;">_</span><span style="color:#ff3a00;">_</span><span style="color:#ff3e00;">_</span><span style="color:#ff4100;">_</span><span style="color:#ff4500;">_</span><span style="color:#ff4900;">_</span><span style="color:#ff4d00;">_</span><span style="color:#ff5100;">_</span><span style="color:#ff5500;">_</span><span style="color:#ff5900;">_</span><span style="color:#ff5c00;">_</span><span style="color:#ff6000;"> </span></div><div><span style="color:#ff6400;"><</span><span style="color:#ff6800;"> </span><span style="color:#ff6c00;">W</span><span style="color:#ff7000;">e</span><span style="color:#ff7300;">l</span><span style="color:#ff7700;">c</span><span style="color:#ff7b00;">o</span><span style="color:#ff7f00;">m</span><span style="color:#ff8300;">e</span><span style="color:#ff8700;"> </span><span style="color:#ff8b00;">t</span><span style="color:#ff8f00;">o</span><span style="color:#ff9300;"> </span><span style="color:#ff9700;">m</span><span style="color:#ff9b00;">y</span><span style="color:#ff9f00;"> </span><span style="color:#ffa300;">w</span><span style="color:#ffa700;">e</span><span style="color:#ffab00;">b</span><span style="color:#ffaf00;">s</span><span style="color:#ffb300;">i</span><span style="color:#ffb700;">t</span><span style="color:#ffbb00;">e</span><span style="color:#ffbf00;">!</span><span style="color:#ffc300;"> </span><span style="color:#ffc700;">></span></div><div><span style="color:#ffcb00;"> </span><span style="color:#ffcf00;">-</span><span style="color:#ffd300;">-</span><span style="color:#ffd700;">-</span><span style="color:#ffdb00;">-</span><span style="color:#ffdf00;">-</span><span style="color:#ffe300;">-</span><span style="color:#ffe700;">-</span><span style="color:#ffeb00;">-</span><span style="color:#ffef00;">-</span><span style="color:#fff300;">-</span><span style="color:#fff700;">-</span><span style="color:#fffb00;">-</span><span style="color:#ffff00;">-</span><span style="color:#f7ff00;">-</span><span style="color:#f0ff00;">-</span><span style="color:#e8ff00;">-</span><span style="color:#e0ff00;">-</span><span style="color:#d8ff00;">-</span><span style="color:#d1ff00;">-</span><span style="color:#c9ff00;">-</span><span style="color:#c1ff00;">-</span><span style="color:#b9ff00;">-</span><span style="color:#b2ff00;">-</span><span style="color:#aaff00;">-</span><span style="color:#a2ff00;"> </span></div><div><span style="color:#9bff00;"> </span><span style="color:#93ff00;"> </span><span style="color:#8bff00;"> </span><span style="color:#83ff00;"> </span><span style="color:#7cff00;"> </span><span style="color:#74ff00;"> </span><span style="color:#6cff00;"> </span><span style="color:#64ff00;"> </span><span style="color:#5dff00;">\</span><span style="color:#55ff00;"> </span><span style="color:#4dff00;"> </span><span style="color:#46ff00;"> </span><span style="color:#3eff00;">^</span><span style="color:#36ff00;">_</span><span style="color:#2eff00;">_</span><span style="color:#27ff00;">^</span></div><div><span style="color:#1fff00;"> </span><span style="color:#17ff00;"> </span><span style="color:#0fff00;"> </span><span style="color:#08ff00;"> </span><span style="color:#00ff00;"> </span><span style="color:#00ff08;"> </span><span style="color:#00ff10;"> </span><span style="color:#00ff18;"> </span><span style="color:#00ff20;"> </span><span style="color:#00ff28;">\</span><span style="color:#00ff30;"> </span><span style="color:#00ff38;"> </span><span style="color:#00ff40;">(</span><span style="color:#00ff48;">o</span><span style="color:#00ff50;">o</span><span style="color:#00ff58;">)</span><span style="color:#00ff60;">\</span><span style="color:#00ff68;">_</span><span style="color:#00ff70;">_</span><span style="color:#00ff78;">_</span><span style="color:#00ff80;">_</span><span style="color:#00ff87;">_</span><span style="color:#00ff8f;">_</span><span style="color:#00ff97;">_</span></div><div><span style="color:#00ff9f;"> </span><span style="color:#00ffa7;"> </span><span style="color:#00ffaf;"> </span><span style="color:#00ffb7;"> </span><span style="color:#00ffbf;"> </span><span style="color:#00ffc7;"> </span><span style="color:#00ffcf;"> </span><span style="color:#00ffd7;"> </span><span style="color:#00ffdf;"> </span><span style="color:#00ffe7;"> </span><span style="color:#00ffef;"> </span><span style="color:#00fff7;"> </span><span style="color:#00ffff;">(</span><span style="color:#00f7ff;">_</span><span style="color:#00f0ff;">_</span><span style="color:#00e8ff;">)</span><span style="color:#00e0ff;">\</span><span style="color:#00d8ff;"> </span><span style="color:#00d1ff;"> </span><span style="color:#00c9ff;"> </span><span style="color:#00c1ff;"> </span><span style="color:#00b9ff;"> </span><span style="color:#00b2ff;"> </span><span style="color:#00aaff;"> </span><span style="color:#00a2ff;">)</span><span style="color:#009bff;">\</span><span style="color:#0093ff;">/</span><span style="color:#008bff;">\</span></div><div><span style="color:#0083ff;"> </span><span style="color:#007cff;"> </span><span style="color:#0074ff;"> </span><span style="color:#006cff;"> </span><span style="color:#0064ff;"> </span><span style="color:#005dff;"> </span><span style="color:#0055ff;"> </span><span style="color:#004dff;"> </span><span style="color:#0046ff;"> </span><span style="color:#003eff;"> </span><span style="color:#0036ff;"> </span><span style="color:#002eff;"> </span><span style="color:#0027ff;"> </span><span style="color:#001fff;"> </span><span style="color:#0017ff;"> </span><span style="color:#000fff;"> </span><span style="color:#0008ff;">|</span><span style="color:#0000ff;">|</span><span style="color:#0400ff;">-</span><span style="color:#0900ff;">-</span><span style="color:#0d00ff;">-</span><span style="color:#1100ff;">-</span><span style="color:#1600ff;">w</span><span style="color:#1a00ff;"> </span><span style="color:#1e00ff;">|</span></div><div><span style="color:#2300ff;"> </span><span style="color:#2700ff;"> </span><span style="color:#2b00ff;"> </span><span style="color:#3000ff;"> </span><span style="color:#3400ff;"> </span><span style="color:#3800ff;"> </span><span style="color:#3d00ff;"> </span><span style="color:#4100ff;"> </span><span style="color:#4600ff;"> </span><span style="color:#4a00ff;"> </span><span style="color:#4e00ff;"> </span><span style="color:#5300ff;"> </span><span style="color:#5700ff;"> </span><span style="color:#5b00ff;"> </span><span style="color:#6000ff;"> </span><span style="color:#6400ff;"> </span><span style="color:#6800ff;">|</span><span style="color:#6d00ff;">|</span><span style="color:#7100ff;"> </span><span style="color:#7500ff;"> </span><span style="color:#7a00ff;"> </span><span style="color:#7e00ff;"> </span><span style="color:#8200ff;"> </span><span style="color:#8700ff;">|</span><span style="color:#8b00ff;">|</span></div>
[<?php echo date("m/d/y H:i:s", time()); ?>] /Homepage ➜ ls -1
AboutMe
Projects
GitHub
LinkedIn
[<?php echo date("m/d/y H:i:s", time()); ?>] /Homepage ➜ cd AboutMe
[<?php echo date("m/d/y H:i:s", time()); ?>] /Homepage/AboutMe ➜ 
Loading...
</pre>
      </div>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>