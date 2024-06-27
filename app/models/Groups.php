<?php

class Roles {

    private $tabel = "groups";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
}