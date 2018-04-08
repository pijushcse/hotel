<?php 
error_reporting(0);    
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Untitled Page</title>
    <link href="Untitled2.css" rel="stylesheet">
    <link href="signUp.css" rel="stylesheet">
</head>

<script>
    function signup() {
            var firstName = new Date( document.getElementById('firstName').value);
            var middleName = new Date( document.getElementById('middleName').value);
            var lastName = new Date( document.getElementById('lastName').value);
            var userName = new Date( document.getElementById('userName').value);
            var email = new Date( document.getElementById('email').value);
            var password = new Date( document.getElementById('password').value);
            var confPassword = new Date( document.getElementById('confPassword').value);

            if(firstName.length ==0 || userName.length ==0 || lastName.length ==0 || 
            email.length ==0 || password.length ==0 ||  confPassword.length ==0) {
                alert ('All * fields are mandatory.');
                return false; 
            }

            if(password === confPassword) {
                return true; 
            } else {
                alert ('Password are not identical');
                return false;
            }
        return true;
    }
</script>

 <?php
        $firstName = '';
        $middleName = '';
        $lastName = '';
        $userName = '';
        $email = '' ; 
        $phone = '' ;
        $userPassword = '' ;
        $userConfPassword = '';
        $address = '';
        

        $userId = 0;
        $sql = '';
        $userExists = 'NOTEXISTS';
        $sqlCheck = '';
        $error = '';

        $secureId =    bin2hex(openssl_random_pseudo_bytes(10)); // 20 chars
        

    if(isset($_POST["signUp"]) ) {
        $firstName = $_POST["firstName"];  
        $middleName = $_POST["middleName"];  
        $lastName = $_POST["lastName"];  
        $userIdName = $_POST["userName"];  
        $email = $_POST["email"];  
        $phone = $_POST["phone"];  
        $userPassword = $_POST["password"];  
        $userConfPassword = $_POST["confPassword"];  
        $address = $_POST["address"];  

        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbName     = "user_information";
        
        if( strlen($userIdName) >0 &&  strlen($firstName) > 0 && 
        strlen($lastName) >0 &&  strlen($userPassword) >0 && ($userPassword == $userConfPassword)) {

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbName);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {

            $sqlCheck = "SELECT COUNT(*) AS CNT FROM user_details WHERE UserName= SHA2(UPPER('".$userIdName."'), 512) ";
            $checkResult = $conn->query($sqlCheck);
            if ($checkResult->num_rows > 0) {
                if ($row = $checkResult->fetch_assoc()) {
                    if($row["CNT"] > 0)  {
                        $userExists = 'EXISTS';
                    } else {
                        $sql    = "INSERT INTO user_details( FirstName, MiddleName, LastName, UserName, Phone, Email, address, password, secure_login_id) VALUES('".$firstName."', '".$middleName."', '".$lastName."', SHA2(UPPER('".$userIdName."'), 512), '".$phone."', '".$email."', '".$address."', SHA2('".$userPassword."', 512), '".$secureId."') " ;
                        $result = $conn->query($sql);
                        $userId = $conn -> insert_id;
                            if($userId >0) {
                                header("Location: ./signIn_up.php");
                            }                                    
                    }
                }
            }

        }
      } else {
        $error = 'ERROR' ;
      }
    }
 
 ?>

 <script>
      console.log("<?php 'id- '. $secureId; ?>");

        ucount = '<?php echo $userExists; ?>';
        err= '<?php echo $error; ?>';
        console.log("<?php echo $sqlCheck; ?>");
        console.log(ucount);
        if(ucount == 'EXISTS') {
            alert("Username already exists. Try with different user name.");
        }

        if(err == 'ERROR') {
            alert("Missing/mis-match mandatory fields.");
        }
  </script>

