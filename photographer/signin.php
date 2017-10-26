<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Signin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style.css">


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
    <form class="registration-form" method="post" action="login.php">
        <label class="col-one-half">

        </label>
        <label class="col-one-half">

        </label>
        <label>
            <span class="label-text">Email</span>
            <input type="text" name="email">
        </label>
        <label class="password">
            <span class="label-text">Password</span>
            <button class="toggle-visibility" title="toggle password visibility" tabindex="-1">
                <span class="glyphicon glyphicon-eye-close"></span>
            </button>
            <input type="password" name="password">
        </label>

        <div class="text-center">
            <button class="submit" name="register" type="submit">Login</button>
        </div>
    </form>
</div>


</body>
</html>
