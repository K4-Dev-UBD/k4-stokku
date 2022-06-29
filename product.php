<?php 

require "components/head.component.php";
require "services/mysql/barangService.php";
require "services/mysql/barangTypeService.php";
require "services/uploadFileManager.php";
require "utils/breadCrump.php";

global $headComponent, $breadCrump, $currentPath;

$barangService = new BarangService();
$barangTypeService = new BarangTypeService();

$barangTypes = $barangTypeService->getAll();
$id = $_GET["id"];

$barang = $barangService->getBarangById($id)->fetch(PDO::FETCH_OBJ);

if (isset($_POST["save"])) {
  $barangService = new BarangService();
  $uploadedFile = "";

  if ($_FILES["image"]["name"] !== "") {
    $uploadedFile = handleUploadImage($_FILES["image"]);
    if (!$uploadedFile) {
      return false;
    }
  }

  $resultEditBarang = $barangService->editBarangById(
    $id,
    $_POST["name"],
    $_POST["stock"],
    $_POST["price"],
    $_POST["from"],
    $_POST["type"],
    $_POST["expired"] === "" ? "" : date_format(date_create($_POST["expired"]), "m/d/Y"),
    date_format(date_create($_POST["buying_date"]), "m/d/Y"),
    $_POST["description"],
    $_POST["selling_price"],
    $uploadedFile !== "" ? $uploadedFile : $barang->gambar,
  );

  if (!$resultEditBarang) {
    handleDeleteImage($uploadedFile);
    echo "
      <script>
        alert('Gagal mengubah barang!')
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Berhasil mengubah barang!')
      </script>
    ";
    header("Location: product.php?id=$id");
  }
}

if (isset($_POST["delete"])) {
  $resultDeleteBarang = $barangService->deleteBarangById($id);
  if (!$resultDeleteBarang) {
    echo "
      <script>
        alert('Gagal menghapus barang!')
      </script>
    ";
  } else {
    if (strpos($barang->gambar, "http") === 0) {
      header("Location: index.php");
    } else {
      handleDeleteImage($barang->gambar);
      header("Location: index.php");
    }
  }
}

$hostUrl = $_SERVER["HTTP_HOST"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <?= $headComponent ?>
  <title>Stokku Product - <?= $barang->product_name; ?></title>
</head>
<body>
  <main id="main">
    <form method="POST" id="formDetailProduct" enctype="multipart/form-data">
      <header class="main-head">
        <div class="breadcrump">
          <p class="head-legend">Stokku</p>
          <div class="head-link">
            <a href="<?= $breadCrump[1] ?>">Home</a> / <p class="active">Detail</p>
          </div>
        </div>
        <div class="head-action">
          <div class="form-field-action">
            <button class="button button-delete" id="btnDelete">Delete</button>
            <button type="submit" name="save" class="button button-primary">Save</button>
          </div>
        </div>
      </header>
      <div class="form-field">
        <p class="text-muted">note: please fill required form (*)</p>
        <div class="form-field-body divided-2">
          <div class="product-image">
            <div class="row">
              <div class="form-file-preview">
                <img src="<?= strpos($barang->gambar, "http") === 0 ? $barang->gambar : "./upload/img/$barang->gambar" ?>" id="imagePreview" class="preview">
                <button type="button" class="button-file-cancel" id="buttonFileCancel">x</button>
              </div>
              <div class="form-file-input">
                <label for="card_image" class="label">
                  <input type="file" id="btnBrowseFile" class="button-file button-dark-gray" hidden accept="image/*" name="image">
                  <label for="btnBrowseFile">Browse File</label>
                  <span class="placeholder" id="filePlaceholder">No file selected...</span>
                </label>
              </div>
            </div>
          </div>
          <div class="product-info">
            <div class="row">
              <div class="form-input">
                <label for="name" class="form-input-heading">Nama*</label>
                <input type="text" class="input" name="name" placeholder="Nama input here" required value="<?= $barang->product_name ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="description" class="form-input-heading">Deskripsi</label>
                <input type="text" class="input" name="description" placeholder="Deskripsi input here" value="<?= $barang->deskripsi ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="stock" class="form-input-heading">Stok*</label>
                <input type="number" class="input" name="stock" placeholder="Stok input here" required value="<?= $barang->stock ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="price" class="form-input-heading">Harga Beli*</label>
                <input type="number" class="input input-hide-counter" name="price" placeholder="Harga input here" required value="<?= $barang->price ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="selling_price" class="form-input-heading">Harga Jual*</label>
                <input type="number" class="input input-hide-counter" name="selling_price" placeholder="Harga Jual input here" required value="<?= $barang->harga_jual ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="from" class="form-input-heading">Asal Pembelian</label>
                <input type="text" class="input" name="from" placeholder="Asal Pembelian input here" value="<?= $barang->asal ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="type" class="form-input-heading">Jenis*</label>
                <select name="type" required class="input-select">
                  <option value="">Pilih jenis</option>
                  <?php while ($jenis = $barangTypes->fetch(PDO::FETCH_OBJ)) : ?>
                  <option value="<?= $jenis->nama ?>" <?= $jenis->nama === $barang->jenis ? "selected" : "" ?>><?= $jenis->nama ?></option>
                  <?php endwhile ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="expired" class="form-input-heading">Tanggal Expired</label>
                <input type="date" class="input" name="expired" placeholder="Tanggal Expired input here" value="<?= $barang->expired === "" ? "" : date_format(date_create($barang->expired), "Y-m-d") ?>">
              </div>
            </div>
            <div class="row">
              <div class="form-input">
                <label for="buying_date" class="form-input-heading">Tanggal Beli*</label>
                <input fo type="date" class="input" name="buying_date" placeholder="Tanggal Beli input here" required value="<?= date_format(date_create($barang->tanggal_beli), "Y-m-d") ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-dialog" id="modalDialog">
        <p>Apakah anda yakin ingin menghapusnya???</p>
        <div class="action-dialog">
          <button class="agree" type="submit" name="delete">Ya</button>
          <button class="cancel">Tidak</button>
        </div>
      </div>
    </form>
  </main>

  <script src="scripts/product.js"></script>
  <script src="scripts/index.js"></script>
</body>
</html>