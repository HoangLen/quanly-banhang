<?php include("../view/top.php"); ?>
<br><br>
<div  class="quanly" style="background-color:LawnGreen">
	<h3><strong><center> DATE: <?php echo $ngay; ?> </center></strong></h3> 
</div>
	
	<br><br>
	<table  id="banhang" class="table table-hover" >
	<thead>
		<tr>
			<th bgcolor="yellow">Mã đơn hàng</th>
			<th bgcolor="yellow">Khách hàng</th>
			<th bgcolor="yellow">Số điện thoại</th>
			<th bgcolor="yellow">Địa chỉ</th>
			<th bgcolor="yellow">Tổng tiền</th>
			
		</tr>
	</thead>	
	<tbody>
	<?php
	
	foreach($date_dh as $d):
	?>
	<tr >
		<td><a href="?action=xemchitiet&madh=<?php echo $d["id"]; ?>"><?php echo $d["id"]; ?></td>
		<td><?php echo $d["hoten"]; ?></td>	
		<td><?php echo $d["sdt"]; ?></td>	
		<td><?php echo $d["diachi"]; ?> </td>
		<td><?php echo $d["tongtien"]; ?> đ</td>
	</tr>	
	<?php
	   endforeach;
	?>	
	</tbody>
</table>
<span id="val"></span>
<script>
	
	var table = document.getElementById("banhang"), sumVal=0;
	
	for(var i=1; i<table.rows.length;i++)
	{
		sumVal= sumVal + parseInt(table.rows[i].cells[3].innerHTML);
	}
	
	document.getElementById("val").innerHTML = "Tổng thu: " + sumVal + ".VND";
	console.log(sumVal);

</script>


<?php include("../view/bottom.php"); ?>