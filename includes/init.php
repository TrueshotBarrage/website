<?php
// Check to see if PHP >= version 7
function check_php_version()
{
  if (version_compare(phpversion(), '7.0', '<')) {
    define('VERSION_MESSAGE', "PHP version 7.0 or higher is recommended.");
    echo VERSION_MESSAGE;
    throw VERSION_MESSAGE;
  }
}
// check_php_version();

function config_php_errors()
{
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 0);
  error_reporting(E_ALL);
}
config_php_errors();

// Establish PDO connection to website db.
// If $local is enabled, use local settings;
// otherwise, use the settings on heroku.
function open_postgresql_db($local = false)
{
  // This will periodically change! Just here for testing...
  // $DB_URL = "postgres://amomdcmjidqxot:f1d1774a7689fc05302017abdb5c15bc8143838e3378b0753a080a1ee5d44782@ec2-54-166-114-48.compute-1.amazonaws.com:5432/dbn9fdhbnhh3k6";
  // $host = "ec2-54-166-114-48.compute-1.amazonaws.com";
  // $dbname = "dbn9fdhbnhh3k6";
  // $user = "amomdcmjidqxot";
  // $pwd = "f1d1774a7689fc05302017abdb5c15bc8143838e3378b0753a080a1ee5d44782";
  // $port = "5432";

  if ($local) {
    // Try to read db config file
    if (!$settings = parse_ini_file("psql-settings.ini", true))
      throw new exception('Unable to open psql-settings.ini on local...');

    $db_cfg = $settings["database"];
    $pdo = new PDO("" . sprintf(
      "%s:host=%s;port=%s;user=%s;password=%s;dbname=%s",
      $db_cfg["driver"],
      $db_cfg["host"],
      $db_cfg["port"],
      $db_cfg["username"],
      $db_cfg["password"],
      $db_cfg["dbname"]
    ));
    // Use Heroku settings (deployed)
  } else {
    $db_cfg = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
      "host=%s;port=%s;user=%s;password=%s;dbname=%s",
      $db_cfg["host"],
      $db_cfg["port"],
      $db_cfg["user"],
      $db_cfg["pass"],
      ltrim($db_cfg["path"], "/")
    ));
  }

  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;
}

// Execute a query ($sql) against a database ($db).
// Returns query results if query was successful.
// Returns null if query was not successful.
function exec_sql_query($db, $sql, $params = array())
{
  $query = $db->prepare($sql);
  if ($query and $query->execute($params)) {
    return $query;
  }
  return null;
}
