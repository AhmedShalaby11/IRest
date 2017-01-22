<!DOCTYPE html>
<html lang="en">
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

<script>
//1.a: read the values from the GUI on a container's click.
$(document).ready(function(){
  $(".container1").click(
    function(){
var productName = $(this).find('h3:first').text();
var productPrice = $(this).find('h3:last').text();

$('.onscreen').css("visibility","visible");
$("#button_order").click(function(){

var productQuan = $("#itemQuan").val();
var tableid = $("#table_id").val();
  //function: no 0 items
  if (productQuan == "")
  {
    $('#setOrderItem_div').append("<h3 style='color:white' id='notif'>Cannot Order 0 items.</h3>");
  }
else{
  $("#notif").remove();
 window.location.href = "webform1.php?Order=" +
 productName+","+productPrice.split(" ")+","+productQuan+","+tableid;
 //set the onscreen visibility to :hidden  !important;


}
});
  });
});
</script>
<?php
//1.b/1.c insert order item in database

foreach($_GET as $key=>$value){
$OrderItem=  explode(",",$value);
// echo $OrderItem[0];item name
// echo $OrderItem[1];item price
// echo $OrderItem[2];currency
// echo $OrderItem[3];item count
}
if (isset($OrderItem[0])) {
include 'dbconfig.php';
$sql = "insert into Irestaurant.table_orders (product_name,product_Price,product_count,Order_SL,table_id)

 values ('".$OrderItem[0]."',".$OrderItem[1].",".$OrderItem[3].",NOW() + INTERVAL 45 MINUTE,".$OrderItem[4].")";
$res = $conn->query($sql);
if ($res == 1)
{
  echo "<script>alert('".$OrderItem[0]." was Added')</script>";
}

}




?>
</head>

<div class='onscreen'><div id='setOrderItem_div' class='container'><h3 style="color:white">Order Info</h3><input type='text' id='itemQuan' style='width:200px;'  placeholder='Quantaity' ></input> </br> <input type='text' id='table_id' style='width:200px;'  placeholder='TABLE' ></input></br>   <button class='btn btn-danger'  id='button_order' >Add to list</button></div></div>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
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
        <li><a href="#HOME">HOME</a></li>
        <li><a href="#PLATES">MAIN COURSES</a></li>
        <li><a href="#DESSERTS">DESSERTS</a></li>
        <li><a href="#DRINKS">DRINKS</a></li>
        <li style="background-color:darkred"><a href="#YOUR_ORDER">YOUR ORDER</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#CONTACTUS">CONTACT US</a></li>
            <li><a href="#">OUR TOOL</a></li>
              <li><a href="#">OUR TEAM</a></li>
              <li><a href="admin.php">Admin Panel</a></li>
              <li><a href="ordersView.php">Kitchen View</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Container (HOME) -->
<div id="HOME" class="carousel slide" data-ride="carousel">
    <!-- Indicators (No. of Pages) -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="Images/3.jpg" alt="New York" width="1200" height="700">
        <div class="carousel-caption">

        </div>
      </div>

      <div class="item">
        <img src="Images/2.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">

        </div>
      </div>

      <div class="item">
        <img src="Images/1.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">

        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#HOME" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#HOME" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>





<!-- Container (PLATES) -->
<div id="PLATES" class="bg-2" style="width:100%;">
          <br />
          <br />

  <h3>MAIN COURSES</h3>
    <p>where Italian and Middle-Eastern cuisine merge for a unique food experience.
In addition, for moments of delights and refreshment.</p>
 </div>


<?php



include 'dbconfig.php';

$sql = "select * from irestaurant.Table_Plattes ; ";
$sqlResult = $conn ->query($sql);

// $row = $sqlResult->fetch_array(MYSQLI_NUM);
// print_r ($row);

