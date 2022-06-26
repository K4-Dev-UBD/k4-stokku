<?php

require "utils/breadCrump.php";
require "components/head.component.php";
require "services/mysql/BarangService.php";

global $headComponent, $breadCrump;

$barangService = new BarangService();
$barangs = [];
$barangs = $barangService->getAllBarang();

if (isset($_POST["newProduct"])) {
  header("Location: productNew.php");
}

if (isset($_POST["searchProduct"])) {
  $barangs = $barangService->searchBarangByProductName($_POST["searchProductName"]);
}

if (isset($_POST["masterType"])) {
  header("Location: masterProductType.php");
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
          <p class="active">Home</p>
        </div>
      </div>
      <div class="head-action">
        <button type="submit" name="newProduct" class="button button-primary">Tambah Barang</button>
        <button type="submit" name="masterType" class="button button-primary">Master Jenis Barang</button>
      </div>
    </header>
    <section class="search-product">
      <div class="row">
        <div class="form-input">
          <input type="text" class="input" name="searchProductName" placeholder="Cari barang" value="<?= isset($_POST["searchProductName"]) ? $_POST["searchProductName"] : "" ?>">
          <button type="submit" name="searchProduct" class="button button-success no-shadow">Cari</button>
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
                <img src="<?= $barang->gambar === "" ? "public/images/product.webp" : (strpos($barang->gambar, "http") === 0 ? $barang->gambar : "./upload/img/$barang->gambar") ?>" alt="Product Image">
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <a href="product.php?id=<?= $barang->product_id ?>" class="product-name"><?= $barang->product_name ?></a>
              </div>
              <div class="row">
                <p class="text-bold <?= $barang->stock <= 5 ? "text-danger" : "text-primary" ?>">Sisa <?= $barang->stock ?></p>
              </div>
              <div class="row flex-grow">
                <p class="text-muted text-bold">Rp <?= number_format($barang->harga_jual, 0, '.', '.') ?></p>
              </div>
              <div class="row highlight-expired">
                <p class="text-muted text-bold"><?= $barang->expired === "" ? "Non Expired" : $barang->expired ?></p>
              </div>
            </div>
          </div>
        </section>
        <?php endwhile; ?>
      </div>
    </div>
  </form>
</body>
</html>
