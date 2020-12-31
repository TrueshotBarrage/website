<?php
include("includes/init.php");

// Used for opening PostgreSQL DB
$db = open_postgresql_db($local = false);

$title = "post";
$err_msgs = array();

// Make a POST request using the cURL library.
// Header & URL are hardcoded for the GitHub Markdown API.
// Data needs to be a properly formatted string.
function httpPost(
  $data,
  $url = "https://api.github.com/markdown",
  $header = array(
    "Accept: application/vnd.github.v3+json", "user-agent: heydavid.kim v1.0"
  )
) {
  $curl = curl_init($url);

  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  if (!is_null($header))
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

  $response = curl_exec($curl);
  curl_close($curl);

  return $response;
}

// Checks if a blog post submission request was made, then pushes
// the post into the db as a new blog entry.
if (!empty($_POST)) {
  try {
    // First, preprocess the input by stripping html tags
    $_POST = array_map("htmlspecialchars", $_POST);

    // Now we want to convert our Markdown content into HTML 
    $content = httpPost(json_encode(array("text" => $_POST["content"])));

    // Finally, we can insert the post into the database
    $query = "INSERT INTO posts (author, title, content)"
      . " VALUES (:author, :title, :content)";
    $params = array(
      ":author" => $_POST["author"],
      ":title" => $_POST["title"],
      ":content" => $content
    );
    exec_sql_query($db, $query, $params);
    array_push($err_msgs, "Successfully created post!");
  } catch (PDOException $e) {
    array_push($err_msgs, "Invalid request!");
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
  <?php include("includes/favicon.php"); ?>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/nav-header.css">
  <link rel="stylesheet" type="text/css" href="css/blog.css">
  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="fonts/fonts.css">
  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
  <script type="text/javascript" src="scripts/main.js"></script>
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

  <!-- The main contents -->
  <div class="black-bg">
    <div class="main-container">
      <?php // Write out any feedback messages to the user
      foreach ($err_msgs as $message)
        echo "<p style='color:red;text-align:center'><strong>" . htmlspecialchars($message) . "</strong></p>\n"; ?>

      <form class="contents" id="blog-post-form" action="blog-post.php" method="POST">
        <h2>What's on your mind?</h2>
        <input class="form-input" placeholder="Author" name="author" type="text" value="" size="20" required>
        <input class="form-input" placeholder="Title" name="title" type="text" value="" size="40" required>
        <textarea class="form-input" placeholder="Your post -- Markdown is enabled!" name="content" cols="45" rows="8" required></textarea>
        <button id="form-submit" type="submit">Post Entry</button>
      </form>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>