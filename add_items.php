<?php
include("connect.php");
$item_name=mysqli_real_escape_string($con,$_POST['item_name']);
$op_date=date('Y-m-d');
mysqli_query($con,"INSERT INTO `item_master`(`item_name`, `item_code`, `item_price`, `item_op_date`, `item_cl_date`, `item_status`) VALUES ('$item_name','$_POST[item_code]','$_POST[item_price]','$op_date','2099-12-31','active')");

$q=mysqli_query($con,"select * from item_master where item_status='active' order by item_name");
  while($data=mysqli_fetch_array($q)){
    extract($data); ?>

<a class="list-group-item" style="overflow:hidden;color:black;" href="#" onclick="select_item(this.innerHTML);"><?php echo $item_name;?></a>
  
  <?php
  }
?>