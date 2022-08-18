<?php
// Tạo mảng SESSION giohang rỗng nếu nó không tồn tại
if (!isset($_SESSION['bill']) ) {
    $_SESSION['bill'] = array();
}

// Hàm thêm sản phẩm vào giỏ
function themhangvaogio($mahang, $soluong) {
    //Tạo thể hiện của lớp MATHANG
   // $mh_db = new MATHANG();
    //Cập nhập Số lượng vào SESSION - Làm tròn
    $_SESSION['bill'][$mahang] = round($soluong, 0);
    //Lấy thông tin của sản phẩm dựa vào $mahang
    //$mh = $mh_db->laymathangtheoid($mahang);
    //Cập nhật thông tin của Mã danh mục và Tên danh mục vào mảng SESSION
   // $_SESSION['madm_cuoi'] = $mh['danhmuc_id'];
   // $_SESSION['tendm_cuoi'] = $mh['tendanhmuc'];
}

// Cập nhật số lượng của giỏ hàng
function capnhatsoluong($mahang, $soluong) {
    if (isset($_SESSION['bill'][$mahang])) {
        $_SESSION['bill'][$mahang] = round($soluong, 0);
    }
}

// Xóa một sản phẩm trong giỏ hàng
function xoamotmathang($mahang) {
    if (isset($_SESSION['bill'][$mahang])) {
        unset($_SESSION['bill'][$mahang]);
    }
}

// Hàm lấy mảng các sản phẩm trong giohang
function laybill() {
	
    //Tạo mảng rỗng để lưu danh sách sản phẩm trong giỏ
    $mh = array();
    $mh_db = new MATHANG();
    
    //Duyệt mảng SESSION giohang và lấy từng id sản phẩm cùng số lượng
    foreach ($_SESSION['bill'] as $mahang => $soluong ) {
        // Gọi hàm lấy thông tin của sản phẩm theo mã sản phẩm
        $m = $mh_db->laymathangtheoid($mahang);
        $dongia = $m['gia'];
        $solg = intval($soluong);        
        // Tính tiền
        $sotien = round($dongia * $soluong, 2);

        // Lưu thông tin trong mảng items để hiển thị lên giỏ hàng
        $mh[$mahang]['tenhang'] = $m['tenmathang'];
        $mh[$mahang]['giaban'] = $dongia;
        $mh[$mahang]['soluong'] = $solg;
        $mh[$mahang]['sotien'] = $sotien;
    }
    return $mh;
}

// Đếm số sản phẩm trong giỏ hàng
function demhangtronggio() {
    return count($_SESSION['bill']);
}

// Đếm tổng số lượng các sản phẩm trong giỏ
function demsoluongtronggio() {
    $tongsl = 0;
	//Lấy mảng các sản phẩm từ trong SESSION
    $bill = laybill();
    foreach ($bill as $item) {
        $tongsl += $item['soluong'];
    }
    return $tongsl;
}

// Tính tổng thành tiền trong giỏ hàng
function tinhtiengiohang () {
    $tong = 0;
    $bill = laybill();
    foreach ($bill as $mh) {
        $tong += $mh['giaban'] * $mh['soluong'];
    }
    return $tong;
}

// Xóa tất cả giỏ hàng
function xoagiohang() {
    $_SESSION['bill'] = array();
}

?>