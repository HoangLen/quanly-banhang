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
require("../../PHPExcel-1.8/Classes/PHPExcel.php");
require("../../PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");


$dm = new DANHMUC();
$mh = new MATHANG();
$hd = new HOADON();
$ct = new HOADONCT();
$dh = new DONHANG();
$dhct = new DONHANGCT();

$danhmuc = $dm->laydanhmuc();



if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}



switch($action){
    case "macdinh": 		
		$don = $dh->laydonhang();
		include("main.php");
        break;
	
	 case "xemnhom": 
        if(isset($_REQUEST["madh"])){
			$don = $dh->laydonhang();
            $madh = $_REQUEST["madh"];
			//$h_don = $hd->layhoadontheoid($mahd);
          //  $tenhd =  $h_don["id"];  
            $dhang = $dhct->laydonhangcttheodonhang($madh);
          	
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
		
	case "xoa":
		if(isset($_GET["id"])){
			$dhct->xoadonhangct($_GET["id"]);
			$dh->xoadonhang($_GET["id"]);
		}
		
		include("main.php");
		break;	
	
	 case "khoa":   
        $madh = $_GET["madh"];
        $ghichu = 1;
        if(!$dh->doitrangthaidonhang($madh,$ghichu)){
            $ok = "Đã duyệt đơn hàng ". $madh;
        }
        $don = $dh->laydonhang();  
			$ok = "Đã duyệt đơn hàng ". $madh;		
        include("main.php");
        break;
	 case "huy":   
        $madh = $_GET["madh"];
        $ghichu = 0;
        if(!$dh->doitrangthaidonhang($madh,$ghichu)){
            $huy = "Đã hủy duyệt đơn hàng ". $madh;
        }
        $don = $dh->laydonhang();
			$huy = "Đã hủy duyệt đơn hàng ". $madh;		
        include("main.php");
        break;
    default:
        break;
}
?>
