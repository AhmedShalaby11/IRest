<?php
include 'dbconfig.php';
if(isset($_POST["submit"])) {

$productname =$_POST["productname"];
$sql = "select * from irestaurant.table_plattes where
product_name ='".$productname."' limit 1";
$sqlRes = $conn->query($sql);
while ($product = $sqlRes ->fetch_array(MYSQLI_NUM))
{

echo $product[0];
echo $product[2];
echo $product[1];
}
echo $sql;
}





?>