<body>

    <div id="wb_Form1" style="position:absolute;left:10px;top:4px;width:1258px;height:862px;z-index:23;">
        <form name="Form1" method="post" action="signUp.php" id="signUpForm">
            <div id="wb_Text1" style="position:absolute;left:146px;top:0px;width:249px;height:18px;z-index:0;">
                <span style="color:#00008B;font-family:Georgia;font-size:16px;">Sign Up for a New User</span>
            </div>
            <input type="text" id="firstName" style="position:absolute;left:170px;top:56px;width:399px;height:16px;line-height:16px;z-index:1;"
                name="firstName" value="" spellcheck="false">
            <input type="text" id="middleName" style="position:absolute;left:169px;top:100px;width:401px;height:16px;line-height:16px;z-index:2;"
                name="middleName" value="" spellcheck="false">
            <input type="text" id="lastName" style="position:absolute;left:169px;top:142px;width:401px;height:16px;line-height:16px;z-index:3;"
                name="lastName" value="" spellcheck="false">
            <input type="tel" id="phone" style="position:absolute;left:170px;top:237px;width:399px;height:16px;line-height:16px;z-index:4;"
                name="phone" value="" spellcheck="false">
            <input type="email" id="email" style="position:absolute;left:170px;top:286px;width:398px;height:16px;line-height:16px;z-index:5;"
                name="email" value="" spellcheck="false">
            <input type="text" id="address" style="position:absolute;left:170px;top:329px;width:398px;height:16px;line-height:16px;z-index:6;"
                name="address" value="" spellcheck="false">
            <input type="password" id="password" style="position:absolute;left:168px;top:366px;width:398px;height:16px;line-height:16px;z-index:7;"
                name="password" value="" spellcheck="false">
            <input type="password" id="confPassword" style="position:absolute;left:168px;top:403px;width:398px;height:16px;line-height:16px;z-index:8;"
                name="confPassword" value="" spellcheck="false">
            <div id="wb_Text2" style="position:absolute;left:143px;top:20px;width:255px;height:16px;z-index:9;">
                <span style="color:#00008B;font-family:Arial;font-size:13px;">*&nbsp; fields are required </span>
            </div>
            <div id="wb_Text3" style="position:absolute;left:28px;top:61px;width:103px;height:18px;z-index:10;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">* First Name</span>
            </div>
            <div id="wb_Text6" style="position:absolute;left:28px;top:242px;width:79px;height:18px;z-index:11;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">Phone</span>
            </div>
            <div id="wb_Text7" style="position:absolute;left:28px;top:291px;width:140px;height:18px;z-index:12;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">* E-mail</span>
            </div>
            <div id="wb_Text8" style="position:absolute;left:28px;top:329px;width:135px;height:18px;z-index:13;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">Address</span>
            </div>
            <div id="wb_Text9" style="position:absolute;left:28px;top:366px;width:140px;height:18px;z-index:14;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">* Password</span>
            </div>
            <div id="wb_Text10" style="position:absolute;left:28px;top:408px;width:205px;height:18px;z-index:15;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">* Confirm Password</span>
            </div>
            <input type="submit" id="Button1" name="signUp" value="Sign Up" style="position:absolute;left:170px;top:467px;width:247px;height:29px;z-index:16;">
            <input type="text" id="userName" style="position:absolute;left:171px;top:190px;width:399px;height:16px;line-height:16px;z-index:17;"
                name="userName" value="" spellcheck="false">
            <div id="wb_Text5" style="position:absolute;left:28px;top:147px;width:102px;height:18px;z-index:18;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">* Last Name</span>
            </div>
            <div id="wb_Text11" style="position:absolute;left:28px;top:195px;width:250px;height:18px;z-index:19;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">* User Name</span>
            </div>
            <div id="wb_Text4" style="position:absolute;left:28px;top:105px;width:103px;height:18px;z-index:20;">
                <span style="color:#00008B;font-family:Georgia;font-size:15px;">Middle Name</span>
            </div>
            <div id="wb_Image1" style="position:absolute;left:580px;top:0px;width:533px;height:609px;z-index:21;">
                <img src="images/images.jpg" id="Image1" alt="">
            </div>



        </form>
    </div>
</body>

</html>