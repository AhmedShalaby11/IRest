<html>
    <head>
 <title>iRestaurant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link href="StyleSheet1.css" rel="stylesheet"></link>
    </head>
    <body>
        <!-- Navigation bar -->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">iRestaurant</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="webform1.php">HOME</a></li>

          </ul>
        </li>
    </div>
  </div>
</nav>




<ul class="nav nav-tabs" style='margin-top:100px;'>
  <li role="presentation" ><a style='color:black;' href="#">ORDERS</a></li>
  <!--<li role="presentation"><a href="#">Profile</a></li>-->

</ul>
<script>
    $("ul li ").click(function(){
        if ($("#btn1").length ==1 )
        {
$("#btn1").remove();
        }
        else
        {
        $(this).addClass("active");
       $('body').append("<form method='post' ><button id='btn1' class='btn btn-danger' name='submit' type='submit' style='width:300px;margin-left:40%;margin-top:10%;'>Show orders</button></form>");
        }
});

</script>


<?php

if(isset($_POST["submit"])) {
include 'dbconfig.php';
echo "<form class='' action='ordersview.php' method='post'>
  <table>
    <tr>
      <td><span>Order ID</span></td>
      <td><input type='text' name='OrdId' value=''></td>
    </tr>
  
    <tr style='background-color:white;'>
      <td>&nbsp;</td>
      <td><button type='submit'  name='done'>Done</button></td>
    </tr>
  </table>
</form>";
$sql = "select * from irestaurant.table_orders where order_status ='P' ";
$result = $conn->query($sql);
echo"<div class='container'>";

echo "<table id='example' class='display' cellspacing='0' width='100%'>"; // start a table tag in the HTML
echo "<tr><th>Order ID</th><th>Item</th><th>Size</th><th>Order Time</th><th>Delivery Time</th><th>Count</th><th>Table#</th></tr>";
while($row = $result->fetch_array(MYSQLI_NUM)){   //Creates a loop to loop through results
echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</tbody></table>"; //Close the table in HTML
echo "</div>";

}

if (isset($_POST["done"]))
{
  include 'dbconfig.php';
  $orderID = $_POST["OrdId"];
  $sql = "update irestaurant.table_orders set order_status='D' where id='".$orderID."' ";
$result = $conn->query($sql);
echo "<form class='' action='ordersview.php' method='post'>
  <table>
    <tr>
      <td><span>Order ID</span></td>
      <td><input type='text' name='OrdId' value=''></td>

    </tr>
    <tr style='background-color:white;'>
      <td>&nbsp;</td>
      <td><button type='submit'  name='done'>Done</button></td>
    </tr>
  </table>
</form>";
$sql = "select * from irestaurant.table_orders where order_status ='P'";
$result = $conn->query($sql);
echo"<div class='container'>";

echo "<table id='example' class='display' cellspacing='0' width='100%'>"; // start a table tag in the HTML
echo "<tr><th>Order ID</th><th>Item</th><th>Size</th><th>Order Time</th><th>Delivery Time</th><th>Count</th><th>Table#</th></tr>";
while($row = $result->fetch_array(MYSQLI_NUM)){   //Creates a loop to loop through results
echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</tbody></table>"; //Close the table in HTML
echo "</div>";
}

?>



    </body>
</html>
