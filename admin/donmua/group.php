<?php include("../view/top.php"); ?>
<br><br>
<div  class="quanly" style="background-color:LawnGreen">
	<h3><strong><center> CHI TIẾT ĐƠN HÀNG </center></strong></h3> 
</div>
	
	<br><br>
	<table  id="banhang" class="table table-hover" >
	<thead>
		<tr>
			<th bgcolor="yellow">STT</th>
			<th bgcolor="yellow">Tên mặt hàng</th>
			<th bgcolor="yellow">Hình ảnh</th>
			<th bgcolor="yellow">Đơn giá</th>
			<th bgcolor="yellow">Số lượng</th>			
			<th bgcolor="yellow">Thành tiền</th>
			
			
		</tr>
	</thead>	
	<tbody>
	<?php
	$stt=1;
	foreach($dhang as $dhct):
	?>
	<tr >
		<td><?php echo $stt ?></td>
		<td><?php echo $dhct["tenmathang"]; ?> </td>
		<td><img src="../../<?php echo $dhct["hinhanh"]; ?>" width="80" class="img-thumbnail" ?></td>
		<td><?php echo $dhct["dongia"]; ?></td>
	
		<td><?php echo $dhct["soluong"]; ?> </td>
		<td><?php echo $dhct["thanhtien"]; ?> đ</td>
		
	</tr>	
	<?php
	  $stt++; endforeach;
	?>	
	</tbody>
	
</table><span id="val"></span>


<?php 
	if(isset($ghichu) && $ghichu==1){
?>
<div>
<a class="btn btn-success" href="index.php?action=kiemduyet&id=<?php echo $dhct["donhang_id"]; ?>"><span class="glyphicon glyphicon-ok"> Đã nhận được hàng</span></a>
<div>
<?php 
	}
	?>


<script>
	
	var table = document.getElementById("banhang"), sumVal=0;
	
	for(var i=1; i<table.rows.length;i++)
	{
		sumVal= sumVal + parseInt(table.rows[i].cells[5].innerHTML);
	}
	
	document.getElementById("val").innerHTML = "Số tiền bạn cần phải trả: " + sumVal + ".VND";
	console.log(sumVal);

</script>


<?php include("../view/bottom.php"); ?>