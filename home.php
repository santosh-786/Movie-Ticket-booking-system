<html>
<title>Homepage</title>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="2.css" />
    <link rel="stylesheet" href="7.css" />
    <?php
    session_start();
    
if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    
    die();
}
    
function setMovieSelected($mov){
    $_SESSION['movsel']=$mov;
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

</head>

<body>

<div class="bg-container">



    <div class="topnav">

        <a class="active" href="home.php">Home</a>
        <div class="dropdown">
            <a class="dropbtn" href="">
                <?php getName(); ?>
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-content">
                <a href="fp22.php?idx=<?php echo $idh; ?>">Change password</a>
                <a href="profile.php">Edit profile</a>
            </div>
        </div>
        <a href="bookings.php">My Bookings</a>
        <div><a href="logout.php" target="_self">Logout</a></div>
        
    </div>
    <br>
	
    <div class="card">
        <div style="background-image: url(movieIMG/aehajur.jpg)" class="image">
            <div class="overlay">
                <div class="btn1">
                    <a href="book%20movie.php?movie=AE%20mero%20hajur%204" class="bk_inf">
                        Book
                    </a>
                </div>
                <div class="btn2"><a href="https://www.imdb.com/title/tt16607614/" class="bk_inf">
                        About
                    </a></div>
            </div>
        </div>


        <div class="container">
            <h4><b>A mero hajur 4 | Nepali</b>
                <input</h4> </div> </div> 
	
	
	<div class="card">
                    <div style="background-image: url(movieIMG/batman.jpg)" ; class="image">
                        <div class="overlay">
                            <div class="btn1">
                                <a href="book%20movie.php?movie=Batman" class="bk_inf">
                                    Book

                                </a>
                            </div>
                            <div class="btn2"><a href="#" class="bk_inf">
                                    About
                                </a></div>
                        </div>
                    </div>
					
					

                    <div class="container">

                        <h4><b>Batman | english</b></h4>
                    </div>
        </div>


        <div class="card">
            <div style="background-image: url(movieIMG/beast.jpg) ;" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=Beast" class="bk_inf">
                            Book

                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>

            <div class="container">
                <h4><b>Beast | Hindi</b></h4>
            </div>
        </div>


        <div class="card">
            <div style="background-image: url(movieIMG/dashvi.jpg) ;" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=Dasvi" class="bk_inf">
                            Book

                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>

            <div class="container">
                <h4><b>Dasvi | Hindi</b></h4>
            </div>
        </div>


        <div class="card">
            <div style="background-image: url(movieIMG/jersy.jpg)" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=Jersy" class="bk_inf">
                            Book
                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>
            <div class="container">
                <h4><b>Jersy | Hindi</b></h4>
            </div>
        </div>
        <div class="card">
            <div style="background-image: url(movieIMG/kgf2.jpg)" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=KGF%20chapter%202" class="bk_inf">
                            Book
                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>
            <div class="container">
                <h4><b>KGF chapter 2 | Hindi</b></h4>
            </div>
        </div>
        <div class="card">
            <div style="background-image: url(movieIMG/geet.jpg)" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=MA%20Yesto%20geet%20gaunxu%202" class="bk_inf">
                            Book
                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>
            <div class="container">
                <h4><b>MA yesto geet gaunxu | Nepali</b></h4>
            </div>
        </div>
        <div class="card">
            <div style="background-image: url(movieIMG/rrr.jpg)" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=RRR" class="bk_inf">
                            Book
                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>
            <div class="container">
                <h4><b>RRR | Hindi,Tamil,Telegu</b></h4>
            </div>
        </div>
        <div class="card">
            <div style="background-image: url(movieIMG/noway.jpg)" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=Spiderman" class="bk_inf">
                            Book
                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>
            <div class="container">
                <h4><b>spiderman no way home | English</b></h4>
            </div>
        </div>
        <div class="card">
            <div style="background-image: url(movieIMG/the-lost.jpg)" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=The%20lost%20city" class="bk_inf">
                            Book
                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>
            <div class="container">
                <h4><b>The lost city | English</b></h4>
            </div>
        </div>
        <div class="card">
            <div style="background-image: url(movieIMG/uncharted.jpg)" class="image">
                <div class="overlay">
                    <div class="btn1">
                        <a href="book%20movie.php?movie=Uncharted" class="bk_inf">
                            Book
                        </a>
                    </div>
                    <div class="btn2"><a href="#" class="bk_inf">
                            About
                        </a></div>
                </div>
            </div>
            <div class="container">
                <h4><b>Uncharted | English</b></h4>
            </div>
        </div>

        
</div>
</body>

</html>
