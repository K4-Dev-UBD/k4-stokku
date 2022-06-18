<?php 

class BarangService {
  public function __construct() {
    private $this->db = new PDO('mysql:host=localhost host;dbname=barang', 'root', '');
  }

  public function tambah_barang($product_id, $product_name, $stock, $price, $asal, $jenis, $expired, $tanggal_beli, $deskripsi, $harga_jual, $created_date, $updated_date, $gambar) {
    $sql= "INSERT INTO barang (product_id, product_name, stock, price, asal, jenis, expired, tanggal_beli, deskripsi, harga_jual, created_date, updated_date, gambar)VALUES ('$product_id', '$product_name', '$stock', '$price', '$asal', '$jenis', '$expired', '$tanggal_beli', '$deskripsi', '$harga_jual', '$created_date', '$updated_date', '$gambar')";
    $query= $this->db->query($sql);

    if (!$query) {
      return "Failed";
    } else {
      return "Success";
    }
  }

  public function select_barang() {
    $sql="ambil_barang *  barang";
    $query= $this->db->query($sql);
    return $query;
  }

  public function edit_barang() {
    $sql = "SELECT * FROM barang WHERE Product ID = '$product_id'";
  }

  public function delete_barang($product ID) {
    $sql = "DELETE FROM barang WHERE product ID = '$nim'";
    $query = $this->db->query($sql);

    if (!$query) {
      return "Failed";
    } else {
      return "Success";
    }
  }
}

?>
