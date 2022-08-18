<?php
class KHACHHANG{
	private $id;
	private $hoten;
	private $email;
	private $matkhau;
	private $sdt;
	private $loai;
	private $trangthai;
	private $hinhanh;
	
	public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }
	
	public function getHoTen(){
        return $this->hoten;
    }

    public function setHoTen($value){
        $this->hoten = $value;
    }
	
	public function getEmail(){
        return $this->email;
    }

    public function setEmail($value){
        $this->email = $value;
    }
	
	public function getMatKhau(){
        return $this->matkhau;
    }

    public function setMatKhau($value){
        $this->matkhau = $value;
    }
	
	public function getSdt(){
        return $this->sdt;
    }

    public function setSdt($value){
        $this->sdt = $value;
    }
	
	public function getLoai(){
        return $this->loai;
    }

    public function setLoai($value){
        $this->loai = $value;
    }
	
	public function getTrangThai(){
        return $this->trangthai;
    }

    public function setTrangThai($value){
        $this->trangthai = $value;
    }
	
	public function getHinhAnh(){
        return $this->hinhanh;
    }

    public function setHinhAnh($value){
        $this->hinhanh = $value;
    }
	
	

	// Thêm KH mới, trả về khóa của dòng mới thêm
	public function themkhachhang($email,$hoten,$sdt){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(email,matkhau,sdt,hoten,loai,trangthai) VALUES(:email,:matkhau,:sdt,:hoten,3,1)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($sdt));
			$cmd->bindValue(':sdt',$sdt);
			$cmd->bindValue(':hoten',$hoten);
		
			$cmd->execute();
			$id = $db->lastInsertId();
			return $id;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	
}
?>
