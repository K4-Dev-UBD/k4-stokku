<?php  

require "utils/breadCrump.php";
require "components/head.component.php";
require "services/mysql/BarangTypeService.php";

global $headComponent, $breadCrump;

$barangTypeService = new BarangTypeService();
$barangs = [];
$barangs = $barangTypeService->getAll();

if (isset($_POST["searchType"])) {
  $barangs = $barangTypeService->searchByName($_POST["searchTypeName"]);
}

if (isset($_POST["addMasterProductType"])) {
  header("Location: addMasterProductType.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?= $headComponent ?>
  <title>Stokku - Master Jenis Barang</title>
</head>
<body>
<form method="POST">
    <header class="main-head">
      <div class="breadcrump">
        <p class="head-legend">Stokku</p>
        <div class="head-link">
          <a href="<?= $breadCrump[1] ?>">Home</a> / <p class="active">Master Jenis Barang</p>
        </div>
      </div>
      <div class="head-action">
        <button type="submit" name="addMasterProductType" class="button button-primary">Tambah Master Jenis Barang</button>
      </div>
    </header>
    <section class="search-product">
      <div class="row">
        <div class="form-input">
          <input type="text" class="input" name="searchTypeName" placeholder="Cari jenis barang" value="<?= isset($_POST["searchTypeName"]) ? $_POST["searchTypeName"] : "" ?>">
          <button type="submit" name="searchType" class="button button-success no-shadow">Cari</button>
        </div>
      </div>
    </section>
    <section class="master-data__section">
      <table class="master-data__table">
        <thead>
          <tr>
            <th>ID</th>
            <th>NAMA</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($barang = $barangs->fetch(PDO::FETCH_OBJ)) : ?>
          <tr>
            <td><a href="editMasterProductType.php?id=<?= $barang->id ?>"><?= $barang->id ?></a></td>
            <td><?= $barang->nama ?></td>
          </tr>
          <?php endwhile ?>
        </tbody>
      </table>
    </section>
  </form>
</body>
</html>