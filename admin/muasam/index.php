<?php 
require("../../model/database.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");
require("../../model/khachhang.php");
require("../../model/diachi.php");
require("../../model/donhang.php");
require("../../model/hoadon.php");
require("../../model/hoadonct.php");
require("../../model/donhangct.php");
require("../../model/nguoidung.php");
require("../../model/bao.php");

$dm = new DANHMUC();
$mh = new MATHANG();

$dc = new DIACHI();
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
		 $mathang = $mh->laymathang();
		include("main.php");
        break;
    case "xemnhom": 
        if(isset($_REQUEST["madm"])){
            $madm = $_REQUEST["madm"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];   
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("main.php");
        }
        else{
            include("main.php");
        }
        break;
    case "xemchitiet": 
        if(isset($_GET["mahang"])){
            $mahang = $_GET["mahang"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
	
	case "themdiachi":
	
		$diachi = $_POST["txtdiachi"];
		$nguoidung_id = $_SESSION["nguoidung"]["id"];
		$dc->themdiachi($nguoidung_id,$diachi);
		include("checkout.php");
		
		break;
	
	 case "chovaobao":
        if(isset($_REQUEST["txtmahang"]))
            $mahang = $_REQUEST["txtmahang"];
        if(isset($_REQUEST["txtsoluong"]))
            $soluong = $_REQUEST["txtsoluong"];
			$ok = "Đã thêm ". $soluong ." mặt hàng MH". $mahang ." vào giỏ hàng của bạn";
        if(isset($_SESSION['bao'][$mahang])){ // nếu đã có trong giỏ thi tăng số lượng
            $soluong += $_SESSION['bao'][$mahang];
            $_SESSION['bao'][$mahang] = $soluong;
        }
        else{       // nếu chưa thì thêm vào gi			
            themhangvaogio($mahang, $soluong);
        }
        $mathang = $mh->laymathang();
        $bao = laybao();
        include("main.php");
        break;
    case "xemgiohang":
        
        $bao = laybao();
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
        $bao = laybao();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $bao = laybao();
        include("cart.php");
        break;
    
	case "datmua":
		$nd_id = $_SESSION["nguoidung"]["id"];
		$diachi = $dc->laydiachitheonguoidung($nd_id);
        $bao = laybao();
        include("checkout.php");
        break;
	
	case "xoamotmathang":
		if(isset($_GET["mahang"]))
		xoamotmathang($_GET["mahang"]);
		$bao = laybao();
		
		include("cart.php");
		break;
	
	case "luudonhang":  
	
		$email = $_SESSION["nguoidung"]["email"];
		$hoten = $_SESSION["nguoidung"]["hoten"];
		$sdt = $_SESSION["nguoidung"]["sdt"];
		$nguoidung_id = $_SESSION["nguoidung"]["id"];
		
		if(isset($_POST["txtdiachi"])){
			$address = $_POST["txtdiachi"];
			
			$diachi = $dc->themdiachi($nguoidung_id,$address);
		}
		else{
			
			$diachi = $_POST["optdiachi"];
		}
		
		
		
		
		//luu thong tin kh
		//$kh = new KHACHHANG();
		//$khachhang_id = $kh->themkhachhang($email,$hoten,$sdt);
		
		//luu dia chi khach
		//$dc = new DIACHI();
		//$diachi_id = $dc->themdiachi($khachhang_id,$diachi);
		
		//luu don hang
		$dh = new DONHANG();
		$tongtien = tinhtiengiohang();
		$donhang_id = $dh->themdonhang($nguoidung_id,$diachi,$tongtien);
		
		//luu chi tiet don hang
		$ct = new DONHANGCT();
		$bao = laybao();
		foreach($bao as $mahang => $mh){
			$dongia = $mh["giaban"];
			$soluong = $mh["soluong"];
			$thanhtien = $mh["sotien"];
			$ct->themchitietdonhang($donhang_id,$mahang,$dongia,$soluong,$thanhtien);
		}
		
		//xoa gio hang
		xoagiohang();
		$ok = "Đơn hàng đặt thành công! Đang chờ được duyệt.";
		//$mathang = $mh->laymathang();
		$bao = laybao();
		//chuyen den trang cam on
		include("cart.php");
		
        break;
	
	case "timkiemtukhoa":
		//$tukhoa =  $_GET["txttukhoa"];
		
		if(isset($_GET["tukhoa"])){
			$tukhoa = $_GET['tukhoa'];
			
			if("tukhoa"=="")
			{
				$thongbao="Bạn phải nhập từ khóa cần tìm!";	
				include("tuchoi.php");
			}
			if('tukhoa'!=""){
				$mathang = $mh->timkiemtheotukhoa($tukhoa);
				$thongbao="";
				include("main.php");
			}
			else{
				$thongbao="Không có từ khóa cần tìm";				
			}
		}
		//include("ketquatimkiem.php");
	break;
	
    default:
        break;
}
?>
