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
$dh_kl = new DONHANG_KHACHLE();
$ct_kl = new DONHANGCT_KHACHLE();

$danhmuc = $dm->laydanhmuc();



if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}



switch($action){
    case "macdinh": 
	
		if(isset($_POST["date1"]) && isset($_POST["date2"]))
		{
			$ngay1 = explode( ' ', $_POST["date1"]);
			$ngay2 = explode( ' ', $_POST["date2"]);
			$date1 = $ngay1[0].' 00:00:00';
			$date2 = $ngay2[0].' 23:59:59';
		}
			
		else
		{
			$date1 = date("Y-m-d HH:mm:ss");
			$date2 = date("Y-m-d HH:mm:ss");
		}
			
		//$nd_id = $_SESSION["nguoidung"]["id"];
		$donhang= $dh_kl->laydonhangtheokhoangthoigian($date1,$date2);
		include("main.php");
		
        break;
	
	 case "xemnhom": 
       if(isset($_GET["date"]))
		{
			$ngay = $_GET["date"];
			$date = $ngay.' 00:00:00';
			$now = $ngay.' 23:59:59';							
			$date_dh = $dh_kl->laydonhangdagiaotheokhoangthoigian($date,$now);			        	
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
	
	case "xemchitiet": 
        if(isset($_REQUEST["madh"])){
            $madh = $_REQUEST["madh"];
			$d_hang = $dh_kl->laydonhangtheoid($madh);
            $tendh =  $d_hang["id"];  
            $dhang = $ct_kl->laydonhangct($madh);
          	
            include("detail.php");
        }
        else{
            include("main.php");
        }
        break;
	
    default:
        break;
}
?>
