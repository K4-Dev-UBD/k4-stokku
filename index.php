<?php

$username = "Admin";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Stokku - Kelola semua barang dagang-Mu dengan simple dan cepat.">
  <title>Stokku - Home</title>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="icon" href="public/icons/javascript-icon.ico">
  <link rel="apple-touch-icon" href="public/icons/javascript-icon.ico">
</head>
<body>
  <header class="hero-head">
    <h1>Stokku</h1>
    <p>Manage your trade</p>
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
            <a href="product.php?id=1" class="product-name">Product Name</a>
            <p class="product-stock">Stock: 10</p>
          </div>
          <div class="card-footer">
            <div class="card-action">
              <button type="button" class="button button-delete">Delete</button>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
</html>