<?php

class Items {

    private $tabel = "Items";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function validate() {
        $this->db->query("SELECT `id` FROM {$this->tabel} WHERE `kategoriId` = :kategoriId AND `namaItem` = :namaItem AND `satuan` = :satuan");
        $this->db->bind("kategoriId", (int)$_POST['kategoriId']);
        $this->db->bind("namaItem", $_POST['namaItem']);
        $this->db->bind("satuan", $_POST['satuan']);
        return $this->db->rowCount();
    }

    public function search($search) {
        $this->db->query("SELECT {$this->tabel}.*, `categories`.`nama` AS `namaKategori` FROM {$this->tabel} INNER JOIN `categories` ON {$this->tabel}.kategoriId = `categories`.`id` WHERE (`categories`.`nama` LIKE :search || `namaItem` LIKE :search || `satuan` LIKE :search || `satuan` LIKE :search || `hargaSatuan` LIKE :search)");
        $this->db->bind("search", '%'.$search.'%');
        return $this->db->resultAll();
    }

    public function getAll() {
        $this->db->query("SELECT {$this->tabel}.*, `categories`.`nama` AS `namaKategori` FROM {$this->tabel} INNER JOIN `categories` ON {$this->tabel}.kategoriId = `categories`.`id`");
        return $this->db->resultAll();
    }

    public function getItems($index) {
        $this->db->query("SELECT {$this->tabel}.*, `categories`.`nama` AS `namaKategori` FROM {$this->tabel} INNER JOIN `categories` ON {$this->tabel}.kategoriId = `categories`.`id` WHERE `categories`.`id` = :id");
        $this->db->bind("id", $index);
        return $this->db->resultAll();
    }

    public function insert() {
        $this->db->query("INSERT INTO {$this->tabel}(`kategoriId`, `namaItem`, `hargaSatuan`, `satuan`) VALUES (:kategoriId,:namaItem,:hargaSatuan,:satuan)");
        $this->db->bind("kategoriId", (int)$_POST['kategoriId']);
        $this->db->bind("namaItem", $_POST['namaItem']);
        $this->db->bind("hargaSatuan", (int)$_POST['hargaSatuan']);
        $this->db->bind("satuan", $_POST['satuan']);
        return $this->db->rowCount();
    }

    public function update() {
        $this->db->query("UPDATE {$this->tabel} SET `kategoriId`=:kategoriId,`namaItem`=:namaItem,`hargaSatuan`=:hargaSatuan,`satuan`=:satuan WHERE `id` = :id");
        $this->db->bind("id", $_POST['id']);
        $this->db->bind("kategoriId", (int)$_POST['kategoriId']);
        $this->db->bind("namaItem", $_POST['namaItem']);
        $this->db->bind("hargaSatuan", (int)$_POST['hargaSatuan']);
        $this->db->bind("satuan", $_POST['satuan']);
        return $this->db->rowCount();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM {$this->tabel} WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->rowCount();
    }
}