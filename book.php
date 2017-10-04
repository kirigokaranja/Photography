
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
<style>
    p{
        margin-top: -70px;
        font-family: 'Playfair Display', serif;
        font-size: 40px;
        font-weight: 400;
        line-height: 52px;
        letter-spacing: 0.01em;
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
$name = $row['name'];
$custid = $row['custID'];


?>
<div id="main-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-side">
                <header>
                    <h3 style="color: #1157e6;"> <?php echo $name;?>,</h3>
                   <br> <span>Need a photographer?</span>
                    <h3>Book Us Now<br>While You Still Can</h3>
                </header>
            </div>
            <form action="book_action.php" method="post">
                <div class="col-md-6 right-side">
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
                    <select name="photographer"  class="input__field input__field--hoshi" id="photographer" required style="font-size:large; outline:none">
                        <option value="choose"> Choose a Photographer</option>
                        <option value="Sarah Courtney">Sarah Courtney</option>
                        <option value="Richard Macey">Richard Macey</option>
                        <option value="Jonny Sullens">Jonny Sullens</option>
                        <option value="Ashley Greene">Ashley Greene</option>
                        <option value="Hannah Benson">Hannah Benson</option>
                        <option value="Jonathan Ive">Jonathan Ive</option>
                        <option value="others">Others</option>
                    </select>
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" for="photographer" >
            <span class="input__label-content input__label-content--hoshi">Photographer</span>
          </label>
        </span>
                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
                    <select name="genre"  class="input__field input__field--hoshi" id="genre"  required style="font-size:large; outline:none">
                        <option value="choose">Choose a Genre</option>
                        <option value="landscape">Landscape</option>
                        <option value="portrait">Portrait</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="family">Family</option>
                        <option value="decor">Decor</option>
                        <option value="wedding">Wedding</option>
                        <option value="fashion">Fashion</option>
                        <option value="food">Food</option>
                        <option value="event">Event</option>
                        <option value="baby">Baby</option>
                        <option value="others">Others</option>
                    </select>
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

        session_destroy();


        ?>
        <br><br>
        <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
        <p style="text-align: center"><a href="signin.php" style="color: red; font-size: 30px; "> Login</a></p>
    <?php } ?>
</body>
</html>
