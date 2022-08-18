<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/png" sizes="16x16"  href="../images/favicon-16x16.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
  <title>CÔNG VIÊN NƯỚC - Trang quản trị</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <script src="https://unpkg.com/wavesurfer.js"></script>

  <!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
		<!--Xuất file excel -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
 
  <!-- Phân trang -->
	<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

  <style>
    .row.content {height: 1000px}
    .sidenav {background-color: #f1f1f1; height: 100%;}
    @media screen and (max-width: 767px) { .row.content {height: auto;} }
	.navbar navbar-inverse {
		position: relative;
		top: 30px;
		left: 30px;
	}
	.hero{
	  width:100%;
	  height:50vh;
	  background-image: url(images/bg-body.jpg);
	  background-position: center;
	  background-size: cover;
	  display:flex;
	  align-items:center;
	  justify-content:center;
  }
  .music img{
		width:200px;
  }
  .music{
		width: 85%;
		padding:30px;
		box-sizing: border-box;
		background:#000;
		display: flex;
  }
  .info{
	  color: #fff;
	  margin-left:30px;
	  flex:1;
  }
  .info h1{
	  font-size:30px;
	  margin: 10px 0 60px;
  }
  .controls{
	  margin-top:40px;
	  display:flex;
	  align-items:center;
  }
  .controls img{
	  width:20px;
	  margin-right:20px;
	  cursor:pointer;
  }
  .quanly{
	  padding:1px;
	  color: SaddleBrown;
	  border-color:blue;
  }
  
  .timkiem{
	    position: relative;
		right:10px;
		width: 900px;
		margin:auto;
	 
	   border-left: solid 1px #ccc;
	    padding: 0 0px 0 9px;
		color: #666666;
		margin: 0 0 0 0;
		box-shadow: none;
		border: 0;
		font-size: 15px;
		 
  }
	miss-pass{
		position: relative;
		right:200px;
	}
	
		#khoingay1 {
		float: right;
		
		width: 360px;
		  position:absolute;
		  margin-left:0px;
		
    }
	
	#khoingay2 {
		float: left;
		width:360px;
		margin-left:440px;
    }
	
	#btnxem {
		margin-top:50px;
		width: 800px;
	}

	.csw-btn-button {
	  cursor: pointer;
	  font-size: 16px;
	  padding: 10px 35px;
	  color: #ffffff !important;
	  border-radius: 5px;
	  background: #9B6A1D;
	  border: 1px solid #9B6A1D;
	  transition: 0.4s;
	}
	.csw-btn-button:hover {
	  background: #292929;
	}
	
	#carousel-caption {
		padding: 0 0 0 0;
		
	}
	
  </style>
</head>
<body>
<!-- Menu mh nhỏ -->
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">CÔNG VIÊN NƯỚC</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
        if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==2){
        ?>
		<li class="active"><a href="../ktnguoidung"> NHÂN VIÊN</a>	</li>
		<li><a href="../qlmathang"><span class="glyphicon glyphicon-list-alt"></span> QUẢN LÝ MẶT HÀNG</a></li>
		<li><a href="../baocao"><span class="glyphicon glyphicon-signal"></span> BÁO CÁO CUỐI NGÀY</a></li>
		<li><a href="../banhang"><span class="glyphicon glyphicon-shopping-cart"></span> BÁN HÀNG</a></li>
		
		
		 <?php } ?>  
		
		
		<?php
        if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==3){
        ?>
        <li class="active"><a href="../ktnguoidung"><span class="glyphicon glyphicon-home"></span> NHÀ CỦA TÔI</a></li>	
		<li><a href="../muasam"><span class="glyphicon glyphicon-list-alt"></span> MUA SẮM</a></li>
		
		<li><a href="../donmua"><span class="glyphicon glyphicon-shopping-cart"></span> ĐƠN MUA</a></li>
		 <?php } ?>  
		
		
        <?php
        if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==1){
        ?>
		
		
		
		<li class="active"><a href="#">QUẢN LÝ</a></li>
		<li><a href="../qldonhang"><span class="glyphicon glyphicon-menu-hamburger"></span> QUẢN LÝ ĐƠN HÀNG</a></li>
		<li><a href="../qldonhang_khachle"><span class="glyphicon glyphicon-menu-hamburger"></span> QUẢN LÝ ĐƠN HÀNG - KHÁCH LẺ</a></li>
		<li><a href="../qldanhmuc"><span class="glyphicon glyphicon-th-large"></span> DANH MỤC MẶT HÀNG</a></li>		
        <li><a href="../qlnguoidung"><span class="glyphicon glyphicon-user"></span> QUẢN LÝ NGƯỜI DÙNG</a></li>
		<li><a href="../thongke"><span class="glyphicon glyphicon-equalizer"></span> THỐNG KÊ HÓA ĐƠN</a></li>
		<li><a href="../thongkedonhang"><span class="glyphicon glyphicon-equalizer"></span> THỐNG KÊ ĐƠN HÀNG</a></li>
		
		
        <?php } ?>             
      </ul>
    </div>
  </div>
