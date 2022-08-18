<?php include("../view/top.php"); ?>
<div  class="quanly" style="background-color:LawnGreen">
	<h3><strong><center> BÁO CÁO CUỐI NGÀY </center></strong></h3> 
</div>
<hr>


<div  >
	<div>
   <div class="row">
      <div class='col-sm-6'>
        
            <form  id="myform" method="POST">
				<div class="form-row"> 				
					<input id="date" type='date' class="form-control" name="date" />
						<br>
					<input type="submit" class="btn btn-info btn-block" value="Xem"/>					
				</div>

			   <input type="hidden" name="action" value="macdinh">
            </form>
			
       	 
      </div>
     
   </div>
</div>
<br>

<div class="col-sm-2">
	<button class="btn btn-success" id="btnXuat">Xuất ra Excel</button>
</div>

<hr>
<table  id="banhang" class="table table-hover" >
	<thead>
		<tr>
			<th bgcolor="yellow">STT</th>
			<th bgcolor="yellow">Mã giao dịch</th>
			
			<th bgcolor="yellow">Thời gian</th>
			
			<th bgcolor="yellow">Thực thu</th>
			
		</tr>
	</thead>	
	<tbody>
	<?php
	$stt=1;
	foreach($hoadon as $hd):
	?>
	<tr>
		<td><?php echo $stt ?></td>
		<td><a href="index.php?action=xemnhom&mahd=<?php echo $hd["id"]; ?>">HD<?php echo $hd["id"]; ?></a></td>
		
		<td><?php echo $hd["thoigian"]; ?></td>	
		<td><?php echo $hd["tongtien"]; ?> đ</td>
	</tr>	
	<?php
	  $stt++; endforeach;
	?>	
	</tbody>
</table>
<span id="val"></span>
</div>
<script>
	
	var table = document.getElementById("banhang"), sumVal=0;
	
	for(var i=1; i<table.rows.length;i++)
	{
		sumVal= sumVal + parseInt(table.rows[i].cells[3].innerHTML);
	}
	
	document.getElementById("val").innerHTML = "Tổng doanh thu: " + sumVal + ".VND";
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




<?php include("../view/bottom.php"); ?>
