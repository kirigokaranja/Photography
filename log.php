<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Signin Page for Foto ">
    <meta name="author" content=" Foto">
    <link rel="icon" type="image/ico" href="favicon.ico" />

    <title>Sign In</title>
    <link href="css/signin.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <form action="login.php" method="post">

        <h1 class="text-center">Log In</h1>
        <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        // error message incase username or password are incorrect

        if(strpos($url,'error=fail')){
            echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
        }elseif(strpos($url,'message=success')){
            echo "<p style='color:red; font-size:32px;text-align: center;'>Login Successful </p>";
        }
        ?>

        <label class="password">
            <span class="label-text">Email</span>
            <input type="text" name="email" required/><br><br>
        </label>

        <label class="password">
            <span class="label-text">Password</span>
            <input type="password" name="password" required/><br><br>
        </label>
        <div class="text-center">
            <button type="submit" class="submit">LOG IN</button>
        </div>
        <p>Not a member yet? <a href="signin.php">Join Us</a> </p>
    </form>
</div>
</body>
</html>