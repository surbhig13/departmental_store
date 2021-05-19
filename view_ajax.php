<?php
	include 'connect.php';
	$sql = "SELECT * FROM item_master";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr data-target="#myModal2" data-dismiss="modal" data-toggle="modal" onclick='edit_item(<?php echo $row['item_id']; ?>)'>
			<td id='item_name<?php echo $row['item_id']; ?>'><?php echo $row['item_name'];?></td>
			<td id='item_code<?php echo $row['item_id']; ?>'><?php echo $row['item_code'];?></td>
			<td id='item_price<?php echo $row['item_id']; ?>'><?php echo $row['item_price'];?></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($con);
?>