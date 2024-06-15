<?php

class Users {

    private $tabel = "users";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login() {
        $this->db->query("SELECT `nama`, `username`, `role`, `createdAt`, `updatedAt` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `username` = :username AND `password` = :password");
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (md5($_POST['password']).SALT));
        return $this->db->result();
    }

    // public function get() {
    //     $this->db->query("SELECT * FROM {$this->tabel} WHERE `username` = :username");
    //     $this->db->bind("username", $_POST['username']);
    //     return $this->db->result();
    // }

    public function profile($username) {
        $this->db->query("SELECT * FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `username` = :username");
        $this->db->bind("username", $username);
        return $this->db->result();
    }

    // public function getAll() {
    //     $this->db->query("SELECT * FROM {$this->tabel}");
    //     return $this->db->resultAll();
    // }

    // public function count() {
    //     $this->db->query("SELECT * FROM {$this->tabel}");
    //     return $this->db->rowCount();
    // }

    public function validate($username = null) {
        $this->db->query("SELECT `id` FROM {$this->tabel} WHERE `username` = :username");
        if ($username) {
            $this->db->bind("username", $username);
        } else {
            $this->db->bind("username", $_POST['username']);
        }
        return $this->db->rowCount();
    }

    public function insert() {
        $this->db->query("INSERT INTO `users`(`id`, `nama`, `username`, `password`, `roleId`, `createdAt`, `updatedAt`) VALUES (null,:nama,:username,:password,1,:createdAt,:createdAt)");
        $this->db->bind("nama", $_POST['nama']);
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (md5($_POST['password']).SALT));
        $this->db->bind("createdAt", date('Y-m-d H:i:s'));
        return $this->db->rowCount();
    }
}