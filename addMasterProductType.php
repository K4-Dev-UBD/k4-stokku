<?php 

require "components/head.component.php";
require "services/mysql/barangTypeService.php";
require "utils/breadCrump.php";

global $headComponent, $breadCrump, $currentPath;

$barangTypeService = new BarangTypeService();

if (isset($_POST["add"])) {
  $resultAddBarangType = $barangTypeService->add(
    $_POST["name"],
  );

  if (!$resultAddBarangType) {
    echo "
      <script>
        alert('Gagal menambah jenis barang!')
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Berhasil menambah jenis barang!')
      </script>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <?= $headComponent ?>
  <title>Stokku Master Jenis Barang - Tambah</title>
</head>
<body>
  <main id="main">
    <form method="POST" id="formDetailProduct" enctype="multipart/form-data">
      <header class="main-head">
        <div class="breadcrump">
          <p class="head-legend">Stokku</p>
          <div class="head-link">
            <a href="<?= $breadCrump[1] ?>">Home</a> / <a href="<?= $breadCrump[1]."/masterProductType.php" ?>">Master Jenis Barang</a> / <p class="active">Add Master Barang</p>
          </div>
        </div>
        <div class="head-action">
          <div class="form-field-action">
          <button type="submit" class="button button-success" name="add">Tambah</button>
          </div>
        </div>
      </header>
      <div class="form-field">
        <p class="text-muted">note: please fill required form (*)</p>
        <div class="form-field-body">
          <div class="product-info">
            <div class="row">
              <div class="form-input">
                <label for="name" class="form-input-heading">Nama*</label>
                <input type="text" class="input" name="name" placeholder="Nama input here" required>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </main>
</body>
</html>