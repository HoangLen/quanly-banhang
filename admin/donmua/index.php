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
	
		$nguoidung_id = $_SESSION["nguoidung"]["id"];
		$donhang = $dh->laydonhangtheonguoidung($nguoidung_id);
		
		include("main.php");
		
        break;
	
	 case "xemdonhangchuaduyet": 
	
		$nguoidung_id = $_SESSION["nguoidung"]["id"];
		$donhang = $dh->laydonhangtheonguoidung_chuaduyet($nguoidung_id);
		
		include("chuakiemduyet.php");
		
        break;
	
	 case "xemnhom": 
        if(isset($_REQUEST["madh"])){
            $madh = $_REQUEST["madh"];
			//$h_don = $hd->layhoadontheoid($mahd);
          //  $tenhd =  $h_don["id"];  
            $dhang = $dhct->laydonhangcttheodonhang($madh);
          	$donhang = $dh->laydonhangtheoma($madh);
			$ghichu = $donhang['ghichu'];
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
		
	case "kiemduyet":
		$nguoidung_id = $_SESSION["nguoidung"]["id"];
		
		
		if(isset($_GET["id"])){
			//$dhct->xoadonhangct($_GET["id"]);
			//$dh->xoadonhang($_GET["id"]);
			$donhang_id = $_GET["id"];
			$dh->doitrangthaidonhang($donhang_id,2);
			$donhang = $dh->laydonhangtheonguoidung($nguoidung_id);
			include("main.php");
		}
		else{
			$donhang = $dh->laydonhangtheonguoidung($nguoidung_id);
			include("main.php");
		}
		
		break;	
	
    default:
        break;
}
?>
