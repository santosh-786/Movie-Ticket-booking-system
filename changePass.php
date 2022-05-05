<html>
<title>ChangePass</title>

<head>
    <link rel="stylesheet" href="1.css" />
    <?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    
} else {
   
     echo"<script type='text/javascript'> alert('session expired...');window.location.replace('login.php');</script>";die();
}
?>
</head>

<body align="center" style="background-image:url(4.jpg)">
    <form name="fpform" action="fp4.php" method="post">
        <fieldset style="width: 250px;">
            <legend style="width: 100x;color:Silver">Set new Password</legend>
            <input type="password" name="pas1" value="" placeholder="new password" id="text2" required maxlength=8 minlength=4 /><br><br>
            <input type="password" name="pas2" value="" placeholder="confirm new password" id="text2" required maxlength=8 minlength=4 /><br><br>
            <input type="submit" id="b1" name="Submit" style="border-radius: 13px;">
        </fieldset>
    </form>
</body>

</html>
