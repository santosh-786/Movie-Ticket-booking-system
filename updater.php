<html>

<body>
    <?php 
    session_start();
    
    if ( isset( $_SESSION['user_id'] ) ) {
    $idh=$_SESSION['user_id'];
    
} else {echo 'session expired.';
    header("Refresh:0; URL=expiredsess.php");
    die();
}
         include 'connection.php';
        $query="";
         $userid=$_SESSION['user_id'];  
    if(!empty($_POST['name'])){
        $query .= "UPDATE login SET name='".$_POST['name']."' WHERE username='".$userid."';";
    }
    if(!empty($_POST['phone'])){
      $query .= "UPDATE login SET mob='".$_POST['phone']."' WHERE username='".$userid."';";
    }
    if(!empty($_POST['answer']) && $_POST['secques']!='empty'){
      $query .= "UPDATE login SET secques='".$_POST['secques']."' WHERE username='".$userid."';";
       
        $query .="UPDATE login SET answer='".$_POST['answer']."' WHERE username='".$userid."'";
    }   
    
    if(!empty($_POST['answer']) && $_POST['secques']=='empty'){
      echo"<script type='text/javascript'> { alert('Error: No Security Question selected.');} window.location.replace('profile.php');</script>";
    } 
    if(empty($_POST['answer']) && $_POST['secques']!='empty'){
      echo"<script type='text/javascript'> { alert('Error: No answer given for selected security question.');} window.location.replace('profile.php');</script>";
    } 
    mysqli_multi_query($conn, $query);
    if(mysqli_affected_rows($conn)>0)
    {
        echo"<script type='text/javascript'> { alert('Update Successful..!');} window.location.replace('profile.php');</script>";
    }
    else{
       echo"<script type='text/javascript'> { alert('Nothing Updated.');} window.location.replace('profile.php');</script>";
    } 
     
 
     
mysqli_close($conn);
?>
</body>

</html>
