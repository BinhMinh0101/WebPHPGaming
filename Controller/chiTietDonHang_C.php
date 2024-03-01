<?php
include('../../Model/chiTietDonHang_M.php');
    class ChiTietDonHang_C
    {
        public function chiTietDonHangTheoKhachHang($maDonHang)
        {   
            $chiTietDonHangModel = new ChiTietDonHang_M;

            return $chiTietDonHangModel->chiTietDonHangTheoKhachHang($maDonHang);
        }
        public function themChiTietDonHang($chiTietDonhang)
        {
            $chiTietDonHangModel = new ChiTietDonHang_M;

            $chiTietDonHangModel->themChiTietDonHang($chiTietDonhang);
        }
    }
?>