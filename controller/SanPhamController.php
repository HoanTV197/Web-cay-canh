<?php

include '../../database/DB.php';
include '../../model/SanPham.php';
include '../../model/LoaiSP.php';
include '../../model/TinTuc.php';

class SanPhamController
{
    private $listProduct = [];
    private $listLoai = [];
    private $listNews = [];
    public function getListProduct()
    {
        return $this->listProduct;
    }
    public function getListLoai()
    {
        return $this->listLoai;
    }
    /*----------------Tạo mã sản phẩm tự động--------------*/
    public function autoMaSP()
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM sanpham;";
        $result = $db->executeSQL($sql);
        if ($result->num_rows >= 10) {
            $maSP = "SP" . ($result->num_rows + 1);
            return $maSP;
        } else {
            $maSP = "SP0" . $result->num_rows;
            return $maSP;
        }
    }
    /*----------------Tạo mã sản phẩm tự động--------------*/
    public function sumPage($nameTable)
    {
        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM $nameTable;";
        $result = $db->executeSQL($sql);
        return $result->num_rows;
    }
    /*----------------Lấy tất cả sản phẩm--------------*/
    /*
     * $numberPage : index page đầu vd: lấy 10->20 thì index page sẽ là 10
     * $record_page: số lượng sản phẩm của mỗi page
     */
    public function getAllProduct($page, $sort)
    {
        $db = new DB();
        $record_page = 8;
        $numberPage = ($page - 1) * $record_page;
    
        // Define sorting options
        $sortOptions = [
            'number_buy-desc' => 'SoLuongBan DESC',
            'name-asc' => 'TenSP ASC',
            'name-desc' => 'TenSP DESC',
            'price-asc' => 'DonGiaBan ASC',
            'price-desc' => 'DonGiaBan DESC',
            'created-desc' => 'NgayNhap DESC',
            'created-asc' => 'NgayNhap ASC'
        ];
    
        // Default to 'name-asc' if sort is not in the options
        $orderBy = isset($sortOptions[$sort]) ? $sortOptions[$sort] : 'TenSP ASC';
    
        $sql = "SELECT * FROM sanpham ORDER BY $orderBy LIMIT $numberPage, $record_page;";
        $result = $db->executeSQL($sql);
    
        $this->listProduct = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listProduct, new SanPham(
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
        } else {
            echo "Không có sản phẩm nào.";
        }
    
        return $this->listProduct;
    }
    
    public function getAllProduct1()
    {

        //khởi tạo database và kết nối
        $db = new DB();
        //câu lện sql cần thực thi
        $sql = "SELECT * FROM sanpham ;";
        $result = $db->executeSQL($sql);

        //push các bản ghi vào listProduct
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listProduct, new SanPham(
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
        } else {
            echo "Không có sản phẩm nào.";
        }

        return $this->listProduct;
    }
    /*----------------Sửa sản phẩm--------------*/
    function editProduct($MaSP,$MaLoai,$TenSP,$DonGiaBan,$DonGiaNhap,$NgayNhap,$ThoiGianBH,$MoTaSP,$donViTinh,$AnhDaiDien,$GhiChu)
    {
        $sql = "UPDATE `sanpham` 
        SET 
        `MaLoai`='$MaLoai',
        `TenSP`='$TenSP',
        `DonGiaBan`='$DonGiaBan',
        `DonGiaNhap`='$DonGiaNhap',
        `NgayNhap`='$NgayNhap',
        `ThoiGianBH`='$ThoiGianBH',
        `MoTaSP`='$MoTaSP',
        `donViTinh`='$donViTinh',
        `AnhDaiDien`='$AnhDaiDien',
        `GhiChu`='$GhiChu' WHERE `MaSP`='$MaSP';";
        echo $sql;
        $db = new DB();
       
       $kq= $db->executeSQL($sql);
        if($kq){
            return true;
        }
        else{
            return false;
        }

    }
    /*----------------Thêm sản phẩm--------------*/
    function insertProduct($MaSP, $MaLoai, $TenSP, $DonGiaBan, $DonGiaNhap, $NgayNhap, $ThoiGianBH, $MoTaSP, $donViTinh, $AnhDaiDien, $GhiChu)
    {
        $sql = "INSERT INTO `sanpham`(`MaSP`, `MaLoai`, `TenSP`, `DonGiaBan`, `DonGiaNhap`, `NgayNhap`, `ThoiGianBH`, `MoTaSP`, `donViTinh`, `AnhDaiDien`, `GhiChu`) VALUES 
        ('$MaSP','$MaLoai','$TenSP','$DonGiaBan','$DonGiaNhap','$NgayNhap','$ThoiGianBH','$MoTaSP','$donViTinh','$AnhDaiDien','$GhiChu');" ;
        $db = new DB();
        echo $sql;
        $kq=$db->executeSQL($sql);

        if($kq){
            return true;
        }
        else{
            return false;
        }
    }
    /*----------------Xóa sản phẩm--------------*/
       function deleteProduct($id)
       {
        $db = new DB();
        $sql = "SELECT MaSP FROM chitiethdb;";
        $ctb = $db->executeSQL($sql);  
        //check sp tồn tại trong ctb  
        $check = true;
        if($ctb->num_rows>0){
            while($row=$ctb->fetch_assoc()){
                if($id==$row["MaSP"]){
                    $check = false;
                }
            }
        }
        //check sp tồn tại trong ctn
        $sql1 = "SELECT MaSP FROM chitiethdn;";
        $ctn = $db->executeSQL($sql1);    
        if($ctn->num_rows>0){
            while($row=$ctn->fetch_assoc()){
                if($id==$row["MaSP"]){
                    $check = false;
                }
            }
        }
         if($check){
            $sql2= "DELETE FROM `sanpham` WHERE MaSP='".$id."' ;";
            echo $sql2;
            $kq=$db->executeSQL($sql2);
            if ($kq) {
                return true;
            } else {
                return false;
            }
       }
       else{
        return false;
       }   
      }
    /*----------------loại sản phẩm--------------*/
    public function getLoaiSP()
    {
        //khởi tạo database và kết nối
        $db = new DB();

        //câu lện sql cần thực thi
        $sql = "SELECT * FROM LoaiSP ;";
        $result = $db->executeSQL($sql);
        $list = [];
        //push các bản ghi vào list Loai
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($list, new LoaiSP(
                    $row["MaLoai"],
                    $row["Loai"]

                ));
            }
        } else {
            echo "Không có tin tức nào.";
        }

        return $list;
    }
    public function getProduct($MaSP){
        $db = new DB();
        $sql = "SELECT * FROM SanPham WHERE MaSP='$MaSP'";
        $result =$db->executeSQL($sql);
        //push các bản ghi vào listProduct
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return new SanPham(
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
                );
            }
        }
    }
    public function SPBanChay(){
        $db=new DB();
        $sql = "SELECT
        sanpham.MaSP,
        sanpham.TenSP,
        AnhDaiDien,
        sanpham.DonGiaBan,
        SUM(chitiethdb.soluong) AS soluongban
      FROM sanpham INNER JOIN chitiethdb ON sanpham.masp = chitiethdb.masp
      GROUP BY sanpham.masp
      ORDER BY soluongban DESC
      LIMIT 5;";
        return $db->executeSQL($sql);
    }
    public function SPTheoLoai($maLoai){
        $this->listProduct = [];
        $db=new DB();
        $sql = "SELECT *
        FROM sanpham
        WHERE sanpham.MaLoai = '$maLoai'
        LIMIT 5";
         $result = $db->executeSQL($sql);

         //push các bản ghi vào listProduct
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 array_push($this->listProduct, new SanPham(
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
         } else {
             echo "Không có sản phẩm nào.";
         }
 
         return $this->listProduct;
    }
    public function layTinTuc(){
        $db=new DB();
        $sql="SELECT * FROM tintuc";
        $result=$db->executeSQL($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($this->listNews, new TinTuc(
                    $row["MaTinTuc"],
                    $row["TieuDe"],
                    $row["NoiDung"],
                    $row["MoTaNgan"],
                    $row["Anh"]   ,
                    $row["NgayTao"]       
                ));
            }
        }
        return $this->listNews;
    }
    public function layCTHD(){
        $db=new DB();
        $sql= "SELECT sanpham.MaSP,sanpham.TenSP,sanpham.MaLoai,chitiethdn.SoLuong FROM chitiethdn 
        JOIN sanpham ON sanpham.MaSP=chitiethdn.MaSP
        GROUP BY sanpham.MaSP;";
        $result=$db->executeSQL($sql);
        if ($result) {
            return true;
        }
        else{
            return false;
        }
    }
    public function timKiemSanPham($tenSP)
    {
        $db = new DB();
        $sql = "SELECT `MaSP`, `MaLoai`, `TenSP`, `DonGiaBan`, `DonGiaNhap`, `NgayNhap`, `ThoiGianBH`, `MoTaSP`, `donViTinh`, `AnhDaiDien`, `GhiChu` 
        FROM `sanpham` WHERE TenSP like'%$tenSP%';";
        $result = $db->executeSQL($sql);
        $listProduct = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($listProduct, new SanPham(
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
                )
                );
            }
            return $listProduct;
        }
    }
     /*----------------Lấy số lượng theo mã sản phẩm --------------*/
     public function getSoLuongTon($MaSP)
     {
         //khởi tạo database và kết nối
         $db = new DB();
         //câu lện sql cần thực thi
         $sql = "SELECT sanpham.MaSP,SUM(chitiethdn.SoLuong) AS SoLuong FROM sanpham JOIN chitiethdn
         ON sanpham.MaSP=chitiethdn.MaSP 
         WHERE sanpham.MaSP='$MaSP'
         GROUP BY sanpham. MaSP;"; 
          $sql1 = "SELECT sanpham.MaSP,SUM(chitiethdb.SoLuong) AS SoLuong FROM sanpham JOIN chitiethdb
          ON sanpham.MaSP=chitiethdb.MaSP 
          WHERE sanpham.MaSP='$MaSP'
          GROUP BY sanpham.MaSP;";
         $SLNhap = 0;$SLBan=0;
         $result = $db->executeSQL($sql);
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $SLNhap= $row['SoLuong'];
             }
         }
        
        $result1 = $db->executeSQL($sql1);
         if ($result1->num_rows > 0) {
             while ($row = $result1->fetch_assoc()) {
                 $SLBan= $row['SoLuong'];
             }
         }
         return  $SLNhap -$SLBan;
     }

}
