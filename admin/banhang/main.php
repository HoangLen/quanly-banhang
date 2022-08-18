<?php include("../view/top.php"); ?>
<div  class="quanly" style="background-color:LawnGreen">

	<nav class="navbar navbar-default ">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" href="index.php">MENU</a>
		</div>
		<ul class="nav navbar-nav">
		 <li class="nav-item dropdown">
				  <a class="nav-link" href="#" data-toggle="dropdown">
					<span class="glyphicon glyphicon-th-list"></span> DANH MỤC <span class="caret"></span>
				  </a>
				  
				  <ul class="dropdown-menu">
					<?php            
					foreach($danhmuc as $dm):
					?>
					<li><a href="?action=xemnhom&madm=<?php echo $dm["id"]; ?>"><?php echo $dm["tendanhmuc"]; ?></a></li>
					<?php endforeach; ?>	
				  </ul>
				  
		</ul>
		<ul class="nav navbar-nav navbar-right">
			
			<!--$isLogin = isset($_SESSION["user"]);-->
			<li><a href="?action=xemgiohang" class="text-warning">
			  <span class="glyphicon glyphicon-floppy-open"></span>
			  <span class="badge">
				<?php      
				  echo demhangtronggio();
				?>
			  </span> </a>
        </li>   	
			 					
			
			
		  </ul>
		
	  </div>
	</nav>
	
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


<table id="banhang" class="table table-hover" >
	<thead>
	<tr>
		<th bgcolor="yellow">Tên mặt hàng</th>
		<th bgcolor="yellow">Hình ảnh</th>
		<th bgcolor="yellow">Giá</th>
		<th bgcolor="yellow">Số lượng</th>
			
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
		<td>
			<div class="form-group">
				<form class="form-inline" method="post">
				<input type="hidden" name="action" value="chovaobill">
				<input type="hidden" name="txtmahang" value="<?php echo $m["id"]; ?>">
				<input class="form-control" type="number" name="txtsoluong" value="0">
				<input type="submit" class="btn btn-info" value="Chọn mua">
				</form>
			</div>
		
		</td>
		
		
	
		
	</tr>
	<?php
	endforeach;
	?>
	</tbody>
</table>





<?php include("../view/bottom.php"); ?>