echo "<form method='post'>";
echo " <div class='w3-row-padding' style='margin-top:64px'>";
while ($row = $sqlResult->fetch_array(MYSQLI_NUM))
{

echo "
    <div class='w3-col l3 m6'>
      <div class='container1'>
        <img src='".$row[8]."' class='image' style='width:100%; border-radius:6px;'>
        <div class='middle'>
    <div>
    <h3>".$row[1]."</h3>
    <h3>".$row[4]." EGP</h3>
    </div>
            </div>
  </div>
    </div>";

}

echo "</div></form>";
echo "</br>";


?>


<div style='text-align:center;margin-top:30px;'>

<div id="DESSERTS" class="bg-1" style="width:100%;">

              </div>
    <h3>DESSERTS</h3>
    <p>All of our DELICIOUS DESSERTS are made with LOVE and devoured with enthusiasm.</p>
   </div>



    <?php

include 'dbconfig.php';

$sql = "select * from irestaurant.Table_Desserts ; ";
$sqlResult = $conn ->query($sql);

// $row = $sqlResult->fetch_array(MYSQLI_NUM);
// print_r ($row);


echo " <div class='w3-row-padding' style='margin-top:64px'>";
while ($row = $sqlResult->fetch_array(MYSQLI_NUM))
{

echo "
    <div class='w3-col l3 m6'>
      <div class='container1'>
        <img src='".$row[8]."' class='image' style='width:100%; border-radius:6px;'>
        <div class='middle'>
    <div>
    <h3>".$row[1]."</h3>
    <h3>".$row[4]." EGP</h3>

    </div>
            </div>
  </div>
    </div>";

}

echo "</div>";
echo "</br>";

    ?>





    <!--Container (Drinks)  -->
        <div id="DRINKS" class="bg-2" style="width:100%;">
          <br />
          <br />

  <h3>DRINKS</h3>
    <p>Our HOUSE-MADE lovely mixes & soft drinks provide REFRESHMENT!</p>
  <!--Items Categorized List -->
  <div class="w3-row-padding" style="margin-top:64px">


    <?php

include 'dbconfig.php';

$sql = "select * from irestaurant.Table_Drinks ; ";
$sqlResult = $conn ->query($sql);

// $row = $sqlResult->fetch_array(MYSQLI_NUM);
// print_r ($row);


echo " <div class='w3-row-padding' style='margin-top:64px'>";
while ($row = $sqlResult->fetch_array(MYSQLI_NUM))
{

echo "
    <div class='w3-col l3 m6'>
      <div class='container1'>
        <img src='".$row[8]."' class='image' style='width:100%; border-radius:6px;'>
        <div class='middle'>
    <div>
    <h3>".$row[1]."</h3>
    <h3>".$row[4]." EGP</h3>

    </div>
            </div>
  </div>
    </div>";

}

echo "</div>";
echo "</br>";
    ?>
    <!--begin-->
<script>


</script>
<!-- Container (YOUR_ORDER) -->
<div id="YOUR_ORDER" class="bg-1">

    <div class="container">

    <h3 style="text-align:center;color:white">YOUR ORDER</h3>



    <?php
    include 'dbconfig.php';
//1.d
$sql1 ="select * from Irestaurant.table_orders where order_status ='P'";
$sqlTable = $conn ->query($sql1);
echo ("<table id='table_orders' class='container table table-hover'><thead><tr><th>Item</th><th>Price</th><th>Count</th></tr></thead><tbody>");
while ($row = $sqlTable ->fetch_array(MYSQLI_NUM))
{
echo"<tr><td>".$row[1]."</td><td>".$row[3]."</td><td>".$row[7]."</td></tr>";
}
echo "</tbody></table>";
echo " </br>";

echo "<button id='Order_button' class='btn btn-danger' name='makeneworder'>Order</button>";
echo "<div id='notif'></div>"
    ?>
<script>$('#Order_button').click(function(){$('#notif').append('</br><h3 style="color:white">Your order will be ready after 45 Minutes</h3>');});</script>
  <!-- Container (YOUR_ORDER) -->
    <!-- Grid for pricing tables -->


