<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Signin Page for Foto ">
    <meta name="author" content=" Foto">
    <link rel="icon" type="image/ico" href="favicon.ico" />

    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="cotn_principal">
    <div class="cont_centrar">
        <br><br><br>
        <?php
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        // error message incase username or password are incorrect

        if(strpos($url,'error=fail')){
            echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
        }elseif(strpos($url,'message=success')){
            echo "<p style='color:red; font-size:32px;text-align: center;'>Sign Up Successful </p>";
        }elseif(strpos($url,'error=exists')){
            echo "<p style='color:red; font-size:28px;text-align: center;'>Email already Exists </p>";
        }elseif(strpos($url,'error=noexists')){
            echo "<p style='color:red; font-size:28px;text-align: center;'>Wrong email or password </p>";
        }
        ?>
        <div class="cont_login">
            <div class="cont_info_log_sign_up">
                <div class="col_md_login">
                    <div class="cont_ba_opcitiy">

                        <h2>LOGIN</h2>
                        <p>Login to access more products.<br> join us for more</p>
                        <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                    </div>
                </div>
                <div class="col_md_sign_up">
                    <div class="cont_ba_opcitiy">
                        <h2>SIGN UP</h2>


                        <p>Join our Group and be a member <br>of this elite studio</p>

                        <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                    </div>
                </div>
            </div>


            <div class="cont_back_info">
                <div class="cont_img_back_grey">
                    <img src="city.jpg" alt="" />
                </div>

            </div>
            <div class="cont_forms" >
                <div class="cont_img_back_">
                    <img src="city.jpg" alt="" />
                </div>
                <form action="login.php" method="post">
                <div class="cont_form_login">
                    <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&times;</i></a>
                    <h2>LOGIN</h2>
                    <input type="text" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Password" />
                    <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
                </div>
                </form>
                <form action="signup.php" method="post">
                <div class="cont_form_sign_up">
                    <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&times;</i></a>
                    <h2>SIGN UP</h2>

                    <input type="text" name="name" placeholder="Name" required/>
                    <input type="text" name="email" placeholder="Email" required/>
                    <input type="text" name="number" placeholder="PhoneNumber" required/>
                    <input type="password" name="password" placeholder="Password" required/>
                    <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
    function cambiar_login() {
        document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";
        document.querySelector('.cont_form_login').style.display = "block";
        document.querySelector('.cont_form_sign_up').style.opacity = "0";

        setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);

        setTimeout(function(){
            document.querySelector('.cont_form_sign_up').style.display = "none";
        },200);
    }

    function cambiar_sign_up(at) {
        document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
        document.querySelector('.cont_form_sign_up').style.display = "block";
        document.querySelector('.cont_form_login').style.opacity = "0";

        setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
        },100);

        setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
        },400);


    }



    function ocultar_login_sign_up() {

        document.querySelector('.cont_forms').className = "cont_forms";
        document.querySelector('.cont_form_sign_up').style.opacity = "0";
        document.querySelector('.cont_form_login').style.opacity = "0";

        setTimeout(function(){
            document.querySelector('.cont_form_sign_up').style.display = "none";
            document.querySelector('.cont_form_login').style.display = "none";
        },500);

    }

</script>
</body>
</html>