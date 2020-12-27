<?php
include("includes/init.php");

$title = "blog";
$err_msgs = array();

// Metadata and other relevant configurations
$posts = exec_sql_query($db, "SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);
$display_single_post = false;
$num_dates = 0;

// Gets whatever was specified using query string param "post_id".
$post_select = $_GET["post_id"];

// Checks if a request for a specific post was sent, either by clicking on
// the post title or by using query string parameters in the URL.
if (!empty($post_select)) {
  try {
    $post_id = trim($post_select);
    $query = "SELECT * FROM posts WHERE id = :post_id";
    $params = array(
      ":post_id" => $post_id
    );
    $posts = exec_sql_query($db, $query, $params)->fetchAll(PDO::FETCH_ASSOC);
    $display_single_post = true;
  } catch (PDOException $e) {
    array_push($err_msgs, "Invalid post id!");
  }
}

// Generates caption text for a blog entry, with appropriate
// css formatting applied. Time stuff is a mess, phew
function generate_caption($post)
{
  // We need this to keep track of the number of dates on posts -- this way 
  // we can keep track of & assign the appropriate DOM elements
  global $num_dates;
  $num_dates = $num_dates + 1;

  // Unfortunately, this mess of a code has to be all in one line for HTML
?>
  by <span class='entry-author'><?php echo $post['author']; ?></span> on <span class='entry-date' id='date-cr<?php echo $num_dates; ?>'></span> <?php if (!is_null($post["time_mod"])) { ?>(edited on <span class='entry-date' id='date-mod<?php echo $num_dates; ?>'></span>)<?php } ?>
  <script>
    /* Here we do the heavy lifting of converting the timestamp into local time */

    // Helper to convert time string into a nice looking, locale-adjusted time
    function convertTime(timeString) {
      let time = Date.parse(timeString);
      let timeUTC = new Date();
      timeUTC.setTime(time);
      opts = {
        hour: "2-digit",
        minute: "2-digit"
      }
      return `${timeUTC.toLocaleDateString()} @ ${timeUTC.toLocaleTimeString([], opts)}`
    }

    // Always set the post creation time appropriately
    var timeCreated = convertTime("<?php echo $post["time_cr"]; ?>");
    document.getElementById("date-cr<?php echo $num_dates; ?>").innerHTML = timeCreated;

    // If time_mod exists for the post, then also fill that in
    if (!<?php echo is_null($post["time_mod"]) ? "true" : "false"; ?>) {
      var timeMod = convertTime("<?php echo $post["time_cr"]; ?>");
      document.getElementById("date-mod<?php echo $num_dates; ?>").innerHTML = timeMod;
    }
  </script>
<?php
}

// Creates a clickable blog entry 
function make_blog_entry($post)
{ ?>
  <div class="blog-entry">
    <div class="blog-title">
      <a href="blog.php?<?php echo http_build_query(array('post_id' => $post["id"])); ?>">
        <h2><?php echo $post["title"]; ?></h2>
      </a>
      <div class="content-preview">
        <?php
        if (strlen($post["content"]) > 400) {
          echo substr($post["content"], 0, 400) . " [...]";
        } else {
          echo $post["content"];
        }
        ?>
      </div>
    </div>
    <div class="blog-caption"><?php generate_caption($post); ?></div>
  </div>
<?php }

// Creates a full-page blog post
function make_blog_post($post)
{ ?>
  <div class="blog-post">
    <div class="blog-title">
      <a href="blog.php?<?php echo http_build_query(array('post_id' => $post["id"])); ?>">
        <h2><?php echo $post["title"]; ?></h2>
      </a>
      <div class="content-preview">
        <?php
        if (strlen($post["content"]) > 400) {
          echo substr($post["content"], 0, 400) . " [...]";
        } else {
          echo $post["content"];
        }
        ?>
      </div>
    </div>
    <div class="blog-caption"><?php generate_caption($post); ?></div>
  </div>
<?php }
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

  <div class="black-bg">
    <!-- The main contents: greeting, intro texts, ext. links, and footer -->
    <div class="main-container">
      <div class="vb-50"></div>

      <!-- Write out any feedback messages to the user -->
      <?php foreach ($err_msgs as $message)
        echo "<p style='color:red;text-align:center'><strong>" . htmlspecialchars($message) . "</strong></p>\n"; ?>

      <!-- Generate blog entries from the database -->
      <?php
      // All the blog entries
      if (!$display_single_post)
        foreach ($posts as $post) make_blog_entry($post);

      // Single blog entry
      else { ?>
        <div class="vb-50"></div>
      <?php
        make_blog_post($posts[0]);
      }
      ?>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>