</nav>
<!-- Menu mh nhỏ - kết thúc -->
<div class="container-fluid">
  <div class="row content">
    <!-- Menu mh lớn -->     
    <div class="col-sm-3 sidenav hidden-xs">
      <h3>          
		<span class="label label-danger">S</span>
        <span class="label label-info">A</span>
		<span class="label label-success">O</span>
        <span class="label label-warning">V</span>
		<span class="label label-warning">A</span>
		<span class="label label-warning">N</span>
		<span class="label label-warning">G</span>
        
      </h3><br>
      <ul class="nav nav-pills nav-stacked">
		
		
       <?php
        if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==2){
        ?>
		<li class="active"><a href="../ktnguoidung"> NHÂN VIÊN</a>	</li>
		<li><a href="../qlmathang"><span class="glyphicon glyphicon-list-alt"></span> QUẢN LÝ MẶT HÀNG</a></li>
		<li><a href="../baocao"><span class="glyphicon glyphicon-signal"></span> BÁO CÁO CUỐI NGÀY</a></li>
		<li><a href="../banhang"><span class="glyphicon glyphicon-shopping-cart"></span> BÁN HÀNG</a></li>
		
		
		 <?php } ?>  
		
		
		<?php
        if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==3){
        ?>
        <li class="active"><a href="../ktnguoidung"><span class="glyphicon glyphicon-home"></span> NHÀ CỦA TÔI</a></li>	
		<li><a href="../muasam"><span class="glyphicon glyphicon-list-alt"></span> MUA SẮM</a></li>
		
		<li><a href="../donmua"><span class="glyphicon glyphicon-shopping-cart"></span> ĐƠN MUA</a></li>
		 <?php } ?>  
		
		
        <?php
        if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"]==1){
        ?>
		
		
		
		<li class="active"><a href="#">QUẢN LÝ</a></li>
		<li><a href="../qldonhang"><span class="glyphicon glyphicon-menu-hamburger"></span> QUẢN LÝ ĐƠN HÀNG</a></li>
		<li><a href="../qldonhang_khachle"><span class="glyphicon glyphicon-menu-hamburger"></span> QUẢN LÝ ĐƠN HÀNG - KHÁCH LẺ</a></li>
		<li><a href="../qldanhmuc"><span class="glyphicon glyphicon-th-large"></span> DANH MỤC MẶT HÀNG</a></li>		
        <li><a href="../qlnguoidung"><span class="glyphicon glyphicon-user"></span> QUẢN LÝ NGƯỜI DÙNG</a></li>
		<li><a href="../thongke"><span class="glyphicon glyphicon-equalizer"></span> THỐNG KÊ HÓA ĐƠN</a></li>
		<li><a href="../thongkedonhang"><span class="glyphicon glyphicon-equalizer"></span> THỐNG KÊ ĐƠN HÀNG</a></li>
		<li><a href="../thongkedonhang_khachle"><span class="glyphicon glyphicon-equalizer"></span> THỐNG KÊ ĐƠN HÀNG - KHÁCH LẺ</a></li>
		
		
        <?php } ?>         
      </ul><br>
    </div>
    <!-- Menu mh lớn - kết thúc -->
    <br>
    
     
     <div class="col-sm-9">
		 <div class="container-fluid">  
			<div class="dropdown" style="text-align: right;">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				 <img class="img-circle" src="../img/<?php if ($_SESSION["nguoidung"]["hinhanh"]==NULL)
				  echo "user.png"; else echo $_SESSION["nguoidung"]["hinhanh"]; ?>" alt="<?php echo $_SESSION["nguoidung"]["hoten"]; ?>" width="30px">
				Chào <?php if(isset($_SESSION["nguoidung"])) echo $_SESSION["nguoidung"]["hoten"]; ?>
				<span class="caret"></span>
				</a>
			  <ul class="dropdown-menu dropdown-menu-right">
				<li><a href="#" data-toggle="modal" data-target="#fcapnhatthongtin"><span class="glyphicon glyphicon-edit"></span> Hồ sơ cá nhân</a></li>
				<li><a href="#" data-toggle="modal" data-target="#fdoimatkhau"><span class="glyphicon glyphicon-wrench"></span> Đổi mật khẩu</a></li>
			
				<li class="divider"></li>
				<li><a href="../ktnguoidung/index.php?action=dangxuat"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
			  </ul>  
			   
				         
			</div>
		</div>

	<hr>
      
