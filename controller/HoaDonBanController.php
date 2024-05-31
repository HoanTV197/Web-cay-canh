<?php
include_once '../../database/DB.php';
include_once  '../../model/ChiTietHDB.php';
include_once  '../../model/HoaDonBan.php';
include_once  '../../model/KhachHang.php';
include_once  '../../model/SanPham.php';
class HoaDonBanController
{
    private $listHDB = [];
    private $listKH = [];
    private $ctHDB = [];
    private $listSP = [];


    /*----------------Tạo mã hóa đơn bán tự động--------------*/

    public function autoMaHDB()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM HoaDonBan;";
        $result = $db->executeSQL($sql);

        if ($result->num_rows >= 10) {
            $maHDB = "HDB" . ($result->num_rows + 1);
            return $maHDB;
        } else {
            $maHDB = "HDB0" . ($result->num_rows + 1);
            return $maHDB;
        }
    }
    /*----------------Tạo mã chi tiết hóa đơn bán tự động--------------*/

    public function autoMaCTHDB()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM chitietHDB;";
        $result = $db->executeSQL($sql);

        if ($result->num_rows >= 10) {
            $maCTHDB = "CTHDB" . ($result->num_rows + 1);
            return $maCTHDB;
        } else {
            $maCTHDB = "CTHDB0" . ($result->num_rows + 1);
            return $maCTHDB;
        }
    }
    /*----------------Tính tổng hóa đơn bán --------------*/

    public function sumPage()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM HoaDonBan;";
        $result = $db->executeSQL($sql);
        return $result->num_rows;
    }

    /*----------------Lấy danh sách hóa đơn bán -------------*/
    public function listHDB($page, $trangThai = null) 
{
    $db = new DB();
    $record_page = 5;
    $numberPage = ($page - 1) * $record_page;
    $sql = "SELECT * FROM HoaDonBan";

    if ($trangThai !== null) {
        if (is_array($trangThai)) { // Nếu $trangThai là mảng (nhiều trạng thái)
            $trangThaiStr = implode(',', $trangThai);
            $sql .= " WHERE TrangThai IN ($trangThaiStr)";
        } else { // Nếu $trangThai là một giá trị duy nhất
            $sql .= " WHERE TrangThai = '$trangThai'";
        }
    }

    $sql .= " LIMIT $numberPage, $record_page;";
        
        $result = $db->executeSQL($sql);
        //push các bản ghi vào list hóa đơn bán
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                array_push($this->listHDB, new HoaDonBan(
                    $row["MaHDB"],
                    $row["NgayTao"],
                    $row["TongTienHD"],
                    $row["MaSoThue"],
                    $row["GhiChu"],
                    $row["PTThanhToan"],
                    $row["GiamGiaHD"],
                    $row["TrangThai"],
                    $row["MaNV"],
                    $row["MaKH"]
                ));
            }
        } else {
            echo "Không có hóa đơn bán nào.";
        }
        return $this->listHDB;
    }

    // Hàm tính tổng số trang
  // Hàm tính tổng số trang
