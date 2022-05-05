<html>
<title>Book</title>
<?php
    session_start();
    
$_SESSION['movsel']=$_GET['movie'];
    if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    die();
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
    
        $sql = "SELECT name FROM login WHERE username='".$id."'";
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
        <a href="">Bookings</a>
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
    <div>
        <p style="background-color:rgba(170,0,0,0.2);text-align:center;font-size:25px;color:silver;width:100%;font-family:Times new roman;">SHOW TIMINGS</p>


        <div class="timings">

            <label class="hall">Big movies: kamalpokhari road</label>
            <a href="booking.php?time=10:30%20am&movie=<?php getMovieName(); ?>&theatre=Big%20Movies"><button class="btnq"><span>10:30 am </span></button></a>
            <a href="booking.php?time=01:15%20pm&movie=<?php getMovieName(); ?>&theatre=Big%20Movies"><button class="btn"><span>01:15 pm </span></button></a>
            <a href="booking.php?time=04:30%20pm&movie=<?php getMovieName(); ?>&theatre=Big%20Movies"><button class="btn"><span>04:30 pm </span></button></a>
            <a href="booking.php?time=07:00%20pm&movie=<?php getMovieName(); ?>&theatre=Big%20Movies"><button class="btn"><span>07:00 pm </span></button></a>
        </div>
        <div class="timings">
            <label class="hall">Jai Nepal Cinema Hall, Nagpokhari</label>
            <a href="booking.php?time=10:30%20am&movie=<?php getMovieName(); ?>&theatre=Jai%20Nepal"><button class="btnq"><span>10:30 am </span></button></a>
            <a href="booking.php?time=01:15%20pm&movie=<?php getMovieName(); ?>&theatre=Jai%20Nepal"><button class="btn"><span>01:15 pm </span></button></a>

        </div>
        <div class="timings">
            <label class="hall">QFX Cinemas, Chhaya Center</label>
            <a href="booking.php?time=04:30%20pm&movie=<?php getMovieName(); ?>&theatre=QFX%20Cinemas"><button class="btnq"><span>04:30 pm </span></button></a>
            <a href="booking.php?time=07:00%20pm&movie=<?php getMovieName(); ?>&theatre=QFX%20Cinemas"><button class="btn"><span>07:00 pm </span></button></a>
        </div>
        <div class="timings">
            <label class="hall">Gopikrishna Movies</label>

            <a href="booking.php?time=01:15%20pm&movie=<?php getMovieName(); ?>&theatre=Gopikrishna%20Movies"><button class="btnq"><span>01:15 pm </span></button></a>


        </div>
    </div>

    </div>
</body>

</html>
