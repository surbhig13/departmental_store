<?php
include("connect.php");
$barcode=mysqli_real_escape_string($con,$_POST['barcode']);
$bill_id=mysqli_real_escape_string($con,$_POST['bill_id']);

if($bill_id==0){
	$q=mysqli_query($con,"select * from current_bill");
	if(mysqli_num_rows($q)>0){
		extract(mysqli_fetch_array(mysqli_query($con,"select max(bill_id) as bill_id from current_bill")));
		$bill_id++;
	}
	else{
		$bill_id=1;
	}
}
$q=mysqli_query($con,"select * from item_master where (item_code='$barcode' or item_name='$barcode') and item_status='active'");

if(mysqli_num_rows($q)>0){
	extract(mysqli_fetch_array($q));

	$q=mysqli_query($con,"select id,item_qty from current_bill where item_id='$item_id' and bill_id='$bill_id'");
	if(mysqli_num_rows($q)>0){
		extract(mysqli_fetch_array($q));
		$item_qty++;
		mysqli_query($con,"update current_bill set item_qty='$item_qty' where id='$id'");
	}
	else{
		mysqli_query($con,"insert into current_bill (bill_id,item_id,item_qty,item_price,status) values ('$bill_id','$item_id','1','$item_price','active')");
	}
}
echo "<input type='hidden' id='bill_id' name='bill_id' value='$bill_id'>";

$q=mysqli_query($con,"select a.*,b.item_name from current_bill a, item_master b where a.bill_id='$bill_id' and a.item_id=b.item_id");
while($y=mysqli_fetch_array($q)){
	extract($y);
	$item_amount = number_format($item_qty * $item_price,2,".","");
	echo "<tr>";
	echo "<td>$item_name</td>";
	echo "<td>$item_qty</td>";
	echo "<td>$item_price</td>";
	echo "<td>$item_amount</td>";
	echo "</tr>";
}
?>