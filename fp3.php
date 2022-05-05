<html>

<head>
    <title>AnsCHECK</title>
    <?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    echo $idh;
} else {
    header("Location:login.php");
}
    
    function error(){
        echo"<script type='text/javascript'> alert('Wrong Answer!!');window.location.replace('login.php');</script>";
        die();
    }
    ?>
</head>


<body>

    <?php
     include 'connection.php';
     
            $answer=$_POST['answer'];
            $sql = "SELECT answer FROM login where username='$idh'";
            $result = $conn->query($sql);
            
             while($row = $result->fetch_assoc()) {
               $ans=$row["answer"];
            
             }
    
            if(strcmp($answer,$ans)==0)
            {
                 echo "<script type='text/javascript'>  window.location.replace('changePass.php');</script>";
            }
            else{
                session_unset();
                session_destroy();
                error();

            }
                $conn->close();

        ?>
</body>

</html>
