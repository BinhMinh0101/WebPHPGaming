<?php
  class Cart_C
  {
    public function themGioHang($id,$ten,$soLuong,$hinhAnh,$giaTien,$SoLuongDangCo)
    {     
      $productID = $id;
      $prodcutName = $ten ;
      $quantity = $soLuong;
      $image = $hinhAnh;
      $price = $giaTien;

      $new_product = array( array( "ProductID" => $productID, "ProductName" => $prodcutName, "Quantity" => $quantity, "Image" => $image, "Price" => $price ) );

      if ( isset( $_SESSION[ 'cart' ] ) ) {
        $found = false;
        foreach ( $_SESSION[ 'cart' ] as $cart_item ) {
          if ( $cart_item[ 'ProductID' ] == $productID ) {
            $product[] = array( 'ProductID' => $cart_item[ 'ProductID' ], 'ProductName' => $cart_item[ 'ProductName' ], 'Quantity' => $cart_item[ 'Quantity' ] + $quantity, 'Image' => $cart_item[ 'Image' ], 'Price' => $cart_item[ 'Price' ] );
            $found = true;
          } else {
            $product[] = array( 'ProductID' => $cart_item[ 'ProductID' ], 'ProductName' => $cart_item[ 'ProductName' ], 'Quantity' => $cart_item[ 'Quantity' ], 'Image' => $cart_item[ 'Image' ], 'Price' => $cart_item[ 'Price' ] );
          }
        }

        if ( $found == false ) {
          $_SESSION[ 'cart' ] = array_merge( $product, $new_product );
          return 1;
        } else {
        //----------Kiem tra so luong tren DB con du cung cap khi them vao Session cart  hay khong
          foreach( $_SESSION[ 'cart' ] as $item)
          {
            if($item['ProductID'] == $id && $item['Quantity'] + $quantity <= $SoLuongDangCo)
            {
              $_SESSION[ 'cart' ] = $product;
              return 1;
            }
          }
        }
      } else {
        $_SESSION[ 'cart' ] = $new_product;
        return 1;
      }

      // echo "<script>alert('Quantity is not enough');window.location='../cart/shopping_cart.php';</script>";
      // echo "<pre>";
      // print_r($_SESSION['cart']);
      // echo "</pre>";	
    }
    public function xoaGioHang()
    {
      unset($_SESSION['cart']);
    }
    public function xoaSanPham($id)
    {
      $i = 0;
      foreach($_SESSION['cart'] as $item)
      {
        
        if($item['ProductID'] == $id){
          unset($_SESSION['cart'][$i]);
        }
        else $i++;
      }
    }
    public function capNhatGioHang($mangSlSP)
    {
      
      

      $i = 0;
      foreach($mangSlSP as $id => $soLuong){
        
        if($_SESSION['cart'][$i]['ProductID'] == $id)
        {
          $_SESSION['cart'][$i]['Quantity'] = $soLuong;
        }
        $i++;
      }
    }
    public function tongTienGioHang()
    {
      $tongTien = 0;

      foreach ($_SESSION['cart'] as $item) {
        $tongTien += $item['Quantity'] * $item['Price'];
      }
      return  $tongTien;
    }

  }
?>