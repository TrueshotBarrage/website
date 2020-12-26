<?php
include("includes/init.php");

$title = "blog";

// The results of querying the entire blog posts table
$posts = exec_sql_query($db, "SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

// Generates caption text for a blog entry, with appropriate
// css formatting applied
function generate_caption($post)
{
  // TODO: Maybe sanitize the output?
  $result = "by <span class='entry-author'>{$post['author']}</span> "
    . "on <span class='entry-date'>{$post['date_cr']}</span> ";
  // If the post was modified, also show that info
  if (!is_null($post['date_mod'])) {
    $result = $result
      . "(last modified <span class='entry-date'>{$post['date_mod']}</span>)";
  }
  //echo htmlentities($result);
  return $result;
}

// Creates a blog entry 
function make_blog_entry($post)
{ ?>
  <div class="blog-entry">
    <div class="blog-title">
      <h2><?php echo $post["title"]; ?></h2>
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
    <div class="blog-caption"><?php echo generate_caption($post); ?></div>
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
      <div class="vb-100"></div>

      <!-- Generate blog entries from the database -->
      <?php foreach ($posts as $post) make_blog_entry($post); ?>

      <!-- Footer -->
      <footer>
        <?php include("includes/footer.php"); ?>
      </footer>
    </div>
  </div>
</body>

</html>