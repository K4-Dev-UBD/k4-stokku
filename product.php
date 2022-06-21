<?php 

require "components/head.component.php";
require "utils/breadCrump.php";
require "services/mysql/barangService.php";

global $headComponent, $breadCrump, $currentPath;

$barangService = new BarangService();
$id = $_GET["id"];

$barang = $barangService->getBarangById($id)->fetch(PDO::FETCH_OBJ);

if (isset($_POST["submit"])) {
  var_dump($_POST);
}
$hostUrl = $_SERVER["HTTP_HOST"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <?= $headComponent ?>
  <title>Stokku Product - <?= $id; ?></title>
</head>
<body>
  <form method="POST" id="formDetailProduct">
    <header class="main-head">
      <div class="breadcrump">
        <p class="head-legend">Stokku</p>
        <div class="head-link">
          <a href="<?= $breadCrump[1]; ?>">Home</a> / <p class="active">Detail</p>
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
      <div class="form-field-body divided-2">
        <div class="product-image">
          <div class="row">
            <div class="form-file-preview">
              <img src="<?= strpos($barang->gambar, "http") === 0 ? $barang->gambar : "./upload/img/$barang->gambar" ?>" id="imagePreview" class="preview">
              <button type="button" class="button-file-cancel" id="buttonFileCancel">x</button>
            </div>
            <div class="form-file-input">
              <label for="card_image" class="label">
                <input type="file" id="btnBrowseFile" class="button-file button-dark-gray" hidden accept="image/*">
                <label for="btnBrowseFile">Browse File</label>
                <span class="placeholder" id="filePlaceholder">No file selected...</span>
              </label>
            </div>
          </div>
        </div>
        <div class="product-info">
        <div class="row">
            <div class="form-input">
              <label for="name" class="form-input-heading">Name</label>
              <input type="text" class="input" name="name" placeholder="Nama input here" required value="<?= $barang->product_name ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="description" class="form-input-heading">Deskripsi</label>
              <input type="text" class="input" name="description" placeholder="Deskripsi input here"><?= $barang->deskripsi ?>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="stock" class="form-input-heading">Stok</label>
              <input type="number" class="input" name="stock" placeholder="Stok input here" required><?= $barang->stock ?>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="price" class="form-input-heading">Harga</label>
              <input type="number" class="input input-hide-counter" name="price" placeholder="Harga input here" required><?= $barang->price ?>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="selling_price" class="form-input-heading">Harga Jual</label>
              <input type="number" class="input input-hide-counter" name="selling_price" placeholder="Harga Jual input here" required><?= $barang->harga_jual ?>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="from" class="form-input-heading">Asal</label>
              <input type="text" class="input" name="from" placeholder="Asal input here" required><?= $barang->asal ?>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="type" class="form-input-heading">Jenis</label>
              <input type="text" class="input" name="type" placeholder="Jenis input here" required><?= $barang->jenis ?>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="expired" class="form-input-heading">Tanggal Expired</label>
              <input type="date" class="input" name="expired" placeholder="Tanggal Expired input here" required value="<?= date_format(date_create($barang->expired), "Y-m-d") ?>">
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="buying_date" class="form-input-heading">Tanggal Beli</label>
              <input fo type="date" class="input" name="buying_date" placeholder="Tanggal Beli input here" required value="<?= date_format(date_create($barang->tanggal_beli), "Y-m-d") ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="scripts/index.js"></script>
</body>
</html>