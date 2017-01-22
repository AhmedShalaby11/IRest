<!DOCTYPE html>
<html>
<title>DASHBOARD</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<style>
label.custom-select {
    position: relative;
    display: inline-block;

}

.custom-select select {
  width:200px;
  height:30px;
    display: inline-block;
    padding: 4px 3px 3px 5px;
    margin: 0;
    font: inherit;
    outline:none; /* remove focus ring from Webkit */
    line-height: 1.2;
    background:lightgrey;
    color: black;
    border:0;
}

/* Select arrow styling */
.custom-select:after {

    content: "▼";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    font-size: 60%;
    line-height: 30px;
    padding: 0 7px;
  background: lightgrey;
    color: black;
    pointer-events: none;
}
body
{
  background-color:lightgray;
}
.no-pointer-events .custom-select:after {
    content: none;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display:none}
</style>
<body class="w3-content w3-border-left w3-border-right">

<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-dark-grey w3-collapse w3-top" style="z-index:3;width:400px;margin-left:-10%;" id="mySidenav">

<div class="">
<a class="w3-btn-block w3-grey w3-large w3-padding w3-left-align"   href="webform1.php"><i class="fa fa-home"> Home</i></a>

</div>

  <div class="w3-container w3-padding-8">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-closebtn w3-hover-text-red"></i>
    <h3>Dashboard</h3>
    <h3>Products Management</h3>
    <h6>Control Wizard</h6>
    <hr>
<script>
  $(document).ready(function(){
    $('.dropdown ul li').click(function(){
      var selection = $(this).text();
      window.location.href = "admin.php?cat=" +selection;
    });
  });
</script>



<form action="admin.php" method="post">
  <span>Product Category</span> </br>
<label class="custom-select">

  <select  name="select_catalog" id="select_catalog">
  <option value="0">Select</option>
  <option value="1">Platte</option>
  <option value="2">Dessert</option>
  <option value="3">Drink</option>
  </select>
</label>

<hr>

      <p><label><i class="fa fa-cutlery"></i> Product Name</label></p>
      <input class="w3-input w3-border" type="text" name="productname" placeholder="Product Name" name="CheckIn" required>

      <p><button name="submit"  class="w3-btn-block w3-red w3-padding w3-left-align" type="submit"  ><i class="fa fa-search w3-margin-right"></i> Get Product</button></p>
</form>
  </div>
</nav>
<?php
session_start();

