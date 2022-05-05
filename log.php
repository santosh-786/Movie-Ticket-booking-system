<html>
<body>
<?php
 session_start();
// Create connection
$conn = new mysqli('localhost','root','');
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "DB Connected successfully";
 
// this will select the Database sample_db
mysqli_select_db($conn,"student");
 
echo "\n DB is seleted as Test  successfully";
 

$sql="SELECT * FROM signup  WHERE usn='$_POST[id]' AND pass='$_POST[psd]'";
 $_SESSION["usn"]=$_POST[id];
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
   /* Redirect browser */
header("Location:promain.php");
}
 else {
    $message="USERNAME or PASSWORD are wrong";

echo"<script type='text/javascript'> { alert('$message');} window.location.replace('login.php');</script>";
}


 
mysqli_close($conn);
?>
</body>
</html>