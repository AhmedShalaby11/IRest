<?php
include 'dbconfig.php';
$sql2= "select order_time from irestaurant.table_orders limit 1";
$sqlResult1 = $conn->query($sql2);
while ($row = $sqlResult1->fetch_array(MYSQLI_NUM) )
{


}
;

?>
