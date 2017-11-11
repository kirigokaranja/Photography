<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <title>Foto | HomePage</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/menuDropdown.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
<section class="banner" role="banner">
    <!--header navigation -->
    <header id="header">
        <div class="header-content clearfix"> <a class="logo" href="#"><img src="images/logo.ai" alt=""></a>
            <nav class="navigation" role="navigation">
                <ul class="primary-nav">
                    <li><a href="#intro">About Us</a></li>
                    <li><a href="#teams">Our Team</a></li>
                    <li><a href="#works">Works</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <?php
                    session_start();
                    include ("connect.php");
                    if(isset($_SESSION['email'])){
                        $id = $_SESSION['email'];
                        ?>
                        <li><a href="gallery.php">Your Gallery</a></li>
                        <div class="dropdown">
                            <li><a href="book.php" class="btn btn-large">Book</a></li>
                            <div class="dropdown-content">
                                <a href="notifications.php">Notifications</a>
                                <a href="personal.php">Personal Details</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </div>

                        <?php
                    }else{
                        ?>
                        <a href="log.php" class="btn btn-large">Sign In</a>
                    <?php } ?>
                </ul>
            </nav>
            <a href="#" class="nav-toggle">Menu<span></span></a> </div>
    </header>
    <!--header navigation -->
    <!-- banner text -->
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="banner-text text-center">
                <h1>Foto</h1>
                <p>Your Kenyan Photography Solution</p>
                <nav role="navigation"> <a href="#intro" class="banner-btn"><img src="images/down-arrow.png" alt=""></a></nav>
            </div>
            <!-- banner text -->
        </div>
    </div>
</section>
<!-- header section -->
<!-- about section -->
<section id="intro" class="section intro no-padding">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="col-md-6">
                            <div class="avatar"> <img src="images/nitish-meena-58136.jpg" alt="" class="img-responsive"> </div>
                        </div>
                        <div class="col-md-6">
                            <blockquote>
                                <h1>Upload Your Own Photos</h1>
                                <p>Have memorable moments that require editing? Then, Foto is your best friend</p>
                                <p>We house the best professional photographers around town. Your photos will be masterfully curated by our in house team and resubmitted to you. And this will be done at no fee.</p>
                                <p> The catch, there is none!!!</p>
                            </blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-6">
                            <div class="avatar"> <img src="images/mario-calvo-1245.jpg" alt="" class="img-responsive"> </div>
                        </div>
                        <div class="col-md-6">
                            <blockquote>
                                <h1>Book a Pro!</h1>
                                <p>Want a pro? Need a pro?</p>
                                <p>We got you covered.</p>
                                <p>We've got photographers skilled at different types of occasions. Be it a wedding, birthday party, family portraits
                                    or office party (the list is endless), you can always count on us to deliver. We will shoot, edit and publish your moments for you</p>
                                <p>Be sure not to forget to hit the book button once you have signed in!</p>
                            </blockquote>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- about section -->
