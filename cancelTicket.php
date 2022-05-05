<?php
     include 'connection.php';
session_start();
    if (isset( $_SESSION['user_id'])) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    die();
}
            $tid=$_GET['ticketid'];
                   
            $sql = "update bookings set cancel_status=0 where ticketID='$tid'";
            $result = $conn->query($sql);
            
            if ($result) {
                echo "ticket cancelled...!";
             header("Refresh:0.5; URL=bookings.php");
                             }
                 else {
                echo "<script type='text/javascript'> { window.location.replace('bookings.php');alert('Ticket was not cancelled due to some unknown reasons..sorry for inconvenience.');} </script>";
            }
                $conn->close();
?>
