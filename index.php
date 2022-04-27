<?php

require "components/head.component.php";
require "utils/breadCrump.php";

global $headComponent, $currentPath;

if (isset($_POST["newProduct"])) {
  header("Location: ".$currentPath."productNew.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?= $headComponent ?>
  <title>Stokku - Home</title>
</head>
<body>
  <form method="POST">
    <header class="main-head">
      <div class="breadcrump">
        <p class="head-legend">Stokku</p>
        <div class="head-link">
          <a href="<?= $currentPath ?>" class="active">Home</a>
        </div>
      </div>
      <div class="head-action">
        <button type="submit" name="newProduct" class="button button-success">Tambah Barang</button>
      </div>
    </header>
    <div class="barang">
      <div class="barang-inner">
        <!-- mapping data from db -->
        <section class="card">
          <div class="card-inner">
            <div class="card-header">
              <div class="card-header-image">
                <img src="public/images/javascript-icon.png" alt="Product Image">
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <a href="product.php?id=1" class="product-name">Product Name</a>
              </div>
              <div class="row">
                <p>Stock: 10</p>
              </div>
              <div class="row">
                <p class="text-muted text-bold">Rp 10000</p>
              </div>
            </div>
            <div class="card-footer">
              <div class="card-action">
                <div class="row">
                  <button class="button button-primary button-view">View</button>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </form>
</body>
</html>