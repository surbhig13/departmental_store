<?php

if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$sql = "SELECT item_name, item_code,item_price FROM item_master";
$result = $con->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["item_name"]. "</td><td>" . $row["item_code"] . "</td><td>"
. $row["item_price"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$con->close();
?>