<?php
include("includes/init.php");

// Used for opening PostgreSQL DB
$db = open_postgresql_db($local = true);

$title = "blog";
$err_msgs = array();

// Metadata and other relevant configurations
$posts = exec_sql_query($db, "SELECT * FROM posts ORDER BY time_cr DESC")
  ->fetchAll(PDO::FETCH_ASSOC);
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
    $title = $posts[0]["title"];
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

?>
  <span>
    by
    <span class='entry-author'><?php echo $post['author']; ?></span>
    on
    <span class='entry-date' id='date-cr<?php echo $num_dates; ?>'></span>
    <?php if (!is_null($post["time_mod"])) { ?>
      (edited&nbsp;<span class='entry-date' id='date-mod<?php echo $num_dates; ?>'></span>)
  </span>
<?php } ?>
<script>
  /* Here we do the heavy lifting of converting the timestamp into local time */

  // Helper to convert time string into a nice looking, locale-adjusted time
  function convertTime(timeString) {
    function parseUTCDate(s) {
      let b = s.split(/\D/);
      --b[1]; // Adjust month number
      return new Date(Date.UTC(...b));
    }
    let time = parseUTCDate(timeString);
    let timeUTC = new Date();
    timeUTC.setTime(time);
    opts = {
      hour: "2-digit",
      minute: "2-digit"
    }
    return `${timeUTC.toLocaleDateString()}, ${timeUTC.toLocaleTimeString([], opts)}`
  }

  // Always set the post creation time appropriately
  var timeCreated = convertTime("<?php echo $post["time_cr"]; ?>");
  document.getElementById("date-cr<?php echo $num_dates; ?>").innerHTML = timeCreated;

  // If time_mod exists for the post, then also fill that in
  if (!<?php echo is_null($post["time_mod"]) ? "true" : "false"; ?>) {
    var timeMod = convertTime("<?php echo $post["time_mod"]; ?>");
    document.getElementById("date-mod<?php echo $num_dates; ?>").innerHTML = timeMod;
  }
</script>
<?php
}

// Creates a clickable blog entry 
function make_blog_entry($post)
{ ?>
  <div class="blog-entry contents">
    <div class="blog-picture">
      <a href="blog.php?<?php echo http_build_query(array('post_id' => $post["id"])); ?>">
        <img src="blog/1/1.jpg" />
      </a>
    </div>
    <div class="blog-title">
      <a href="blog.php?<?php echo http_build_query(array('post_id' => $post["id"])); ?>">
        <h2><?php echo $post["title"]; ?></h2>
      </a>
      <div class="content-preview">
        <?php
        $content = strip_tags(trim($post["content"]));
        if (strlen($content) > 400) {
          echo substr($content, 0, 400) . " [...]";
        } else {
          echo $content;
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
  <div class="blog-post contents">
    <a href="blog.php">back to posts</a>
    <div class="blog-title bigger">
      <h2><?php echo $post["title"]; ?></h2>
    </div>
    <div class="blog-caption noline"><?php generate_caption($post); ?></div>
    <div class="blog-content"><?php echo $post["content"]; ?>
    </div>
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

  <!-- The main contents -->
  <div class="black-bg">
    <div class="main-container">
      <div class="vb-50"></div>

      <?php // Write out any feedback messages to the user
      foreach ($err_msgs as $message)
        echo "<p style='color:red;text-align:center'><strong>" . htmlspecialchars($message) . "</strong></p>\n"; ?>

      <?php
      /* Generate blog entries from the database */

      // All the blog entries
      if (!$display_single_post) { ?>
        <div id="blog-top-bar">
          <a href="blog-post.php" class="contents" id="make-post-button">Make post</a>
        </div>
      <?php foreach ($posts as $post) make_blog_entry($post);
      }

      // Single blog entry
      else { ?>
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