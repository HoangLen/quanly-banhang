<?php 
require("../../model/database.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");
require("../../model/khachhang.php");
require("../../model/diachi.php");
require("../../model/donhang_khachle.php");
require("../../model/hoadon.php");
require("../../model/hoadonct.php");
require("../../model/donhangct_khachle.php");
require("../../model/nguoidung.php");
require("../../model/bill.php");
require("../../PHPExcel-1.8/Classes/PHPExcel.php");
require("../../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");


$dm = new DANHMUC();
$mh = new MATHANG();
$hd = new HOADON();
$ct = new HOADONCT();
$dh_kl = new DONHANG_KHACHLE();
$dhct_kl = new DONHANGCT_KHACHLE();

$danhmuc = $dm->laydanhmuc();



if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}



switch($action){
    case "macdinh": 		
		$don = $dh_kl->laydonhang_khachle();
		include("main.php");
        break;
	
	 case "xemnhom": 
        if(isset($_REQUEST["madh"])){
			$don = $dh_kl->laydonhang_khachle();
            $madh = $_REQUEST["madh"];
			//$h_don = $hd->layhoadontheoid($mahd);
          //  $tenhd =  $h_don["id"];  
            $dhang = $dhct_kl->laydonhangcttheodonhang($madh);
          	
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
		
	case "xoa":
		if(isset($_GET["id"])){
			$dhct_kl->xoadonhangct($_GET["id"]);
			$dh_kl->xoadonhang($_GET["id"]);
		}
		
		include("main.php");
		break;	
	
	 case "khoa":   
        $madh = $_GET["madh"];
        $ghichu = 1;
        if(!$dh_kl->doitrangthaidonhang($madh,$ghichu)){
            $ok = "Đã duyệt đơn hàng ". $madh;
        }
        $don = $dh_kl->laydonhang_khachle();  
			$ok = "Đã duyệt đơn hàng ". $madh;		
        include("main.php");
        break;
	 case "huy":   
        $madh = $_GET["madh"];
        $ghichu = 0;
        if(!$dh_kl->doitrangthaidonhang($madh,$ghichu)){
            $huy = "Đã hủy duyệt đơn hàng ". $madh;
        }
        $don = $dh_kl->laydonhang_khachle();
			$huy = "Đã hủy duyệt đơn hàng ". $madh;		
        include("main.php");
        break;
    default:
        break;
}
?>
