<?php include("view/top.php"); ?>

<br><br>
<div class="container">  
  <div class="row"> 
	
		<div class="col-sm-3">
		</div>
		<div class="col-sm-4">
			<div class="alert alert-danger" id="hienthi">
				<input id="thongbao" class="text-danger form-control text-center" value="<?php echo $thongbao ?>" type="hidden">
				<a href="#" id="thongbao" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong class="text-center">Thông báo!</strong> <?php echo $thongbao ?>
			</div>
			<script>
				$(document).ready(function() {

					if (document.getElementById("thongbao").value == '') {
						$("#hienthi").hide();
					} else {
						$("#hienthi").show();
					}
				});
			</script>
		</div>
	</div>
	
</div>
	  <?php include("topview.php"); ?>
</div>


<?php include("view/bottom.php"); ?>