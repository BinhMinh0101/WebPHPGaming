<?php
include('../../Model/donHang_M.php');
class DonHang_C
{
    public function thongTinDonHang($maDonHang)
    {
        $donHangModel = new DonHang_M;

        return $donHangModel->thongTinDonHang($maDonHang);
    }
    public function donHangTheoKhachHang($maTaikhoan)
    {
        $donHangModel = new DonHang_M;
        return $donHangModel->donHangTheoKhachHang($maTaikhoan);
    }
    public function themDonHang($donHang)
    {
        $donHangModel = new DonHang_M;
        return $donHangModel->themDonHangVaoDB($donHang);
    }
    public function maDonHangMoiNhat()
    {
        $donHangModel = new DonHang_M;

        return $donHangModel->maDonHangMoiNhat();
    }
    public function getAll()
    {
        $donHangModel = new DonHang_M;

        return $donHangModel->getAll();
    }
    public function repair_order($orderID, $tinhTrang)
    {
        $donHangModel = new DonHang_M;

        return $donHangModel->repair_order($orderID, $tinhTrang);
    }
    public function search_order($orderID)
    {
        $donHangModel = new DonHang_M;

        return $donHangModel->search_order($orderID);
    }
}
