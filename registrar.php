<html>

<body>
    <?php 
         include 'connection.php';
         $userid=$_POST['userid'];  
         $phone=$_POST['phone']; 
        
         $sql = "SELECT * FROM login WHERE username='$userid'";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
            // output data of each row
             $message="user with the entered e-mail address already exists.";

        echo"<script type='text/javascript'> { alert('$message');} window.location.replace('signup.html');</script>";

            }
    
 else {
         $sql = "SELECT * FROM login";
         $result = $conn->query($sql);
         while($row = $result->fetch_assoc()) {
         if(strcmp($phone,$row["mob"])==0)
            {
           $message="user with the entered mobile number already exists.";

        echo "<script type='text/javascript'> { alert('$message');} window.location.replace('signup.html');</script>";
    }
} 
     
$sql="INSERT INTO login (name,username,mob,password,secques,answer) VALUES ('$_POST[name]','$_POST[userid]','$_POST[phone]','$_POST[pass]','$_POST[secques]','$_POST[answer]')";
 
if ($conn->query($sql) === TRUE) {
    header("Location:home.php"); /* Redirect browser */
	exit();}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
 }
?>
</body>

</html>
