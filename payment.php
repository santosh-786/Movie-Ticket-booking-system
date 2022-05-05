<html>
<title>pay via card</title>
<?php
    session_start();
    
$_SESSION['amount']=$_GET['amount'];
$_SESSION['numseats']=$_GET['numseats'];
$_SESSION['dob']=$_GET['dob'];
if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    die();
}
    
    function getName(){
        $id=$_SESSION['user_id'];
        include 'connection.php';
    
        $sql = "SELECT name FROM login WHERE      username='".$id."'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0 ) { 
            echo $id;
            }
        else{
            while($row = $result->fetch_assoc()) {
               $name=$row["name"];
                             }
            $_SESSION['idname']=$name;
                             echo $name;
            }
    
    }
    ?>

<head>
    <script>
        var queryString = decodeURIComponent(window.location.search);
        queryString = queryString.substring(1);
        var queries = queryString.split("=");
        queryString = queries[1];
    </script>

    <base target="_self" />
    <link rel="stylesheet" href="1.css" />
    <link rel="stylesheet" href="2.css" />
    <link rel="stylesheet" href="3.css" />
    <link rel="stylesheet" href="5.css" />
    <link rel="stylesheet" href="4%20booking.css" />
    <link rel="stylesheet" href="7.css" />
</head>

<body style="background-image:url(9new.jpg);">

    <div class="topnav" style="margin-bottom: 10px;">

        <a class="active" href="home.php">Home</a>
        <div class="dropdown">
            <a class="dropbtn" href="">
                <?php getName(); ?>
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-content">
                <a href="fp22.php?idx=<?php echo $idh; ?>">change password</a>
                <a href="profile.php">edit profile</a>
            </div>
        </div>
        <a href="bookings.php">Bookings</a>
        <div><a href="logout.php">Logout</a></div>
    </div>
    <form name="myform" action="bank.php" class="pay_form_style" onsubmit="return validateForm();" method="post">
        <fieldset id="fset">
            <legend id="legd">Payment</legend>
            <font class="labels">Name On Card</font>
            <input type="text" name="nameOnCard" value="" placeholder="" id="text3" required pattern="[a-zA-Z]*"><br><br>
            <font class="labels">Card Number</font>
            <input type="text" name="cardNumber" value="" maxlength="16" placeholder="1234 1234 1234 1234" id="text3" required pattern="[1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
            <br><br>
            <font class="labels">Expiration Date</font>
            <input type="month" name="expDate" id="text3" required>
            <br><br>
            <font class="labels">CVV</font><br>
            <input type="password" name="pass" value="" maxlength="3" minlength=3 placeholder="****" id="text3" required>

            <input type="submit" value="Pay" id="b1">&nbsp;&nbsp;&nbsp;&nbsp;

            <br><br>

        </fieldset>
    </form>



</body>

</html>