<script>
	$(document).ready(function() {
		$('#banhang').DataTable({
			'language': {
				'sProcessing': 'Đang xử lý...',
				'sLengthMenu': 'Hiển thị _MENU_ dòng',
				'sZeroRecords': 'Không tìm thấy dòng nào phù hợp',
				'sInfo': 'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ dòng',
				'sInfoEmpty': 'Đang xem 0 đến 0 trong tổng số 0 dòng',
				'sInfoFiltered': '(được lọc từ _MAX_ dòng)',
				'sInfoPostFix': '',
				'sSearch': 'Tìm kiếm:',
				'sUrl': '',
				'oPaginate': {
					'sFirst': '<i class="fas fa-step-backward"></i>',
					'sPrevious': '<i class="fas fa-angle-double-left"></i>',
					'sNext': '<i class="fas fa-angle-double-right"></i>',
					'sLast': '<i class="fas fa-step-forward"></i>'
				}
			}
		});
	});
</script>
	  
<script>
	$(document).ready(function() {
		$('#quanlimathang').DataTable({
			'language': {
				'sProcessing': 'Đang xử lý...',
				'sLengthMenu': 'Hiển thị _MENU_ dòng',
				'sZeroRecords': 'Không tìm thấy dòng nào phù hợp',
				'sInfo': 'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ dòng',
				'sInfoEmpty': 'Đang xem 0 đến 0 trong tổng số 0 dòng',
				'sInfoFiltered': '(được lọc từ _MAX_ dòng)',
				'sInfoPostFix': '',
				'sSearch': 'Tìm kiếm:',
				'sUrl': '',
				'oPaginate': {
					'sFirst': '<i class="fas fa-step-backward"></i>',
					'sPrevious': '<i class="fas fa-angle-double-left"></i>',
					'sNext': '<i class="fas fa-angle-double-right"></i>',
					'sLast': '<i class="fas fa-step-forward"></i>'
				}
			}
		});
	});
</script>



	  
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
			<br>
			 <label>Nhập lại mật khẩu</label>      
            <input class="form-control" type="password" name="txtnhaplai" placeholder="Nhập lại mật khẩu mới" required>
			
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
     
    
