<?php 

require "components/head.component.php";
require "services/mysql/BarangService.php";
require "services/mysql/BarangTypeService.php";
require "services/uploadFileManager.php";
require "utils/breadCrump.php";

global $headComponent, $breadCrump;

$barangService = new BarangService();
$barangTypeService = new BarangTypeService();

$barangTypes = $barangTypeService->getAll();

if (isset($_POST["addNewBarang"])) {
  $uploadedFile = "";
  if ($_FILES["image"]["name"] !== "") {
    $uploadedFile = handleUploadImage($_FILES["image"]);
    if (!$uploadedFile) {
      return false;
    }
  }

  $resultTambahBarang = $barangService->addBarang(
    $_POST["name"],
    $_POST["stock"],
    $_POST["price"],
    $_POST["from"],
    $_POST["type"],
    $_POST["expired"] === "" ? "" : date_format(date_create($_POST["expired"]), "m/d/Y"),
    date_format(date_create($_POST["buying_date"]), "m/d/Y"),
    $_POST["description"] || "",
    $_POST["selling_price"],
    $uploadedFile,
  );

  // if (!$resultTambahBarang) {
  //   handleDeleteImage($uploadedFile);
  //   echo "
  //     <script>
  //       alert('Gagal menambah barang!')
  //     </script>
  //   ";
  // } else {
  //   echo "
  //     <script>
  //       alert('Berhasil menambah barang!')
  //     </script>
  //   ";
  // }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?= $headComponent ?>
  <title>Stokku Product - New</title>
</head>
<body>
  <form method="POST" id="formDetailProduct" enctype="multipart/form-data">
    <header class="main-head">
      <div class="breadcrump">
        <p class="head-legend">Stokku</p>
        <div class="head-link">
          <a href="<?= $breadCrump[1] ?>">Home</a> / <p class="active">Baru</p>
        </div>
      </div>
      <div class="head-action">
        <div class="form-field-action">
          <button type="submit" class="button button-success" name="addNewBarang">Tambah</button>
        </div>
      </div>
    </header>
    <div class="form-field">
      <p class="text-muted">note: please fill required form (*)</p>
      <div class="form-field-body divided-2">
        <div class="product-image">
          <div class="row">
            <div class="form-file-preview">
              <img src="" id="imagePreview" class="preview">
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
              <input type="text" class="input" name="name" placeholder="Nama input here" required>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="description" class="form-input-heading">Deskripsi</label>
              <input type="text" class="input" name="description" placeholder="Deskripsi input here">
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="stock" class="form-input-heading">Stok*</label>
              <input type="number" class="input" name="stock" placeholder="Stok input here" required>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="price" class="form-input-heading">Harga Beli*</label>
              <input type="number" class="input input-hide-counter" name="price" placeholder="Harga input here" required>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="selling_price" class="form-input-heading">Harga Jual*</label>
              <input type="number" class="input input-hide-counter" name="selling_price" placeholder="Harga Jual input here" required>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="from" class="form-input-heading">Asal Pembelian</label>
              <input type="text" class="input" name="from" placeholder="Asal Pembelian input here">
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="type" class="form-input-heading">Jenis*</label>
              <select name="type" required class="input-select">
                <option value="">Pilih jenis</option>
                <?php while ($jenis = $barangTypes->fetch(PDO::FETCH_OBJ)) : ?>
                <option value="<?= $jenis->nama ?>"><?= $jenis->nama ?></option>
                <?php endwhile ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="expired" class="form-input-heading">Tanggal Expired</label>
              <input type="date" class="input" name="expired" placeholder="Tanggal Expired input here">
            </div>
          </div>
          <div class="row">
            <div class="form-input">
              <label for="buying_date" class="form-input-heading">Tanggal Beli*</label>
              <input fo type="date" class="input" name="buying_date" placeholder="Tanggal Beli input here" required>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="scripts/product.js"></script>
</body>
</html>