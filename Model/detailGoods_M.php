<?php
class detailGoods_M
{
    function detail_goods($goodsID)
    {
        $my_conn = new DateBase;
        $my_conn = $my_conn->connnection();
        $sql = "SELECT * FROM chitietphieunhap WHERE MaPN=$goodsID";
        $query = mysqli_query($my_conn, $sql);
        $goodsdetail_array = [];
        while ($row = mysqli_fetch_array($query)) {
            $id_goods = $row['MaPN'];
            $id_products = $row['MaSanPham'];
            $quantity_goodsdetail = $row['SoLuong'];
            $money_goodsdetail = $row['DonGia'];
            $total_goodsdetail = $row['ThanhTien'];

            $one_goodsdetail = ["MaPN" => $id_goods, "MaSanPham" =>  $id_products, "SoLuong" => $quantity_goodsdetail, "DonGia" => $money_goodsdetail, "ThanhTien" => $total_goodsdetail];
            $goodsdetail_array[] = $one_goodsdetail;
        }
        return $goodsdetail_array;
    }
    function addGoodsDetail($array_detail)
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = "INSERT INTO chitietphieunhap VALUE(" .
            "'" . $array_detail['MaPN'] . "'," .
            "'" . $array_detail['MaSanPham'] . "'," .
            "'" . $array_detail['DonGia'] . "'," .
            "'" . $array_detail['SoLuong'] . "'," .
            "'" . $array_detail['ThanhTien'] . "')";
        mysqli_query($connect, $query);
    }
}
