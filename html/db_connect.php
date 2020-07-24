<?php
$db_server = "movie-db";
$db_user = "movie-app";
$db_pw = "movieappsecretpw";
$conn = new mysqli($db_server, $db_user, $db_pw);

if ($conn->connect_errno) {
    die("DB Connection failed: " . $conn->connect_error);
}

$conn->query("USE movie;");