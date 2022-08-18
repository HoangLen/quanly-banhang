<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="author" content="Công viên nước Sao Vàng">
	<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <meta name="description"
          content="Công viên nước tại Long Xuyên, không gian rộng rãi, nhiều dịch vụ vui chơi giải trí cùng với các đồ uống ngon, mát lạnh!!">
    <meta name="keywords"
          content="sao vàng Long Xuyên, Công viên nước, gold start, Công viên nước Sao Vàng, saovang lx, saovang, congviennuoc, cvnsaovang, cvn, abcz">	  
	<link rel="icon" type="image/png" sizes="16x16"  href="images/favicon-16x16.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
  <title>SAO VÀNG - LONG XUYÊN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  h3{
    text-shadow: 2px 2px 2px silver;
  }
  .carousel-inner img {  
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  
  
  
  footer {
      background-color: #000000;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  } 
	
  .timkiem{
	    position: relative;
		right:25px;
	  width: 900px;
	  margin:auto;
	  margin-top: 20px;
	   border-left: solid 1px #ccc;
	    padding: 0 8px 0 10px;
		color: #666666;
		margin: 30px 0 0 0;
		box-shadow: none;
		border: 0;
		font-size: 20px;
		 
  }

		.khoito { 
			width: 1175px;
			display: flex;
			flex-wrap: nowrap;
			margin: 25px 0px 0px 90px;		
		} 
		
		.box1 {flex-grow: 1;}
		.box2 {flex-grow: 2;}
		.item {
			
			border: 2px ;
			padding: 20px;

			width: 10px;

		}
		
		
		
  </style>
</head>
<body id="abc" data-spy="scroll" data-target=".navbar" data-offset="50" >

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> SAOVANG</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
		
		  <ul class="nav navbar-nav">
			<li><a href="?action=tongquan"><span class="glyphicon glyphicon-th-large"> TỔNG QUAN</span></a></li>
			
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
						
			<li><a href="admin"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
			<li><a href="?action=xemgiohang" class="text-warning">
			  <span class="glyphicon glyphicon-shopping-cart"></span> Giỏ hàng
			  <span class="badge">
				<?php      
				  echo demhangtronggio();
				?>
			  </span> </a>
			</li>   	
			
			
			
		  </ul>
		  
    </div>
  </div>
</nav>
	
	
	<!-- Form cập nhật thông tin ng dùng-->
  <div class="modal fade" id="fcapnhatthongtin" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Hồ sơ cá nhân</h3>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="../ktnguoidung/index.php">
            <div class="text-center">
              <img class="img-circle" src="../img/<?php if ($_SESSION["nguoidung"]["hinhanh"]==NULL)
				  echo "user.png"; else echo $_SESSION["nguoidung"]["hinhanh"]; ?>" alt="<?php echo $_SESSION["nguoidung"]["hoten"]; ?>" width="100px">
            </div>
            <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
            <div class="form-group">    
           
			<div class="form-group">
            <label>Họ tên</label>
            <input class="form-control"  type="text" name="txthoten" placeholder="Họ tên" value="<?php echo $_SESSION["nguoidung"]["hoten"]; ?>" required>
			</div>
		    <label>Email</label>    
            <input class="form-control" type="email" name="txtemail" placeholder="Email" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" required>
            </div>
            <div class="form-group">    
            <label>Số điện thoại</label>    
            <input class="form-control" type="text" name="txtsdt" placeholder="Số điện thoại" value="<?php echo $_SESSION["nguoidung"]["sdt"]; ?>" required>
            </div>            
           
            <div class="form-group">
              <label>Đổi hình đại diện</label>
              <input type="file" name="fhinh">
            </div>
            <div class="form-group">
            <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>" >
            <input type="hidden" name="action" value="capnhaths" >
            <input class="btn btn-primary"  type="submit" value="Lưu">
            <input class="btn btn-warning"  type="reset" value="Hủy"></div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  
<!-- Form đổi mật khẩu -->
  <div class="modal fade" id="fdoimatkhau" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Đổi mật khẩu</h3>
        </div>
        <div class="modal-body">

          <form method="post" name="f" action="../ktnguoidung/index.php">
            <input type="hidden" name="txtemail" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>">
            <div class="form-group">  
            <label>Mật khẩu mới</label>      
            <input class="form-control" type="password" name="txtmatkhaumoi" placeholder="Mật khẩu mới" required>
            </div>
			
            <div class="form-group">
            <input type="hidden" name="action" value="doimatkhau" >           			
			<input class="btn btn-primary"  type="submit" value="Lưu">
            <input class="btn btn-warning"  type="reset" value="Hủy"></div>
          </form>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>

    </div>
  </div>	
	
	
	 <!-- Hộp modal chứa form thêm mới -->
  <div class="modal fade" id="fthemnguoidung" role="dialog">
    <div class="modal-dialog">    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form đăng ký</h4>
        </div>
        <div class="modal-body">
          <form action="../admin/ktnguoidung/index.php?action=themnguoidungmoi" method="post">
            <div class="form-group">        
            <input class="form-control" type="email" name="txtemail" placeholder="Email" required>
            </div>
            <div class="form-group"><input class="form-control"  type="password" name="txtmatkhau" placeholder="Mật khẩu" required></div>
            <div class="form-group">        
            <input class="form-control" type="number" name="txtsodienthoai" placeholder="Số điện thoại" required>
            </div>
            <div class="form-group">
            <input class="form-control"  type="text" name="txthoten" placeholder="Họ tên" required></div>
            <div class="form-group">
  
            
            <div class="form-group">
           <!-- <input type="hidden" name="action" value="themnguoidungmoi" > -->
            <input class="btn btn-primary"  type="submit" value="Thêm">
            <input class="btn btn-warning"  type="reset" value="Hủy"></div>
          </form>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
	
	<!---Ca nhan nguoi dung-->
	
	

<br>
