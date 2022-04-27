<?php 

$currentPath = $_SERVER["REQUEST_URI"];
$queryRoute = explode("?", $currentPath)[0];
$nestedRoute = explode("/", $currentPath);

$breadCrump = array_map(function ($_, $i) {
  global $nestedRoute;
  $temp = "";
  
  for ($j = 0; $j <= $i; $j++) {
    $temp += "/".$nestedRoute[$j];
  }
  
  return $temp;
}, $nestedRoute, array_keys($nestedRoute)
)

?>
