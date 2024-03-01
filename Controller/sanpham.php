<?php
include('../../Model/sanpham.php');
class sanpham_controller
{
    public function getOnly()
    {
        $a = new sanpham;

        return $a->getOnly();
    }
    public function getAll()
    {
        $a = new sanpham;
        return $a->getAll();
    }
    public function getAllNB()
    {
        $a = new sanpham;
        return $a->getAllNB();
    }
    public function getDone()
    {
        $a = new sanpham;
        return $a->getDone();
    }
    public function getshow()
    {
        $a = new sanpham;

        return $a->getshow();
    }
    public function LayRandom()
    {
        $a = new sanpham;

        return $a->LayRandom();
    }
    public function sanPhamtheoID($maSanPham)
    {
        $sanPhamModel = new sanpham;

        return $sanPhamModel->sanPhamTheoID($maSanPham);
    }
    public function truSanPham($maSanPham, $soLuongTru)
    {
        $sanPhamModel = new sanpham;

        $sanPhamModel->truSanPham($maSanPham, $soLuongTru);
    }
    function lockSP($masanpham)
    {
        $p = new sanpham;
        $p->lockSP($masanpham);
    }
    function unlockSP($masanpham)
    {
        $p = new sanpham;
        $p->unlockSP($masanpham);
    }
    function changeSP($masanpham, $sanpham)
    {
        $p = new sanpham;
        $p->changeSP($masanpham, $sanpham);
    }
    function addSP($sanpham)
    {
        $p = new sanpham;
        $p->addSP($sanpham);
    }
    public function sanPhamDmThTheoID($maSanPham)
    {
        $sanPhamDmThTheoID = new sanpham;

        return $sanPhamDmThTheoID->sanPhamDmThTheoID($maSanPham);
    }
    public function getIDCategory($categoryID)
    {
        $a = new sanpham;

        return $a->getIDCategory($categoryID);
    }
    public function getIDBrands($brandsID)
    {
        $a = new sanpham;

        return $a->getIDBrands($brandsID);
    }
    public function congSanPham($maSanPham, $soLuongCong)
    {
        $a = new sanpham;

        $a->congSanPham($maSanPham, $soLuongCong);
    }
}
