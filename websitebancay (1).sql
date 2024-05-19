-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2023 lúc 06:35 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `websitebancay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethdb`
--

CREATE TABLE `chitiethdb` (
  `MaHDB` char(250) NOT NULL,
  `MaCTHDB` char(250) NOT NULL,
  `MaSP` char(250) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethdb`
--

INSERT INTO `chitiethdb` (`MaHDB`, `MaCTHDB`, `MaSP`, `SoLuong`) VALUES
('HDB001', 'CTHDB001', 'SP001', 50),
('HDB001', 'CTHDB002', 'SP002', 30),
('HDB002', 'CTHDB003', 'SP001', 50),
('HDB002', 'CTHDB004', 'SP002', 50),
('HDB003', 'CTHDB005', 'SP001', 50),
('HDB003', 'CTHDB006', 'SP002', 50),
('HDB09', 'CTHDB07', 'SP001', 1),
('HDB09', 'CTHDB07', 'SP002', 1),
('HDB09', 'CTHDB07', 'SP005', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethdn`
--

CREATE TABLE `chitiethdn` (
  `MaHDN` char(250) NOT NULL,
  `MaCTHDN` char(250) NOT NULL,
  `MaSP` char(250) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethdn`
--

INSERT INTO `chitiethdn` (`MaHDN`, `MaCTHDN`, `MaSP`, `SoLuong`) VALUES
('HDN001', 'CTHDN001', 'SP003', 1000),
  ('HDN001', 'CTHDN007', 'SP001', 1000),
('HDN001', 'CTHDN002', 'SP004', 800),
('HDN002', 'CTHDN003 ', 'SP003', 1000),
('HDN002', 'CTHDN004', 'SP004', 800),
('HDN003', 'CTHDN004', 'SP005', 1000),
('HDN003', 'CTHDN006', 'SP006', 1000),
 ('HDN004', 'CTHDN007', 'SP002', 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonban`
--

CREATE TABLE `hoadonban` (
  `MaHDB` char(250) NOT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `TongTienHD` decimal(19,2) DEFAULT NULL,
  `MaSoThue` char(100) DEFAULT NULL,
  `PTThanhToan` char(100) DEFAULT NULL,
  `TrangThai` varchar(100) DEFAULT NULL,
  `GiamGiaHD` float DEFAULT NULL,
  `GhiChu` varchar(100) DEFAULT NULL,
  `MaNV` char(250) DEFAULT NULL,
  `MaKH` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonban`
--

INSERT INTO `hoadonban` (`MaHDB`, `NgayTao`, `TongTienHD`, `MaSoThue`, `PTThanhToan`, `TrangThai`, `GiamGiaHD`, `GhiChu`, `MaNV`, `MaKH`) VALUES
('HDB001', '2023-01-13 00:00:00', '250.00', 'MS001', 'Tiền mặt', '0', 10, 'Ghi chú hoá đơn bán 1', 'NV001', 'KH001'),
('HDB002', '2023-02-14 00:00:00', '180.00', 'MS002', 'Chuyển khoản', '1', 5, 'Ghi chú hoá đơn bán 2', 'NV002', 'KH003'),
('HDB003', '2023-03-13 00:00:00', '250.00', 'MS001', 'Tiền mặt', '2', 10, 'Ghi chú hoá đơn bán 1', 'NV001', 'KH001'),
('HDB004', '2023-04-14 00:00:00', '180.00', 'MS002', 'Chuyển khoản', '1', 5, 'Ghi chú hoá đơn bán 2', 'NV002', 'KH002'),
('HDB005', '2023-05-14 00:00:00', '180.00', 'MS002', 'Chuyển khoản', '1', 5, 'Ghi chú hoá đơn bán 2', 'NV002', 'KH002'),
('HDB006', '2023-06-14 00:00:00', '180.00', 'MS002', 'Chuyển khoản', '1', 5, 'Ghi chú hoá đơn bán 2', 'NV002', 'KH003'),
('HDB007', '2023-07-14 00:00:00', '180.00', 'MS002', 'Chuyển khoản', '1', 5, 'Ghi chú hoá đơn bán 2', 'NV002', 'KH004'),
('HDB008', '2023-08-14 00:00:00', '180.00', 'MS002', 'Chuyển khoản', '1', 5, 'Ghi chú hoá đơn bán 2', 'NV002', 'KH005'),
('HDB09', '2023-11-13 22:26:36', '95.00', 'MS10', 'Tiền mặt', '0', 0, '', 'NV001', 'KH001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `MaHDN` char(250) NOT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `TongTienHD` decimal(19,2) DEFAULT NULL,
  `MaSoThue` char(100) DEFAULT NULL,
  `PTThanhToan` char(100) DEFAULT NULL,
  `TrangThai` varchar(100) DEFAULT NULL,
  `GiamGiaHD` float DEFAULT NULL,
  `GhiChu` varchar(100) DEFAULT NULL,
  `MaNCC` char(250) NOT NULL,
  `MaNV` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`MaHDN`, `NgayTao`, `TongTienHD`, `MaSoThue`, `PTThanhToan`, `TrangThai`, `GiamGiaHD`, `GhiChu`, `MaNCC`, `MaNV`) VALUES
('HDN001', '2023-10-13 00:00:00', '500.00', 'MSN001', 'Chuyển khoản', 'Hoàn thành', 15, 'Ghi chú hoá đơn nhập 1', 'NCC001', 'NV001'),
('HDN002', '2023-10-14 00:00:00', '350.00', 'MSN002', 'Tiền mặt', 'Chưa thanh toán', 8, 'Ghi chú hoá đơn nhập 2', 'NCC002', 'NV002'),
('HDN003', '2023-10-13 00:00:00', '500.00', 'MSN001', 'Chuyển khoản', 'Hoàn thành', 15, 'Ghi chú hoá đơn nhập 1', 'NCC001', 'NV001'),
('HDN004', '2023-10-14 00:00:00', '350.00', 'MSN002', 'Tiền mặt', 'Chưa thanh toán', 8, 'Ghi chú hoá đơn nhập 2', 'NCC002', 'NV002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(100) NOT NULL,
  `TenKH` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Phone` char(100) DEFAULT NULL,
  `GioiTinh` char(100) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `AnhDaiDien` char(100) DEFAULT NULL,
  `GhiChu` varchar(100) DEFAULT NULL,
  `username` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `email`, `Phone`, `GioiTinh`, `NgaySinh`, `DiaChi`, `AnhDaiDien`, `GhiChu`, `username`) VALUES
('KH001', 'Phạm Minh Tuấn', 'kh1@gmail.com', '123456789', 'Nam', '1990-01-01', 'Hà Nội', 'anh-kh.jpg', 'Ghi chú khách hàng 1', 'user1'),
('KH002', 'Nguyễn Tiến Ninh', 'kh2@gmail.com', '123456789', 'Nam', '1990-01-01', 'Hà Nội', 'anh-kh.jpg', 'Ghi chú khách hàng 2', 'user2'),
('KH003', 'Nguyễn Văn Hùng', 'kh3@gmail.com', '123456789', 'Nam', '1990-01-01', 'Hà Nội', 'anh-kh.jpg', 'Ghi chú khách hàng 3', 'user3'),
('KH004', 'Nguyễn Thị Mai', 'kh4@gmail.com', '987654321', 'Nữ', '1995-05-05', 'Vĩnh Phúc', 'anh-kh.jpg', 'Ghi chú khách hàng 4', 'user4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoai` varchar(250) NOT NULL,
  `Loai` varchar(100) DEFAULT NULL,
  `GhiChu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoai`, `Loai`, `GhiChu`) VALUES
('Loai001', 'Cây cảnh', ''),
('Loai002', 'Cây Phong Thủy', ''),
('Loai003', 'Hoa', ''),
('Loai004', 'Chậu cây ', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` char(250) NOT NULL,
  `TenNCC` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `diaChi` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ghiChu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `phone`, `diaChi`, `email`, `ghiChu`) VALUES
('NCC001', 'Nhà cung cấp 1', '09009', 'Hà Nội', 'ncc1@gmail.com', NULL),
('NCC002', 'Nhà cung cấp 2', '09009', 'Hà Nội', 'ncc2@gmail.com', NULL),
('NCC003', 'Nhà cung cấp 1', '09009', 'Hà Nội', 'ncc3@gmail.com', NULL),
('NCC004', 'Nhà cung cấp 2', '09009', 'Hà Nội', 'ncc4@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` char(250) NOT NULL,
  `TenNV` varchar(100) DEFAULT NULL,
  `Phone` char(15) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` char(100) DEFAULT NULL,
  `ChucVu` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(150) DEFAULT NULL,
  `SoCCCD` varchar(150) DEFAULT NULL,
  `SoTaiKhoanNH` varchar(150) DEFAULT NULL,
  `AnhDaiDien` char(100) DEFAULT NULL,
  `username` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `Phone`, `NgaySinh`, `GioiTinh`, `ChucVu`, `DiaChi`, `SoCCCD`, `SoTaiKhoanNH`, `AnhDaiDien`, `username`) VALUES
('admin', 'Hoàng Minh Tuấn', '123123123', '2003-05-01', 'Nam', 'Quản lý', 'Vĩnh Phúc', 'CCCDNV1', 'TKNHNV1', 'anh-nv.jpg', 'admin'),
('NV001', 'Trần Văn Quỳnh', '123123123', '2003-05-01', 'Nam', 'Quản lý', 'Vĩnh Phúc', 'CCCDNV1', 'TKNHNV1', 'anh-nv.jpg', 'nhanvien1'),
('NV002', 'Nguyễn Phương Uyên', '123123123', '2002-10-01', 'Nữ', 'Nhân viên bán hàng', 'Hà Nội', 'CCCDNV1', 'TKNHNV1', 'anh-nv.jpg', 'nhanvien2'),
('NV003', 'Nguyễn Văn Tuấn', '123123123', '2000-01-02', 'Nam', 'Quản lý', 'Cà Mau', 'CCCDNV1', 'TKNHNV1', 'anh-nv.jpg', 'nhanvien3'),
('NV004', 'Phùng Văn Mạnh', '456456456', '1999-05-05', 'Nữ', 'Nhân viên bán hàng', 'Tam Dương', 'CCCDNV2', 'TKNHNV2', 'anh-nv.jpg', 'nhanvien4'),
('NV005', 'Trần Văn Quỳnh', '123123123', '2003-05-01', 'Nam', 'Quản lý', 'Vĩnh Phúc', 'CCCDNV1', 'TKNHNV1', 'anh-nv.jpg', 'nhanvien5'),
('NV006', 'Nguyễn Phương Uyên', '123123123', '2002-10-01', 'Nữ', 'Nhân viên bán hàng', 'Hà Nội', 'CCCDNV1', 'TKNHNV1', 'anh-nv.jpg', 'nhanvien6'),
('NV007', 'Nguyễn Văn Tuấn', '123123123', '2000-01-02', 'Nam', 'Quản lý', 'Cà Mau', 'CCCDNV1', 'TKNHNV1', 'anh-nv.jpg', 'nhanvien7'),
('NV008', 'Phùng Văn Mạnh', '456456456', '1999-05-05', 'Nữ', 'Nhân viên bán hàng', 'Tam Dương', 'CCCDNV2', 'TKNHNV2', 'anh-nv.jpg', 'nhanvien8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`

CREATE TABLE `sanpham` (
  `MaSP` char(250) NOT NULL,
  `MaLoai` char(250) DEFAULT NULL,
  `TenSP` varchar(150) DEFAULT NULL,
  `DonGiaBan` decimal(10,3) DEFAULT NULL,
  `DonGiaNhap` decimal(10,3) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `ThoiGianBH` decimal(10,2) DEFAULT NULL,
  `MoTaSP` varchar(250) DEFAULT NULL,
  `donViTinh` varchar(250) DEFAULT NULL,
  `AnhDaiDien` varchar(100) DEFAULT NULL,
  `GhiChu` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaLoai`, `TenSP`, `DonGiaBan`, `DonGiaNhap`, `NgayNhap`, `ThoiGianBH`, `MoTaSP`, `donViTinh`, `AnhDaiDien`, `GhiChu`) VALUES
('SP001', 'Loai001', 'Cây cỏ mini', '300.000', '250.000', '2023-10-13 00:00:00', '12.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '1.jpg', 'Mô tả sản phẩm 1'),
('SP002', 'Loai001', 'Cây phát tài', '250.000', '150.000', '2023-10-13 00:00:00', '12.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '2.jpg', 'Mô tả sản phẩm 2'),
('SP003', 'Loai001', 'Bonsai cây cỏ', '500.000', '300.000', '2023-10-13 00:00:00', '12.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '3.jpg', 'Mô tả sản phẩm 3'),
('SP004', 'Loai002', 'Hoa hướng dương', '500.000', '120.000', '2023-10-13 00:00:00', '10.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '4.jpg', 'Mô tả sản phẩm 4'),
('SP005', 'Loai002', 'Hoa tulip', '400.000', '140.000', '2023-10-13 00:00:00', '10.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '5.jpg', 'Mô tả sản phẩm 5'),
('SP006', 'Loai002', 'Hoa cúc trắng', '600.000', '100.000', '2023-10-13 00:00:00', '10.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '6.jpg', 'Mô tả sản phẩm 6'),
('SP007', 'Loai002', 'Hoa hồng đỏ', '450.000', '150.000', '2023-10-13 00:00:00', '10.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '7.jpg', 'Mô tả sản phẩm 7'),
('SP008', 'Loai002', 'Hoa lan hồ điệp', '400.000', '180.000', '2023-10-13 00:00:00', '10.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '8.jpg', 'Mô tả sản phẩm 8'),
('SP009', 'Loai001', 'Cây cây xanh', '350.000', '280.000', '2023-10-13 00:00:00', '12.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '9.jpg', 'Mô tả sản phẩm 9'),
('SP010', 'Loai001', 'Cây trang trí', '250.000', '200.000', '2023-10-13 00:00:00', '12.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '10.jpg', 'Mô tả sản phẩm 10'),
('SP011', 'Loai002', 'Hoa hồng đỏ', '450.000', '150.000', '2023-10-13 00:00:00', '10.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '7.jpg', 'Mô tả sản phẩm 7'),
('SP012', 'Loai002', 'Hoa lan hồ điệp', '400.000', '180.000', '2023-10-13 00:00:00', '10.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '8.jpg', 'Mô tả sản phẩm 8'),
('SP013', 'Loai004', 'Chậu cây đẹp', '350.000', '280.000', '2023-10-13 00:00:00', '12.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '9.jpg', 'Mô tả sản phẩm 9'),
('SP014', 'Loai004', 'Chậu cây  trang trí', '250.000', '200.000', '2023-10-13 00:00:00', '12.00', 'Cây có nhiều kích cỡ và chủng loại theo yêu cầu của khách hàng. Nếu khách lấy số lượng cây lộc vừng có thể liên hệ với chúng tôi để được giá ưu đãi.', 'cây', '10.jpg', 'Mô tả sản phẩm 10'),
('SP15', 'Loai001', 'Cây sen đá', '20.000', '20.000', '2023-11-17 00:00:00', '2.00', 'Cây sen đá', 'cây', '', 'ggg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTinTuc` varchar(250) NOT NULL,
  `TieuDe` varchar(250) DEFAULT NULL,
  `NoiDung` varchar(1500) DEFAULT NULL,
  `MoTaNgan` varchar(200) DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `Anh` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`MaTinTuc`, `TieuDe`, `NoiDung`, `MoTaNgan`, `NgayTao`, `Anh`) VALUES
('TT001', '5 bài thuốc từ cây Ngũ Da Bì', 'Là loại thân gỗ, mọc thành bụi, lá dạng lá kép chân chim, mọc so le, màu sẫm bóng. Có hoa mọc ở đầu cành, cuống dài khoảng 4cm, nhỏ, màu trắng lục. Cây có quả hình cầu dẹt, mọng, khi chín có màu đen, bên trong có 2 hạt.', 'Cây ngũ da bì hay còn gọi là cây chân vịt. Loại cây cảnh được rất nhiều người ưa thích bởi vẻ đẹp xanh mát của mình. Ngoài tác…', '2023-10-13 00:00:00', '1.jpg'),
('TT002', 'Cây Ngũ Gia Bì có hoa không?', 'Là loại thân gỗ, mọc thành bụi, lá dạng lá kép chân chim, mọc so le, màu sẫm bóng. Có hoa mọc ở đầu cành, cuống dài khoảng 4cm, nhỏ, màu trắng lục. Cây có quả hình cầu dẹt, mọng, khi chín có màu đen, bên trong có 2 hạt.', 'Cây ngũ da bì hay còn gọi là cây chân vịt. Loại cây cảnh được rất nhiều người ưa thích bởi vẻ đẹp xanh mát của mình. Ngoài tác…', '2023-10-13 00:00:00', '2.jpg'),
('TT003', 'Cây ngũ da bì có mấy loại', 'Là loại thân gỗ, mọc thành bụi, lá dạng lá kép chân chim, mọc so le, màu sẫm bóng. Có hoa mọc ở đầu cành, cuống dài khoảng 4cm, nhỏ, màu trắng lục. Cây có quả hình cầu dẹt, mọng, khi chín có màu đen, bên trong có 2 hạt.', 'Cây ngũ da bì hay còn gọi là cây chân vịt. Loại cây cảnh được rất nhiều người ưa thích bởi vẻ đẹp xanh mát của mình. Ngoài tác… ', '2023-10-13 00:00:00', '3.jpg'),
('TT004', 'Cây ngũ da bì có mấy loại', 'Là loại thân gỗ, mọc thành bụi, lá dạng lá kép chân chim, mọc so le, màu sẫm bóng. Có hoa mọc ở đầu cành, cuống dài khoảng 4cm, nhỏ, màu trắng lục. Cây có quả hình cầu dẹt, mọng, khi chín có màu đen, bên trong có 2 hạt.', 'Cây ngũ da bì hay còn gọi là cây chân vịt. Loại cây cảnh được rất nhiều người ưa thích bởi vẻ đẹp xanh mát của mình. Ngoài tác… ', '2023-10-13 00:00:00', '4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `LoaiUser` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
-- mật khẩu : 88888888

INSERT INTO `user` (`username`, `password`, `LoaiUser`) VALUES
('admin', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 1),
('nhanvien1', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('nhanvien2', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('nhanvien3', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('nhanvien4', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('nhanvien5', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('nhanvien6', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('nhanvien7', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('nhanvien8', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('user1', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('user2', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('user3', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0),
('user4', '$2y$10$j2gt8CIYn16rFXOg3pj1j.eaw.C5rnGcLb7nToPEa5IdRRgYAFNO.', 0);


--bảng quên mật khẩu
CREATE TABLE password_reset (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expires INT NOT NULL
);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethdb`
--
ALTER TABLE `chitiethdb`
  ADD PRIMARY KEY (`MaHDB`,`MaSP`),
  ADD KEY `FK_ChiTietHDB_SanPham` (`MaSP`);

--
-- Chỉ mục cho bảng `chitiethdn`
--
ALTER TABLE `chitiethdn`
  ADD PRIMARY KEY (`MaHDN`,`MaSP`),
  ADD KEY `FK_ChiTietHDN_SanPham` (`MaSP`);

--
-- Chỉ mục cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD PRIMARY KEY (`MaHDB`),
  ADD KEY `FK_HoaDonBan_KhachHang` (`MaKH`),
  ADD KEY `FK_HoaDonBan_NhanVien` (`MaNV`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`MaHDN`),
  ADD KEY `FK_HoaDonNhap_NhaCungCap` (`MaNCC`),
  ADD KEY `FK_HoaDonNhap_NhanVien` (`MaNV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `FK_KhachHang_User` (`username`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `FK_NhanVien_User` (`username`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `FK_SanPham_LoaiSP` (`MaLoai`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTinTuc`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethdb`
--
ALTER TABLE `chitiethdb`
  ADD CONSTRAINT `FK_ChiTietHDB_HoaDonBan` FOREIGN KEY (`MaHDB`) REFERENCES `hoadonban` (`MaHDB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ChiTietHDB_SanPham` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitiethdn`
--
ALTER TABLE `chitiethdn`
  ADD CONSTRAINT `FK_ChiTietHDN_HoaDonNhap` FOREIGN KEY (`MaHDN`) REFERENCES `hoadonnhap` (`MaHDN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ChiTietHDN_SanPham` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `FK_HoaDonNhap_NhaCungCap` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_HoaDonNhap_NhanVien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `FK_KhachHang_User` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NhanVien_User` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SanPham_LoaiSP` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
