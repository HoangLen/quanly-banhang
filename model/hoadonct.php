<?php
class HOADONCT{
	private $id;
	private $hoadon_id;
	private $mathang_id;
	private $dongia;
	private $soluong;
	private $thanhtien;
	
	

	// Thêm DH mới, trả về khóa của dòng mới thêm
	public function themchitiethoadon($hoadon_id,$mathang_id,$dongia,$soluong,$thanhtien){
		$db = DATABASE::connect();
		try{
			$sql = "INSERT INTO hoadonct(hoadon_id,mathang_id,dongia,soluong,thanhtien) 
			VALUES(:hoadon_id,:mathang_id,:dongia,:soluong,:thanhtien)";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(':hoadon_id',$hoadon_id);		
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
	
	public function layhoadonct($hoadon_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT DISTINCT mh.tenmathang, mh.hinhanh, ct.soluong, ct.dongia, ct.thanhtien 
					FROM hoadonct ct, mathang mh 
					WHERE hoadon_id=:mahd and mh.id=ct.mathang_id" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":mahd",$hoadon_id);
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
