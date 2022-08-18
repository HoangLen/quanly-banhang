<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}

$nguoidung = new NGUOIDUNG();

switch($action){
    case "macdinh":   
        $nguoidung = $nguoidung->laydanhsachnguoidung(); 
		//sap xep
		if(isset($_GET["sort"])){
			$sort = $_GET["sort"];
			switch($sort){
				case 'email':
					usort($nguoidung, function($a,$b){ return strcmp($b["email"],$a["email"]);});
					break;
				case 'sdt':
					usort($nguoidung, function($a,$b){ return strcmp($b["sdt"],$a["sdt"]);});
					break;
				case 'hoten':
					usort($nguoidung, function($a,$b){ return strcmp($b["hoten"],$a["hoten"]);});
					break;
				case 'loai':
					usort($nguoidung, function($a,$b){ return $a["loai"] - $b["loai"];});
					break;
				default:
					ksort($nguoidung);
					break;
			}
		}	
        include("main.php");
        break;
    case "khoa":   
        $mand = $_GET["mand"];
        $trangthai = $_GET["trangthai"];
        if(!$nguoidung->doitrangthai($mand, $trangthai)){
            $tb = "Đã đổi trạng thái!";
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();     
        include("main.php");
        break;
    case "them":
		$hoten = $_POST["txthoten"];
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $sdt = $_POST["txtsdt"];
       
        $loai = $_POST["optloaind"];
        if($nguoidung->laythongtinnguoidung($email)){   // có thể kiểm tra thêm số đt không trùng
            $tb = "Email này đã được cấp tài khoản!";
        }
        else{
            if(!$nguoidung->themnguoidung($hoten,$email,$matkhau,$sdt,$loai)){
                $tb = "Không thêm được!";
            }
			else
				$ok = "Thêm ". $hoten ." thành công";
				
			
        }
        $nguoidung = $nguoidung->laydanhsachnguoidung();
        include("main.php");        
        break;
    case "xoa":
        $nguoidung->xoanguoidung($_GET["id"]);    
		$nguoidung = $nguoidung->laydanhsachnguoidung(); 
        include("main.php");
        break;
	
    default:
        break;
}
?>
