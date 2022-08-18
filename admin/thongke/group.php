<?php include("../view/top.php"); ?>
<br><br>
<div  class="quanly" style="background-color:LawnGreen">
	<h3><strong><center> Chi tiết hóa đơn HD<?php echo $tenhd; ?> </center></strong></h3> 
</div>
	
	<br><br>
	<table  id="banhang" class="table table-hover" >
	<thead>
		<tr>
			<th bgcolor="yellow">STT</th>
			<th bgcolor="yellow">Tên mặt hàng</th>
			<th bgcolor="yellow">Hình ảnh</th>
			<th bgcolor="yellow">Số lượng</th>
			<th bgcolor="yellow">Đơn giá</th>
			<th bgcolor="yellow">Thành tiền</th>
			
		</tr>
	</thead>	
	<tbody>
	<?php
	$stt=1;
	foreach($hdon as $ct):
	?>
	<tr >
		<td><?php echo $stt ?></td>
		<td><?php echo $ct["tenmathang"]; ?></td>
		<td><img src="../../<?php echo $ct["hinhanh"]; ?>" style="width:80px;height:80px" class="img-thumbnail" ></td>
		<td><?php echo $ct["soluong"]; ?></td>
		
		<td><?php echo $ct["dongia"]; ?> đ</td>
		<td><?php echo $ct["thanhtien"]; ?> đ</td>
	</tr>	
	<?php
	  $stt++; endforeach;
	?>	
	</tbody>
</table>
<span id="val"></span>
<script>
	
	var table = document.getElementById("banhang"), sumVal=0;
	
	for(var i=1; i<table.rows.length;i++)
	{
		sumVal= sumVal + parseInt(table.rows[i].cells[5].innerHTML);
	}
	
	document.getElementById("val").innerHTML = "Tổng thu: " + sumVal + ".VND";
	console.log(sumVal);

</script>


<?php include("../view/bottom.php"); ?>