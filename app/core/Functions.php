<?php

class Functions {

    static function back() {
        echo "<script>javascript:history.go(-1);</script>";
    }

    static function redirect($url = "") {
        header("Location: ".BURL."/".$url);
        exit();
    }

    static function categories() {
        return Controller::model("Categories")->getAll();
    }

    static function inpSales($typeId, $qty) {
        $_SESSION['sales'] = []
    }

    static function delSales() {

    }

    static function prtSales() {

    }

    static function unsSales() {

    }
    
}