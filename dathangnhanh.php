<?php include("view/top.php"); ?>
<br><br><br>
<div class="container">    
  <div class="row"> 
    <h3> Vui lòng nhập đầy đủ thông tin</h3>
    <div class="col-sm-6">
	<h4>Thông tin khách hàng</h4>
	<form method="post">
		<input type="hidden" name="action" value="luudonhang_khachle">	
		
		<div class="form-group">
			<label>Họ tên</label>
			<input type="text" class="form-control" name="txthoten" required>
		</div>	
		<div class="form-group">
			<label>Số điện thoại</label>
			<input type="number" class="form-control" name="txtsodienthoai" required>
		</div>
		<div class="form-group">
			<label>Địa chỉ</label>
			<textarea class="form-control" name="txtdiachi" required></textarea>
		</div>
		<div class="form-group">
			<input type="submit" value="Hoàn tất đơn hàng" class="btn btn-primary">
		</div>
	</form>
	</div>
	<div class="col-sm-6">
	<h4> Các mặt hàng đã chọn </h4>
		<table class="table table-bordered">
		<tr class="info">
		<th>Sản phẩm</th>
		<th>Đơn giá</th>
		<th>Số lượng</th>
		<th>Thành tiền</th>
		</tr>
		<?php foreach($giohang as $mahang => $mh): ?>
		<tr>
		<td><?php echo $mh["tenhang"]; ?></td>
		<td><?php echo number_format($mh["giaban"]) . "đ"; ?></td>
		<td><?php echo $mh["soluong"]; ?></td>
		<td><?php echo number_format($mh["sotien"]) . "đ"; ?></td>
		</tr>
		<?php endforeach; ?>
		<tr>
		<td colspan="3" align="right"><b>Tổng tiền</b></td>
		<td><b><?php echo number_format(tinhtiengiohang()); ?>đ</b></td>
		</tr>
	</div>
	
	</div>
	
</div>
