<?php

class Sales {

    private $tabel = "sales";
    private $detail = "details";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getLastId() {
        $this->db->query("SELECT LAST_INSERT_ID() AS `id`;");
        return $this->db->result();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM {$this->tabel}");
        return $this->db->resultAll();
    }

    public function search($search) {
        $this->db->query("SELECT * FROM {$this->tabel} WHERE (`total` LIKE :search || `bayar` LIKE :search || `tanggal` LIKE :search || `memberId` LIKE :search)");
        $this->db->bind("search", '%'.$search.'%');
        return $this->db->resultAll();
    }

    public function insert() {
        $this->db->query("INSERT INTO {$this->tabel}(`total`, `bayar`, `tanggal`, `memberId`, `adminId`) VALUES (:total,:bayar,:tanggal,:memberId,:adminId)");
        $this->db->bind("total", $_POST['total']);
        $this->db->bind("bayar", $_POST['total']);
        $this->db->bind("tanggal", date('Y-m-d H:i:s'));
        $this->db->bind("memberId", ($_POST['memberId'] ? $_POST['memberId'] : NULL));
        $this->db->bind("adminId", $_POST['adminId']);
        return $this->db->rowCount();
    }

    public function insertDetail(int $id, array $sale) {
        $this->db->query("INSERT INTO {$this->detail}(`itemId`, `quantity`, `totalHarga`, `salesId`) VALUES (:itemId,:qty,:total,:id)");
        $this->db->bind("itemId", $sale['item']['id']);
        $this->db->bind("qty", $sale['qty']);
        $this->db->bind("total", $sale['sum']);
        $this->db->bind("id", $id);
        return $this->db->result();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM {$this->tabel} WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->rowCount();
    }
}