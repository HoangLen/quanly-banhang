<?php include("../view/top.php"); ?>
<div  class="quanly" style="background-color:LawnGreen">
	<h3><strong><center> QUẢN LÍ ĐƠN HÀNG - KHÁCH LẺ</center></strong></h3> 
</div>
<hr>

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

	<?php
  if(isset($huy)){
  ?>
  <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="glyphicon glyphicon-remove"> </span> <?php echo $huy; ?>
  </div>
  <?php
  }
  ?>

<hr>
<table  id="banhang" class="table table-hover" >
	<thead>
		<tr>
			
			<th bgcolor="yellow">Mã giao dịch</th>
			<th bgcolor="yellow">Khách hàng</th>
			<th bgcolor="yellow">Số điện thoại</th>
			<th bgcolor="yellow">Ngày đặt hàng</th>
			<th bgcolor="yellow">Giá</th>
			<th bgcolor="yellow">Ghi chú</th>
			
		</tr>
	</thead>	
	<tbody>
	<?php
	foreach($don as $dh):
	?>
	<tr>
		
		<td><a href="index.php?action=xemnhom&madh=<?php echo $dh["id"]; ?>">DH_KL<?php echo $dh["id"]; ?></a></td>
		<td><?php echo $dh["hoten"]; ?></td>	
		<td><?php echo $dh["sdt"]; ?></td>	
		<td><?php echo $dh["ngay"]; ?></td>	
		<td><?php echo $dh["tongtien"]; ?> đ</td>
		<td>
		 <?php 
         
            if($dh["ghichu"]==1){ ?>
              <a class="btn btn-danger" href="?action=huy&madh=<?php echo $dh["id"]; ?>"><span class="glyphicon glyphicon-floppy-remove"></span></a></td></tr>	
			 
            <?php 
            }
            elseif($dh["ghichu"]==0) { ?>
              <a class="btn btn-success" href="?action=khoa&madh=<?php echo $dh["id"]; ?>"><span class="glyphicon glyphicon-floppy-saved"></span></a></td></tr>				  
          <?php 
            }
          
      endforeach; ?>
	</tr>	
	
	</tbody>
</table>
<span id="val"></span>
<script>
	
	var table = document.getElementById("banhang"), sumVal=0;
	
	for(var i=1; i<table.rows.length;i++)
	{
		sumVal= sumVal + parseInt(table.rows[i].cells[4].innerHTML);
	}
	
	document.getElementById("val").innerHTML = "Tổng tiền: " + sumVal + ".VND";
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
