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

    static function inpSales(array $item, int $qty) {
        if (!isset($_SESSION['sales'])) {
            $_SESSION['sales'] = [];
        }
        array_push($_SESSION['sales'], ['item' => $item, 'qty' => $qty, 'sum' => $item['hargaSatuan']*$qty]);
    }

    static function sumSales() {
        $sum = 0.00;
        if (isset($_SESSION['sales'])) {
            foreach ($_SESSION['sales'] as $sale) {
                $sum += $sale['sum'];
            }
        }
        return $sum;
    }

    static function delSales(int $i) {
        unset($_SESSION['sales'][$i]);
    }

    static function unsSales() {
        unset($_SESSION['sales']);
    }
    
}