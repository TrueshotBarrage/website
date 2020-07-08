<?php
include("includes/init.php");

$title = "MIDI visualizer";

// Feedback messages
$messages = array();

// Set maximum file size in bytes for uploaded files.
const MAX_FILE_SIZE = 6000000100;

$csv = shell_exec("./midi-visualizer/midicsv ./midi-visualizer/music/midi/random_chords.mid");

if (isset($_POST["submit_upload"])) {
  // Filter input for the "image" and "tags" parameters.
  $upload_info = $_FILES["image"];

  // Display error messages for invalid uploads.
  if ($upload_info["error"] !== UPLOAD_ERR_OK) {
    array_push($messages, "Failed to upload file.");
    if ($upload_info["error"] === UPLOAD_ERR_FORM_SIZE) {
      array_push($messages, "File exceeds 6GB.");
    } else if ($upload_info["error"] === UPLOAD_ERR_NO_FILE) {
      array_push($messages, "No file selected.");
    } else if ($upload_info["error"] === UPLOAD_ERR_PARTIAL) {
      array_push($messages, "Upload interrupted. Please try again.");
    }
  } else {
    // If the upload was successful, record the upload in the database
    // and permanently store the uploaded file in the uploads directory.
    $file_name = $upload_info["name"];
    $file_name_ext = strtolower(pathinfo($file_name)["extension"]);
    $file_name_base = basename($file_name, "." . $file_name_ext);

    // Filters the image name to prevent SQL injection.
    $file_name_ext = filter_var($file_name_ext, FILTER_SANITIZE_STRING);
    $file_name_base = filter_var($file_name_base, FILTER_SANITIZE_STRING);

    // Check whether the uploaded file is a common image file extension.
    if (
      $file_name_ext == "jpeg" || $file_name_ext == "jpg"
      || $file_name_ext == "png" || $file_name_ext == "gif"
      || $file_name_ext == "raw" || $file_name_ext == "tiff"
      || $file_name_ext == "svg" || $file_name_ext == "heic"
      || $file_name_ext == "bmp"
    ) {
      // Inserts image record into site database
      $upload_query = "INSERT INTO images (file_name, file_ext) VALUES (:base, :ext)";
      $params = array(
        ':base' => $file_name_base,
        ':ext' => $file_name_ext
      );
      exec_sql_query($db, $upload_query, $params);

      // Moves the image into the uploads directory.
      $image_id = $db->lastInsertId("images_id_seq"); // previously "id" for SQLite
      $temp_file = $_FILES["image"]["tmp_name"];
      $new_path = $upload_path . $image_id . "." . $file_name_ext;
      move_uploaded_file($temp_file, $new_path);
      array_push($messages, "Successfully uploaded image.");
    } else {
      array_push($messages, "Failed to upload file. Make sure your image is a valid image format!");
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
        <input type="file" />
      </div>
      <pre id="midi-csv"><?php echo $csv; ?></pre>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>