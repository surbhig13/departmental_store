<?php
include("connect.php");
$item_name=mysqli_real_escape_string($con,$_POST['edit_item_name']);
$item_code=mysqli_real_escape_string($con,$_POST['edit_item_code']);
$item_price=mysqli_real_escape_string($con,$_POST['edit_item_price']);
$item_id=mysqli_real_escape_string($con,$_POST['item_row_id']);

mysqli_query($con,"update item_master set item_name='$item_name', item_code='$item_code', item_price='$item_price' where item_id='$item_id'");

$q=mysqli_query($con,"select * from item_master where item_status='active' order by item_name");
  while($data=mysqli_fetch_array($q)){
    extract($data); ?>

<a class="list-group-item" style="overflow:hidden;color:black;" href="#" onclick="select_item(this.innerHTML);"><?php echo $item_name;?></a>
  
  <?php
  }
?>