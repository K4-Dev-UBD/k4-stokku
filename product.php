<?php 

require "components/head.component.php";
require "utils/breadCrump.php";

global $headComponent, $breadCrump, $currentPath;

$id = $_GET["id"];

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
              <img src="" id="imagePreview" class="preview">
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
              <input type="text" class="input" name="name" placeholder="Name input here">
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="scripts/index.js"></script>
</body>
</html>