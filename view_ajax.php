<?php
	include 'connect.php';
	$sql = "SELECT * FROM item_master";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['item_name'];?></td>
			<td><?=$row['item_code'];?></td>
			<td><?=$row['item_price'];?></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($con);
?>