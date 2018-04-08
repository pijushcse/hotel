<?php 
error_reporting(0);    
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Choose Room</title>
    <meta name="generator" content="WYSIWYG Web Builder 12 Trial Version - http://www.wysiwygwebbuilder.com">
    <link href="chooseRoom.css" rel="stylesheet">
    <link href="1ChooseRoom.css" rel="stylesheet">


</head>

<?php
    $checkInDate = $_POST["checkInDate"];  
    $checkOutDate = $_POST["checkOutDate"];  
    $noOfRoom = $_POST["noOfRoom"];  
    $noOfAdults = $_POST["noOfAdults"];  
    $noOfKids = $_POST["noOfKids"];  
    $addressId = $_POST["address"];
    $roomTypeId  = $_POST["roomType"];
    $secureId  = $_POST["secureuserid"];
    $customerName = "";

 
    $sql  = "";

  
?>

<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbName     = "reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    $userNameQ = "Select CONCAT(firstname, ' ', lastname) as name FROM user_information.user_details WHERE secure_login_id='".$secureId."' ";
    $sqResult = $conn -> query($userNameQ);
    
    if ($sqResult->num_rows > 0) {
      if ($row = $sqResult->fetch_assoc()) {
          $customerName = $row["name"];
      }}



    $sql    = "select r.id,
	b.type as bedType,
	room_desc,
	non_smoking,
    rate, 
    total_room	
from
	room r,
	bed_type b
where
    r.room_type_fk = ".$roomTypeId. " 
    and r.address_fk = ".$addressId."
    and r.bed_type_fk = b.id"  ;   

    $result = $conn->query($sql);

 
}

?>

 
 <script>
        console.log("<?php echo $customerName; ?>");
        console.log("<?php echo $roomTypeId.' - '.$addressId; ?>");
 
            function reserveRoom(id) {
         
            document.getElementById("roomId").value = id;  
            document.getElementById("reserveForm").submit;
            }

        function chooseRoomAlert() {
            alert ("A room must need to be choosen to continue.")
         }
         function bookingDetails() {
            alert ("Enter booking details is required before payment.")
         }

         function paymentRequired() {
            alert ("Payment information is required to confirm a booking.")
         }

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


 
    <div id="wb_Form1" style="position:absolute;left:1px;top:100px;width:1226px;height:967px;z-index:15;">
        <form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="Form1">
            <div id="wb_TabMenu1" style="position:absolute;left:0px;top:215px;width:1224px;height:36px;z-index:5;overflow:hidden;">
                <ul id="TabMenu1">
                    <li>
                        <a style="background-color: chartreuse" href="#">Choose your Room </a>
                    </li>
                    <li>
                        <a  href="javascript:chooseRoomAlert();">Enter Booking Details</a>
                    </li>
                    <li>
                        <a href="javascript:bookingDetails();">Enter Payment Method</a>
                    </li>
                    <li>
                        <a href="javascript:paymentRequired();">Booking Confirmation </a>
                    </li>
                </ul>
            </div>
            <div id="wb_Form2" style="position:absolute;left:0px;top:181px;width:1226px;height:34px;z-index:6;">
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
            <div id="wb_Form3" style="position:absolute;left:5px;top:260px;width:893px;height:573px;z-index:7;">
                <form name="Form3" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="Form3">
                    <div id="wb_Form4" style="position:absolute;left:0px;top:0px;width:719px;height:330px;z-index:4;">
                        <form name="Form4" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="Form4">
                        </form>
                    </div>
                </form>
            </div>

