<?php 
error_reporting(0);    
?>

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

$secureId = $_POST["secureuserid"];


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

$customerName = '';

$bookingId =   strtoupper( bin2hex(openssl_random_pseudo_bytes(2))); // 20 chars


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    $userNameQ = '';
    if(strlen($secureId) > 0) {
      $userNameQ = "Select CONCAT(firstname, ' ', lastname) as name FROM user_information.user_details WHERE secure_login_id='".$secureId."' ";
      $sqResult = $conn -> query($userNameQ);
      
      if ($sqResult->num_rows > 0) {
        if ($row = $sqResult->fetch_assoc()) {
            $customerName = $row["name"];
        }}
    } 


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
 


<?php 
    if(strlen($customerName) == 0) {
?>

    <div id="wb_Form22" style="position:absolute;left:0px;top:1px;width::1226px;height:63px;z-index:9;">
        <form name="Form2" method="post" enctype="text/plain" id="Form2">
            <div id="wb_Text6" style="background-color: #87CEFA;position:absolute;left:900px;top:14px;width:94px;height:23px;z-index:0;">
                <span style="color:#00008B;font-family:Georgia;font-size:14px;">
                    <a href="signUp.php">Sign Up</a>
                </span>
            </div>
            <div id="wb_Text5" style="background-color: #87CEFA;position:absolute;left:1000px;top:14px;width:96px;height:23px;z-index:1;">
                <span style="color:#00008B;font-family:Georgia;font-size:14px;">
                    <a href="signIn_up.php">Sign In</a>
                </span>
            </div>
        </form>
    </div>
<?php 
    } else {

?>
    <div id="wb_Form2" style="position:absolute;left:0px;top:1px;width::1226px;height:63px;z-index:9;">
            <div id="wb_Text6" style="position:absolute;left:1100px;top:14px;width:350px;height:23px;z-index:0;">
                <span style="color:#00008B;font-family:Georgia;font-size:12px;">
                    <b> Welcome- <?php echo $customerName; ?></b>
                </span>
                <p> 
    </p>
                <span style="color:#00008B;font-family:Georgia;font-size:12px;">
                    <a href="signIn_up.php">Sign Out</a>
                </span>                
            </div>

    </div>
    <?php } ?>


<div id="wb_Form2" style="position:absolute;left:0px;top:230px;width:1226px;height:34px;z-index:6;">
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

  <picture id="wb_Picture1" style="position:absolute;left:0px;top:60px;width:1100px;height:137px;z-index:24">
        <img src="images/images.jpg" style="position:absolute;left:0px;top:0px;width:1100px;height:150px;z-index:24" id="Picture1" alt="" srcset="">
    </picture>
            
          <div id="wb_TabMenu1" style="position:absolute;left:0px;top:280px;width:1100px;height:36px;z-index:5;overflow:hidden;">
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
 
             

            <div style="position:absolute;left:131px;top:325px;width:793px;height:96px;z-index:2;"> 
                  <p> <strong>   Booking Id: </strong> <strong style="color:red;font-family:Georgia;font-size:20px;"> <?php echo $bookingId;  ?> </strong> </p> </br>
                  <p> <strong>  Customer Name: </strong> <?php echo $customer_name;  ?> </p> 
                  <p> <strong>  Customer Phone: </strong> <?php echo $customer_phone;  ?> </p> 
                  <p> <strong>  Customer Email: </strong> <?php echo $customer_email;  ?> </p> 
                  <p> <strong>  CheckIn Date: </strong> <?php echo $checkInDate;  ?> </p>
                  <p> <strong>  CheckOut Date: </strong> <?php echo $checkOutDate;  ?> </p> 
                  <p> <strong>  Booking date time: </strong> <strong style="color:blue;font-family:Georgia;font-size:15px;"> <?php  echo $booking_date;  ?> </strong> </p>

            </div>
        </form>
    </div>
</body>

</html>


<?php
  mysqli_close($conn);

?>