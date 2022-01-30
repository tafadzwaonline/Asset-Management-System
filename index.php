<?php
   require('func/config.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Asset Management System</title>
    <link href="front/css/bootstrap.min.css" rel="stylesheet">
    <link href="front/css/font-awesome.min.css" rel="stylesheet">
    <link href="front/css/prettyPhoto.css" rel="stylesheet">
    <link href="front/css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="front/images/ico/download.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="front/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index"></a> -->
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                        
                      
                        <li><a href="#login"><?php if( $user->is_logged_in() ){ echo "My Account"; }else{{ echo "Login"; } } ?></a></li>
                       

                    </ul>
                </div>
            </div>
        </div>
    </header><!--/#header-->

    <section id="main-slider" class="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="carousel-content">
                        <h1>Asset Management System</h1>
                       
                    </div>
                </div>
            </div><!--/.item-->
           </div>
    </section><!--/#contact-->
<section id="login">
        <div class ="container">
            <div class="box">
                <div class="center">
                    <h3>Welcome to Kahwai Asset Management System</h3>&nbsp
                    <p class="lead"><a href="login">Click here to get started !</a></p>
                </div><!--/.center-->
                <div class="big-gap"></div>
            </div>
        </div>
    </section><!--/#login-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y'); ?>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <!-- <img class="pull-right" src="front/images/shapebootstrap.png" alt="ShapeBootstrap" title="ShapeBootstrap"> -->
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="front/js/jquery.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery.isotope.min.js"></script>
    <script src="front/js/jquery.prettyPhoto.js"></script>
    <script src="front/js/main.js"></script>
</body>
</html>
