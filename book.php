
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Book a photographer to cover an event for you ">
    <meta name="author" content=" Foto">
    <link rel="icon" type="image/ico" href="favicon.ico" />

    <title>Book A Photograper</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/book.css">
    <link rel="stylesheet" href="css/book1.css">

    <!--Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <script src="dist/sweetalert.min.js"></script>
    <style>
        p{
            margin-top: -70px;
            font-family: 'Playfair Display', serif;
            font-size: 40px;
            font-weight: 400;
            line-height: 52px;
            letter-spacing: 0.01em;
        }
        .right-side .cta .btn1{
            padding: 13px 25px;
            border: none;
            color: #fff;
            display: inline-block;
            font-family: 'lato', sans-serif;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.12em;
            border-radius: 24px;
            background: #1157e6;
        }
        .right-side .cta .btn1:hover {
            -webkit-transition: 0.2s ease-in;
            -o-transition: 0.2s ease-in;
            transition: 0.2s ease-in;
            background: black;
        }
    </style>
</head>

<body>
<?php

session_start();
include ("connect.php");

if(isset($_SESSION['email'])){
$id = $_SESSION['email'];

$s = "SELECT * FROM customer WHERE email = '$id'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");


while($row = mysqli_fetch_array($res)) {
$fname = $row['firstName'];
$sname = $row['surname'];
$custid = $row['custID'];


?>
<div id="main-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-side">
                <header>
                    <h3 style="color: #1157e6;"> <?php echo $fname." ".$sname;?>,</h3>
                    <br> <span>Need a photographer?</span>
                    <h3>Book Us Now<br>While You Still Can</h3>
                </header>
            </div>
            <form action="book_action.php" method="post">
                <div class="col-md-6 right-side" style="margin-top: -10%">
                    <?php
                    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

                    // error message incase username or password are incorrect

                    if(strpos($url,'error=fail')){
                        echo "<p style='color:red; font-size:20px;text-align: center;'>An Error Ocurred</p>";
                    }elseif(strpos($url,'message=success')){
                        echo "<p class='heading' style='color:#24c315;text-align: center;'>Booking Successful </p>";
                    }
                    ?>
                    <input type="hidden" name="custid" value="<?php echo $custid;?>">
                    <span class="input input--hoshi"><?php } ?>
                        <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="date" id="date" name="date"  min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+3 months')); ?>" required />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="date">
            <span class="input__label-content input__label-content--hoshi">Date</span>
          </label>
        </span>
                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="text" id="location" name="location" required  />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="location">
            <span class="input__label-content input__label-content--hoshi">Location</span>
          </label>
        </span>
                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">

                        <?php
                        $sql=mysqli_query($db, "SELECT * FROM photographer" );
                        if(mysqli_num_rows($sql)){

                            ?>

                            <select name="photographer"  class="input__field input__field--hoshi" id="photographer" required style="font-size:large; outline:none">
                   <option value="choose">Choose a photographer</option>
                                <?php
                                while($rs=mysqli_fetch_array($sql)){
                                ?>
                                <option value="<?php echo $rs['firstName']. " " . $rs['surname']; ?>"><?php echo $rs['firstName']. " " . $rs['surname'];} ?></option></select>
                            <?php

                        }

                        ?>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="photographer" >
            <span class="input__label-content input__label-content--hoshi">Photographer</span>
          </label>
        </span>

                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
                        <?php
                        $sql=mysqli_query($db, "SELECT * FROM genre" );
                        if(mysqli_num_rows($sql)){

                        ?>
                    <select name="genre"  class="input__field input__field--hoshi" id="genre"  required style="font-size:large; outline:none">
                        <option value="choose">Choose a Genre</option>
                        <?php
                        while($rs=mysqli_fetch_array($sql)){
                        ?>
                        <option value="<?php echo $rs['name']; ?>"><?php echo $rs['name'];} ?></option></select>
                            <?php

                        }

                        ?>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="genre" >
            <span class="input__label-content input__label-content--hoshi">Genre</span>
          </label>
        </span>

                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="text" name="description" id="description"  required/>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="description">
            <span class="input__label-content input__label-content--hoshi">Description</span>
          </label>
        </span>

                    <div class="cta">
                        <button class="btn btn-primary pull-left">
                            Book Now
                        </button> &emsp;&emsp;
                        <button class="btn1" onclick="window.location.href='index.php'">
                            Back
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div> <!-- end #main-wrapper -->

    <!-- Scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/classie.js"></script>
    <script>
        (function() {
            // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
            if (!String.prototype.trim) {
                (function() {
                    // Make sure we trim BOM and NBSP
                    var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                    String.prototype.trim = function() {
                        return this.replace(rtrim, '');
                    };
                })();
            }

            [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
                // in case the input is already filled..
                if( inputEl.value.trim() !== '' ) {
                    classie.add( inputEl.parentNode, 'input--filled' );
                }

                // events:
                inputEl.addEventListener( 'focus', onInputFocus );
                inputEl.addEventListener( 'blur', onInputBlur );
            } );

            function onInputFocus( ev ) {
                classie.add( ev.target.parentNode, 'input--filled' );
            }

            function onInputBlur( ev ) {
                if( ev.target.value.trim() === '' ) {
                    classie.remove( ev.target.parentNode, 'input--filled' );
                }
            }
        })();
    </script>
    <?php
    }else{
        $_SESSION['url'] = $_SERVER['REQUEST_URI'];
        ?>
        <script>

            swal({
                    title: "Login Required!",
                    text: "Please login to access booking feature",
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Login",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        location.href = "log.php"
                    } else {
                        location.href = "index.php"
                    }
                });
        </script>
    <?php }?>
</body>
</html>
