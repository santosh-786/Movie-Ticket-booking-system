<html>
<title>fetchQues</title>

<head>
    <link rel="stylesheet" href="1.css" />
    <?php
    function error(){
        echo"<script type='text/javascript'> alert('user with the entered e-mail address does not exist.');window.location.replace('fp.html');</script>";
    }
    ?>
</head>

<body align="center" style="background-image:url(8new.jpg)">

    <form name="fpform" action="fp3.php" method="post">
        <fieldset style="width: 250px;">

            <legend style="width: 100x;color:yellow;font-weight:normal;">security question</legend>

            <label style="color:White;font-family:Arial;">
                <?php
                include 'connection.php';

$id=$_GET['idx'];
$sql = "SELECT secques FROM login WHERE username='$id' or mob='$id'";
$result = $conn->query($sql);
if ($result->num_rows == 0 ) {
                
                    error();
            }
    
 else {
         while($row = $result->fetch_assoc()) {
            session_start();
             $_SESSION['user_id'] = $id;
             
       echo $row["secques"];
    }
}            ?>
            </label><br><br>


            <input type="text" name="answer" value="" placeholder="enter answer" id="text2" /><br><br>
            <input type="submit" id="b1" name="Submit" value="continue" style="border-radius: 13px;">
            <a href="home.php"><input type="button" id="b1" name="Submit" value="cancel" style="border-radius: 13px;"></a>
        </fieldset>
    </form>
</body>

</html>
