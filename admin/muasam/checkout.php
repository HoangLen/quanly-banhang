<?php include("../view/top.php"); ?>
<br><br><br>

	<?php
  if(isset($ok)){
  ?>
  <div class="alert alert-success alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="glyphicon glyphicon-ok"> </span> <?php echo $ok; ?>
  </div>
  <?php
  }
  ?>

<div>    
  <div class="row"> 
		
		<h4>Bạn có muốn thêm địa chỉ mới? </h4>
		
		<div class="col-sm-6">						
					<a class="btn btn-warning" data-toggle="modal" data-target="#fthemnguoidung"><span class="glyphicon glyphicon-plus"></span> Thêm địa chỉ mới</a>							
				<h4>Thông tin khách hàng</h4>
					<form method="post">
						<input type="hidden" name="action" value="luudonhang">	
						<div class="form-group">
							<label>Địa chỉ</label>
							<select class="form-control" name="optdiachi">
								<?php
								foreach($diachi as $d):
								?>
									<option value="<?php echo $d["id"]; ?>"><?php echo $d["diachi"]; ?></option>
								<?php
								endforeach;
								?>
							</select>			
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
				<?php foreach($bao as $mahang => $mh): ?>
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

<div class="modal fade" id="fthemnguoidung" role="dialog">
    <div class="modal-dialog">    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận địa chỉ mới</h4>
        </div>
			<div class="modal-body">
			<form method="post">
				<div class="form-group">
					<label>Địa chỉ</label>
						<textarea class="form-control" name="txtdiachi" required></textarea>
				</div>
					
				<div class="form-group">
				<input type="hidden" name="action" value="luudonhang" >
				<input class="btn btn-primary"  type="submit" value="OK">
				<input class="btn btn-warning"  type="reset" value="Hủy">
				</div>
			</form>

          
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
			</div>
    </div>  
</div>
   
   </div>
 