<!DOCTYPE html>
<html lang="en">
<head>
  <title>SAO VÀNG - ĐĂNG NHẬP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
	
		.khoi-login{
			
		
            height:400px;
			width:400px;
            position:absolute;
          
            top:100px;
	}
	#hinhlogin {
		float: left;
		width: 600px;
		  position:absolute;
		 top:80px;
    }
	
	#formlogin {
		float: right;
		width:500px;
    }
	
	
	
	
</style>

<body >






<div class="container">

			
			
			<div id="hinhlogin">
				<img src="../../img/carousel/a4.jpg" width="730px" height="500px">
			</div>
			
			
			<div id="formlogin" >
				
				<div class="col-sm-4">	</div>
				<div class="col-sm-4">
					<div class="row">
					
						<div class="khoi-login">
								
								<?php if (isset($tb) && $tb != ""){ ?>
								<div class="alert alert-warning alert-dismissible fade in text-center">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php echo "<p>$tb</p>"; ?>
								</div>
								<?php
									} 
								?>
								<center><img src="../../img/carousel/a1.png" width="80" class="img-thumbnail" ?></center>
								<center><h2><strong>ĐĂNG NHẬP</strong></h2></center>
								<form action="index.php" method="post">
									<label>Email</label>
									<input type="text" name="txtemail" class="form-control" placeholder="Email"><br>
									<label>Mật khẩu</label>
									<input type="password" name="txtmatkhau" class="form-control" placeholder="Mật khẩu"><br>
									<input type="hidden" name="action" value="xldangnhap">
									<input type="submit" value="Đăng nhập" class="btn btn-primary btn-lg btn-block" >	
													
										
												
								
								
								</form>
								<hr>
								<center><a href="quenpass.php"> Quên mật khẩu đăng nhập? </a></center>
								
						</div>
							
					</div>
				</div>
				
				<div class="col-sm-4"></div>
			</div>
</div>

</body>
</html>      

     
    
