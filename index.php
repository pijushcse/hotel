<?php 
error_reporting(0);    
?>

<!doctype html>
<html>


<?php
   $secureId = '';
   if ($_GET)  {
    $secureId = $_GET['secureid'];
   }
   $customerName = '';
   $captchaText = ''; 

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbName     = "reservation";
   // $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);

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
    $captchaTextQuery = "SELECT text FROM reservation.captcha  ORDER BY RAND() LIMIT 1";
    $captchaTextResult =  $conn -> query($captchaTextQuery);
    if ($captchaTextResult->num_rows > 0) {
        if ($row = $captchaTextResult->fetch_assoc()) {
            $captchaText = $row["text"];
        }}


        $sql    = "SELECT id, type FROM room_type";
        $result = $conn->query($sql);

        $locationSql    = "SELECT id, address FROM  location";
        $locationResult = $conn->query($locationSql);
    }

?>
<head>
    <meta charset="utf-8">
    <title>Reserve Room</title>
    <link href="index.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
    <script src="jquery-1.12.4.min.js"></script>
    <script src="wwb12.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#Editbox4").change(function () {
                ShowObject('', 1);
            });
            $("#Editbox4").trigger('change');
        });

        function searchRoom() {
            var checkInDate = new Date( document.getElementById('Editbox2').value);
            var checkOutDate = new Date(document.getElementById('Editbox3').value);
            var currentDate = new Date() 
            currentDate.setHours(0,0,0,0) ;            
            if(checkInDate < currentDate) {
                alert('Cannot select old date as check-in date.');
                return false;
            }
            if(checkInDate > checkOutDate ) {
                alert('Check out cannot be before check in date.');
                return false;
            }

            var adultsCount = document.getElementById('Editbox5').value;
            var roomCount = document.getElementById('Editbox4').value;

            if(adultsCount/ 4 > roomCount ) {
                alert('Only 4 persons are allowed in one room.');
                return false;
            }

            var dbCaptchaText = "<?php echo $captchaText;  ?> " ;
            var userCaptchaText = document.getElementById('captcha').value;
             if(dbCaptchaText.trim() != userCaptchaText.trim()) {
                alert(' Invalid captcha entered. Please try again. ');
                location.reload();
                return false;
            }
            return true;
        }
    </script>
</head>

<script> 
    console.log("Customer name: ");
    console.log("<?php echo 'Query- '.$userNameQ ; ?>");

</script>

<body>

