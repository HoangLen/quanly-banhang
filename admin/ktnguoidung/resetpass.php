<!DOCTYPE html>
<html lang="en">
<head>
  <title>NHẠC NHÀ LÀM - ĐĂNG NHẬP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
	
	
</style>

<body style="background-color:khaki;">




<div class="container">
<div class="row">

	
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="row">
			
			<h2>Hãy nhập email của bạn</h2>
			
			
			<?php 
						if(isset($thongbao)){
					?>
			
				
				
				<div >
					
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
			
			<?php 
				}
			?>
			
			
			<form action="index.php" method="post">
				<input type="hidden" name="txtemail" value="<?php echo $email; ?>" >
				
				<input type="password" name="txtmatkhau" class="form-control" placeholder="Mat khau moi"><br>
				<input type="hidden" name="action" value="resetpass">
				<input type="password" name="txtxacnhanmatkhau" class="form-control" placeholder="Xac nhan mat khau"><br>
				<input type="submit" value="Xac nhan" class="btn btn-success">	
								
							
			</form>
			
				
		</div>
	</div>
	
	<div class="col-sm-4"></div>
</div>
</div>
</body>
</html>      

     
    
