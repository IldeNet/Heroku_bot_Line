<?php
$hostConex = "localhost";
$usernameConex = "id5025244_linebot";
$passwordConex = "homenet";
$databaseConex = "id5025244_linebot";

$dbiConex = new mysqli($hostConex, $usernameConex, $passwordConex, $databaseConex);

if (!$dbiConex)
{
  die('Could not connect: ' . mysqli_error());
}

mysqli_set_charset($dbiConex, "utf8");
mysqli_query($dbiConex, "SET NAMES 'utf8'");
?>