<?php include("../view/top.php"); ?>
<div class="quanly" style="background-color:LawnGreen">
<h3><strong><center>QUẢN LÝ DANH MỤC</strong></center></h3> 
</div>
<br>


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

<br> 
<table  class="table table-hover">
	<thead>
		<tr>
			<th bgcolor="yellow">Tên danh mục</th>
			<th bgcolor="yellow">Sửa</th>
			<th bgcolor="yellow">Xóa</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($danhmuc as $d):
		if($d["id"] == $idsua) {
	?>
			<form method="post">
			<input type="hidden" name="txtid" value="<?php echo $d["id"]; ?>">
			<input type="hidden" name="action" value="capnhat">
			<tr>
				<td><input type="text" class="form-control" name="txtten" value="<?php echo $d["tendanhmuc"]; ?>"></td>
				<td><input type="submit" class="btn btn-warning" value="Sửa"></td>
				<td><a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $d["id"]; ?>"><span class="glyphicon glyphicon-trash"> </span></a></td>
			</tr>
			</form>
	<?php
		}
		else{			
	?>
			<tr>
				<td><?php echo $d["tendanhmuc"]; ?></td>
				<td><a href="index.php?action=sua&id=<?php echo $d["id"]; ?>">Sửa</a></td>
				<td><a href="index.php?action=xoa&id=<?php echo $d["id"]; ?>">Xóa</a></td>
			</tr>
	<?php
		}
	endforeach;
	?>
	</tbody>
</table>

<div id="buttonthem">
<a class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Thêm danh mục</a>
</div>
<br>

<div id="formthem">
<form class="form-inline" method="post">
	<input type="text" class="form-control" name="txtten" placeholder="Nhập tên danh mục">
	<input type="hidden" name="action" value="them">
	<input type="submit" class="btn btn-warning" value="Thêm">
</form>
</div>

<script>
$(document).ready(function(){
	$("#formthem").hide();
	$("#buttonthem").click(function(){
		$("#formthem").toggle(1000);
	});
});
</script>

<?php include("../view/bottom.php"); ?>
