<?php
// $servername = "us-cdbr-east-03.cleardb.com";
// $username = "bfff5b69cbf95f";
// $password = "ace33d51";
// $dbname = ("heroku_dfcb7c66aabaf32");

$url = parse_url(getenv("DATABASE_URL"));
$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbname = substr($url["path"], 1);

?>
