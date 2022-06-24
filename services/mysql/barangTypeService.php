<?php  

class BarangTypeService {
  public function __construct() {
    $this->db = new PDO('mysql:host=localhost;dbname=k4stokku_db', 'root', '');
  }

  public function add($name) {
    $query = "INSERT INTO jenis_barang (nama) VALUES ('$name')";
    $result = $this->db->query($query);

    if (!$result) {
      return false;
    }

    return true;
  }

  public function getById($id) {
    $query = "SELECT * FROM jenis_barang WHERE id = '$id'";
    $result = $this->db->query($query);

    if (!$result) {
      return false;
    }

    return $result;
  }

  public function getAll() {
    $query = "SELECT * FROM jenis_barang";
    $result = $this->db->query($query);

    if (!$result) {
      return false;
    }

    return $result;
  }

  public function editById($id, $name) {
    $query = "UPDATE jenis_barang SET nama = '$name' WHERE id = '$id'";
    $result = $this->db->query($query);

    if (!$result) {
      return false;
    }

    return true;
  }

  public function deleteById($id) {
    $query = "DELETE FROM jenis_barang WHERE id = '$id'";
    $result = $this->db->query($query);

    if (!$result) {
      return false;
    }

    return true;
  }

  public function searchByName($name) {
    $query = "SELECT * FROM jenis_barang WHERE nama LIKE '%$name%'";
    $result = $this->db->query($query);

    if (!$result) {
      return false;
    }

    return $result;
  }
}

?>