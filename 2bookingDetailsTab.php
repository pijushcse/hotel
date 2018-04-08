<?php 
error_reporting(0);    
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Booking Details</title>
    <link href="chooseRoom.css" rel="stylesheet">
    <link href="2bookingDetailsTab.css" rel="stylesheet">
</head>
<script> 

function validateData() {

    var customerNam = document.getElementById('customerName').value;
    var customerEmail = document.getElementById('customerEmail').value;
    var customerPhone = document.getElementById('customerPhone').value;
 
    if(customerNam.length <1 || customerEmail.length <1 ||  customerPhone.length <1) {
        alert("All the '*' fields are mandatory. ");
        return false;
    }

        var re16digit=/^\d{10}$/
                if (customerPhone.search(re16digit)==-1){
                  alert("Please enter a valid phone number.");
                    return false;  
            }

return ValidateEmail(customerEmail);
}

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true);
  }
    alert("You have entered an invalid email address!")
    return (false);
}

    function paymentConfirmation() {
        document.getElementById("bookingDetails").submit;
    }

    function bookingDetails() {
        alert ("Enter booking details is required before payment.")
    }

         function paymentRequired() {
            alert ("Payment information is required to confirm a booking.")
         }

</script>


<?php
    $checkInDate = $_POST["checkInDate"];  
    $checkOutDate = $_POST["checkOutDate"];  
    $noOfRoom = $_POST["noOfRoom"];  
    $noOfAdults = $_POST["noOfAdults"];  
    $noOfKids = $_POST["noOfKids"];  
    $addressId = $_POST["address"];
    $roomId  = $_POST["roomId"];
    $secureId  = $_POST["secureuserid"];

    $customer_name = '';
    $customer_email  = '';
    $customer_phone = '';
    if ($_POST)  {
        $customer_name = $_POST["customerName"];
        $customer_email = $_POST["customerEmail"];
        $customer_phone = $_POST["customerPhone"];
    
    }
    
?>

<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbName     = "reservation";
$customerName = "";


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


    $sql    = "SELECT id, name FROM Country "  ;   
   $result = $conn->query($sql);

    }

?>