<!-- our team section -->
<section id="teams" class="section teams">
    <div class="container">
        <div class="row">
            <!-- team member 1 -->
            <div class="col-md-4 col-sm-8">
                <div class="person"><a href=""><img src="images/IMG_-erpkx2.jpg" alt="" class="img-responsive">
                        <div class="person-content">
                            <h4>Githinji Wanjohi</h4>
                            <h5 class="role">The Mastermind</h5>
                            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
                        </div></a>
                    <ul class="social-icons clearfix">
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                        <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                    </ul><br>
                    <form method="post" action="specific_book.php">
                        <input type="hidden" value="Githinji Wanjohi" name="pname">
                        <button type="submit" class="btn btn-large">Book</button>
                    </form><br>
                    <form method="post" action="portfolio.php">
                        <input type="hidden" value="4" name="pname">
                        <button type="submit" class="btn btn-large" style="background-color: #1157e6;">Gallery</button>
                    </form>
                </div>
            </div>
            <!-- team member 1 -->
            <!-- team member 2 -->
            <div class="col-md-4 col-sm-8">
                <div class="person"><a href=""> <img src="images/cameron-kirby-179439.jpg"    alt="" class="img-responsive">
                        <div class="person-content">
                            <h4>Sharon Karanja</h4>
                            <h5 class="role">Creative head</h5>
                            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        </div></a>
                    <ul class="social-icons clearfix">
                        <li><a href="#" class=""><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-linkedin"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-google-plus"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-dribbble"></span></a></li>
                    </ul><br>
                    <form method="post" action="specific_book.php">
                        <input type="hidden" value="Sharon Karanja" name="pname">
                        <button type="submit" class="btn btn-large">Book</button>
                    </form><br>
                    <form method="post" action="portfolio.php">
                        <input type="hidden" value="2" name="pname">
                        <button type="submit" class="btn btn-large" style="background-color: #1157e6;">Gallery</button>
                    </form>
                </div>
            </div>
            <!-- team member 2 -->
            <!-- team member 3 -->
            <div class="col-md-4 col-sm-8">
                <div class="person"><a href=""><img src="images/team-3.png" alt="" class="img-responsive">
                        <div class="person-content">
                            <h4>Jonathan Ive</h4>
                            <h5 class="role">Master Editor</h5>
                            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        </div></a>
                    <ul class="social-icons clearfix">
                        <li><a href="#" class=""><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-linkedin"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-google-plus"></span></a></li>
                        <li><a href="#" class=""><span class="fa fa-dribbble"></span></a></li>
                    </ul><br>
                    <form method="post" action="specific_book.php">
                        <input type="hidden" value="Jonathan Ive" name="pname">
                        <button type="submit" class="btn btn-large">Book</button>
                    </form><br>
                    <form method="post" action="portfolio.php">
                        <input type="hidden" value="1" name="pname">
                        <button type="submit" class="btn btn-large" style="background-color: #1157e6;">Gallery</button>
                    </form>
                </div>
            </div>
            <!-- team member 1 -->
        </div>
    </div>
</section>
<!-- our team section -->

<!-- work section -->
<section id="works" class="works section no-padding">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/IMG_2371.jpg" class="work-box"> <img src="images/IMG_2371.jpg" alt="">
                    <div class="overlay">
                        <div class="overlay-caption">
                            <p><span class="icon icon-magnifying-glass"></span></p>
                        </div>
                    </div>
                    <!-- overlay -->
                </a> </div>
            <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/IMG_3032.jpg" class="work-box"> <img src="images/IMG_3032.jpg" alt="">
                    <div class="overlay">
                        <div class="overlay-caption">
                            <p><span class="icon icon-magnifying-glass"></span></p>
                        </div>
                    </div>
                    <!-- overlay -->
                </a> </div>
            <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/IMG_2997-2.jpg" class="work-box"> <img src="images/IMG_2997-2.jpg" alt="">
                    <div class="overlay">
                        <div class="overlay-caption">
                            <p><span class="icon icon-magnifying-glass"></span></p>
                        </div>
                    </div>
                    <!-- overlay -->
                </a> </div>
            <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/IMG_3119.jpg" class="work-box"> <img src="images/IMG_3119.jpg" alt="">
                    <div class="overlay">
                        <div class="overlay-caption">
                            <p><span class="icon icon-magnifying-glass"></span></p>
                        </div>
                    </div>
                    <!-- overlay -->
                </a> </div>
            <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/IMG_2571.jpg" class="work-box"> <img src="images/IMG_2571.jpg" alt="">
                    <div class="overlay">
                        <div class="overlay-caption">
                            <p><span class="icon icon-magnifying-glass"></span></p>
                        </div>
                    </div>
                    <!-- overlay -->
                </a> </div>
            <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="images/IMG_2620.jpg" class="work-box"> <img src="images/IMG_2620.jpg" alt="">
                    <div class="overlay">
                        <div class="overlay-caption">
                            <p><span class="icon icon-magnifying-glass"></span></p>
                        </div>
                    </div>
                    <!-- overlay -->
                </a> </div>
        </div>
    </div>
