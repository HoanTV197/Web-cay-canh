<?php
if (isset($_GET["pages"])) {
    $pages = $_GET["pages"];
    switch ($pages) {
        case "trangchu":
            include './trangchu.php';
            break;
        case "sanpham":
            include "./sanpham.php";
            break;
        case "timKiemSP":
            include "./timKiemSP.php";
            break;
        case "tintuc":
            include './tintuc.php';
            break;
        case "lienhe":
            include "./lienhe.php";
            break;
        case "logout":
            include '../login/logout.php';
            break;
        case "chiTietSP":
            include './chiTietSP.php';
            break;
        case "chiTietTinTuc":
            include './chiTietTinTuc.php';
            break;
        case "giohang":
            include './giohang.php';
            break;
        case "lichSuMuaHang":
            include './lichSuMuaHang.php';
            break;
            case "chiTietHDB":
                include './chiTietHDB.php';
                break;
    }
} else {
    include './trangchu.php';
}
