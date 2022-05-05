<?php
session_start();
include 'connection.php';
if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    die();
}

        $sql="INSERT INTO bookings (userid,movieName,hall,showTime,numSeats,amount,dob,cancel_status) VALUES ('$_SESSION[user_id]','$_SESSION[movsel]','$_SESSION[movhall]','$_SESSION[movtime]','$_SESSION[numseats]','$_SESSION[amount]','$_SESSION[dob]',1)";
         $result = $conn->query($sql);

         if ($result) {
             $message="Booking Successful!!";

        echo"<script type='text/javascript'> { alert('$message');} window.location.replace('bookings.php');</script>";

            }
    
 else {
        $message="Booking unsuccessful.";
        echo"<script type='text/javascript'> { alert('$message');} window.location.replace('home.php');</script>";
 }
?>
</body>

</html>
