<?php

    class ChiTietDonHang_M
    {
       public function chiTietDonHangTheoKhachHang($maDonHang)
       {
          $connect = new DateBase;
          $connect = $connect->connnection();
          $query = 'select * from chitietdonhang where MaDonHang = '.$maDonHang;
          $rs=mysqli_query($connect,$query);
          while($row=mysqli_fetch_array($rs)){
                $masp=$row['MaSanPham'];
                $query_sp= 'select * from sanpham where MaSanPham = '.$masp;
                $rs_sp=mysqli_query($connect,$query_sp);
                while($row_sp=mysqli_fetch_array($rs_sp)){
                   $anh=$row_sp['Anh'];
                   $tensp=$row_sp['TenSanPham'];
                }
                $dongia=$row['DonGia'];
                $soluong=$row['SoLuong'];
                $thanhtien=$row['ThanhTien'];
                $donhang=['MaSanPham' => $masp, 'DonGia' => $dongia, 'SoLuong' => $soluong, 'ThanhTien' => $thanhtien, 'Anh' => $anh, 'TenSanPham' => $tensp];
                $ctdh[]=$donhang;
            }
            return $ctdh;     
       }
       public function themChiTietDonHang($chiTietDonHang)
       {
          $connect = new DateBase;
          $connect = $connect->connnection();

          $query = "INSERT INTO chitietdonhang VALUE(" .
          "'" . $chiTietDonHang[ 'MaDonHang' ] . "'," .
          "'" . $chiTietDonHang[ 'MaSanPham' ] . "'," .
          "'" . $chiTietDonHang[ 'DonGia' ] . "'," .
          "'" . $chiTietDonHang[ 'SoLuong' ] . "'," .
          "'" . $chiTietDonHang[ 'ThanhTien' ] . "')";
          mysqli_query( $connect, $query );
       }
       
    }
?>