</div>
    <!-- Container (CONTACT US) -->
<div id="CONTACTUS" class="container">
  <h3 style='color:white;' class="text-center">YOUR REVIEW</h3>
  <p style='color:white;' class="text-center">Because your FEEDBACK is a gift, TELL US!</p>

  <div class="row">
    <div class="col-md-4">
      <p>&nbsp</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>&nbsp &nbsp Cairo, Egypt</p>
      <p><span class="glyphicon glyphicon-phone"></span> &nbsp Phone: +201112761808</p>
      <p><span class="glyphicon glyphicon-envelope"></span> &nbsp Email: iRestaurant@gmail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  <br>

  </div>




                                <div id="PlateModal1" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal1').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">PLATE NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn   w3-section w3-right" onclick="document.getElementById('PlateModal1').style.display='none'" style="background-color:#2d2d30;" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


    <!-----modal for image 2-->

                                <div id="PlateModal2" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal2').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">PLATE NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('PlateModal2').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>

      <!-----modal for image 3-->

                                <div id="PlateModal3" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal3').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">PLATE NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('PlateModal3').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>

   <!-----modal for image 7-->

                                <div id="PlateModal8" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal8').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">PLATE NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('PlateModal8').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


     <!-----modal for image 8-->

                                <div id="PlateModal4" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal4').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">BUILD YOUR BURGER</h2>
      </header>
              <div class="w3-container">
                  <h3 style="text-align:center">PICK YOUR BURGER </h3>
   <div class="row">
  <div class="col-xs-6 col-md-3">
    <a class="thumbnail">
	<label ><img src="Images/4-1-1.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item1" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>

  </div>
   <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
  <label ><img src="Images/4-1-2.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item2" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
        <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
     <label ><img src="Images/4-1-3.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item3" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
        <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
     <label ><img src="Images/4-1-4.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
</div>
      </div>
      <div class="w3-container">
                  <h3 style="text-align:center"> TOP IT OFF! </h3>
   <div class="row">
  <div class="col-xs-6 col-md-3">
    <a class="thumbnail">
      <label ><img src="Images/4-2-1.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item5" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>

    </a>

  </div>
   <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
      <label ><img src="Images/4-2-2.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item6" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
        <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
    <label ><img src="Images/4-2-3.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item7" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
        <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
   <label ><img src="Images/4-2-4.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item8" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
</div>
      </div>
    <div class="w3-container">
                  <h3 style="text-align:center">MAKE IT CHEESY!</h3>
   <div class="row">
  <div class="col-xs-6 col-md-3">
    <a class="thumbnail">
      <label ><img src="Images/4-3-1.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item9" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>

    </a>

  </div>
   <div class="col-xs-6 col-md-3">
    <a class="thumbnail">
      <label ><img src="Images/4-3-2.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item10" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
        <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
    <label ><img src="Images/4-3-3.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item11" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
        <div class="col-xs-6 col-md-3">
    <a  class="thumbnail">
   <label ><img src="Images/4-3-4.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item12" value="val1" class="hidden" autocomplete="off"></label>
        <center><p>kalam</p></center>
    </a>
  </div>
