<?php
class DONHANG_KHACHLE{
	private $id;	
	private $diachi;
	private $ngay;
	private $tongtien;
	private $ghichu;
	
	public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }
	
	
	public function getDiaChi(){
        return $this->diachi;
    }

    public function setDiaChi($value){
        $this->diachi = $value;
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
	public function themdonhangkhachle($diachi,$tongtien,$hoten,$sdt){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhang_khachle(diachi,tongtien,hoten,sdt) VALUES(:diachi,:tongtien,:hoten,:sdt)";
			$cmd = $db->prepare($sql);	
			$cmd->bindValue(':diachi',$diachi);	
			$cmd->bindValue(':tongtien',$tongtien);
			$cmd->bindValue(':hoten',$hoten);
				$cmd->bindValue(':sdt',$sdt);
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
	
	public function laydonhang_khachle(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang_khachle where ghichu=1 or ghichu=0";
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
	
	
	public function laydonhangtheoma($madh){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT id, ngay, tongtien, ghichu FROM donhang_khacle WHERE id=:id " ;
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
	
	
	//
	public function thaydoighichu($ghichu){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM donhang_khacle where ghichu=:ghichu";
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
			$sql = "UPDATE donhang_khachle set ghichu=:ghichu where id=:id";
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
				FROM donhang_khachle dh
				WHERE  dh.ngay>=:date1 and dh.ngay<:date2 and dh.ghichu=1
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
			$sql = "SELECT  dh.id, dh.diachi as 'diachi', dh.tongtien,  dh.hoten, dh.sdt
				FROM donhang_khachle dh
				WHERE  date(dh.ngay)>=:date and date(dh.ngay)<:now and ghichu='1'
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
            $sql = "SELECT * FROM donhang_khachle WHERE id=:id";
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
