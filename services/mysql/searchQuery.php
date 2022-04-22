<?php 

require "connect.php";

function searchQuery(string $query) {
  global $connectDB;

  $result = mysqli_query($connectDB, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result))
    $rows[] = $row;

  return $rows;
}

?>