</div>
      </div>

          <div class="w3-container">
        <p style="color:#2d2d30"> <b>Total Price</b>:</p>
              </div>


           <div class="w3-container">
        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('PlateModal4').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>

         <!-----modal for image 4-->

                                <div id="PlateModal5" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal5').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">PLATE NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('PlateModal5').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


    <! <!-----modal for image 5-->

                                <div id="PlateModal6" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal6').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">PLATE NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('PlateModal6').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>

     <!-----modal for image 6-->

                                <div id="PlateModal7" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('PlateModal7').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">PLATE NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('PlateModal7').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>

      <!-------- ENDDDD   MODAAAAALS for Plates-->


      <!--------MODAAAAALS for DEsserts-->

     <!-----modal for image 1-->

                                <div id="DessertModal1" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal1').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSERT NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DessertModal1').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


     <!-----modal for image 2 Desserts-->

                                <div id="DessertModal2" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal2').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSERT NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DessertModal2').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>

     <!-----modal for modal for image 3 in Desserts-->

                                <div id="DessertModal3" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal3').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSERT NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DessertModal3').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


     <!-----modal for modal for image 4 in Desserts-->

                                <div id="DessertModal4" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal4').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSERT NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->


    <!------>

        <!-----modal formodal for image 5 inDesserts-->

                                <div id="DessertModal5" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal5').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSER NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DessertModal5').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


    <!-----modal formodal for image 6 in Desserts-->

                                <div id="DessertModal6" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal6').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSERT NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DessertModal6').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>

     <!-----modal for modal for image 7 in DESSERTS-->

                                <div id="DessertModal7" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal7').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSERT NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DessertModal7').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>
      <!-----modal for modal for image 8 in DESSERTS-->

                                <div id="DessertModal8" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DessertModal8').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DESSERT NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->







     <!-----modal for modal for image 1 in Drinks-->

                                <div id="DrinksModal1" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal1').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DRINKS NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DrinksModal1').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


    <!-----modal for modal for image2 in Drinks-->

                                <div id="DrinksModal2" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal2').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DRINKS NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>



     <!-----modal for modal for image 3 in Drinks-->

                                <div id="DrinksModal3" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal3').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DRINKS NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DrinksModal3').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


     <!-----modal for modal for image 4 in Drinks-->

                                <div id="DrinksModal4" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal4').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DRINKS NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DrinksModal4').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>

    <!------>

        <!-----modal for modal for image 5 item inDrinks-->

                                <div id="DrinksModal5" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal5').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DRINKS NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DrinksModal5').style.display='none'" style="background-color:#2d2d30" >Close <i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>


    <!-----modal for modal for image 6 in Drinks-->

                                <div id="DrinksModal6" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal6').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DRINKS NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>




                                <div id="DrinksModal7" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal7').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">DRINKST NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>


          <!----->

        <button class="w3-btn-block   w3-section w3-right" style="background-color:darkred">ORDER<i class="fa fa-check"></i></button>
        <button class="w3-btn  w3-section w3-right" onclick="document.getElementById('DrinksModal7').style.display='none'" style="background-color:#2d2d30" >Close<i class="fa fa-remove"></i></button>

      </div>
    </div>
  </div>
    <!------>
      <!-----modal for modal for image 8 in Drinks-->

                                <div id="DrinksModal8" class="w3-modal" ">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container  w3-center " style="background-color:#2d2d30" >
        <span onclick="document.getElementById('DrinksModal8').style.display='none'"
       class="w3-closebtn  w3-display-topright w3-margin-right">×</span>
        <h2 class="text-left" style="color:white">Drinks NAME</h2>
      </header>
              <div class="w3-container">
       DESCIPTION
      </div>
               <div class="w3-container">
       Price
      </div>
      <div class="w3-container">
          <h3>How many</h3>
          <!-----Qauntity button-->


            <div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1"  >
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="glyphicon glyphicon-plus"></span>
                </button>
                </span>
            </div>



            <script>
            $(document).ready(function(){
              // Add smooth scrolling to all links in navbar + footer link
              $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                  // Prevent default anchor click behavior
                  event.preventDefault();

                  // Store hash
                  var hash = this.hash;

                  // Using jQuery's animate() method to add smooth page scroll
                  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                  $('html, body').animate({
                    scrollTop: $(hash).offset().top
                  }, 900, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                  });
                } // End if
              });

              $(window).scroll(function() {
                $(".slideanim").each(function(){
                  var pos = $(this).offset().top;

                  var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                      $(this).addClass("slide");
                    }
                });
              });
            })
            </script>


</body>
</html>
