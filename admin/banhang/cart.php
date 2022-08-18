<?php include("../view/top.php"); ?>
<br><br><br>
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
<div>    
  <div class="row"> <!-- Hàng nổi bật -->
    <h3>HÓA ĐƠN HIỆN TẠI </h3>
    <?php 
    if(demhangtronggio() == 0):
        echo "<p>Không có sản phẩm nào trong bill.</p>";
    else:
    ?>
    
    <form method="post">
    <input type="hidden" name="action" value="capnhatgiohang">
    <table class="table table-hover">
    <tr class="info">
    <th>Sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
	<th>Xóa</th>
    </tr>
    <?php foreach($bill as $mahang => $mh): ?>
    <tr>
    <td><?php echo $mh["tenhang"]; ?></td>
    <td><?php echo number_format($mh["giaban"]) . "đ"; ?></td>
    <td><input type="number" size="3" name="mh[<?php echo $mahang; ?>]" value="<?php echo $mh["soluong"]; ?>">

    </td>
    <td><?php echo number_format($mh["sotien"]) . "đ"; ?></td>
	<td><a class="btn btn-danger" href="index.php?action=xoamotmathang&mahang=<?php echo $mahang; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
	
    </tr>
    <?php endforeach; ?>
    <tr>
    <td colspan="3" align="right"><b>Tổng tiền</b></td>
    <td><b><?php echo number_format(tinhtiengiohang()); ?>đ</b></td>
    </tr>
    <tr>
    <td colspan="2" align="left"><i>Để xóa một sản phẩm nhập số lượng = 0</i> | 
      <a href="?action=xoagiohang">Xóa tất cả</a></td>
    <td colspan="2" align="right">
      <input class="btn btn-info" type="submit" value="Cập nhật">
      <a class="btn btn-danger" href="index.php?action=luudonhang">Thanh toán</a>
    </td>
	
	
	
    </tr>
    </table>
    </form>
    <?php endif; ?>


  </div>
</div>
