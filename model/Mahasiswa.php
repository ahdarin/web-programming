<?php
session_start();
class Mahasiswa {
    private $conn;
    private $table_name = "mahasiswa";

    public $id;
    public $nim;
    public $nama;
    public $jurusan;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nim=?, nama=?, jurusan=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $this->nim, $this->nama, $this->jurusan);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = "Data berhasil disimpan!";
            header("Location: " . BASE_URL . "index.php?msg=1");
        } else {
            $_SESSION['flash_message'] = "Data gagal disimpan!";
            header("Location: " . BASE_URL . "index.php?msg=0");
        }
    }

    public function read($id="") {
        if ($id == "") {
            $query = "SELECT * FROM " . $this->table_name;
        } else {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id= " . $id;
        }
        $result = $this->conn->query($query);
        return $result;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nim=?, nama=?, jurusan=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $this->nim, $this->nama, $this->jurusan, $this->id);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = "Data berhasil diupdate!";
            header("Location: " . BASE_URL . "index.php?msg=1");
        } else {
            $_SESSION['flash_message'] = "Data gagal diupdate!";
            header("Location: " . BASE_URL . "index.php?msg=0");
        }
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $this->id);
        if ($stmt->execute()) {
            $_SESSION['flash_message'] = "Data berhasil dihapus!";
            header("Location: " . BASE_URL . "index.php?msg=1");
        } else {
            $_SESSION['flash_message'] = "Data gagal disimpan!";
            header("Location: " . BASE_URL . "index.php?msg=0");
        }
    }
}
?>