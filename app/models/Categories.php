<?php

class Categories {

    private $tabel = "categories";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function validate() {
        $this->db->query("SELECT `id` FROM {$this->tabel} WHERE `nama` = :nama");
        $this->db->bind("nama", $_POST['namaKategori']);
        return $this->db->rowCount();
    }

    public function getAll() {
        $this->db->query("SELECT *, (SELECT COUNT(*) FROM types 
        WHERE types.kategoriId = {$this->tabel}.id) AS total FROM {$this->tabel}");
        return $this->db->resultAll();
    }

    public function insert() {
        $this->db->query("INSERT INTO {$this->tabel}(`nama`) VALUES (:nama)");
        $this->db->bind("nama", $_POST['namaKategori']);
        return $this->db->rowCount();
    }

    public function update() {
        $this->db->query("UPDATE {$this->tabel} SET `nama`=:nama WHERE id=:id");
        $this->db->bind("id", $_POST['id']);
        $this->db->bind("nama", $_POST['namaKategori']);
        return $this->db->rowCount();
    }

    public function delete() {
        $this->db->query("DELETE FROM {$this->tabel} WHERE id=:id");
        $this->db->bind("id", $_POST['id']);
        return $this->db->rowCount();
    }
}