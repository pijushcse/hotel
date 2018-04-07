<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Confirmation Page</title>
    <link href="Untitled9.css" rel="stylesheet">
    <link href="4confirmation.css" rel="stylesheet">
</head>

<?php

$checkInDate = $_POST["checkInDate"];  
$checkOutDate = $_POST["checkOutDate"];  
$noOfRoom = $_POST["noOfRoom"];  
$noOfAdults = $_POST["noOfAdults"];  
$noOfKids = $_POST["noOfKids"];  
$addressId = $_POST["addressId"];
$roomId  = $_POST["roomId"];
$customer_name = $_POST["customerName"];
$customer_email = $_POST["customerEmail"];
$customer_phone = $_POST["customerPhone"];
$country = $_POST["country"];

$cardNo =  $_POST["cardNo"];
$holderName =  $_POST["holderName"];
$month =  $_POST["month"];
$year =  $_POST["year"];

$servername = "localhost";
$username   = "root";
$password   = "";
$dbName     = "reservation";

$booking_date = '';
$sqlget = '';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
$sql = '';
$rowid = 0;

$bookingId =   strtoupper( bin2hex(openssl_random_pseudo_bytes(2))); // 20 chars


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    $sql    = "INSERT INTO reservation_confirmation (customer_name ,customer_phone, customer_email , check_in_date, check_out_date, room_fk, booking_id) 
          VALUES('".$customer_name."', '".$customer_phone."', '".$customer_email."',date('".$checkInDate."'), date('".$checkOutDate."'),".$roomId.", '".$bookingId."' ) "  ;   
    $result = $conn->query($sql);
     $rowid = $conn -> insert_id;   


       $sqlget =  "SELECT booking_date  FROM  reservation_confirmation WHERE id=".$rowid;
        $result = $conn->query($sqlget );    
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                $booking_date = $row["booking_date"];
            }}
        

    }
?>

<script>
  console.log("<?php echo $roomId;  ?>");
  console.log("<?php echo $bookingId;  ?>");
 </script>

<body>
 
<div id="wb_Form2" style="position:absolute;left:0px;top:200px;width:1226px;height:34px;z-index:6;">
                <form name="Form2" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="Form2">
                    <div id="wb_Text2" style="position:absolute;left:97px;top:6px;width:58px;height:20px;z-index:0;">
                        <span style="color:#0000FF;font-family:Georgia;font-size:17px;">Offers</span>
                    </div>
                    <div id="wb_Text3" style="position:absolute;left:178px;top:6px;width:61px;height:20px;z-index:1;">
                        <span style="color:#0000FF;font-family:Georgia;font-size:17px;">Resorts</span>
                    </div>
                    <div id="wb_Text4" style="position:absolute;left:261px;top:5px;width:105px;height:20px;z-index:2;">
                        <span style="color:#0000FF;font-family:Georgia;font-size:17px;"><a href="ContactUS.html">Contact Us</a></span>
                    </div>
                    <div id="wb_Text1" style="position:absolute;left:15px;top:6px;width:82px;height:20px;z-index:3;">
                        <span style="color:#0000FF;font-family:Georgia;font-size:17px;"><a href="index.php">Home</a></span>
                    </div>
                </form>
            </div>

   <marquee direction="center" scrolldelay="30" scrollamount="6" behavior="scroll" loop="0" style="position:absolute;left:0px;top:151px;width:1100px;height:38px;z-index:23;"
        id="Marquee1">
        <span style="color:red;font-family:Georgia;font-size:20px;">Congratulations! Your booking has confirmed!!</span>
    </marquee>

  <picture id="wb_Picture1" style="position:absolute;left:0px;top:0px;width:1100px;height:137px;z-index:24">
        <img src="images/images.jpg" style="position:absolute;left:0px;top:0px;width:1100px;height:150px;z-index:24" id="Picture1" alt="" srcset="">
    </picture>
            
          <div id="wb_TabMenu1" style="position:absolute;left:0px;top:231px;width:1100px;height:36px;z-index:5;overflow:hidden;">
                <ul id="TabMenu1">
                    <li>
                        <a style="background-color: palegoldenrod"  > Choose your Room </a>
                    </li>
                    <li>
                        <a style="background-color: palegoldenrod" href="#"> Enter Booking Details</a>
                    </li>
                    <li>
                        <a style="background-color: palegoldenrod" href="#"> Enter Payment Method</a>
                    </li>
                    <li>
                        <a  style="background-color: chartreuse" href="#"> Booking Confirmation </a>
                    </li>
                </ul>
            </div>
 
             

            <div style="position:absolute;left:131px;top:270px;width:793px;height:96px;z-index:2;"> 
                  <p> <strong>   Booking Id: </strong> <strong style="color:red;font-family:Georgia;font-size:20px;"> <?php echo $bookingId;  ?> </strong> </p> </br>
                  <p> <strong>  Customer Name: </strong> <?php echo $customer_name;  ?> </p> </br>
                  <p> <strong>  Customer Phone: </strong> <?php echo $customer_phone;  ?> </p> </br>
                  <p> <strong>  Customer Email: </strong> <?php echo $customer_email;  ?> </p> </br>
                  <p> <strong>  Arrival Date: </strong> <?php echo $checkInDate;  ?> </p> </br>
                  <p> <strong>  Departure Date: </strong> <?php echo $checkOutDate;  ?> </p> </br>
                  <p> <strong>  Booking date time: </strong>  <?php  echo $booking_date;  ?> </p> </br>

            </div>
        </form>
    </div>
</body>

</html>


<?php
  mysqli_close($conn);

?>