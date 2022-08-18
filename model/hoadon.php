<?php
class HOADON{
	private $id;
	private $nguoidung_id;	
	private $ngay;
	private $tongtien;

	// Thêm DH mới, trả về khóa của dòng mới thêm
	public function themhoadon($nguoidung_id,$tongtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO hoadon(nguoidung_id,tongtien) VALUES(:nguoidung_id,:tongtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':nguoidung_id',$nguoidung_id);		
		
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
	

	public function layhoadon($date,$now,$nd_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT hd.id, TIME(hd.ngay) as 'thoigian',hd.tongtien
				FROM hoadon hd, hoadonct ct, nguoidung nd
				WHERE ct.hoadon_id=hd.id and hd.nguoidung_id=:nd_id and hd.ngay >=:date and hd.ngay<:now";
				
				
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":date",$date);
			$cmd->bindValue(":now",$now);
			$cmd->bindValue(":nd_id",$nd_id);
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

	 public function layhoadontheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM hoadon WHERE id=:id";
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
	
	public function layhoadontheokhoangthoigian($date1,$date2){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT  Date(hd.ngay) as 'thoigian', sum(hd.tongtien) tong
				FROM hoadon hd
				WHERE  hd.ngay>=:date1 and hd.ngay<:date2
				GROUP BY date(hd.ngay)";
				
				
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
	
}
?>
