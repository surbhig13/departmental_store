<?php

include "connect.php"; 
$q = mysqli_query($con,"update item_master set item_status='inactive' where item_id = '$_POST[id]'"); 

$q=mysqli_query($con,"select * from item_master where item_status='active' order by item_name");
  while($data=mysqli_fetch_array($q)){
    extract($data); ?>

<a class="list-group-item" style="overflow:hidden;color:black;" href="#" onclick="select_item(this.innerHTML);"><?php echo $item_name;?></a>
  
  <?php
  }
?>