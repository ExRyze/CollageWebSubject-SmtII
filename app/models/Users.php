<?php

class Users {

    private $tabel = "users";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login() {
        $this->db->query("SELECT {$this->tabel}.`id`, `nama`, `username`, `role`, `image` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `username` = :username AND `password` = :password");
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
        $this->db->query("SELECT {$this->tabel}.*, `roles`.`role` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `username` = :username");
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

    public function update() {
        $this->db->query("UPDATE `users` SET `nama`=:nama, `email`=:email, `telepon`=:telepon, `alamat`=:alamat, `updatedAt`=:updatedAt WHERE `id`=:id");
        $this->db->bind("nama", $_POST['nama']);
        $this->db->bind("email", $_POST['email']);
        $this->db->bind("telepon", $_POST['telepon']);
        $this->db->bind("alamat", $_POST['alamat']);
        $this->db->bind("updatedAt", date('Y-m-d H:i:s'));
        $this->db->bind("id", $_POST['id']);
        return $this->db->rowCount();
    }

    public function updateImage($image) {
        $this->db->query("UPDATE `users` SET `image`=:image, `updatedAt`=:updatedAt WHERE `id`=:id");
        $this->db->bind("image", $image);
        $this->db->bind("updatedAt", date('Y-m-d H:i:s'));
        $this->db->bind("id", $_POST['id']);
        return $this->db->rowCount();
    }
}