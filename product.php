<?php 

require "components/head.component.php";
require "utils/breadCrump.php";

global $headComponent, $breadCrump, $currentPath;

$id = $_GET["id"];

if (isset($_POST["submit"])) {
  var_dump($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <?= $headComponent ?>
  <title>Stokku Product - <?= $id; ?></title>
</head>
<body>
  <form method="POST" id="form">
    <header class="main-head">
      <div class="breadcrump">
        <p class="head-legend">Stokku</p>
        <div class="head-link">
          <a href="<?= $breadCrump[1] ?>">Home</a> / <a href="<?= $currentPath ?>" class="active">Detail</a>
        </div>
      </div>
      <div class="head-action">
        <div class="form-field-action">
          <button class="button button-delete">Delete</button>
          <button type="submit" name="submit" class="button button-primary">Save</button>
        </div>
      </div>
    </header>
    <div class="form-field">
      <div class="form-field-body">
        <div class="row">
          <div class="form-input">
            <label for="name" class="form-input-heading">Name</label>
            <input type="text" class="input" name="name" placeholder="Name input here">
          </div>
        </div>
      </div>
    </div>
  </form>
</body>
</html>