<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Signin</title>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Signin Page for Foto ">
        <meta name="author" content=" Foto">
        <link rel="icon" type="image/ico" href="favicon.ico" />

        <title>Sign In</title>
        <link rel="stylesheet" href="photographer/css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Cookie|Raleway:300,700,400' rel='stylesheet' type='text/css'>

    </head>
<body>
<div class="container">
    <form action="signup.php" method="post">

        <h1 class="text-center">Sign Up</h1>
        <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        // error message incase username or password are incorrect

        if(strpos($url,'error=fail')){
            echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
        }elseif(strpos($url,'message=success')){
            echo "<p style='color:red; font-size:32px;text-align: center;'>Sign Up Successful </p>";
        }elseif(strpos($url,'error=exists')){
            echo "<p style='color:red; font-size:28px;text-align: center;'>Email already Exists </p>";
        }
        ?>
        <label class="password">
            <span class="label-text">First Name</span>
            <input type="text" name="fname"required/>
        </label>
        <label class="password">
            <span class="label-text">Surname</span>
            <input type="text" name="sname"required/>
        </label>
        <label class="password">
            <span class="label-text">Email</span>
            <input type="email" name="email" required/>
        </label>
        <label class="password">
            <span class="label-text">Phone Number</span>
            <input type="number" name="number" required/>
        </label>
        <label class="password">
            <span class="label-text">Password</span>
            <input type="password" name="password" required/>
        </label>
        <div class="text-center">
            <button type="submit" class="submit">SIGN UP</button>
        </div>

    </form>
</div>
</body>
</html>