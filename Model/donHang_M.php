<?php
class DonHang_M
{
    public function thongTinDonHang($maDonHang)
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = 'select * from donhang where MaDonHang = ' . $maDonHang;
        return mysqli_query($connect, $query);
    }
    public function donHangTheoKhachHang($maTaikhoan)
    {
        // include('connection.php');
        $connect = new DateBase;
        $connect = $connect->connnection();
        $query = 'select * from donhang where MaTaiKhoan = ' . $maTaikhoan;
        $rs = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($rs)) {
            $madh = $row['MaDonHang'];
            $matk = $row['MaTaiKhoan'];
            $ngaymua = $row['NgayMua'];
            $tongtien = $row['TongTien'];
            $tinhtrang = $row['TinhTrang'];
            $hoten = $row['HoTen'];
            $email = $row['Email'];
            $phone = $row['Phone'];
            $diachi = $row['DiaChi'];
            $tinhthanh = $row['TinhThanh'];
            $quanhuyen = $row['QuanHuyen'];
            $donhang = ['MaDonHang' => $madh, 'MaTaiKhoan' => $matk, 'NgayMua' => $ngaymua, 'TongTien' => $tongtien, 'TinhTrang' => $tinhtrang, 'HoTen' => $hoten, 'Email' => $email, 'Phone' => $phone, 'DiaChi' => $diachi, 'TinhThanh' => $tinhthanh, 'QuanHuyen' => $quanhuyen];
            $dsdh[] = $donhang;
        }
        return $dsdh;
    }
    public function themDonHangVaoDB($donHang)
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = "INSERT INTO donhang VALUE(" .
            "''," .
            "'" . $donHang['NgayMua'] . "'," .
            "'" . $donHang['TongTien'] . "'," .
            "'" . $donHang['TinhTrang'] . "'," .
            "'" . $donHang['HoTen'] . "'," .
            "'" . $donHang['Email'] . "'," .
            "'" . $donHang['Phone'] . "'," .
            "'" . $donHang['DiaChi'] . "'," .
            "'" . $donHang['TinhThanh'] . "'," .
            "'" . $donHang['QuanHuyen'] . "'," .
            "'" . $donHang['MaTaiKhoan'] . "')";
        mysqli_query($connect, $query);
    }
    public function maDonHangMoiNhat()
    {
        $connect = new DateBase;
        $connect = $connect->connnection();

        $query = "SELECT MaDonHang FROM donhang ORDER BY MaDonHang DESC LIMIT 1;";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        return $row['MaDonHang'];
    }
    function getAll()
    {
        $my_conn = new DateBase;
        $my_conn = $my_conn->connnection();
        $sql = "SELECT * FROM donhang";
        $query = mysqli_query($my_conn, $sql);
        $order_array = [];
        while ($row = mysqli_fetch_array($query)) {
            $id_order = $row['MaDonHang'];
            $id_customer = $row['MaTaiKhoan'];
            $date = $row['NgayMua'];
            $tong_tien = $row['TongTien'];
            $tinh_trang = $row['TinhTrang'];
            $ho_ten = $row['HoTen'];
            $email = $row['Email'];
            $sdt = $row['Phone'];
            $dia_chi = $row['DiaChi'];
            $tinh_thanh = $row['TinhThanh'];
            $quan_huyen = $row['QuanHuyen'];

            $one_order = ["MaDonHang" => $id_order, "MaTaiKhoan" =>  $id_customer, "NgayMua" => $date, "TongTien" => $tong_tien, "TinhTrang" => $tinh_trang, "HoTen" => $ho_ten, "Email" => $email, "Phone" => $sdt, "DiaChi" => $dia_chi, "TinhThanh" => $tinh_thanh, "QuanHuyen" => $quan_huyen];
            $order_array[] = $one_order;
        }
        return $order_array;
    }
    function repair_order($orderID, $tinhTrang)
    {
        $my_conn = new DateBase;
        $my_conn = $my_conn->connnection();
        $sql_repair = "UPDATE donhang SET TinhTrang = '$tinhTrang' WHERE MaDonHang = '$orderID'";
        if (mysqli_query($my_conn, $sql_repair)) {
            if ($_SESSION['Quyen'] == '1') {
                echo "<script>alert('Thành công !');window.location='order.php';</script>";
            } else if ($_SESSION['Quyen'] == '2') {
                echo "<script>alert('Thành công !');window.location='thukhodh.php';</script>";
            }
        } else {
            echo '<script>alert("Thất bại !")</script>';
        }
    }
    function search_order($orderID)
    {
        $my_conn = new DateBase;
        $my_conn = $my_conn->connnection();
        $sql = "SELECT * FROM donhang WHERE MaDonHang='$orderID' LIMIT 1";
        $query = mysqli_query($my_conn, $sql);
        $order_array = [];
        while ($row = mysqli_fetch_array($query)) {
            $id_order = $row['MaDonHang'];
            $id_customer = $row['MaTaiKhoan'];
            $date = $row['NgayMua'];
            $tong_tien = $row['TongTien'];
            $tinh_trang = $row['TinhTrang'];
            $ho_ten = $row['HoTen'];
            $email = $row['Email'];
            $sdt = $row['Phone'];
            $dia_chi = $row['DiaChi'];
            $tinh_thanh = $row['TinhThanh'];
            $quan_huyen = $row['QuanHuyen'];

            $one_order = ["MaDonHang" => $id_order, "MaTaiKhoan" =>  $id_customer, "NgayMua" => $date, "TongTien" => $tong_tien, "TinhTrang" => $tinh_trang, "HoTen" => $ho_ten, "Email" => $email, "Phone" => $sdt, "DiaChi" => $dia_chi, "TinhThanh" => $tinh_thanh, "QuanHuyen" => $quan_huyen];
            $order_array[] = $one_order;
        }
        return $order_array;
    }
}
