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
require("../../model/bill.php");

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
		
	 case "chovaobill":
        if(isset($_REQUEST["txtmahang"]))
            $mahang = $_REQUEST["txtmahang"];
        if(isset($_REQUEST["txtsoluong"]))
            $soluong = $_REQUEST["txtsoluong"];
			$ok = "Đã thêm ". $soluong ." mặt hàng MH". $mahang ." vào bill";
        if(isset($_SESSION['bill'][$mahang])){ // nếu đã có trong giỏ thi tăng số lượng
            $soluong += $_SESSION['bill'][$mahang];
            $_SESSION['bill'][$mahang] = $soluong;
        }
        else{       // nếu chưa thì thêm vào gi			
            themhangvaogio($mahang, $soluong);
        }
        $mathang = $mh->laymathang();
        $bill = laybill();
        include("main.php");
        break;
    case "xemgiohang":
        
        $bill = laybill();
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
        $bill = laybill();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $bill = laybill();
        include("cart.php");
        break;
    
	case "datmua":
        $bill = laybill();
        include("checkout.php");
        break;
	
	case "xoamotmathang":
		if(isset($_GET["mahang"]))
		xoamotmathang($_GET["mahang"]);
		$bill = laybill();
		
		include("cart.php");
		break;
	
	case "luudonhang":  
		//$email = $_POST["txtemail"];
		//$hoten = $_POST["txthoten"];
		//$sdt = $_POST["txtsodienthoai"];
		//$diachi = $_POST["txtdiachi"];
		
		//luu thong tin kh
		//$kh = new KHACHHANG();
		//$khachhang_id = $kh->themkhachhang($email,$hoten,$sdt);
		
		//luu dia chi khach
		//$dc = new DIACHI();
		//$diachi_id = $dc->themdiachi($khachhang_id,$diachi);
		
		//luu don hang
		$hd = new HOADON();
		$nguoidung_id = $_SESSION["nguoidung"]["id"];
		$tongtien = tinhtiengiohang();
		$hoadon_id = $hd->themhoadon($nguoidung_id,$tongtien);
		
		//luu chi tiet don hang
		$ct = new HOADONCT();
		$bill = laybill();
		foreach($bill as $mahang => $mh){
			$dongia = $mh["giaban"];
			$soluong = $mh["soluong"];
			$thanhtien = $mh["sotien"];
			$ct->themchitiethoadon($hoadon_id,$mahang,$dongia,$soluong,$thanhtien);
		}
		
		//xoa gio hang
		xoagiohang();
		//$mathang = $mh->laymathang();
		$ok = "Thêm hóa đơn thành công";
		$bill = laybill();
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
