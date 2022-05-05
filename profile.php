<html>
<title>profile</title>
<?php
    session_start();
    
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
    <base target="_self" />
    <link rel="stylesheet" href="1.css" />
    <link rel="stylesheet" href="2.css" />
    <link rel="stylesheet" href="3.css" />
    <link rel="stylesheet" href="7.css" />
</head>

<body style="background-image:url(4new.jpg)">

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
    <div>
        <p style="background-color:rgba(170,0,0,0.2);text-align:center;font-size:35px;color:silver;width:100%;font-family:pristina;margin-top:5px;margin-bottom:10px;">
            <?php echo $_SESSION['idname']; ?>
        </p>
    </div>

    <form action="updater.php" class="update_form_style" onsubmit="return validateForm();" method="post" style="align:center;">
        <input type="text" name="name" value="" placeholder="name" minlength="3" maxlength="20" class="inp" pattern="[a-zA-Z]*"><br><br>

        <input type="tel" class="inp" name="phone" value="" placeholder="enter 10-digit mobile number" maxlength="10" pattern="[1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
        <!--<span class="note"> format: x x x x x x x x x x(only digits)</span>-->
        <br><br>
        <select name="secques" id="ddmenu" class="dmenu" style="width:235px; min-height:28px; font-family:calibri; font-size:18;">

            <option value="empty" selected hidden>Change Security Question:&nbsp;&nbsp;&nbsp;&nbsp;</option>

            <option>What is your mother's maiden name?</option>

            <option>What is your nick name?</option>

            <option>Where is your favorite place to vacation?</option>

            <option>Which city were you born in?</option>
            <option>Where did you go to high school/college?</option>
            <option>What is your favorite food?</option>

        </select><br><br>
        <input type="text" name="answer" value="" class="inp" placeholder="enter answer" maxlength="30" pattern="[a-zA-Z]*">
        <br><br>


        <input type="submit" class="inpbtn" value="Update">&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br>


    </form>
</body>

</html>
