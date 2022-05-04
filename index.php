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
          <p href="<?= $currentPath ?>" class="active">Home</p>
        </div>
      </div>
      <div class="head-action">
        <button type="submit" name="newProduct" class="button button-primary">Tambah Barang</button>
      </div>
    </header>
    <section class="search-product">
      <div class="row">
        <div class="form-input">
          <input type="text" class="input" name="search" placeholder="Cari barang">
          <button type="submit" name="" class="button button-success no-shadow">Cari</button>
        </div>
      </div>
    </section>
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
                <a href="product.php?id=1" class="product-name">Product Name &raquo;</a>
              </div>
              <div class="row">
                <p>Stok: 10</p>
              </div>
              <div class="row flex-grow">
                <p class="text-muted text-bold">Rp 10000</p>
              </div>
              <hr>
              <div class="row">
                <p class="text-muted text-bold">2002/10/18</p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </form>
</body>
</html>