include 'dbconfig.php';
if(isset($_POST["submit"])) {
if($_POST["productname"])
{
$selection= $_POST['select_catalog'];
if ($selection ==1)
{
$productname =$_POST["productname"];

$_SESSION["Session_prodname"] = $productname ;
// header("Location: admin.php?item=".$productname."");
$sql = "select * from irestaurant.table_plattes where
product_name ='".$productname."' limit 1";
$sqlRes = $conn->query($sql);
echo ("<div  class='w3-main w3-white' style='margin-left:260px'>");
echo "<h3 style='text-align:center'>Your Current Product</h3>";
echo ("<table  class='w3-table w3-table-all'><thead><tr><th>Product</th><th>Price</th><th>Ingredients</th></tr></thead>");


while ($product = $sqlRes ->fetch_array(MYSQLI_NUM))
{

// echo "<h4>Product Image</h4><img  src='".$product[8]."'>";
echo "<tr><td>".$product[1]."</td><td>".$product[3]."</td><td>".$product[4]."</td></tr>";
$_SESSION['prodcat'] =$product[7];
}
echo ("</table></div>");

echo "<hr></br>
<form  action='admin.php' style='margin-left:260px;' class='w3-container' method='post'>
<label class='w3-label'  style='color:black;font-family:serif;'>New Name</label>
<input class='w3-input' name='newname' type='text'>

<label class='w3-label' style='font-family:serif;color:black;'>New Price</label>
<input class='w3-input'  name='newprice'  type='text'>

<label class='w3-label' style='font-family:serif;color:black;'>New Ingredients</label>
<input class='w3-input'  name='newing' type='text'>
<label class='w3-label' style='font-family:serif;color:black;'>New Image</label>
<input class='w3-input'  name='newimg' placeholder='just the image name.jpg' type='text'>

<p><button  name='updateData'  class='w3-btn-block w3-red w3-padding w3-left-align' type='submit'  ><i class='fa fa-search w3-margin-right'></i>Update</button></p>

</form>";

}
//second case

elseif ($selection ==2)
{
$productname =$_POST["productname"];

$_SESSION["Session_prodname"] = $productname ;
// header("Location: admin.php?item=".$productname."");
$sql = "select * from irestaurant.table_Desserts where
product_name ='".$productname."' limit 1";
$sqlRes = $conn->query($sql);
echo ("<div  class='w3-main w3-white' style='margin-left:260px'>");
echo "<h3 style='text-align:center'>Your Current Product</h3>";
echo ("<table  class='w3-table w3-table-all'><thead><tr><th>Product</th><th>Price</th><th>Ingredients</th></tr></thead>");


while ($product = $sqlRes ->fetch_array(MYSQLI_NUM))
{

// echo "<h4>Product Image</h4><img  src='".$product[8]."'>";
echo "<tr><td>".$product[1]."</td><td>".$product[3]."</td><td>".$product[4]."</td></tr>";
$_SESSION['prodcat'] =$product[7];
}
echo ("</table></div>");

echo "<hr></br>
<form  action='admin.php' style='margin-left:260px;' class='w3-container' method='post'>
<label class='w3-label'  style='color:black;font-family:serif;'>New Name</label>*
<input class='w3-input' name='newname' type='text'>

<label class='w3-label' style='font-family:serif;color:black;'>New Price</label>*
<input class='w3-input'  name='newprice'  type='text'>

<label class='w3-label' style='font-family:serif;color:black;'>New Ingredients</label>*
<input class='w3-input'  name='newing' type='text'>
<label class='w3-label' style='font-family:serif;color:black;'>New Image</label>
<input class='w3-input'  name='newimg' placeholder='just the image name.jpg' type='text'>
<p><button  name='updateData'  class='w3-btn-block w3-red  w3-padding w3-left-align' type='submit'  ><i class='fa fa-search w3-margin-right'></i>Update</button></p>

</form>";
}

//third case

elseif ($selection ==3)
{
$productname =$_POST["productname"];

$_SESSION["Session_prodname"] = $productname ;
// header("Location: admin.php?item=".$productname."");
$sql = "select * from irestaurant.table_Drinks where
product_name ='".$productname."' limit 1";
$sqlRes = $conn->query($sql);
echo ("<div  class='w3-main w3-white' style='margin-left:260px'>");
echo "<h3 style='text-align:center'>Your Current Product</h3>";
echo ("<table  class='w3-table w3-table-all'><thead><tr><th>Product</th><th>Price</th><th>Ingredients</th></tr></thead>");


while ($product = $sqlRes ->fetch_array(MYSQLI_NUM))
{

// echo "<h4>Product Image</h4><img  src='".$product[8]."'>";
echo "<tr><td>".$product[1]."</td><td>".$product[3]."</td><td>".$product[4]."</td></tr>";
$_SESSION['prodcat'] =$product[7];
}
echo ("</table></div>");

echo "<hr></br>
<form  action='admin.php' style='margin-left:260px;' class='w3-container' method='post'>
<label class='w3-label'  style='color:black;font-family:serif;'>New Name</label>
<input class='w3-input' name='newname' type='text'>

<label class='w3-label' style='font-family:serif;color:black;'>New Price</label>
<input class='w3-input'  name='newprice'  type='text'>

<label class='w3-label' style='font-family:serif;color:black;'>New Ingredients</label>
<input class='w3-input'  name='newing' type='text'>
<label class='w3-label' style='font-family:serif;color:black;'>New Image</label>
<input class='w3-input'  name='newimg' placeholder='just the image name.jpg' type='text'>
<p><button  name='updateData'  class='w3-btn-block w3-dark-gray w3-padding w3-left-align' type='submit'  ><i class='fa fa-search w3-margin-right'></i>Update</button></p>

</form>";

}
elseif ($selection ==0 )
{
      echo "<h3 style='text-align:center'>Please make a selection.</h3>";
}
else{
    echo "<h3 style='text-align:center'>Please enter a Product Name</h3>";
}

}

}


?>

<?php

if (isset($_POST["updateData"]))
{
echo ("<div  class='w3-main w3-white' style='margin-left:400px'>");

include 'dbconfig.php';
if ($_SESSION['prodcat']=='Platte')
{
//get the vars from the screens' controls and set to PHP vars
$new_productName = $_POST['newname'];
$new_productPrice = $_POST['newprice'];
$new_productIngred = $_POST['newing'];
$old_productName= $_SESSION["Session_prodname"];
$new_productImg = $_POST['newimg'];
//begin
$sqlStatement = "update irestaurant.table_plattes set product_name='".$new_productName."',product_price='".$new_productPrice."',product_ingred
='".$new_productIngred."',product_URL= 'images/".$new_productImg."' where product_name = '".$old_productName."'  ";
echo "</div>";

$sqlResponse= $conn ->query($sqlStatement);
echo "<script>alert('Record updated.')</script>";

}
elseif($_SESSION['prodcat']=='Dessert')
{

$new_productName = $_POST['newname'];
$new_productPrice = $_POST['newprice'];
$new_productIngred = $_POST['newing'];
$old_productName= $_SESSION["Session_prodname"];
$new_productImg = $_POST['newimg'];
//begin
$sqlStatement = "update irestaurant.table_plattes set product_name='".$new_productName."',product_price='".$new_productPrice."',product_ingred
='".$new_productIngred."',product_URL= 'images/".$new_productImg."' where product_name = '".$old_productName."'  ";
echo "</div>";

$sqlResponse= $conn ->query($sqlStatement);
echo "<script>alert('Record updated.')</script>";
}
elseif($_SESSION['prodcat']=='Drink')
{
$new_productName = $_POST['newname'];
$new_productPrice = $_POST['newprice'];
$new_productIngred = $_POST['newing'];
$old_productName= $_SESSION["Session_prodname"];
$new_productImg = $_POST['newimg'];
//begin
$sqlStatement = "update irestaurant.table_plattes set product_name='".$new_productName."',product_price='".$new_productPrice."',product_ingred
='".$new_productIngred."',product_URL= 'images/".$new_productImg."' where product_name = '".$old_productName."'  ";
echo "</div>";

$sqlResponse= $conn ->query($sqlStatement);
echo "<script>alert('Record updated.')</script>";
}
}
?>

<!-- Top menu on small screens -->


<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->










</body>
</html>
