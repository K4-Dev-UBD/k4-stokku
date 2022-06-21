<?php

require "components/head.component.php";
require "utils/breadCrump.php";
require "services/mysql/BarangService.php";

global $headComponent, $currentPath;

$barangService = new BarangService();
$barangs = $barangService->getAllBarang();

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
        <?php while ($barang = $barangs->fetch(PDO::FETCH_OBJ)) : ?>
        <section class="card">
          <div class="card-inner">
            <div class="card-header">
              <div class="card-header-image">
                <img src="<? $barang->$gambar?>" alt="Product Image">
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <a href="product.php?id=1" class="product-name"><? $barang->$product_name ?></a>
              </div>
              <div class="row">
                <p><? $barang->$stock?></p>
              </div>
              <div class="row flex-grow">
                <p class="text-muted text-bold"><? $barang->$harga_jual?></p>
              </div>
              <hr>
              <div class="row">
                <p class="text-muted text-bold"><? $barang->$expired?></p>
              </div>
            </div>
          </div>
        </section>
        <?php endwhile; ?>
      </div>
    </div>
  </form>

  <script src="scripts/index.js"></script>
</body>
</html>
