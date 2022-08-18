<?php 
if(!isset($_SESSION["nguoidung"])){
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");


// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$mh = new MATHANG();
$dm = new DANHMUC();

switch($action){
    case "xem":
        $mathang = $mh->laymathang();
		include("main.php");
        break;
	case "them":
		$danhmuc = $dm->laydanhmuc();
		include("addform.php");
        break;
	case "xulythem":	
		// xử lý file upload
		$hinhanh = "img/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan1 = "../../" . $hinhanh; // nơi lưu file upload
		move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan1);
		//---
		// xử lý thêm		
		$tenmathang = $_POST["txttenmathang"];		
		$mota = $_POST["txtmota"];
		$gia = $_POST["txtgia"];
		$danhmuc_id = $_POST["optdanhmuc"];
		
		 if($mh->laythongtinmathang($tenmathang)){   // có thể kiểm tra thêm số đt không trùng
            $tb = "Sản phẩm này đã có!";
        }
        else{
            if(!$mh->themmathang($tenmathang,$mota,$gia,$hinhanh,$danhmuc_id)){
                $tb = "Không thêm được!";
            }
			else
				$ok = "Đã thêm ". $tenmathang ." vào danh sách";
        }
		
		$mathang = $mh->laymathang();
		include("main.php");
        break;
	case "xoa":
		if(isset($_GET["id"]))
			$mh->xoamathang($_GET["id"]);
		$mathang = $mh->laymathang();
		include("main.php");
		break;	
    case "sua":
        if(isset($_GET["id"])){ 
            $m = $mh->laymathangtheoid($_GET["id"]);
			$danhmuc = $dm->laydanhmuc();
            include("updateform.php");
        }
        else{
            $mathang = $mh->laymathang();        
            include("main.php");            
        }
        break;
    case "xulysua":
		$id = $_POST["txtid"];   
		$danhmuc_id = $_POST["optdanhmuc"];
		$tenmathang = $_POST["txttenmathang"];  
		$mota = $_POST["txtmota"];
		$gia = $_POST["txtgia"];
        $hinhanh = $_POST["txthinhcu"];
		
        // upload file hinh mới (nếu có)
        if($_FILES["filehinhanh"]["name"]!=""){
            // xử lý file upload -- Cần bổ dung kiểm tra: dung lượng, kiểu file, ...       
            $hinhanh = "img/" . basename($_FILES["filehinhanh"]["name"]);// đường dẫn lưu csdl
            $duongdan1 = "../../" . $hinhanh; // đường dẫn lưu upload file        
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan1);
        }
        
        // sửa  bài hát
        $mh->suamathang($id,$tenmathang,$mota,$gia,$hinhanh,$danhmuc_id);         
		$ok = "Sửa ". $tenmathang ." thành công";
        // hiển thị
        $mathang = $mh->laymathang();    
        include("main.php");
        break;

    default:
        break;
}
?>
