<?php
include 'dbconfig.php';

$sql = "select Product_URL from irestaurant.Table_Desserts where id ='1'; ";
$sqlResult = $conn ->query($sql);

while ($row = $sqlResult->fetch_array(mysql_num))
{
 print_r ($row);
}






?>