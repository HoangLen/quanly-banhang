<?php include("view/top.php"); ?>
<br><br>
<div class="container">
	<h2><?php echo $tendm; ?> </h2>
	<br><br>
	<div class="row">
		        
		 <?php
			if($mathang != null){
			foreach($mathang as $mh):  
			?>
			<div class="col-sm-3">
			  <div class="panel panel-info text-center">
				<div class="panel-heading"><a href="?action=xemchitiet&madm=<?php echo $mh["id"]; ?>">
					<?php echo $mh["tenmathang"]; ?></a></div>
				<div class="panel-body">    	
					<a href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>">
					<img src="<?php echo $mh["hinhanh"]; ?>" class="img-responsive" style="width:400px;height:200px" alt="<?php echo $mh["tenmathang"]; ?>"></a>
				</div> 
				<div class="panel-footer">
					<a class="btn btn-danger" href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>">Chi tiết
					</a> 
				</div>  			 
			  </div>
			</div>
			<?php 
			endforeach; 
			}
			else{
				echo "<p>Vui lòng xem danh mục khác...</p>";
		}
		?>
	</div>
</div>


<?php include("view/bottom.php"); ?>