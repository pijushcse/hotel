<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php
   $string = bin2hex(openssl_random_pseudo_bytes(10)); // 20 chars
echo $string; 
?>
</body>
</html>