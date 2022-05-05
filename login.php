<html>
<title>login</title>

<head>
    <link rel="stylesheet" href="1.css" />

</head>

<body align="center">
    <p id="logo">sign in</p>
    <form name="myform" action="logger.php" class="login_form_style" method="post" style="align:center;margin-top: -190px;">
        <fieldset style="width: 250px;">
            <legend>Sign in</legend>
            <input type="email" name="userid" value="" placeholder="Enter username" id="text1" required /><br><br>
            <input type="password" name="pass" value="" placeholder="*******" id="text2" required />
            <br><br>
            <input type="submit" value="login" id="b1">&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.html"><input type="button" value="Cancel" id="b2" name="cancel"></a><br><br>
            <div class="lass" style="margin-left:5px;">
                <a href="signup.html"> Sign up</a>
            </div>
            <div class="lass">
                <a href="fp.html"> Forgot password ? </a>
            </div>

        </fieldset>
    </form>

</body>

</html>
