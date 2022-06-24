<?php 

require "components/head.component.php";
require "services/mysql/barangTypeService.php";
require "utils/breadCrump.php";

global $headComponent, $breadCrump, $currentPath;

$barangTypeService = new BarangTypeService();
$id = $_GET["id"];

$barang = $barangTypeService->getById($id)->fetch(PDO::FETCH_OBJ);

if (isset($_POST["save"])) {
  $resultEditBarang = $barangTypeService->editById(
    $id,
    $_POST["name"],
  );

  if (!$resultEditBarang) {
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
    header("Location: editMasterProductType.php?id=$id");
  }
}

if (isset($_POST["delete"])) {
  $resultDeleteBarang = $barangTypeService->deleteById($id);
  if (!$resultDeleteBarang) {
    echo "
      <script>
        alert('Gagal menghapus barang!')
      </script>
    ";
  } else {
    header("Location: masterProductType.php");
  }
}

$hostUrl = $_SERVER["HTTP_HOST"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <?= $headComponent ?>
  <title>Stokku Master Jenis Barang - <?= $barang->nama; ?></title>
</head>
<body>
  <main id="main">
    <form method="POST" id="formDetailProduct" enctype="multipart/form-data">
      <header class="main-head">
        <div class="breadcrump">
          <p class="head-legend">Stokku</p>
          <div class="head-link">
            <a href="<?= $breadCrump[1] ?>">Home</a> / <a href="<?= $breadCrump[1]."/masterProductType.php" ?>">Master Jenis Barang</a> / <p class="active"><?= $barang->nama ?></p>
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
        <div class="form-field-body">
          <div class="product-info">
            <div class="row">
              <div class="form-input">
                <label for="name" class="form-input-heading">Nama*</label>
                <input type="text" class="input" name="name" placeholder="Nama input here" required value="<?= $barang->nama ?>">
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

  <script src="scripts/index.js"></script>
</body>
</html>