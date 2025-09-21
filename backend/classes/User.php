<?php
require_once "Database.php";

class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll($start, $length, $search, $orderColumn, $orderDir) {
        $columns = ["id", "name", "nim", "jurusan", "prodi"]; // sesuaikan dengan database

        $sql = "SELECT * FROM users WHERE 1 ";
        
        if (!empty($search)) {
            $sql .= "AND (name LIKE '%$search%' OR nim LIKE '%$search%' OR jurusan LIKE '%$search%' OR prodi LIKE '%$search%') ";
        }

        $sql .= "ORDER BY ".$columns[$orderColumn]." $orderDir LIMIT $start, $length";
        
        $result = $this->db->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function countAll() {
        $result = $this->db->query("SELECT COUNT(*) as total FROM users");
        return $result->fetch_assoc()['total'];
    }

    public function create($name, $nim, $jurusan, $prodi) {
        $stmt = $this->db->prepare("INSERT INTO users (name,nim,jurusan,prodi) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $name, $nim, $jurusan, $prodi);
        return $stmt->execute();
    }

    public function update($id, $name, $nim, $jurusan, $prodi) {
        $stmt = $this->db->prepare("UPDATE users SET name=?, nim=?, jurusan=?, prodi=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $nim, $jurusan, $prodi, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
