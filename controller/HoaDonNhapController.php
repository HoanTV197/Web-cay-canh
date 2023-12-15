<?php

use function PHPSTORM_META\type;

include_once '../../database/DB.php';

include '../../model/ChiTietHDN.php';
include '../../model/HoaDonNhap.php';
include '../../model/NhaCungCap.php';

include '../../model/SanPham.php';
class HoaDonNhapController
{
    private $listHDN = [];
    private $listNCC = [];
    private $ctHDN = [];
    private $listSP = [];
    /*----------------Tạo mã hóa đơn nhập tự động--------------*/

    public function autoMaHDN()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM hoadonnhap;";
        $result = $db->executeSQL($sql);

        if ($result->num_rows >= 10) {
            $maHDN = "HDN" . ($result->num_rows + 1);
            return $maHDN;
        } else {
            $maHDN = "HDN0" . ($result->num_rows + 1);
            return $maHDN;
        }
    }
    /*----------------Tạo mã chi tiết hóa đơn nhập tự động--------------*/

    public function autoMaCTHDN()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM chitiethdn;";
        $result = $db->executeSQL($sql);

        if ($result->num_rows >= 10) {
            $maCTHDN = "CTHDN" . ($result->num_rows + 1);
            return $maCTHDN;
        } else {
            $maCTHDN = "CTHDN0" . ($result->num_rows + 1);
            return $maCTHDN;
        }
    }
    /*----------------Tính tổng hóa đơn nhập --------------*/

    public function sumPage()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM hoadonnhap;";
        $result = $db->executeSQL($sql);
        return $result->num_rows;
    }

    /*----------------Lấy danh sách hóa đơn nhập -------------*/
    public function getListHDN($page)
    {
        $db = new DB();
        $record_page = 10;
        $numberPage = ($page - 1) * $record_page;
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM hoadonnhap LIMIT $numberPage, $record_page;";
        $result = $db->executeSQL($sql);

        //push các bản ghi vào list hóa đơn nhập
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                array_push($this->listHDN, new HoaDonNhap(
                    $row["MaHDN"],
                    $row["NgayTao"],
                    $row["TongTienHD"],
                    $row["MaSoThue"],
                    $row["GhiChu"],
                    $row["PTThanhToan"],
                    $row["GiamGiaHD"],
                    $row["TrangThai"],
                    $row["MaNV"],
                    $row["MaNCC"]
                ));
            }
        } else {
            echo "Không có hóa đơn nhập nào.";
        }
        return $this->listHDN;
    }
    /*----------------Lấy 1 hóa đơn nhập -------------*/
    public function getHDN($maHDN)
    {
        $db = new DB();

        //câu lện sql cần thực thi
        $sql = "SELECT * FROM hoadonnhap WHERE MaHDN='$maHDN';";
        $result = $db->executeSQL($sql);

        //push các bản ghi vào list hóa đơn nhập
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                return new HoaDonNhap(
                    $row["MaHDN"],
                    $row["NgayTao"],
                    $row["TongTienHD"],
                    $row["MaSoThue"],
                    $row["GhiChu"],
                    $row["PTThanhToan"],
                    $row["GiamGiaHD"],
                    $row["TrangThai"],
                    $row["MaNV"],
                    $row["MaNCC"]
                );
            }
        } else {
            echo "Không có hóa đơn nhập nào.";
        }
        return $this->listHDN;
    }
    /*----------------Lấy 1 thông tin nhà cung cấp của hóa đơn nhập -------------*/

    public function getNCC($MaNCC)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM NhaCungCap WHERE MaNCC='$MaNCC';";
        $result = $db->executeSQL($sql);

        //trả về 1 Nhà cung cấp với tham số là mã Nhà cung cấp
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return new NhaCungCap(
                    $row["MaNCC"],
                    $row["TenNCC"],
                    $row["phone"],
                    $row["email"],
                    $row["diaChi"],
                    $row["ghiChu"]
                );
            }
        } else {
            echo "Không có Nhà cung cấp nào.";
            return false;
        }
    }
    /*----------------chi tiết hóa đơn -------------*/
    public function getChiTietDHN($maHDN)
    {
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM hoadonnhap JOIN chitiethdn ON hoadonnhap.MaHDN=chitiethdn.MaHDN
         WHERE hoadonnhap.MaHDN='$maHDN';";
        $result = $db->executeSQL($sql);
        //push các bản ghi vào list hóa đơn nhập
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->ctHDN, new ChiTietHDN(
                    $row["MaHDN"],
                    $row["MaCTHDN"],
                    $row["MaSP"],
                    $row["SoLuong"],
                ));
            }
        } else {
            echo "Không có hóa đơn nhập nào.";
        }
        return $this->ctHDN;
    }
    /*----------------lấy danh sách sản phẩm trong chi tiết sản phẩm-------------*/

    public function getListSP($maHDN)
    {
        $db = new DB();
        $sql = "SELECT * FROM chitiethdn
        JOIN sanpham ON chitiethdn.MaSP=sanpham.MaSP 
        WHERE chitiethdn.MaHDN='$maHDN';";
        $result = $db->executeSQL($sql);
        //push các bản ghi vào list hóa đơn nhập
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listSP, new SanPham(
                    $row["MaSP"],
                    $row["TenSP"],
                    $row["ThoiGianBH"],
                    $row["MoTaSP"],
                    $row["AnhDaiDien"],
                    $row["DonGiaBan"],
                    $row["NgayNhap"],
                    $row["DonGiaNhap"],
                    $row["MaLoai"],
                    $row["GhiChu"],
                    $row["donViTinh"]
                ));
            }
        }
        return $this->listSP;
    }
    /*----------------lấy danh sách sản phẩm-------------*/
    public function getAllSP()
    {
        $db = new DB();
        $sql = "SELECT * FROM sanpham;";
        $result = $db->executeSQL($sql);
        //push các bản ghi vào list hóa đơn nhập
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listSP, new SanPham(
                    $row["MaSP"],
                    $row["TenSP"],
                    $row["ThoiGianBH"],
                    $row["MoTaSP"],
                    $row["AnhDaiDien"],
                    $row["DonGiaBan"],
                    $row["NgayNhap"],
                    $row["DonGiaNhap"],
                    $row["MaLoai"],
                    $row["GhiChu"],
                    $row["donViTinh"]
                ));
            }
        }
        return $this->listSP;
    }
    /*----------------Lấy danh sách Nhà cung cấp--------------*/
    public function getAllNCC()
    {

        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM nhacungcap;";
        $result = $db->executeSQL($sql);
        echo $sql;
        //push các bản ghi vào list Nhà cung cấp
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listNCC, new NhaCungCap(
                    $row["MaNCC"],
                    $row["TenNCC"],
                    $row["phone"],
                    $row["email"],
                    $row["diaChi"],
                    $row["ghiChu"]
                ));
            }
        } else {
            echo "Không có Nhà cung cấp nào.";
        }

        return $this->listNCC;
    }
    /*----------------Thêm hóa đơn mới--------------*/
    public function insertHDN($MaHDN, $NgayTao, $TongTienHD, $MaSoThue, $PTThanhToan, $TrangThai, $GiamGiaHD, $GhiChu, $MaNCC, $MaNV)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "INSERT INTO 
         `hoadonnhap`(`MaHDN`, `NgayTao`, `TongTienHD`, `MaSoThue`, `PTThanhToan`, `TrangThai`, `GiamGiaHD`, `GhiChu`, `MaNCC`, `MaNV`) 
         VALUES ('$MaHDN','$NgayTao','$TongTienHD','$MaSoThue','$PTThanhToan','$TrangThai','$GiamGiaHD','$GhiChu','$MaNCC','$MaNV');";
        $result = $db->executeSQL($sql);
        echo $sql;
        if ($result) {
            return true;
        }

        return false;
    }
    /*----------------Update trạng thái hóa đơn --------------*/
    public function updateSoLuongHDN($SLNhap, $SLBan)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        $sl = $SLNhap - $SLBan;
        //câu lện sql cần thực thi
        $sql = "UPDATE `chitiethdn` SET `SoLuong`='$sl' WHERE chitiethdn.MaHDN='HDN001';";
        $result = $db->executeSQL($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertCTHDN($MaHDN, $MaCTHDN, $MaSP, $SoLuong)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = " INSERT INTO `chitiethdn`(`MaHDN`, `MaCTHDN`, `MaSP`, `SoLuong`) VALUES ('$MaHDN','$MaCTHDN','$MaSP','$SoLuong');";
        $result = $db->executeSQL($sql);
        echo $sql;
        if ($result) {
            return true;
        }

        return false;
    }
    /*----------------Doanh thu--------------*/
    public function doanhThu()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        $sql = "SELECT
        MONTH(hoadonnhap.NgayTao) AS thang,
        SUM(chitiethdn.SoLuong) AS sl,
        SUM(chitiethdn.SoLuong * sanpham.DonGiaNhap) AS doanhthu
      FROM
        hoadonnhap
      INNER JOIN chitiethdn
        ON hoadonnhap.MaHDN = chitiethdn.MaHDN
      INNER JOIN sanpham
        ON chitiethdn.MaSP = sanpham.MaSP
      GROUP BY
        MONTH(hoadonnhap.NgayTao)";
        $result = $db->executeSQL($sql);

        return $result;
    }
    public function getDG($MaSP)
    {
        $db = new DB();
        $sql = "SELECT sanpham.dongianhap FROM sanpham WHERE MaSP='$MaSP';";
        $result = $db->executeSQL($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['dongianhap'];
            }
        }
    }
    public function getMaNV($username)
    {
        $db = new DB();
        $sql = "SELECT MaNV FROM nhanvien WHERE username='$username';";

        $result = $db->executeSQL($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row['MaNV'];
            }
        } else {
            return null;
        }
    }
    public function getTimeHDN(?string $year = null, ?string $month = null, ?string $day = null)
    {
        $this->listHDN = [];
        $db = new DB();
        $array =  [
            $year=='' ? null : "YEAR(NgayTao)='$year'",
            $month=='' ?null : "MONTH(NgayTao)='$month'",
            $day==''? null : "DAY(NgayTao)='$day'"
        ];
        $arrayNew = array_filter($array, function ($value) {
            return $value !== null;
        });
       
        if(count($arrayNew)==1){
            foreach($arrayNew as $i ){
                $sql = "SELECT * FROM hoadonnhap WHERE $i;";      
             }
        }
        else{
            $sql = "SELECT * FROM hoadonnhap
            WHERE " . implode(" and ", $arrayNew);
        }
        $result = $db->executeSQL($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                array_push($this->listHDN, new HoaDonNhap(
                    $row["MaHDN"],
                    $row["NgayTao"],
                    $row["TongTienHD"],
                    $row["MaSoThue"],
                    $row["GhiChu"],
                    $row["PTThanhToan"],
                    $row["GiamGiaHD"],
                    $row["TrangThai"],
                    $row["MaNV"],
                    $row["MaNCC"]
                ));
            }
        } 
        return $this->listHDN;
    }
}
