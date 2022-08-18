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
		$hoadon= $hd->layhoadontheokhoangthoigian($date1,$date2);
		include("main.php");
		
        break;
	
	 case "xemnhom": 
        if(isset($_REQUEST["mahd"])){
            $mahd = $_REQUEST["mahd"];
			$h_don = $hd->layhoadontheoid($mahd);
            $tenhd =  $h_don["id"];  
            $hdon = $ct->layhoadonct($mahd);
          	
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
	
    default:
        break;
}
?>
