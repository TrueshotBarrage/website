<?php
include("includes/init.php");

$title = "MIDI visualizer";

// Feedback messages
$messages = array();

// Set maximum file size in bytes for uploaded files.
const MAX_FILE_SIZE = 500000;

foreach (glob("temp*.mid") as $file) {
  unlink($file);
}

if (isset($_POST["submit_upload"])) {
  $upload_info = $_FILES["midi"];

  // Display error messages for invalid uploads.
  if ($upload_info["error"] !== UPLOAD_ERR_OK) {
    array_push($messages, "Failed to upload file.");
    if ($upload_info["error"] === UPLOAD_ERR_FORM_SIZE) {
      array_push($messages, "File exceeds 500KB.");
    } else if ($upload_info["error"] === UPLOAD_ERR_NO_FILE) {
      array_push($messages, "No file selected.");
    } else if ($upload_info["error"] === UPLOAD_ERR_PARTIAL) {
      array_push($messages, "Upload interrupted. Please try again.");
    }
  } else { // On successful upload:

    // Sanitize the string just in case
    $file_name = $upload_info["name"];
    $file_name_ext = strtolower(pathinfo($file_name)["extension"]);
    $file_name_ext = filter_var($file_name_ext, FILTER_SANITIZE_STRING);

    // Check whether the uploaded file is a MIDI file.
    if ($file_name_ext == "mid" || $file_name_ext == "midi") {
      array_push($messages, "Successfully uploaded MIDI file.");

      // $midicsv is the executable that generates the CSV for the input MIDI.
      $midicsv = "./midi-visualizer/midicsv";
      $temp_file = $upload_info["tmp_name"];
      $time = time();
      $new_file_path = "temp$time.mid";
      move_uploaded_file($temp_file, $new_file_path);
      $csv = shell_exec("$midicsv $new_file_path");
      if (!isset($csv)) {
        array_push($messages, "Unknown error! Perhaps your MIDI file is malformed...");
      }
    } else {
      array_push($messages, "Failed to upload file. Make sure your file is a .mid or .midi file!");
    }
  }
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
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
  <link rel="stylesheet" type="text/css" href="midi-visualizer/style.css">
  <!-- Scripts -->
  <script src="https://d3js.org/d3.v5.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
  <script type="text/javascript" src="midi-visualizer/readMidi.js"></script>
  <?php include("includes/gtm.php"); ?>
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
    <!-- The main contents: greeting, intro texts, ext. links, and footer -->
    <div class="main-container">
      <!-- d3.js frame -->
      <div id="pianoContainer">
        <div id="piano" class="centered stacked">
          <script type="module" src="midi-visualizer/piano.js"></script>
          <!-- MIDIjs used with permission from midijs.net, used to play the song. -->
          <script type="text/javascript" src="midi-visualizer/midi.js"></script>
        </div>

        <form enctype="multipart/form-data" action="midi-visualizer.php" method="POST">
          <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />
          <input type="file" name="midi" />
          <button name="submit_upload" type="submit">Upload MIDI</button>

          <?php
          // Write out any feedback messages to the user.
          foreach ($messages as $message) {
            echo "<p><strong>" . htmlspecialchars($message) . "</strong></p>\n";
          }
          ?>
        </form>
        <div>7/08/2020: Sorry for the janky upload button... it will be fixed soon!</div>

      </div>
      <pre id="midi-csv"><?php echo $csv; ?></pre>
      <div id="target-midi">./<?php echo $new_file_path; ?></div>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>