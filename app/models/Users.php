<?php

class Users {

    private $tabel = "users";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function login() {
        $this->db->query("SELECT {$this->tabel}.`id`, `nama`, `username`, `password`, `role`, `image` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `username` = :username");
        $this->db->bind("username", $_POST['username']);
        $row =  $this->db->result();
        if ($row) {
            if (password_verify($_POST['password'], str_replace(SALT, "", $row['password']))) {
                unset($row['password']);
            }
        }
        return $row;
    }

    public function logToken($token) {
        $this->db->query("SELECT {$this->tabel}.`id`, `nama`, `username`, `password`, `role`, `image` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `token` = :token");
        $this->db->bind("token", $token);
        return $this->db->result();
    }

    public function searchAdmin($search) {
        $this->db->query("SELECT {$this->tabel}.*, {$this->tabel}.`id` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE (`username` LIKE :search || `nama` LIKE :search || `email` LIKE :search || `telepon` LIKE :search || `createdAt` LIKE :search) AND (NOT `role` = :role)");
        $this->db->bind("role", "Member");
        $this->db->bind("search", '%'.$search.'%');
        return $this->db->resultAll();
    }

    public function searchMember($search) {
        $this->db->query("SELECT {$this->tabel}.*, {$this->tabel}.`id` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE (`username` LIKE :search || `nama` LIKE :search || `email` LIKE :search || `telepon` LIKE :search || `createdAt` LIKE :search) AND (`role` = :role)");
        $this->db->bind("role", "Member");
        $this->db->bind("search", '%'.$search.'%');
        return $this->db->resultAll();
    }

    public function profile($id) {
        $this->db->query("SELECT {$this->tabel}.*, `roles`.`role` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE {$this->tabel}.`id` = :id");
        $this->db->bind("id", $id);
        return $this->db->result();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM {$this->tabel}");
        return $this->db->resultAll();
    }

    public function getAdmins() {
        $this->db->query("SELECT {$this->tabel}.*, {$this->tabel}.`id` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE NOT `role` = :role");
        $this->db->bind("role", "Member");
        return $this->db->resultAll();
    }

    public function getMembers() {
        $this->db->query("SELECT {$this->tabel}.*, {$this->tabel}.`id` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `role` = :role");
        $this->db->bind("role", "Member");
        return $this->db->resultAll();
    }

    public function getMemberById($id) {
        $this->db->query("SELECT {$this->tabel}.*, {$this->tabel}.`id` FROM {$this->tabel} INNER JOIN `roles` ON {$this->tabel}.roleId = `roles`.`id` WHERE `role` = :role AND {$this->tabel}.`id` = :id");
        $this->db->bind("role", "Member");
        $this->db->bind("id", $id);
        return $this->db->result();
    }

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
        $this->db->query("INSERT INTO {$this->tabel}(`id`, `nama`, `username`, `password`, `roleId`, `createdAt`, `updatedAt`) VALUES (null,:nama,:username,:password,1,:createdAt,:createdAt)");
        $this->db->bind("nama", $_POST['nama']);
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (password_hash($_POST['password'], PASSWORD_DEFAULT).SALT));
        $this->db->bind("createdAt", date('Y-m-d H:i:s'));
        return $this->db->rowCount();
    }

    public function regis() {
        $this->db->query("INSERT INTO {$this->tabel}(`id`, `nama`, `username`, `password`, `roleId`, `createdAt`, `updatedAt`) VALUES (null,:nama,:username,:password,2,:createdAt,:createdAt)");
        $this->db->bind("nama", $_POST['nama']);
        $this->db->bind("username", $_POST['username']);
        $this->db->bind("password", (password_hash($_POST['password'], PASSWORD_DEFAULT).SALT));
        $this->db->bind("createdAt", date('Y-m-d H:i:s'));
        return $this->db->rowCount();
    }

    public function token($id, $token) {
        $this->db->query("UPDATE {$this->tabel} SET `token`=:token WHERE `id`=:id");
        $this->db->bind("id", $id);
        $this->db->bind("token", $token);
        return $this->db->rowCount();
    }

    public function update() {
        $this->db->query("UPDATE {$this->tabel} SET `nama`=:nama, `email`=:email, `telepon`=:telepon, `alamat`=:alamat, `updatedAt`=:updatedAt WHERE `id`=:id");
        $this->db->bind("nama", $_POST['nama']);
        $this->db->bind("email", $_POST['email']);
        $this->db->bind("telepon", $_POST['telepon']);
        $this->db->bind("alamat", $_POST['alamat']);
        $this->db->bind("updatedAt", date('Y-m-d H:i:s'));
        $this->db->bind("id", $_SESSION['user']['id']);
        return $this->db->rowCount();
    }

    public function updateImage($image) {
        $this->db->query("UPDATE {$this->tabel} SET `image`=:image, `updatedAt`=:updatedAt WHERE `id`=:id");
        $this->db->bind("image", $image);
        $this->db->bind("updatedAt", date('Y-m-d H:i:s'));
        $this->db->bind("id", $_SESSION['user']['id']);
        return $this->db->rowCount();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM {$this->tabel} WHERE `id`=:id");
        $this->db->bind("id", $id);
        return $this->db->rowCount();
    }
}