<form id="reserveForm"   method="POST" action="./2bookingDetailsTab.php" > 

            <table style="position:absolute;left:0px;top:300px;width:1000px;height:103px;z-index:8;" id="Table2">
                <tr>
                    <th class="cell0">
                        <span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Bed   </span>
                    </th>
                    <th class="cell1">
                        <span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;"> Room Description   </span>
                    </th>
                    <th class="cell0">Non Smoking </th>
                    <th class="cell0">Price/ night</th>
                    <th class="cell0"><?php   ?></th>
                    <th class="cell0">&nbsp;</th>
                </tr>

                <?php 
                       if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                         $roomId =  $row["id"] ;
                         $availableRoom = $row["total_room"] ;

                             $desc  = explode('.',  $row["room_desc"]) ;   
                             $fullDesc = '';
                             foreach ($desc as $feat) {
                                $fullDesc =  $fullDesc. '</br></br>'. $feat;
                            }

                            $sql2 = "SELECT COUNT(*) as cnt FROM reservation_confirmation WHERE room_fk=".$roomId; 
                            $bookedRoomCountResult = $conn->query($sql2);
                            $bookedRoomCount = 0;
                            if ($bookedRoomCountResult->num_rows > 0) {
                             if ($counterRow = $bookedRoomCountResult->fetch_assoc()) {
                                    $bookedRoomCount =  $counterRow["cnt"] ; 
                            }
                            $availableRoom = $availableRoom - $bookedRoomCount;
                        }
                            


                            echo '<tr style="background-color: cornsilk">'; 
                                echo '<td class="cellbedType"> <span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">'.$row["bedType"]. ' </span>  </td> ' ;
                                echo '<td class="celldesc1"> <span style="color:#000000;font-family:Arial;font-size:13px;line-height:16px;">'.$fullDesc.' </span> </td> ' ;
                                echo '<td class="cellsmoke">'.$row["non_smoking"].'</td> ' ;
                                echo '<td class="cell0">$'.$row["rate"].'.00</td>';
                                
                                echo '<td class="cell0">'; 
                                    echo '<input type="submit" name="reserve" style=" font-weight: bold;" value="Reserve" onclick="reserveRoom('.$roomId.') ;"  />';
                                echo '</td>' ;
                                
                                echo '<td class="cell0"> <b style="color:red;font-size:30px"> '.$availableRoom.' </b>   wonderful rooms available with this price. </br> <b> Hurry up!!  </b> </td>' ;
                            echo '</tr>'; 

                        }
                    }
                
                ?>
            </table>

                       <input type="hidden" id="roomId" name="roomId"/>
                       <input type="hidden" id="roomTypeId" name="roomTypeId" value="<?php echo $roomTypeId; ?>"/>
                       <input type="hidden" id="checkInDate" name="checkInDate" value="<?php echo $checkInDate; ?>" />
                       <input type="hidden" id="checkOutDate" name="checkOutDate" value="<?php echo $checkOutDate; ?>"  />
                       <input type="hidden" id="noOfRoom" name="noOfRoom" value="<?php echo $noOfRoom; ?>"  />
                       <input type="hidden" id="noOfAdults" name="noOfAdults" value="<?php echo $noOfAdults; ?>"  />
                       <input type="hidden" id="noOfKids" name="noOfKids"  value="<?php echo $noOfKids; ?>"  />
                       <input type="hidden" id="address" name="address"  value="<?php echo $addressId; ?>"  />
                       <input type="hidden" id="secureuserid" name="secureuserid"  value="<?php echo $secureId; ?>"  />

                       <input type="hidden" id="customerName" name="customerName"  value="<?php echo ''; ?>"  />
                       <input type="hidden" id="customerEmail" name="customerEmail"  value="<?php echo ''; ?>"  />
                       <input type="hidden" id="customerPhone" name="customerPhone"  value="<?php echo ''; ?>"  />


        </form>
    </div>
    <marquee direction="left" scrolldelay="90" scrollamount="6" behavior="scroll" loop="0" style="position:absolute;left:0px;top:137px;width:1225px;height:38px;z-index:16;"
        id="Marquee1">
        <span style="color:#0000CD;font-family:Georgia;font-size:20px;">Welcome!!!</span>
    </marquee>
    <picture id="wb_Picture1" style="position:absolute;left:0px;top:70px;width:1227px;height:150px;z-index:17">
        <img src="images/images.jpg" id="Picture1" alt="" srcset="">
    </picture>

</body>

</html>
 

<?php
  mysqli_close($conn);

?>