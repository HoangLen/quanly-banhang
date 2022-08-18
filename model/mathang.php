<?php
class MATHANG{
    
	private $id;
    private $tenmathang;
	private $mota;
	private $gia;
	private $soluongton;
	private $hinhanh;
	private $danhmuc_id;
	private $luotxem;
	
	public function getID(){
        return $this->id;
    }

    public function setID($value){
        $this->id = $value;
    }
	
	public function getTenMatHang(){
        return $this->tenmathang;
    }

    public function setTenMatHang($value){
        $this->tenmathang = $value;
    }
	
	public function getMoTa(){
        return $this->mota;
    }

    public function setMoTa($value){
        $this->mota = $value;
    }
	
	public function getGia(){
        return $this->gia;
    }

    public function setGia($value){
        $this->gia = $value;
    }
	
	public function getSoLuongTon(){
        return $this->soluongton;
    }

    public function setSoLuongTon($value){
        $this->soluongton = $value;
    }
	
	public function getHinhAnh(){
        return $this->hinhanh;
    }

    public function setHinhAnh($value){
        $this->hinhanh = $value;
    }
	
	public function getDanhMuc_ID(){
        return $this->danhmuc_id;
    }

    public function setDanhMuc_ID($value){
        $this->danhmuc_id = $value;
    }
	
	public function getLuotXem(){
        return $this->luotxem;
    }

    public function setLuotXem($value){
        $this->luotxem = $value;
    }
	
	 public function demtongsomathang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT COUNT(*) FROM mathang";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchColumn();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

	 public function laymathangtheodanhmucphantrang($danhmuc_id,$m,$n){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:madm
					ORDER BY id DESC
					LIMIT $m, $n";
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madm",$danhmuc_id);
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

	 public function laymathangphantrang($m,$n){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT b.*, t.tendanhmuc 
					FROM mathang b, danhmuc t
					WHERE t.id=b.danhmuc_id 
					ORDER BY id DESC 
					LIMIT $m, $n";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	// Lấy mặt hàng nổi bật top 5 có lượt xem cao nhất
    public function laymathangnoibat(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT m.*, d.tendanhmuc FROM mathang m, danhmuc d WHERE d.id=m.danhmuc_id ORDER BY luotxem DESC LIMIT 0, 4";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $ketqua = $cmd->fetchAll();
            return $ketqua;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
	
	public function timkiemtheotukhoa($tukhoa){
        $dbcon = DATABASE::connect();
        try{
            $sql = "select * from mathang
							where tenmathang like '%$tukhoa%' order by id DESC" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":tukhoa",$tukhoa);
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

    // Lấy danh sách
    public function laymathang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang";
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
	    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laymathangtheodanhmuc($danhmuc_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang WHERE danhmuc_id=:madm" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madm",$danhmuc_id);
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

	public function laythongtinmathang($tenmathang){
		$db = DATABASE::connect();
		try{
			$sql = "SELECT * FROM mathang WHERE tenmathang=:tenmathang";
			$cmd = $db->prepare($sql);
			$cmd->bindValue(":tenmathang", $tenmathang);
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

    // Lấy mặt hàng theo id
    public function laymathangtheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM mathang WHERE id=:id";
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
    // Cập nhật lượt xem
    public function tangluotxem($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang SET luotxem=luotxem+1 WHERE id=:id";
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
	
	// Thêm mới
    public function themmathang($tenmathang,$mota,$gia,$hinhanh,$danhmuc_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO mathang(tenmathang,mota,
									gia,hinhanh,danhmuc_id) 
					VALUES(:tenmathang,:mota,:gia,
									:hinhanh,:danhmuc_id)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", $tenmathang);
			$cmd->bindValue(":mota", $mota);
			$cmd->bindValue(":gia", $gia);
			$cmd->bindValue(":hinhanh", $hinhanh);
			$cmd->bindValue(":danhmuc_id", $danhmuc_id);		
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Xóa 
    public function xoamathang($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM mathang WHERE id=:id";
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

    // Cập nhật 
    public function suamathang($id,$tenmathang,$mota,$gia,$hinhanh,$danhmuc_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE mathang SET tenmathang=:tenmathang,
										mota=:mota,
										gia=:gia,
										hinhanh=:hinhanh,
										danhmuc_id=:danhmuc_id
										WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmathang", $tenmathang);
			$cmd->bindValue(":mota", $mota);
			$cmd->bindValue(":gia", $gia);
			$cmd->bindValue(":hinhanh", $hinhanh);
			$cmd->bindValue(":danhmuc_id", $danhmuc_id);
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
