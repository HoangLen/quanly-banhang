<?php include("../view/top.php"); ?>
<div  class="quanly" style="background-color:LawnGreen">
	<h3><strong><center> ĐƠN HÀNG CHƯA ĐƯỢC KIỂM DUYỆT CỦA TÔI </center></strong></h3> 
</div>
<hr>

<hr>
<table  id="banhang" class="table table-hover" >
	<thead>
		<tr>
			<th bgcolor="yellow">STT</th>
			<th bgcolor="yellow">Mã giao dịch</th>
			
			<th bgcolor="yellow">Ngày đặt hàng</th>
		
			<th bgcolor="yellow">Giá</th>
		<!--	<th bgcolor="yellow">Ghi chú</th> -->
			
		</tr>
	</thead>	
	<tbody>
	<?php
	$stt=1;
	foreach($donhang as $dh):
	?>
	<tr>
		<td><?php echo $stt ?></td>
		<td><a href="index.php?action=xemnhom&madh=<?php echo $dh["id"]; ?>">DH<?php echo $dh["id"]; ?></a></td>
		
		<td><?php echo $dh["ngay"]; ?></td>	
		<td><?php echo $dh["tongtien"]; ?> đ</td>
	
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
		sumVal= sumVal + parseInt(table.rows[i].cells[3].innerHTML);
	}
	
	document.getElementById("val").innerHTML = "Số tiền bạn cần phải trả: " + sumVal + ".VND";
	console.log(sumVal);

</script>


<script>
		$("#btnXuat").click(function(){
			
			$("#banhang").table2excel({
				exclude: ".noEx1",
				name: "Worksheet Name",
				filename: 'Doanh_thu',
				fileext: ".xlsx"
			})
		});
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
</script>

</hr>



<?php include("../view/bottom.php"); ?>
