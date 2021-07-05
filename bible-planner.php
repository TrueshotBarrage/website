<?php
include("includes/init.php");

$title = "bible planner";
$err_msgs = array();

// Make a POST request using the cURL library.
// Header & URL are hardcoded for the Bible Planner API server.
// Data needs to be a properly formatted string.
function httpPost(
  $data,
  $url = "https://bible-planner-backend.herokuapp.com/api/",
  $header = array(
    "user-agent: heydavid.kim v1.0"
  )
) {
  $curl = curl_init($url);

  $config = "config=" . json_encode($data);

  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $config);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  if (!is_null($header))
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

  $response = curl_exec($curl);

  curl_close($curl);

  return $response;
}

function csv_to_table($csv_content)
{
  $rows = str_getcsv($csv_content, "\n");
  $table = "";
  foreach ($rows as &$row) {
    $table .= "<tr>";
    $cells = str_getcsv($row);
    foreach ($cells as &$cell) {
      $table .= "<td>$cell</td>";
    }
    $table .= "</tr>";
  }
  return $table;
}

$duration = $_POST["duration"];
if (!empty($duration)) {
  if (!filter_var($duration, FILTER_VALIDATE_INT)) {
    array_push($err_msgs, "Please enter a valid duration in days.");
  } else {
    $start = date_create($_POST["start-date"]);
    $start_formatted = date_format($start, "M-d-Y");
    unset($_POST["duration"]);
    unset($_POST["start-date"]);

    // Check if at least one book of the Bible is selected
    if (!empty($_POST)) {
      $config = array(
        "books" => array_values($_POST),
        "duration" => intval($duration),
        "start" => $start_formatted
      );

      $content = httpPost(json_encode($config));
      $csv = json_decode($content)->plan;
    } else {
      array_push($err_msgs, "Please select at least one book of the Bible.");
    }
  }
} else if (!empty($_POST)) {
  array_push($err_msgs, "You didn't submit anything.");
} ?>

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
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
  <link rel="stylesheet" type="text/css" href="css/tables.css">
  <link rel="stylesheet" type="text/css" href="bible-planner/style.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="fonts/fonts.css">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
  <script type="text/javascript" src="bible-planner/scripts.js"></script>
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
      <div class="vb-50"></div>

      <?php // Write out any feedback messages to the user
      foreach ($err_msgs as $message) {
        echo "<p style='color:red;text-align:center'><strong>" . htmlspecialchars($message) . "</strong></p>\n";
      } ?>

      <h1 class="centered">Bible Planner</h1>
      <h2 class="centered">Generate a Bible reading plan</h2>

      <!-- Bible Planner form -->
      <form method="post" action="bible-planner.php" id="bible-form">
        <div id="bible-books-container">
          <h2>Books:</h2>
          <div id="bible-books">
            <span>
              <input type="checkbox" id="select-all">
              <label for="select-all">Select All</label>
            </span>

            <?php
            include("includes/bible-books.php");
            foreach ($bible_books as $book) { ?>
              <span>
                <input type="checkbox" id="<?php echo strtolower($book); ?>" name="<?php echo strtolower($book); ?>" value="<?php echo $book; ?>">
                <label for="<?php echo strtolower($book); ?>">
                  <?php echo $book; ?>
                </label>
              </span>
            <?php }
            ?>
          </div>
        </div>

        <div class="arrow">
          >
        </div>

        <div id="bible-start">
          <h2>Start date:</h2>
          <input type="date" id="start-date" name="start-date">
        </div>

        <div class="arrow">
          >
        </div>

        <div id="bible-duration">
          <h2>Duration (days):</h2>
          <input type="text" id="duration" name="duration">
        </div>

        <div class="arrow">
          >
        </div>

        <input type="submit" value="Submit" id="bible-submit">
      </form>

      <?php
      // If the POST request has been sent, then create a table of the plan
      if (!empty($_POST) && !empty($_POST["duration"]) && !empty($_POST["start-date"])) { ?>
        <div class="vb-50"></div>
        <div id="plan-result">
          <h2>Reading Plan
            <a class="download" onclick="downloadCSV()">
              (&#8595;CSV)
            </a>
          </h2>
          <table>
            <?php
            print csv_to_table($csv);
            ?>
          </table>
        </div>
        <!-- Silently hide the plan text for JS to fetch for download -->
        <div id="plan-csv" hidden><?php echo $csv; ?></div>
      <?php } ?>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>