<script>
        console.log( "<?php echo $checkInDate.' - '.$checkInDate; ?>");
        console.log( "<?php echo $roomId.' - '.$addressId; ?>");

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

         <form id="roomChoose" method="POST" action="./1ChooseRoom.php?secureuserid=<?php echo $secureId;?>">  
         <div id="wb_TabMenu1" style="position:absolute;left:0px;top:231px;width:1224px;height:36px;z-index:5;overflow:hidden;">
                <ul id="TabMenu1">
                    <li>
                        <a style="background-color: palegoldenrod"  onclick="document.getElementById('roomChoose').submit();" > Choose your Room </a>
                    </li>
                    <li>
                        <a style="background-color: chartreuse" href="#"> Enter Booking Details</a>
                    </li>
                    <li>
                        <a href="javascript:bookingDetails();"> Enter Payment Method</a>
                    </li>
                    <li>
                        <a href="javascript:paymentRequired();"> Booking Confirmation </a>
                    </li>
                </ul>
            </div>

                       <input type="hidden" id="roomId" name="roomId" value="<?php echo $roomId; ?>" />
                       <input type="hidden" id="checkInDate" name="checkInDate" value="<?php echo $checkInDate; ?>" />
                       <input type="hidden" id="checkOutDate" name="checkOutDate" value="<?php echo $checkOutDate; ?>"  />
                       <input type="hidden" id="noOfRoom" name="noOfRoom" value="<?php echo $noOfRoom; ?>"  />
                       <input type="hidden" id="noOfAdults" name="noOfAdults" value="<?php echo $noOfAdults; ?>"  />
                       <input type="hidden" id="noOfKids" name="noOfKids"  value="<?php echo $noOfKids; ?>"  />
                       <input type="hidden" id="addressId" name="addressId"  value="<?php echo $addressId; ?>"  />
                       <input type="hidden" id="address" name="address"  value="<?php echo $addressId; ?>"  />
                       <input type="hidden" id="roomType" name="roomType"  value="<?php echo $roomId; ?>"  />
                       <input type="hidden" id="secureuserid" name="secureuserid"  value="<?php echo $secureId; ?>"  />


        </form>

          <form id="bookingDetails" method="POST" action="./3paymentMethod.php">  
 
            <div id="wb_Text5" style="position:absolute;left:15px;top:303px;width:358px;height:20px;z-index:7;">
                <span style="color:#0000CD;font-family:Georgia;font-size:17px;">Please Enter Your&nbsp; Booking Details</span>
            </div>
            <div id="wb_Text6" style="position:absolute;left:15px;top:358px;width:165px;height:18px;z-index:8;">
                <span style="color:#191970;font-family:Georgia;font-size:16px;">First and Last Name:* </span>
            </div>
            <input type="text" id="customerName" style="position:absolute;left:209px;top:354px;width:428px;height:16px;line-height:16px;z-index:9;"
                name="customerName" value="<?php echo $customer_name; ?>" spellcheck="false">
            <div id="wb_Text7" style="position:absolute;left:21px;top:410px;width:74px;height:18px;z-index:10;">
                <span style="color:#191970;font-family:Georgia;font-size:16px;">E-mail:* </span>
            </div>
            <input type="text" id="customerEmail" style="position:absolute;left:209px;top:410px;width:428px;height:16px;line-height:16px;z-index:11;"
                name="customerEmail" value="<?php echo $customer_email; ?>" spellcheck="false">
            <div id="wb_Text8" style="position:absolute;left:21px;top:467px;width:153px;height:18px;z-index:12;">
                <span style="color:#191970;font-family:Georgia;font-size:16px;">Phone: *</span>
            </div>
            <input type="text" id="customerPhone" style="position:absolute;left:209px;top:459px;width:428px;height:16px;line-height:16px;z-index:13;"
                name="customerPhone"value="<?php echo $customer_phone; ?>" spellcheck="false">
            <select name="country"  size="1" id="Combobox1" style="position:absolute;left:209px;top:505px;width:428px;height:16px;line-height:16px;z-index:14;">
                    <?php 
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option  value="'.$row["id"].' " >'.$row["name"].'</option>';
                        }
                    }        
                ?>
            </select>
            <div id="wb_Text9" style="position:absolute;left:15px;top:505px;width:250px;height:18px;z-index:15;">
                <span style="color:#000080;font-family:Georgia;font-size:16px;">Country of Residence:</span>
            </div>
            <input type="submit" id="Button1"  onclick="return validateData(); " name="" value="Continue" style="position:absolute;left:326px;top:601px;width:205px;height:25px;z-index:16;" />

                       <input type="hidden" id="roomId" name="roomId" value="<?php echo $roomId; ?>" />
                       <input type="hidden" id="checkInDate" name="checkInDate" value="<?php echo $checkInDate; ?>" />
                       <input type="hidden" id="checkOutDate" name="checkOutDate" value="<?php echo $checkOutDate; ?>"  />
                       <input type="hidden" id="noOfRoom" name="noOfRoom" value="<?php echo $noOfRoom; ?>"  />
                       <input type="hidden" id="noOfAdults" name="noOfAdults" value="<?php echo $noOfAdults; ?>"  />
                       <input type="hidden" id="noOfKids" name="noOfKids"  value="<?php echo $noOfKids; ?>"  />
                       <input type="hidden" id="addressId" name="addressId"  value="<?php echo $addressId; ?>"  />
                       <input type="hidden" id="address" name="address"  value="<?php echo $addressId; ?>"  />
                        <input type="hidden" id="roomType" name="roomType"  value="<?php echo $roomId; ?>"  />
                        <input type="hidden" id="secureuserid" name="secureuserid"  value="<?php echo $secureId; ?>"  />


        </form>
    </div>
    <marquee direction="left" scrolldelay="90" scrollamount="6" behavior="scroll" loop="0" style="position:absolute;left:0px;top:137px;width:1225px;height:38px;z-index:23;"
        id="Marquee1">
        <span style="color:#0000CD;font-family:Georgia;font-size:20px;">Welcome!!!</span>
    </marquee>
    <picture id="wb_Picture1" style="position:absolute;left:0px;top:60px;width:1227px;height:137px;z-index:24">
        <img src="images/images.jpg" id="Picture1" alt="" srcset="">
    </picture>

</body>

</html>


<?php
  mysqli_close($conn);

?>
