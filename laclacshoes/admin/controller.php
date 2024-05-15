<?php
      $check=$_SESSION['admin'];
      if(isset($_GET['action'])){
          $action=$_GET['action'];
          switch ($action) {
                    case 'logout':  
                        header('location:logout.php');
                    case 'danhmuc':
                        if($check['Quyen']>2){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                            include('danhmuc/danhmuc.php');
                        }
                        
                        break;
                     case 'sanpham':
                         if($check['Quyen']>2){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                            include('sanpham/sanpham.php');
                        }
              
                        break; 
                    case 'mau':
                         if($check['Quyen']>2){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                             include('mau/mau.php');
                        }
                       
                        break;
                    case 'xldathang':
                         if($check['Quyen']==3 || $check['Quyen']==5 ){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                             include('dondathang/main.php');
                        }
                        
                        break;      
                    case 'giaohang':
                        if($check['Quyen']>2 && $check['Quyen']<5){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                             include('shipper/main.php');
                        }
                        
                        break;  
                    case 'danhthu':
                        if($check['Quyen']>2){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                             include('danhthu/main.php');
                        }
                        
                        break;
                    case 'kho':
                        if($check['Quyen']>3){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                            include('kho/main.php');
                        }
                        
                        break;
                    case 'nhanvien':
                        if($check['Quyen']>2){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                            include('nhanvien/main.php');
                        }
                        
                        break;
                    case 'khuyenmai':
                        if($check['Quyen']>2){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                            include('khuyenmai/main.php');
                        }
                        
                        break;
                    case 'kh':
                        if($check['Quyen']>2){
                            echo('<center> BẠN KHÔNG CÓ QUYỀN TRUY CẬP</center>');
                        }else{
                            include('khachhang/thongtin.php');
                        }
                       
                        break; 
                    case 'thongtincanhan':  
                         include('nhanvien/thongtin.php');
                         break;                
                    default:
                        break;
                }
      }
      else {
          include_once('content.php');
      }

    ?>