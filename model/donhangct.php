<?php
class DONHANGCT{
	private $id;
	private $donhang_id;
	private $mathang_id;
	private $dongia;
	private $soluong;
	private $thanhtien;
	
	public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }
	
	public function getDonHang_ID(){
        return $this->donhang_id;
    }

    public function setDonHang_ID($value){
        $this->donhang_id = $value;
    }
	
	public function getMatHang_ID(){
        return $this->mathang_id;
    }

    public function setMatHang_ID($value){
        $this->mathang_id = $value;
    }
	
	public function getDonGia(){
        return $this->dongia;
    }

    public function setDonGia($value){
        $this->dongia = $value;
    }
	
	public function getSoLuong(){
        return $this->soluong;
    }

    public function setSoLuong($value){
        $this->soluong = $value;
    }
	
	public function getThanhTien(){
        return $this->thanhtien;
    }

    public function setThanhTien($value){
        $this->thanhtien = $value;
    }

	// Thêm DH mới, trả về khóa của dòng mới thêm
	public function themchitietdonhang($donhang_id,$mathang_id,$dongia,$soluong,$thanhtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO donhangct(donhang_id,mathang_id,dongia,soluong,thanhtien) 
			VALUES(:donhang_id,:mathang_id,:dongia,:soluong,:thanhtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':donhang_id',$donhang_id);		
			$cmd->bindValue(':mathang_id',$mathang_id);	
			$cmd->bindValue(':dongia',$dongia);
			$cmd->bindValue(':soluong',$soluong);	
			$cmd->bindValue(':thanhtien',$thanhtien);
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
	
	public function laydonhangcttheodonhang($donhang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT dhct.id, mh.hinhanh, mh.tenmathang, dhct.dongia, dhct.soluong, dhct.thanhtien, dhct.donhang_id
					FROM donhangct dhct, mathang mh  
					WHERE donhang_id=:madh and dhct.mathang_id=mh.id" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madh",$donhang_id);
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
	
	public function laydonhangcttheoid_donhang($donhang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT dhct.id, mh.hinhanh, mh.tenmathang, dhct.dongia, dhct.soluong, dhct.thanhtien
					FROM donhangct dhct, mathang mh  
					WHERE donhang_id=:madh and dhct.mathang_id=mh.id" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madh",$donhang_id);
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
	
	public function xoadonhangct($donhang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM donhangct WHERE donhang_id=:donhang_id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":donhang_id", $donhang_id);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	public function laydonhangct($donhang_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT mh.tenmathang, mh.hinhanh, ct.soluong, ct.dongia, ct.thanhtien 
					FROM donhangct ct, mathang mh 
					WHERE donhang_id=:madh and mh.id=ct.mathang_id" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madh",$donhang_id);
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
	
}
?>
