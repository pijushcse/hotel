<?php 
error_reporting(0);    
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <meta name="generator" content="WYSIWYG Web Builder 12 Trial Version - http://www.wysiwygwebbuilder.com">
    <link href="signIn.css" rel="stylesheet">
    <link href="signIn_up.css" rel="stylesheet">
    <script src="jquery-1.12.4.min.js"></script>
    <script src="wwb12.min.js"></script>
</head>

<?php

$customerName = '';

     if(isset($_POST["signIn"]) ) {
         $userIdName = $_POST["userName"];  
        $userPassword = $_POST["userPass"];  

        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbName     = "user_information";
        
        if( strlen($userIdName) >0 &&  strlen($userPassword) >0 ) {

            $conn = new mysqli($servername, $username, $password, $dbName);        

            $sqlCheck = "SELECT  secure_login_id as name FROM user_details WHERE UserName= SHA2(UPPER('".$userIdName."'), 512) and password=SHA2('".$userPassword."', 512) ";
            $checkResult = $conn->query($sqlCheck);
            if ($checkResult->num_rows > 0) {
                if ($row = $checkResult->fetch_assoc()) {
                    $customerName = $row["name"];
                    header('Location: ./index.php?secureid='.$customerName);
             } 
           } else {
                echo '<script language="javascript">';
                echo 'alert("Invalid username/ password. Please try again.")';
                echo '</script>';            
             }
        }
    }

?>

<body>

    <div id="wb_Form1" style="position:absolute;left:12px;top:12px;width:1149px;height:900px;z-index:11;">
        <form name="Form1" method="post" action="signIn_up.php" id="Form1">
            <input type="text" id="userName" style="position:absolute;left:213px;top:241px;width:391px;height:16px;line-height:16px;z-index:0;"
                name="userName" value="" spellcheck="false">
            <input type="password" id="userPass" style="position:absolute;left:213px;top:300px;width:391px;height:16px;line-height:16px;z-index:1;"
                name="userPass" value="" spellcheck="false">
            <input type="submit" id="Button1"  name="signIn" value="Sign In" style="position:absolute;left:210px;top:426px;width:236px;height:42px;z-index:2;">
            <div id="wb_Checkbox1" style="position:absolute;left:210px;top:378px;width:20px;height:20px;z-index:3;">
                <input type="checkbox" id="Checkbox1" name="" value="on" style="position:absolute;left:0;top:0;">
                <label for="Checkbox1"></label>
            </div>
            <div id="wb_Text1" style="position:absolute;left:242px;top:380px;width:250px;height:16px;z-index:4;">
                <span style="color:#000000;font-family:Arial;font-size:13px;">Remember me</span>
            </div>
            <div id="wb_Text2" style="position:absolute;left:39px;top:244px;width:171px;height:20px;z-index:5;">
                <span style="color:#00008B;font-family:Georgia;font-size:17px;">Username or Honors:</span>
            </div>
            <div id="wb_Text3" style="position:absolute;left:39px;top:303px;width:136px;height:20px;z-index:6;">
                <span style="color:#00008B;font-family:Georgia;font-size:17px;">Password:</span>
            </div>
            <div id="wb_Image1" style="position:absolute;left:0px;top:0px;width:1149px;height:149px;z-index:7;">
                <img src="images/download.jpg" id="Image1" alt="">
            </div>
            <marquee direction="right" scrolldelay="60" scrollamount="6" behavior="scroll" loop="0" style="position:absolute;left:0px;top:151px;width:1147px;height:38px;z-index:8;"
                id="Marquee1">
                <span style="color:#0000FF;font-family:Georgia;font-size:21px;">WelCome!!!!</span>
            </marquee>
            <div id="wb_Text4" style="position:absolute;left:429px;top:380px;width:142px;height:16px;z-index:9;">
                <span style="color:#000000;font-family:Arial;font-size:13px;">
                    <a href="passwordRecovery.html">Forget Your Password</a>
                </span>
            </div>

            <div id="hidden_form_container" style="display:none;"></div>
            <input type="hidden" id="customerFullName" name="customerFullName" />
        </form>
    </div>

</body>

<script> 
    name = '<?php echo $customerName; ?>';
    if(name.length >0) {
    }
</script>


</html>