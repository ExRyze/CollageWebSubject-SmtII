<?php

class Flasher {

    static function setFlash($pesan, $type) {
        $_SESSION['flasher'] = [
            'pesan' => $pesan,
            'type' => $type
        ];
    }

    static function getFlash() {
        if(isset($_SESSION['flasher'])) {
            echo "<div class='alert alert-{$_SESSION['flasher']['type']}' role='alert'>{$_SESSION['flasher']['pesan']}</div>";
            unset($_SESSION['flasher']);
        }
    }

}