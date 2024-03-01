<?php
class phieuNhap_M
{
    function getAll()
    {
        $my_conn = new DateBase;
        $my_conn = $my_conn->connnection();
        $sql = "SELECT * FROM phieunhap";
        $query = mysqli_query($my_conn, $sql);
        $goods_array = [];
        while ($row = mysqli_fetch_array($query)) {
            $id_goods = $row['MaPN'];
            $id_customer = $row['MaTaiKhoan'];
            $date_goods = $row['NgayNhap'];
            $tong_gia = $row['TongGia'];

            $one_order = ["MaPN" => $id_goods, "MaTaiKhoan" =>  $id_customer, "NgayNhap" => $date_goods, "TongGia" => $tong_gia];
            $goods_array[] = $one_order;
        }
        return $goods_array;
    }
    function search_goods($goodsID)
    {
        $my_conn = new DateBase;
        $my_conn = $my_conn->connnection();
        $sql = "SELECT * FROM phieunhap WHERE MaPN = $goodsID";
        $query = mysqli_query($my_conn, $sql);
        $goods_array = [];
        while ($row = mysqli_fetch_array($query)) {
            $id_goods = $row['MaPN'];
            $id_customer = $row['MaTaiKhoan'];
            $date_goods = $row['NgayNhap'];
            $tong_gia = $row['TongGia'];

            $one_order = ["MaPN" => $id_goods, "MaTaiKhoan" =>  $id_customer, "NgayNhap" => $date_goods, "TongGia" => $tong_gia];
            $goods_array[] = $one_order;
        }
        return $goods_array;
    }
    public function addPGoods($array_goods)
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = "INSERT INTO phieunhap VALUE(" .
            "''," .
            "'" . $array_goods['MaTaiKhoan'] . "'," .
            "'" . $array_goods['NgayNhap'] . "'," .
            "'" . $array_goods['TongGia'] . "')";
        mysqli_query($connect, $query);
    }
    public function maPhieuNhapMoiNhat()
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = "SELECT MaPN FROM phieunhap ORDER BY MaPN DESC LIMIT 1;";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        return $row['MaPN'];
    }
}
