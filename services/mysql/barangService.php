<?php 

class BarangService {
  public function __construct() {
    private $this->db = new PDO('mysql:host=localhost host;dbname=barang', 'root', '');
  }

  public function tambah_barang($product_name, $stock, $price, $asal, $jenis, $expired, $tanggal_beli, $deskripsi, $harga_jual, $created_date, $updated_date, $gambar) {
    $sql= "INSERT INTO barang (product_name, stock, price, asal, jenis, expired, tanggal_beli, deskripsi, harga_jual, created_date, updated_date, gambar)VALUES ('$product_name', '$stock', '$price', '$asal', '$jenis', '$expired', '$tanggal_beli', '$deskripsi', '$harga_jual', '$created_date', '$updated_date', '$gambar')";
    $query= $this->db->query($sql);

    if (!$query) {
      return "Failed";
    } else {
      return "Success";
    }
  }

  public function select_barang() {
    $sql="SELECT * FROM barang";
    $query= $this->db->query($sql);
    return $query;
  }

  public function edit_barang($product_id, $product_name, $stock, $price, $asal, $jenis, $expired, $tanggal_beli, $deskripsi, $harga_jual, $created_date, $updated_date, $gambar) {
    $sql = "UPDATE barang SET 
product_name = '$product_name', 
stock = '$stock',
price = '$price',
asal = '$asal',
jenis = '$jenis',
expired = '$expired',
tanggal_beli = '$tanggal_beli',
deskripsi = '$deskripsi',
harga_jual = '$harga_jual',
created_date = '$created_date',
updated_date = '$updated_date',
gambar = '$gambar'
WHERE product_id = '$product_id'";
  }

  public function delete_barang($product_id) {
    $sql = "DELETE FROM barang WHERE product_id = '$product_id'";
    $query = $this->db->query($sql);

    if (!$query) {
      return "Failed";
    } else {
      return "Success";
    }
  }
}

?>