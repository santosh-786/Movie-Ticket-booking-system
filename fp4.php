<html>

<head>
    <title>fp4</title>
    <?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    echo $idh.'dfdsfs';
    
} else {
    echo 'Password can\'t be changed. session expired.';
    header("Refresh:2; URL=login.php");
    die();
}
    
    function error(){
        echo"<script type='text/javascript'> alert('passwords don\'t match!!');window.location.replace('changePass.php');</script>";
        die();
    }
    function success(){
        session_unset();
        session_destroy();
        echo"<script type='text/javascript'> alert('password changed successfully!!');window.location.replace('logout.php');</script>";
        die();
    }
   
    function error2(){
        
        echo"<script type='text/javascript'> alert('password change unsuccessful!!');window.location.replace('changePass.php');</script>";
        die();
    }
    ?>
</head>


<body>

    <?php
     include 'connection.php';
            $pas1=$_POST['pas1'];
            $pas2=$_POST['pas2'];
            if(strcmp($pas1,$pas2)==0)
            {
            $sql = "UPDATE `login` SET `password`='$pas2' where username='$idh'";
            $result = $conn->query($sql);
                if($result){success();}
                    else{error2();}
            }
            else{
                error();
            }
                $conn->close();

        ?>
</body>

</html>
