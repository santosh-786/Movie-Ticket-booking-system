<html>

<title>Bookings</title>
<?php
    session_start();
    if (isset( $_SESSION['user_id'])) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    die();
}
    $loc="";
   function getPosterLoc($name){
        include 'connection.php';
        $sql = "SELECT posterLoc FROM moviedb WHERE      title='".$name."'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0 ) { 
            $GLOBALS['loc']="movieIMG/unavailable.jpg";
            }
        else{
            while($row = $result->fetch_assoc()) {
                if($row["posterLoc"]==""){
                    $GLOBALS['loc']="movieIMG/unavailable.jpg";
                }
                else{
                  $GLOBALS['loc']=$row["posterLoc"];  
                }
               
                             }
            }
    
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
    <link rel="stylesheet" href="6.css" />
    <link rel="stylesheet" href="7.css" />
    <script>
        function cancellor() {
            if (confirm("Are you sure?")) {
                var name = event.target.id;
                window.location.replace('cancelTicket.php?ticketid='.concat(name));
            }
        }

    </script>
</head>

<body style="background-image:url(11new.jpg)">

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
        <a href="">Bookings</a>
        <div><a href="logout.php">Logout</a></div>

    </div>

    <p style="background-color:rgba(170,0,0,0.2);text-align:center;font-size:40px;color:silver;width:100%;font-family:pristina;margin-top:5px;margin-bottom:10px;">your tickets</p>


    <?php
        include 'connection.php';
    $sql = "SELECT * FROM bookings WHERE      userid='".$_SESSION['user_id']."' and cancel_status=1";
    $result = $conn->query($sql);
    $numtks = $result->num_rows;
    if($numtks==0){
        echo '<div id="no_bk">no bookings yet !!</div>';
    }
    else{
        while($row=$result->fetch_assoc())
        {
            getPosterLoc($row["movieName"]);
            $out = strlen(ucfirst($row["movieName"])) > 19 ? substr(ucfirst($row["movieName"]),0,19)."..." : ucfirst($row["movieName"]);
        echo ' 
    <div class="frame">
        <div class="card">
            <div style="background-image: url('.$loc.')" class="image">
    <div class="overlay">
        <div class="btn2" ><a href="https://www.imdb.com/title/tt6933454/?ref_=nv_sr_1" class="bk_inf">
                About
            </a></div>
    </div>
    </div>
    <button class="cancelbtn" id="'.$row["ticketID"].'" onclick="cancellor();">Cancel</button><br>
    <span id="ticketid">Ticket id : '.$row["ticketID"].'
    </div>
    <div class="tk_details"><span class="movname">Movie : '.$out.'</span><br><br>Theatre : '.ucfirst($row["hall"]).'<br><br>Date : '.$row["dob"].'<br><br>Show Time : '.$row["showTime"].'<br><br>seats : '.$row["numSeats"].'<br><br>Paid : NRS'.$row["amount"].'</div>
    </div>';

    }
        
    }
    ?>
</body>

</html>
