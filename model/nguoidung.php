<?php
class NGUOIDUNG{
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
	
	public function kiemtranguoidunghople($email,$matkhau){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email AND matkhau=:matkhau AND trangthai=1 ";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->bindValue(":matkhau", md5($matkhau));
			$cmd->execute();
			$valid = ($cmd->rowCount () == 1);
			$cmd->closeCursor ();
			return $valid;			
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
	// lấy thông tin người dùng có $email
	public function laythongtinnguoidung($email){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung WHERE email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":email", $email);
			$cmd->execute();
			$ketqua = $cmd->fetch();
			$cmd->closeCursor();
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	
	// lấy tất cả ng dùng
	public function laydanhsachnguoidung(){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM nguoidung";
			$cmd = $db->prepare($sql);			
			$cmd->execute();
			$ketqua = $cmd->fetchAll();			
			return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Thêm nd mới, trả về khóa của dòng mới thêm
	public function themnguoidung($hoten,$email,$matkhau,$sdt,$loai){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO nguoidung(hoten,
										email,
										matkhau,
										sdt,
										loai)
					VALUES(:hoten,:email,:matkhau,:sdt,:loai)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($matkhau));
			$cmd->bindValue(':sdt',$sdt);
			$cmd->bindValue(':hoten',$hoten);
			$cmd->bindValue(':loai',$loai);
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

	// Cập nhật thông tin ng dùng: họ tên, số đt, email, ảnh đại diện 
	public function capnhatnguoidung($id,$hoten,$email,$sdt,$hinhanh){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set hoten=:hoten,
									email=:email, 
									sdt=:sdt, 
									hinhanh=:hinhanh 
					WHERE id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$id);
			$cmd->bindValue(':hoten',$hoten);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':sdt',$sdt);		
			$cmd->bindValue(':hinhanh',$hinhanh);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi mật khẩu
	public function doimatkhau($email,$matkhau){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set matkhau=:matkhau where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':matkhau',md5($matkhau));
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi quyền (loại người dùng: 1 quản trị, 2 nhân viên. Không cần nâng cấp quyền đối với loại người dùng 3-khách hàng)
	public function doiloainguoidung($email,$loai){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set loai=:loai where email=:email";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':email',$email);
			$cmd->bindValue(':loai',$loai);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}

	// Đổi trạng thái (0 khóa, 1 kích hoạt)
	public function doitrangthai($id,$trangthai){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE nguoidung set trangthai=:trangthai where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$id);
			$cmd->bindValue(':trangthai',$trangthai);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
		// Xóa 
    public function xoanguoidung($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM nguoidung WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
?>
