<?php include("../view/top.php"); ?>
<div  class="quanly" style="background-color:LawnGreen">
	<h3><strong><center> QUẢN LÝ MẶT HÀNG </center></strong></h3> 
</div>
<br>

 <?php
  if(isset($tb)){
  ?>
  <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <span class="glyphicon glyphicon-remove"> </span> <?php echo $tb; ?>
  </div>
  <?php
  }
  ?>


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

<table id="quanlimathang"  class="table table-hover" >
	<thead>
		<tr>
			<th bgcolor="yellow">Tên mặt hàng</th>
			<th bgcolor="yellow">Hình ảnh</th>
			<th bgcolor="yellow">Giá</th>
			<th bgcolor="yellow">Mô tả</th>
			<th bgcolor="yellow">Sửa</th>
			<th bgcolor="yellow">Xóa</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($mathang as $m):
	?>
	<tr>
		<td><?php echo $m["tenmathang"]; ?></td>
		<td><img src="../../<?php echo $m["hinhanh"]; ?>" style="width:80px;height:80px" class="img-thumbnail"></td>
		<td><?php echo number_format($m["gia"]); ?>đ</td>
		<td><?php echo $m["mota"]; ?></td>
		
		
		<td><a class="btn btn-warning" href="index.php?action=sua&id=<?php echo $m["id"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
		<td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
	</tr>
	<?php
	endforeach;
	?>
	</tbody>
</table>
<div>
	<center><a  href="index.php?action=them" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm mới</a><center>
</div>
<br>



<?php include("../view/bottom.php"); ?>
