<?php
class phieuNhap_C
{
    function getAll()
    {
        $goodsModel = new phieuNhap_M;
        return $goodsModel->getAll();
    }
    function search_goods($goodsID)
    {
        $goodsSearch = new phieuNhap_M;
        return $goodsSearch->search_goods($goodsID);
    }

    public function addPGoods($array_goods)
    {
        $addGoods = new phieuNhap_M;
        return $addGoods->addPGoods($array_goods);
    }

    public function maPhieuNhapMoiNhat()
    {
        $newCode = new phieuNhap_M;
        return $newCode->maPhieuNhapMoiNhat();
    }
}