<?php 
    if(strlen($customerName) == 0) {
?>

    <div id="wb_Form2" style="position:absolute;left:100px;top:1px;width:1100px;height:63px;z-index:9;">
        <form name="Form2" method="post" enctype="text/plain" id="Form2">
            <div id="wb_Text6" style="position:absolute;left:900px;top:14px;width:94px;height:23px;z-index:0;">
                <span style="color:#00008B;font-family:Georgia;font-size:19px;">
                    <a href="signUp.php">Sign Up</a>
                </span>
            </div>
            <div id="wb_Text5" style="position:absolute;left:1000px;top:14px;width:96px;height:23px;z-index:1;">
                <span style="color:#00008B;font-family:Georgia;font-size:19px;">
                    <a href="signIn_up.php">Sign In</a>
                </span>
            </div>
        </form>
    </div>
<?php 
    } else {

?>
    <div id="wb_Form2" style="position:absolute;left:0px;top:1px;width:1383px;height:63px;z-index:9;">
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


    <div id="wb_Form3"style="position:absolute;left:100px;top:65px;width:1100px;height:63px;z-index:9;">
        <form name="Form3" method="post" action="mailto:yourname@yourdomain.com" enctype="text/plain" id="Form3">
            <div id="wb_Text1" style="position:absolute;left:1px;top:15px;width:73px;height:18px;z-index:2;">
                <span style="color:#00008B;font-family:Georgia;font-size:16px;">
                    <a href="index.php">Home</a>
                </span>
            </div>
            <div id="wb_Text2" style="position:absolute;left:100px;top:16px;width:78px;height:18px;z-index:3;">
                <span style="color:#00008B;font-family:Georgia;font-size:16px;">Offers</span>
            </div>
            <div id="wb_Text3" style="position:absolute;left:200px;top:16px;width:63px;height:18px;z-index:4;">
                <span style="color:#00008B;font-family:Georgia;font-size:16px;">Resorts</span>
            </div>
            <div id="wb_Text4" style="position:absolute;left:300px;top:16px;width:89px;height:18px;z-index:5;">
                <span style="color:#00008B;font-family:Georgia;font-size:16px;">
                    <a href="ContactUs.html">Contact Us</a>
                </span>
            </div>
            <div id="wb_GoMenu1" style="position:absolute;left:895px;top:12px;width:203px;height:27px;z-index:6;">
                <form id="GoMenu1">
                    <select id="GoMenu1_select" name="GoMenu1">
                        <option class="_self" value="#" selected>Select Hotel</option>
                        <option class="_self" value="./1ChooseRoom.html">Hotel Hilton</option>
                        <option class="_self" value="./1ChooseRoom.html">Hotel Harbour</option>
                    </select>
                    <input id="GoMenu1_input" type="button" value="Go" onclick="OnGoMenuFormLink(this.form.GoMenu1)">
                </form>
            </div>
        </form>
    </div>
    <div id="wb_Image1" style="position:absolute;left:100px;top:115px;width:1100px;height:691px;z-index:11;">
        <img src="images/download.png" id="Image1" alt="">
    </div>

    <div id="wb_Text7" style="position:absolute;left:110px;top:195px;width:255px;height:23px;z-index:13;">
        <span style="color:#FFFFFF;font-family:Georgia;font-size:19px;">Where are you going</span>
    </div>
    <div id="wb_Text8" style="position:absolute;left:110px;top:274px;width:88px;height:23px;z-index:14;">
        <span style="color:#FFFFFF;font-family:Georgia;font-size:19px;">Check In</span>
    </div>

<form id="mainForm" method="POST" action="1ChooseRoom.php?secureid=<?php echo $secureId; ?>" >

    <input type="date" id="Editbox2" style="position:absolute;left:110px;top:297px;width:120px;height:16px;line-height:16px;z-index:15;"
        name="checkInDate" value="<?php echo date('Y-m-d', time() + 86400); ?>" spellcheck="false">
    <div id="wb_Text9" style="position:absolute;left:250px;top:272px;width:321px;height:23px;z-index:16;">
        <span style="color:#FFFFFF;font-family:Georgia;font-size:19px;">Check Out</span>
    </div>
    <input type="date" id="Editbox3" style="position:absolute;left:250px;top:297px;width:156px;height:16px;line-height:16px;z-index:17;"
        name="checkOutDate"  value="<?php echo date('Y-m-d', time() + 86400*2); ?>" spellcheck="false">
    <div id="wb_Text10" style="position:absolute;left:110px;top:350px;width:87px;height:23px;z-index:18;">
        <span style="color:#FFFFFF;font-family:Georgia;font-size:19px;">Rooms</span>
    </div>
    <input type="number" id="Editbox4" style="position:absolute;left:110px;top:373px;width:119px;height:16px;line-height:16px;z-index:19;"
        name="noOfRoom" value="1" min="1" max="20" spellcheck="false">
    <input type="number" id="Editbox5" style="position:absolute;left:110px;top:447px;width:110px;height:16px;line-height:16px;z-index:20;"
        name="noOfAdults" value="1" min="1" max="20" spellcheck="false">
    <input type="number" id="Editbox6" style="position:absolute;left:251px;top:447px;width:157px;height:16px;line-height:16px;z-index:21;"
        name="noOfKids" value="1" min="0" max="20" spellcheck="false">
    <div id="wb_Text11" style="position:absolute;left:110px;top:424px;width:60px;height:23px;z-index:22;">
        <span style="color:#FFFFFF;font-family:Georgia;font-size:19px;">Adults</span>
    </div>
    <div id="wb_Text12" style="position:absolute;left:251px;top:420px;width:87px;height:23px;z-index:23;">
        <span style="color:#FFFFFF;font-family:Georgia;font-size:19px;">Childrens</span>
    </div>
    <input type="submit" id="Button1" onclick="return searchRoom();  " name="" value="Submit" style="position:absolute;left:110px;top:620px;width:117px;height:35px;z-index:24;">
    <input type="reset" id="Button2" value="Reset" style="position:absolute;left:250px;top:620px;width:96px;height:35px;z-index:25;">
    <div id="wb_Text13" style="position:absolute;left:251px;top:350px;width:120px;height:23px;z-index:26;">
        <span style="color:#FFFFFF;font-family:Georgia;font-size:19px;">Room Type</span>
    </div>
    <select name="roomType" size="1" id="roomType" style="position:absolute;left:251px;top:373px;width:166px;height:28px;z-index:27;">
        <?php 
             if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option  value="'.$row["id"].' " >'.$row["type"].'</option>';
                 }
            }
        ?>


    </select>
    <select name="address" size="1" id="Combobox1" style="position:absolute;left:110px;top:218px;width:310px;height:28px;z-index:28;">
        <?php 
             if ($locationResult->num_rows > 0) {
                while ($row = $locationResult->fetch_assoc()) {
                     echo '<option  value="'.$row["id"].' " >'.$row["address"].'</option>';
                }
            }        
        ?>
    </select>

    <div  style=" background-color: white;position:absolute;left:110px;top:500px;width:170px;height:50px;z-index:22;">
    <svg  xmlns="http://www.w3.org/2000/svg">
        <g>
             <rect x="0" y="0" width="170" height="50" fill="red"></rect>
             <text x="15" y="30"  style="font-family:Arial; font-style: italic; font-weight:bold; font-size : 18; stroke:#000000; fill:#00ff00;" fill="blue"><?php echo $captchaText; ?></text>
         </g>
    </svg>
    </div>

    <div  style=" position:absolute;left:300px;top:500px;width:170px;height:50px;z-index:22;">
     <input id="captcha"  type="text" placeholder="Enter captcha"     style="position:absolute;width:117px;height:40px;z-index:24;">

                       <input type="hidden" id="secureuserid" name="secureuserid"  value="<?php echo $secureId; ?>"  />


    </div>


</form> 

</body>

</html>


<?php
  mysqli_close($conn);

?>