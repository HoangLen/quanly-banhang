<?php include("../view/top.php"); ?>

<?php
  if(isset($done)){
  ?>
  <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span class="glyphicon glyphicon-remove"> </span> <?php echo $done; ?>
  </div>
  <?php
  }
  ?>

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

<div style="background-color:Darkorange">
	<marquee width="75%" direction="left"> <h4><strong>CHÀO <span style="color:Cyan;font-weight:bolder"><?php echo $_SESSION["nguoidung"]["hoten"]; ?> </span></strong></h4> </marquee>
	
</div>
<?php include("../view/carousel.php"); ?>
<?php include("../view/bottom.php"); ?>
