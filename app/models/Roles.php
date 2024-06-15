<?php

class Roles {

    private $tabel = "roles";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getId($role) {
        $this->db->query("SELECT id FROM {$this->tabel} WHERE `role` = :role");
        $this->db->bind("role", $role);
        return $this->db->result();
    }

    public function get($role) {
        $this->db->query("SELECT * FROM {$this->tabel} WHERE `role` = :role");
        $this->db->bind("role", $role);
        return $this->db->result();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM {$this->tabel}");
        return $this->db->resultAll();
    }

    public function count() {
        $this->db->query("SELECT * FROM {$this->tabel}");
        return $this->db->rowCount();
    }

    // public function validate() {
    //     $this->db->query("SELECT * FROM {$this->tabel} WHERE `role` = :role");
    //     $this->db->bind("role", $_POST['role']);
    //     return $this->db->rowCount();
    // }
}