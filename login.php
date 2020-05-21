<?php 

ob_start();
session_start();

require('config.php');
require('connection.php');

if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) {
    header('Location: '.$path);
    exit;
}

if(isset($_POST['btn-login'])) {

    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

    if($user !== "" && $pass !== "") {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();
        
        if(md5($pass) === $user['password']){
            session_start();

            $_SESSION['loggedUserName'] = $user['username'];
            $_SESSION['loggedUserId'] = $user['id'];
            $_SESSION['loggedUserRole'] = $user['role'];

            header('Location: '.$path);
            exit;
        }
    }
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<?php require_once('header.php'); ?>
	
		<main>
            <!-- SECTION -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="content login">
                            <h1 class="article-title">LOGIN</h1>
                            <div class="container reg">
                                <div class="article">
                                    <form action="" method="POST">
                                        <label><input type="text" name="username" placeholder="Username" /></label>
                                        <label><input type="password" name="pass" placeholder="Password" /></label>
                                        <label><input type="submit" name="btn-login" value="Login" /></label>
                                    </form> 
                                    <p>
                                        <a href="<?php echo $path; ?>/registration.php">Not registered?</a>
                                    </p>
                                </div>
                            </div>      
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /SECTION -->

            <!-- NEWSLETTER -->
            <div id="newsletter" class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="newsletter">
                                <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                                <form>
                                    <input class="input" type="email" placeholder="Enter Your Email">
                                    <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                                </form>
                                <ul class="newsletter-follow">
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /NEWSLETTER -->
        </main>
		
		<?php require_once('footer.php'); ?>
		

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>