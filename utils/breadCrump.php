<?php 

$currentPath = $_SERVER["REQUEST_URI"];
$hostUrl = $_SERVER["HTTP_HOST"];
$queryRoute = explode("?", $currentPath)[0];
function filterLength($value) {
  return strlen($value) > 0;
}
$nestedRoute = array_filter(explode("k4-stokku", $queryRoute), "filterLength");

$breadCrump = array_map(function ($_, $i) {
  global $nestedRoute;
  $temp = "";
  
  for ($j = 0; $j <= $i - 1; $j++) {
    $temp = $nestedRoute[$j]."k4-stokku";
  }

  return $temp;
}, $nestedRoute, array_keys($nestedRoute)
);

?>
