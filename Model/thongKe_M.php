<?php
class ThongKe_M
{
    public function thongKeSanPhamBanChayNhat()
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = 'SELECT sanpham.MaSanPham,Anh,TenSanPham,TenDanhMuc,TenThuongHieu,SUM(chitietdonhang.SoLuong) as SoLuong,chitietdonhang.DonGia,SUM(ThanhTien) as ThanhTien';
        $query .= ' ' . 'from chitietdonhang,sanpham,danhmuc,thuonghieu,donhang';
        $query .= ' ' . 'where chitietdonhang.MaSanPham = sanpham.MaSanPham AND sanpham.MaDanhMuc = danhmuc.MaDanhMuc AND sanpham.MaThuongHieu = thuonghieu.MaThuongHieu AND donhang.MaDonHang = chitietdonhang.MaDonHang AND donhang.TinhTrang = 1';
        $query .= ' ' . 'GROUP BY chitietdonhang.MaSanPham';
        $query .= ' ' . 'HAVING SUM(chitietdonhang.SoLuong) = (SELECT SUM(chitietdonhang.SoLuong) FROM chitietdonhang,donhang WHERE chitietdonhang.MaDonHang = donhang.MaDonHang AND donhang.TinhTrang = 1 GROUP BY MaSanPham ORDER BY SUM(SoLuong) DESC LIMIT 1)';

        return mysqli_query($connect, $query);
    }
    public function thongKeTheoKhoangThoiGian($tuNgay, $denNgay)
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = "SELECT (SUM(TongTien) - (SELECT SUM(TongGia) FROM phieunhap WHERE (NgayNhap BETWEEN '" . $tuNgay . "' AND '" . $denNgay . "'))) as DoanhThu";
        $query .= ' ' . 'FROM donhang';
        $query .= ' ' . "WHERE donhang.TinhTrang = 1 AND (NgayMua BETWEEN '" . $tuNgay . "' AND '" . $denNgay . "')";

        return mysqli_query($connect, $query);
    }
}
