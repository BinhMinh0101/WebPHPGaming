<?php
    // include('../Model/thongKe_M.php');
    class ThongKe_C
    {
        public function thongKeSanPhamBanChayNhat()
        {
            $thongKeModel = new ThongKe_M;

            return $thongKeModel->thongKeSanPhamBanChayNhat();
        }
        public function thongKeTheoKhoangThoiGian($tuNgay,$denNgay) 
        {
            $thongKeModel = new ThongKe_M;

            return $thongKeModel->thongKeTheoKhoangThoiGian($tuNgay,$denNgay);
        }
    }
?>