public function totalPage($trangThai = null) // Sửa đổi tham số $trangThai
{
    $db = new DB();
    $sql = "SELECT COUNT(*) AS total FROM HoaDonBan";

    if ($trangThai !== null) {
        if (is_array($trangThai)) { // Nếu $trangThai là mảng
            $trangThaiStr = implode(',', $trangThai);
            $sql .= " WHERE TrangThai IN ($trangThaiStr)";
        } else { // Nếu $trangThai là một giá trị duy nhất
            $sql .= " WHERE TrangThai = '$trangThai'";
        }
    }

    $result = $db->executeSQL($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $totalHoaDon = $row['total'];
        $recordPerPage = 5;
        return ceil($totalHoaDon / $recordPerPage);
    } else {
        return 1; // Hoặc một giá trị mặc định khác
    }
}
    /*----------------Lấy 1 hóa đơn bán -------------*/
    public function getHDB($maHDB)
    {
        $db = new DB();

        //câu lện sql cần thực thi
        $sql = "SELECT * FROM HoaDonBan WHERE MaHDB='$maHDB';";
        $result = $db->executeSQL($sql);

        //push các bản ghi vào list hóa đơn bán
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                return new HoaDonBan(
                    $row["MaHDB"],
                    $row["NgayTao"],
                    $row["TongTienHD"],
                    $row["MaSoThue"],
                    $row["GhiChu"],
                    $row["PTThanhToan"],
                    $row["GiamGiaHD"],
                    $row["TrangThai"],
                    $row["MaNV"],
                    $row["MaKH"]
                );
            }
        } else {
            echo "Không có hóa đơn bán nào.";
        }
        return $this->listHDB;
    }

    /*----------------chi tiết hóa đơn -------------*/
    public function getChiTietHDB($maHDB)
    {
        $this->listHDB = [];
        $this->listKH = [];
        $this->ctHDB = [];
        $this->listSP = [];
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM sanpham 
        JOIN chitiethdb ON sanpham.MaSP=chitiethdb.MaSP 
        JOIN hoadonban ON hoadonban.MaHDB=chitiethdb.MaHDB
        JOIN khachhang ON khachhang.MaKH=hoadonban.MaKH
        WHERE hoadonban.MaHDB='$maHDB';";
        $result = $db->executeSQL($sql);
        //push các bản ghi vào list hóa đơn bán
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->ctHDB, new ChiTietHDB(
                    $row["MaHDB"],
                    $row["MaCTHDB"],
                    $row["MaSP"],
                    $row["SoLuong"],
                ));
                array_push($this->listKH, new KhachHang(
                    $row["MaKH"],
                    $row["TenKH"],
                    $row["email"],
                    $row["Phone"],
                    $row["NgaySinh"],
                    $row["DiaChi"],
                    $row["AnhDaiDien"],
                    $row["GhiChu"],
                    $row["username"],
                    $row["GioiTinh"]
                ));
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
                array_push($this->listHDB, new HoaDonBan(
                    $row["MaHDB"],
                    $row["NgayTao"],
                    $row["TongTienHD"],
                    $row["MaSoThue"],
                    $row["GhiChu"],
                    $row["PTThanhToan"],
                    $row["GiamGiaHD"],
                    $row["TrangThai"],
                    $row["MaNV"],
                    $row["MaKH"]
                ));
            }
        }
        return $this->listKH;
    }
    public function getListHDB($maHDB)
    {
        $this->getChiTietHDB($maHDB);
        return $this->listHDB;
    }

    public function getListKH($maHDB)
    {
        $this->getChiTietHDB($maHDB);
        return $this->listKH;
    }

    public function getCtHDB($maHDB)
    {
        $this->getChiTietHDB($maHDB);
        return $this->ctHDB;
    }

    public function getListSP($maHDB)
    {
        $this->getChiTietHDB($maHDB);
        return $this->listSP;
    }
    /*----------------lấy danh sách sản phẩm trong chi tiết sản phẩm-------------*/

    public function listSP($maHDB)
    {
        $db = new DB();
        $sql = "SELECT * FROM chitietHDB
        JOIN sanpham ON chitietHDB.MaSP=sanpham.MaSP 
        WHERE chitietHDB.MaHDB='$maHDB';";
        $result = $db->executeSQL($sql);
        //push các bản ghi vào list hóa đơn bán
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
        //push các bản ghi vào list hóa đơn bán
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

    /*----------------Thêm hóa đơn mới--------------*/
    public function insertHDB($MaHDB, $NgayTao, $TongTienHD, $MaSoThue, $PTThanhToan, $TrangThai, $GiamGiaHD, $GhiChu, $MaKH, $MaNV)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "INSERT INTO 
         `HoaDonBan`(`MaHDB`, `NgayTao`, `TongTienHD`, `MaSoThue`, `PTThanhToan`, `TrangThai`, `GiamGiaHD`, `GhiChu`, `MaKH`, `MaNV`) 
         VALUES ('$MaHDB','$NgayTao','$TongTienHD','$MaSoThue','$PTThanhToan','$TrangThai','$GiamGiaHD','$GhiChu','$MaKH','$MaNV');";
        // echo "HDB:".$sql;
        $result = $db->executeSQL($sql);

        if ($result) {
            return true;
        }

        return false;
    }
    public function insertCTHDB($MaHDB, $MaCTHDB, $MaSP, $SoLuong)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = " INSERT INTO `chitietHDB`(`MaHDB`, `MaCTHDB`, `MaSP`, `SoLuong`) VALUES ('$MaHDB','$MaCTHDB','$MaSP','$SoLuong');";
        //echo "CTHDB:".$sql;
        $result = $db->executeSQL($sql);
        if ($result) {
            return true;
        }

        return false;
    }
    /*----------------Update trạng thái hóa đơn --------------*/
    public function updateHDB($MaHDB, $trangThai)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "UPDATE `hoadonban` 
        SET `TrangThai`='$trangThai' WHERE `MaHDB`='$MaHDB'";
        $result = $db->executeSQL($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function listHD_KH($username, $results_per_page, $offset)
    {
        // Khởi tạo database và kết nối
        $db = new DB();
        // Câu lệnh SQL cần thực thi với giới hạn và vị trí bắt đầu
        $sql = "SELECT * FROM hoadonban JOIN khachhang ON hoadonban.MaKH=khachhang.MaKH
                WHERE khachhang.username='$username'
                LIMIT $offset, $results_per_page;";
        $result = $db->executeSQL($sql);
        
        $this->listHDB = [];
    
        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listHDB, new HoaDonBan(
                    $row["MaHDB"],
                    $row["NgayTao"],
                    $row["TongTienHD"],
                    $row["MaSoThue"],
                    $row["GhiChu"],
                    $row["PTThanhToan"],
                    $row["GiamGiaHD"],
                    $row["TrangThai"],
                    $row["MaNV"],
                    $row["MaKH"]
                ));
            }
        } else {
            echo "Không có hóa đơn bán nào.";
        }
    
        // Tính tổng số hóa đơn
        $totalHoaDon = $this->sumPage();
    
        // Tính tổng số trang
        $totalPages = ceil($totalHoaDon / $results_per_page);
    
        // Trả về danh sách hóa đơn và số trang
        return ['listHDB' => $this->listHDB, 'totalPages' => $totalPages];
    }
    
    /*----------------Doanh thu--------------*/
    public function doanhThu($nam)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        $sql = "SELECT
        MONTH(hoadonban.NgayTao) AS thang,
        SUM(chitiethdb.SoLuong) AS sl,
        SUM(chitiethdb.SoLuong * sanpham.DonGiaBan) AS doanhthu
      FROM
        hoadonban
      INNER JOIN chitiethdb
        ON hoadonban.MaHDB = chitiethdb.MaHDB
      INNER JOIN sanpham
        ON chitiethdb.MaSP = sanpham.MaSP
        WHERE YEAR(hoadonban.NgayTao)='$nam'
      GROUP BY 
        MONTH(hoadonban.NgayTao)";
        $result = $db->executeSQL($sql);

        return $result;
    }
    /*----------------Lấy khách hàng theo username--------------*/
    public function getKhachHang($username)
    {
        $db = new DB();
        $sql = "SELECT * FROM khachhang WHERE username='$username'";
        $result = $db->executeSQL($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row["MaKH"];
            }
        }
    }
    public function getListKHTN()
    {
        $db = new DB();

        $sql = "SELECT khachhang.MaKH,khachhang.GioiTinh,khachhang.NgaySinh,khachhang.AnhDaiDien,khachhang.TenKH,khachhang.email,khachhang.Phone,khachhang.DiaChi,SUM(hoadonban.TongTienHD) AS TongTien 
        FROM khachhang JOIN hoadonban ON khachhang.MaKH=hoadonban.MaKH
        GROUP BY khachhang.MaKH
        ORDER BY TongTien DESC
        LIMIT 10;";
        $result = $db->executeSQL($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }


    
    
}
