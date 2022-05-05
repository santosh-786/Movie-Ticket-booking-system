<?php  global $conn;
        $servername = "localhost";  
        $username = "root";  
        $password = "G>v&GyLb";  
        $db='mtbs';
        $conn = mysqli_connect($servername,$username, $password, $db);
        if ( $conn->connect_error) {
            die("Connection failed: " .$conn->connect_error);
                   }
       
?>
