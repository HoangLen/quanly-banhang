<div class="row">  
    <h3><strong>Mặt hàng nổi bật</strong></h3><hr>
    <?php
    foreach($mathangnoibat as $m):
    ?>
    <div class="col-sm-3">
      <div class="panel panel-danger text-center">
        <div class="panel-heading">
          <strong>
          <a class="panel-title"  href="?action=xemnhom&mahang=<?php echo $m["danhmuc_id"]; ?>">
          <?php echo $m["tendanhmuc"]; ?>
          </strong>
          </a>  
        </div>
        <div class="panel-body">
          <a href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>"><img src="<?php echo $m["hinhanh"]; ?>" class="img-responsive" style="width:400px;height:200px" alt="<?php echo $m["tenmathang"]; ?>"></a>
          <a class="btn btn-success" href="?action=xemchitiet&mahang=<?php echo $m["id"]; ?>"><?php echo $m["tenmathang"]; ?></a>
        </div>
      </div>
    </div> 
    <?php endforeach; ?>
</div>