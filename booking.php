<html>
<title>book</title>
<?php
    session_start();
    
$_SESSION['movsel']=$_GET['movie'];
$_SESSION['movtime']=$_GET['time'];
$_SESSION['movhall']=$_GET['theatre'];
    
    if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    die();
}
    function getHallName(){
        if($_SESSION['movhall']){ echo $_SESSION['movhall'];}
        else{
            echo "Unknown";
        }
    }
    function getShowTime(){
        if($_SESSION['movtime']){ echo $_SESSION['movtime'];}
        else{
            echo "Unknown";
        }
    }
    function getMovieName(){
        if($_SESSION['movsel']){ echo $_SESSION['movsel'];}
        else{
            echo "Unknown";
        }
    }
    function getTrailer()
    {   $tr= $_SESSION['movsel'];
        
        include 'connection.php';
    
        $sql = "SELECT trailer_link FROM moviedb WHERE      title='".$tr."'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0 ) { 
            echo "https://www.youtube.com/embed/j8SOfg2pxXk";
            }
        else{
            while($row = $result->fetch_assoc()) {
               $link=$row["trailer_link"];
                             }
                             echo $link;
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
    <script>
        var queryString = decodeURIComponent(window.location.search);
        queryString = queryString.substring(1);
        var queries = queryString.split("=");
        queryString = queries[1];
input.onkeypress=function(evt){
    evt.preventDefault();
};
        function setAmount() {
    var x = document.getElementById("myNumber").value;
    var y= 180;
    document.getElementById("amt").innerHTML = x*y.toString();
}
    function goPaygo(){
        var amt= document.getElementById("amt").innerHTML;
        var numseats=document.getElementById("myNumber").value;
        var dob=document.getElementById("date").innerHTML;
        var addr="payment.php?amount=".concat(amt).concat("&numseats=").concat(numseats).concat("&dob=").concat(dob);
        window.location.replace(addr);
    }       
    </script>

    <base target="_self" />
    <link rel="stylesheet" href="1.css" />
    <link rel="stylesheet" href="2.css" />
    <link rel="stylesheet" href="3.css" />
    <link rel="stylesheet" href="4%20booking.css" />
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
        <p class="movie_title">
            <?php getMovieName(); ?>
        </p>
    </div>
    <div>
        <iframe id="video" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen" width="600px" height="300px" src="<?php getTrailer(); ?>">
        </iframe></div>
    <div id="bookinfo1">
        <table id="thistable">
            <tr>
                <td>Theatre</td>
                <td>
                    <?php getHallName(); ?>
                </td>
            </tr>
            <tr>
                <td>Screen</td>
                <td>Screen 1 </td>
            </tr>
            <tr>
                <td>Date</td>
                <td id="date">
                    <script>var myArray = [0, 1, 2, 3,4];
            n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate()+myArray[Math.floor(Math.random() * myArray.length)];
                        if(d>30){
                            d=1+Math.floor(Math.random() * myArray.length);
                            m+=1;
                        }
            
document.getElementById("date").innerHTML = y + "-" + m + "-" + d;</script>
                </td>
            </tr>

            <tr>
                <td>Show Time</td>
                <td>
                    <?php getShowTime(); ?>
                </td>
            </tr>

            <tr>
                <td>Number of Seats</td>
                <td><input type="number" id="myNumber" value="1" min="1" max="5" onclick="setAmount()" style="text-align:center;background-color:transparent;border:1px solid;color:silver;" onkeydown="return false"> </td>
            </tr>
            <tr>
                <td>Amount</td>
                <td>NPR <span id="amt">180</span></td>
            </tr>
            <tr>
                <td colspan="2"><button id="bknow" onclick="goPaygo();">
                        Book Now
                    </button></td>
            </tr>
        </table>
    </div>
</body>

</html>
