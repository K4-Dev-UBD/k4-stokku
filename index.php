<?php

$username = "Admin";
// var_dump($_SERVER['HTTP_HOST']);
// var_dump($_SERVER['REQUEST_URI'])

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Stokku - Kelola semua barang dagang-Mu dengan simple dan cepat.">
  <meta http-equiv="Cache-control" content="no-cache">
  <title>Stokku - Home</title>
  <link rel="stylesheet" type="text/css" href="./styles/style.css">
  <link rel="icon" href="public/icons/javascript-icon.ico">
  <link rel="apple-touch-icon" href="public/icons/javascript-icon.ico">
</head>
<body>
  <header class="main-head">
    <div class="breadcrump">
      <p class="head-legend">Stokku</p>
      <div class="head-link">
        <a href="<?= $_SERVER['REQUEST_URI'] ?>" class="active">Home</a>
      </div>
    </div>

    <div class="head-action">
      <button class="button button-success">Tambah Barang</button>
    </div>
  </header>
  <div class="barang">
    <div class="barang-inner">
      <!-- <header class="barang-head">
        <div class="barang-head-name">
          <p>Daftar barang</p>
        </div>
      </header>  -->
      <section class="card">
        <div class="card-inner">
          <div class="card-header">
            <div class="card-header-image">
              <img src="public/images/javascript-icon.png" alt="Product Image">
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <a href="product.php?id=1" class="product-name">Product Name</a>
            </div>
            <div class="row">
              <p>Stock: 10</p>
            </div>
            <div class="row">
              <p class="text-muted text-bold">Rp 10000</p>
            </div>
          </div>
          <div class="card-footer">
            <div class="card-action">
              <div class="row">
                <button class="button button-primary button-view">View</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>