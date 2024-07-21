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

    // public function getAll() {
    //     $this->db->query("SELECT {$this->tabel}.*, `categories`.`nama` AS `namaKategori` FROM {$this->tabel} INNER JOIN `categories` ON {$this->tabel}.kategoriId = `categories`.`id`");
    //     return $this->db->resultAll();
    // }

    // public function getItems($index) {
    //     $this->db->query("SELECT {$this->tabel}.*, `categories`.`nama` AS `namaKategori` FROM {$this->tabel} INNER JOIN `categories` ON {$this->tabel}.kategoriId = `categories`.`id` WHERE `categories`.`id` = :id");
    //     $this->db->bind("id", $index);
    //     return $this->db->resultAll();
    // }

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

    // public function update() {
    //     $this->db->query("UPDATE {$this->tabel} SET `kategoriId`=:kategoriId,`namaItem`=:namaItem,`hargaSatuan`=:hargaSatuan,`satuan`=:satuan WHERE `id` = :id");
    //     $this->db->bind("id", $_POST['id']);
    //     $this->db->bind("kategoriId", (int)$_POST['kategoriId']);
    //     $this->db->bind("namaItem", $_POST['namaItem']);
    //     $this->db->bind("hargaSatuan", (int)$_POST['hargaSatuan']);
    //     $this->db->bind("satuan", $_POST['satuan']);
    //     return $this->db->rowCount();
    // }

    // public function delete($id) {
    //     $this->db->query("DELETE FROM {$this->tabel} WHERE id=:id");
    //     $this->db->bind("id", $id);
    //     return $this->db->rowCount();
    // }
}