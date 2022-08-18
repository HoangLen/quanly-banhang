<?php 
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");
require("../../model/SendMail.php");
require("../../model/bill.php");

$danhmuc = new DANHMUC();
$nguoidung = new NGUOIDUNG();



// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);


if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($isLogin == FALSE){
    $action = "dangnhap";
}
else{
    $action="macdinh"; 
}
//------------

$tb = "";

switch($action){
    case "macdinh":              
        include("main.php");
        break;
    case "dangxuat":        
        unset($_SESSION["nguoidung"]);   
		xoagiohang();
        $tb = "Cảm ơn!";
        include("loginform.php");
        break;
    case "dangnhap":
		
        include("loginform.php");
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
		
        if($nguoidung->kiemtranguoidunghople($email,$matkhau)==TRUE){
            $_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($email);
		
            include("main.php");
        }
        else{
            $tb = "Đăng nhập không thành công!";
            include("loginform.php");
        }
        break;

    case "capnhaths":
        $mand = $_POST["txtid"];
		$hoten = $_POST["txthoten"];
        $email = $_POST["txtemail"];
		$sdt = $_POST["txtsdt"];
        $hinhanh = basename($_FILES["fhinh"]["name"]);
        $duongdan = "../img/" . $hinhanh;
        move_uploaded_file($_FILES["fhinh"]["tmp_name"], $duongdan);
        
        $nguoidung->capnhatnguoidung($mand,$hoten,$email,$sdt,$hinhanh);

        $_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($email);
        include("main.php");        
        break;

    case "doimatkhau":
		//$ghilai = $_POST["txtnhaplai"];
		//$matkhaumoi = $_POST["txtmatkhaumoi"];
		
		
         if (isset($_POST["txtemail"]) && isset($_POST["txtmatkhaumoi"]) && isset($_POST["txtnhaplai"]) )
		 {
			if($_POST["txtmatkhaumoi"]==$_POST["txtnhaplai"]){
            $nguoidung->doimatkhau($_POST["txtemail"],$_POST["txtmatkhaumoi"]);
			$ok = "Thay đổi mật khẩu thành công!!!";
			}
			else 
			{
				$done = "Thay đổi mật khẩu không thành công!!!";		
			}	
		}
        include("main.php");
        break;   
		
	case "xem": 
        $baihat = $bh->laybaihat();
        include("main.php");
        break;
    case "xemnhom": 
        if(isset($_REQUEST["matl"])){
            $matl = $_REQUEST["matl"];
            $tloai = $tl->laytheloaitheoid($matl);
            $tentl =  $tloai["tentheloai"];   
            $baihat = $bh->laybaihattheotheloai($matl);
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
    case "xemchitiet": 
        if(isset($_GET["mabh"])){
            $mabh = $_GET["mabh"];
            // tăng lượt xem lên 1
            $bh->tangluotxem($mabh);
            // lấy thông tin chi tiết bai hat
            $bhct = $bh->laybaihattheoid($mabh);
            // lấy các mặt hàng cùng danh mục
            $matl = $bhct["id_theloai"];
            $baihat = $bh->laybaihattheotheloai($matl);
            include("detail.php");
        }
        break;
	
	case "quenmatkhau":
		 
		
		$email = $_POST["txtemail"];
		$ktra = $nguoidung->laythongtinnguoidung($email);
		if($ktra==NULL)
		{	
			$thongbao="Email nay chua duoc dang ky!";
			include("quenpass.php");
			break;
		}
		else{
			 $thongbao = 'Vui lòng kiểm tra Mail để lấy mã xác nhận';
            $hoten =$ktra["hoten"];
            
            $maxacnhan=substr(md5(rand(0,999999)),0,8);
			
            sendmail($email,$hoten,$maxacnhan);   
            include("xacnhan.php");
			break;
		}
        include("loginform.php");
        break;
	
	case "xacnhan":
		 
		$email=$_POST["txtemail"];
        $maxacnhan = $_POST["ma"];
        $txtma=$_POST["txtma"];
        if ($maxacnhan == $txtma) {
            $thongbao='';
            include("resetpass.php");
        } else {

            $thongbao="Mã xác nhận không khớp";
            include("xacnhan.php");
        }
        break;

	case "resetpass":
		 
		$email=$_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $xacnhanmatkhau=$_POST["txtxacnhanmatkhau"];
        if ($matkhau == $xacnhanmatkhau) {
			$nguoidung->doimatkhau($email,$matkhau);
			
            include("loginform.php");
        } else {

            $thongbao="Mat khau không khớp";
            include("resetpass.php");
        }
        break;
	
	case "themnguoidungmoi":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        $sdt = $_POST["txtsodienthoai"];
        $hoten = $_POST["txthoten"];
        $loai = 3;
		if($nguoidung->laythongtinnguoidung($email)){ 
            $tb = "Email này đã được cấp tài khoản!";
        }
        else{
			$nguoidung->themnguoidung($hoten,$email,$matkhau,$sdt,$loai);
			$email = $_POST["txtemail"];
			$matkhau = $_POST["txtmatkhau"];
			if($nguoidung->kiemtranguoidunghople($email,$matkhau)==TRUE){
				$_SESSION["nguoidung"] = $nguoidung->laythongtinnguoidung($email);						
			}
			else{
				$tb = "Đăng nhập không thành công!";
				include("loginform.php");
			}				
		}
		include("main.php"); 	
		
    default:
        break;
}
?>