</section>
<!-- work section -->

<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="col-md-12">
                            <blockquote>
                                <h1>"Jonathan is truly an outstanding photographer (and wonderful person) with an almost mystical ability to capture the true nature of people and events. I'd recommend him to anyone! " </h1>
                                <p> - Laurie H.</p>
                            </blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12">
                            <blockquote>
                                <h1>"Your photos are STUNNING! Thank you so, so much. They are all just spectacular and a gift we will treasure always. We are really grateful. You are just amazing. We can't thank you enough for sharing your craft with us. Thank you! " </h1>
                                <p>- The Goler Family.</p>
                            </blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12">
                            <blockquote>
                                <h1>""We have been blown away by how gorgeous the photos of our wedding (and engagement shoot) are and we wanted to thank you for doing such an amazing job.

                                    They are everything we imagined and more! Not only did you go above and beyond the call of duty before and on the day but you and your assistant made us feel so comfortable with your fun personality!

                                    We are very lucky to have had you as our photographer. Thank you!"" </h1>
                                <p>Chebarbar Chebet, Global Corporate Inc</p>
                            </blockquote>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12">
                            <blockquote>
                                <h1>"The photos are great and capture the personality and spirit of the subjects. My son (the bat mitzvah girl's brother) does not like to pose for pictures, but in the photos of him, he looks natural and happy and looks like he is having fun. Jeff is also really fun to work with." </h1>
                                <p>The Meyer Family</p>
                            </blockquote>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials section -->
<!-- Get a quote section -->
<section  class="section quote">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h3>Want to upload a photo? Hit the Green Button!</h3>
            <a href="upload2.php" class="btn btn-large">Upload Photo</a> </div>
    </div>
</section>
<!-- Get a quote section -->
<!-- Footer section -->
<footer class="footer" id="contact">
    <div class="footer-top section">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-6">
                    <form method="post" action="contact.php" >
                        <fieldset>
                            <h4 style="color: white;">CONTACT US</h4>

                            <input type="text" name="name" style="height: 50px; border-color: transparent; border-bottom-color: #2d3033;font-size: large; width: 60%;background-color: transparent;color: white;" placeholder="Your Name"><br><br>
                            <input type="email" name="email" style="height: 50px; border-color: transparent; border-bottom-color: #2d3033;font-size: large; width: 60%;background-color: transparent;color: white;" placeholder="Your Email"><br><br>
                            <input type="text" name="message" style="height: 100px; border-color: transparent; border-bottom-color: #2d3033;font-size: large; width: 60%;background-color: transparent;color: white;" placeholder="Your Message"><br><br>
                            <button type="submit" class="send" style="font-size: x-large; border-radius: 6px; border-color: #1157e6;background-color: transparent;padding: 10px 12px">Send Message</button>
                        </fieldset>
                    </form>
                </div>
                <div class="footer-col col-md-3">
                    <h5>Services We Offer</h5>
                    <p>
                    <ul>
                        <li><a href="#">Wedding photography</a></li>
                        <li><a href="#">Family Portraits</a></li>
                        <li><a href="#">Videography</a></li>
                        <li><a href="#">Photo Editing</a></li>
                    </ul>
                    </p>
                </div>
                <div class="footer-col col-md-3">
                    <h5>Share with Love</h5>
                    <ul class="footer-share">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                    <h5>Foto Kenya</h5>
                    <p>Copyright © 2017 Foto. All Rights Reserved. <i class="fa fa-heart pulse"></i></p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer top -->

</footer>
<!-- Footer section -->
<!-- JS FILES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/main.js"></script>
<script  src="js/hamburger.js"></script>
</body>
</html>
