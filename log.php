<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Signin Page for Foto ">
    <meta name="author" content=" Foto">
    <link rel="icon" type="image/ico" href="favicon.ico" />

    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

    <link rel="stylesheet" href="photographer/css/style.css">


</head>

<body>
<div class="container">

    <h1 class="text-center">Login</h1>
    <?php
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    // error message incase username or password are incorrect

    if(strpos($url,'error=wrong')){
        echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
    }elseif(strpos($url,'message=success')){
        echo "<p style='color:red; font-size:32px;text-align: center;'>Login Successful </p>";
    }
    ?>
    <form method="post" action="login.php">
        <label class="col-one-half">

        </label>
        <label class="col-one-half">

        </label>
        <label>
            <span class="label-text">Email</span>
            <input type="email" name="email" required>
        </label>
        <label class="password">
            <span class="label-text">Password</span>
            <input type="password" name="password" required>
        </label>

        <div class="text-center">
            <button class="submit" type="submit">Login</button>
        </div><br>
        <p>Not a member yet? <a href="signin.php">Join Us</a> </p>
    </form>
</div>


</body>
</html>
