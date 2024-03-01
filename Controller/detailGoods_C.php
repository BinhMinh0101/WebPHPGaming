<?php
// include('../Model/detailGoods_M.php');
class detailGoods_C
{
    function detail_goods($goodsID)
    {
        $detailGoods = new detailGoods_M;
        return $detailGoods->detail_goods($goodsID);
    }
    public function addGoodsDetail($array_detail)
    {
        $detailGoods = new detailGoods_M;
        return $detailGoods->addGoodsDetail($array_detail);
    }

    function addGoods($idProducts, $Tensanpham, $Anh, $soLuong, $donGia, $SoLuongDangCo)
    {
        $id = $idProducts;
        $nameProducts = $Tensanpham;
        $img = $Anh;
        $qty = $soLuong;
        $price = $donGia;
        $haveQty = $SoLuongDangCo;

        $new_goods = array(array("MaSanPham" => $id, "TenSanPham" => $nameProducts, "Anh" => $img, "SoLuong" => $qty, "DonGia" => $price));

        if (isset($_SESSION['goods']) && !empty($_SESSION['goods'])) {
            $found = false;
            foreach ($_SESSION['goods'] as $goods_item) {
                if ($goods_item['MaSanPham'] == $id) {
                    $product[] = array('MaSanPham' => $goods_item['MaSanPham'], 'TenSanPham' => $goods_item['TenSanPham'], 'Anh' => $goods_item['Anh'], 'SoLuong' => $goods_item['SoLuong'] + $qty, 'DonGia' => $goods_item['DonGia']);
                    $found = true;
                } else {
                    $product[] = array('MaSanPham' => $goods_item['MaSanPham'], 'TenSanPham' => $goods_item['TenSanPham'], 'Anh' => $goods_item['Anh'], 'SoLuong' => $goods_item['SoLuong'], 'DonGia' => $goods_item['DonGia']);
                }
            }
            if ($found == false) {
                $_SESSION['goods'] = array_merge($product, $new_goods);
                return 1;
            } else {
                $_SESSION['goods'] = $product;
            }
        } else {
            $_SESSION['goods'] = $new_goods;
            return 1;
        }
    }

    function deleteProduct($productID)
    {
        foreach ($_SESSION['goods'] as $item => $value) {
            if ($value['MaSanPham'] == $productID) {
                unset($_SESSION['goods'][$item]);
            }
        }
    }

    public function deleteGoods()
    {
        unset($_SESSION['goods']);
    }
    public function updateGoods($mangSlSP, $mangDgSP)
    {
        foreach ($_SESSION['goods'] as $item => $value) {
            foreach ($mangSlSP as $idSL => $soLuong) {
                if ($value['MaSanPham'] == $idSL) {
                    $_SESSION['goods'][$item]['SoLuong'] = $soLuong;
                }
            }
            foreach ($mangDgSP as $idDG => $dongia) {
                if ($value['MaSanPham'] == $idDG) {
                    $_SESSION['goods'][$item]['DonGia'] = $dongia;
                }
            }
        }
    }
}
