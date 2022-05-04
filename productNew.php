<?php 

require "components/head.component.php";
require "utils/breadCrump.php";

global $headComponent, $breadCrump, $currentPath;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?= $headComponent ?>
  <title>Stokku Product - New</title>
</head>
<body>
  <form method="POST">
    <header class="main-head">
      <div class="breadcrump">
        <p class="head-legend">Stokku</p>
        <div class="head-link">
          <a href="<?= $breadCrump[0] ?>">Home</a> / <p class="active">Baru</p>
        </div>
      </div>
      <div class="head-action">
        <div class="form-field-action">
          <button type="submit" class="button button-success">Tambah Baru</button>
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