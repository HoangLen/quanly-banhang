<?php
class DONHANG{
	private $id;
	private $nguoidung_id;
	private $diachi_id;
	private $ngay;
	private $tongtien;
	private $ghichu;
	
	public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }
	
	public function getNguoiDung_ID(){
        return $this->nguoidung_id;
    }

    public function setNguoiDung_ID($value){
        $this->nguoidung_id = $value;
    }
	
	public function getDiaChi_ID(){
        return $this->diachi_id;
    }

    public function setDiaChi($value){
        $this->ngay = $value;
    }
	
	public function getNgay(){
        return $this->ngay;
    }

    public function setNgay($value){
        $this->ngay = $value;
    }
	public function getTongTien(){
        return $this->tongtien;
    }

    public function setTongTien($value){
        $this->tongtien = $value;
    }
	
	
	public function getGhiChu(){
        return $this->ghichu;
    }

    public function setGhiChu($value){
        $this->ghichu = $value;
    }
	

	// Thêm DH mới, trả về khóa của dòng mới thêm
	public function themdonhang($nguoidung_id,$diachi_id,$tongtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhang(nguoidung_id,diachi_id,tongtien) VALUES(:nguoidung_id,:diachi_id,:tongtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);		
			$cmd->bindValue(':diachi_id',$diachi_id);	
			$cmd->bindValue(':tongtien',$tongtien);
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
	
	public function laydonhang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang where ghichu=1 or ghichu=0";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
           // rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	public function laydonhangtheonguoidung($nguoidung_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT id, ngay, tongtien, ghichu FROM donhang WHERE nguoidung_id=:mand and ghichu=1" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":mand",$nguoidung_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	public function laydonhangtheoma($madh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT id, ngay, tongtien, ghichu FROM donhang WHERE id=:id " ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":id",$madh);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	public function laydonhangtheonguoidung_chuaduyet($nguoidung_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT id, ngay, tongtien, ghichu FROM donhang WHERE nguoidung_id=:mand and ghichu=0" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":mand",$nguoidung_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	//
	public function thaydoighichu($ghichu){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang where ghichu=:ghichu";
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":ghichu",$ghichu);
            $cmd->execute();
            $result = $cmd->fetchAll();
           // rsort($result); // sắp xếp giảm thay cho order by desc
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	public function laydonhangtheonguoidung_kiemtra($nguoidung_id,$donhang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT dh.id, dh.ngay, dh.tongtien, dh.ghichu 
					FROM donhang dh, donhangct ct 
					WHERE dh.nguoidung_id=:mand and dh.ghichu=0 and ct.donhang_id=:donhang_id";
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":mand",$nguoidung_id);
			$cmd->bindValue(":donhang_id",$donhang_id);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	 public function xoadonhang($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM donhang WHERE id=:id";
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
	
	public function doitrangthaidonhang($id,$ghichu){
		$db = DATABASE::connect();
		try{
			$sql = "UPDATE donhang set ghichu=:ghichu where id=:id";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':id',$id);
			$cmd->bindValue(':ghichu',$ghichu);
			$ketqua = $cmd->execute();            
            return $ketqua;
		}
		catch(PDOException $e){
			$error_message=$e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}
	}
	
	public function laydonhangtheokhoangthoigian($date1,$date2){
		$dbcon = DATABASE::connect();
		try{
			$sql = "SELECT  Date(dh.ngay) as 'thoigian', sum(dh.tongtien) tong
				FROM donhang dh
				WHERE  dh.ngay>=:date1 and dh.ngay<:date2 and dh.ghichu=2
				GROUP BY date(dh.ngay)";
				
				
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":date1",$date1);
			$cmd->bindValue(":date2",$date2);
			
			$cmd->execute();
			$result = $cmd->fetchAll();
			return $result;
		}
		catch(PDOException $e){
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}		
    }
	
		public function laydonhangdagiaotheokhoangthoigian($date,$now){
		$dbcon = DATABASE::connect();
		try{
			$sql = "SELECT  dh.id, nd.hoten as 'hoten', dc.diachi as 'diachi', dh.tongtien
				FROM donhang dh, nguoidung nd, diachi dc
				WHERE  date(dh.ngay)>=:date and date(dh.ngay)<:now and ghichu='2'
						and dh.nguoidung_id=nd.id and dh.diachi_id=dc.id
				";
				
				
			$cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":date",$date);
			$cmd->bindValue(":now",$now);
			$cmd->execute();
			$result = $cmd->fetchAll();
			return $result;
		}
		catch(PDOException $e){
			$error_message = $e->getMessage();
			echo "<p>Lỗi truy vấn: $error_message</p>";
			exit();
		}		
    }
	
	
	 public function laydonhangtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
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
