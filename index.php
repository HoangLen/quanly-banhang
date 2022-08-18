<?php 
require("model/database.php");
require("model/mathang.php");
require("model/danhmuc.php");
require("model/giohang.php");
require("model/khachhang.php");
require("model/diachi.php");
require("model/donhang.php");
require("model/donhangct.php");
require("model/donhang_khachle.php");
require("model/donhangct_khachle.php");

$dm = new DANHMUC();
$mh = new MATHANG();

$danhmuc = $dm->laydanhmuc();



if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}

$mathangnoibat = $mh->laymathangnoibat();
switch($action){
    case "macdinh": 
	
		$soluong=4;
		$tongmathang = $mh->demtongsomathang();
		$tongsotrang = ceil($tongmathang/$soluong);
		if(isset($_REQUEST["trang"]))
			$tranghh = $_REQUEST["trang"];
		else
			$tranghh = 1;
		$batdau = ($tranghh-1) * $soluong;
        $mathang = $mh->laymathangphantrang($batdau,$soluong);
        include("main.php");
        break;
    case "xemnhom": 
        if(isset($_REQUEST["madm"])){
            $madm = $_REQUEST["madm"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];   
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
    case "xemchitiet": 
        if(isset($_GET["mahang"])){
            $mahang = $_GET["mahang"];
          
            $mh->tangluotxem($mahang);
         
            $mhct = $mh->laymathangtheoid($mahang);
            
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
		
	 case "chovaogio":
        if(isset($_REQUEST["txtmahang"]))
            $mahang = $_REQUEST["txtmahang"];
        if(isset($_REQUEST["txtsoluong"]))
            $soluong = $_REQUEST["txtsoluong"];
        if(isset($_SESSION['giohang'][$mahang])){ 
            $soluong += $_SESSION['giohang'][$mahang];
            $_SESSION['giohang'][$mahang] = $soluong;
        }
        else{       
            themhangvaogio($mahang, $soluong);
        }
        
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xemgiohang":
        
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "capnhatgiohang":
        if(isset($_REQUEST["mh"])){
            $mh = $_REQUEST["mh"];
        
            foreach($mh as $mahang => $soluong){
                if($soluong > 0)
                    capnhatsoluong($mahang, $soluong);
                else
                    xoamotmathang($mahang);
            }
        }
        $giohang = laygiohang();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        include("cart.php");
        break;
    
	case "datmua":
        $giohang = laygiohang();
        include("options.php");
        break;
	
	case "dangky":
		$giohang = laygiohang();
		  include("checkout.php");
		  break;
	
	case "dathangnhanh":
		$giohang = laygiohang();
		  include("dathangnhanh.php");
		  break;
	
	case "luudonhang":  
		$email = $_POST["txtemail"];
		$hoten = $_POST["txthoten"];
		$sdt = $_POST["txtsodienthoai"];
		$diachi = $_POST["txtdiachi"];	
		
		$kh = new KHACHHANG();
		$khachhang_id = $kh->themkhachhang($email,$hoten,$sdt);
		
		
		$dc = new DIACHI();
		$diachi_id = $dc->themdiachi($khachhang_id,$diachi);
		
	
		$dh = new DONHANG();
		$tongtien = tinhtiengiohang();
		$donhang_id = $dh->themdonhang($khachhang_id,$diachi_id,$tongtien);
		
		
		$ct = new DONHANGCT();
		$giohang = laygiohang();
		foreach($giohang as $mahang => $mh){
			$dongia = $mh["giaban"];
			$soluong = $mh["soluong"];
			$thanhtien = $mh["sotien"];
			$ct->themchitietdonhang($donhang_id,$mahang,$dongia,$soluong,$thanhtien);
		}
		
		xoagiohang();
		include("message.php");
        break;
	
	case "luudonhang_khachle":  
		
		$hoten = $_POST["txthoten"];
		$sdt = $_POST["txtsodienthoai"];
		$diachi = $_POST["txtdiachi"];
		
		$dhkl = new DONHANG_KHACHLE();
		$tongtien = tinhtiengiohang();
		$donhangkhachle_id = $dhkl->themdonhangkhachle($diachi,$tongtien,$hoten,$sdt);
		
		$ctkl = new DONHANGCT_KHACHLE();
		$giohang = laygiohang();
		foreach($giohang as $mahang => $mh){
			$dongia = $mh["giaban"];
			$soluong = $mh["soluong"];
			$thanhtien = $mh["sotien"];
			$ctkl->themchitietdonhang_khachle($donhangkhachle_id,$mahang,$dongia,$soluong,$thanhtien);
		}
		xoagiohang();
		include("message_khachle.php");
		
        break;
	
	case "timkiemtukhoa":
	
		
		if(isset($_GET["tukhoa"])){
			$tukhoa = $_GET['tukhoa'];
			
			if("tukhoa"=="")
			{
				$thongbao="Bạn phải nhập từ khóa cần tìm!";	
				include("tuchoi.php");
			}
			if('tukhoa'!=""){
				$timkiem = $mh->timkiemtheotukhoa($tukhoa);
				$thongbao="";
				include("ketquatimkiem.php");
			}
			else{
				$thongbao="Không có từ khóa cần tìm";				
			}
		}
		
	break;
	
	case "tongquan":
		include ("tongquan.php");
		break;
	
    default:
        break;
}
?>
