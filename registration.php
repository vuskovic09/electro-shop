<?php
ob_start();
session_start();

require('config.php');
require('connection.php');

$userQuery = "SELECT `username`, `email` FROM `users`";
$execUser = $pdo->query($userQuery);
$dataUser = $execUser -> fetchAll();

if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) {
    
    header('Location: '.$path);
    exit;

} else if(isset($_POST['btn-register'])){

    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confirm-pass'];

    $regexName = "/^[A-Z][a-z]{2,19}$/";
    $regexPass = "/^.{4,50}$/";

    $errors = [];

    //VALIDATION
    foreach ($dataUser as $row) {
        if($name == $row['username']){
            $errors[] = "Username already exists.";
        }
        
        if ($email == $row['email']){
            $errors[] = "Email already in use.";
        }
    }
    
    if(!preg_match($regexName, $name)){
        $errors[] = "Name not ok";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email not ok";
    }

    if(!preg_match($regexPass, $pass)){
        $errors[] = "Password not ok";
    }

    if($pass != $confirmPass){
        $errors[] = "Passwords do not match";
    }

    //INSERT
    if(count($errors) == 0) {
        $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`, `created`) VALUES (NULL, :username, :email, :password, '', current_timestamp())";
        
        $prepare = $pdo->prepare($query);
        $prepare->bindParam(":username", $name);
        $prepare->bindParam(":email", $email);

        $pass = md5($pass);
        $prepare->bindParam(":password", $pass);

        try {
            $execute = $prepare->execute();
            $_SESSION['success'] = "Successful registration!";

            session_start();

            $_SESSION['loggedUserName'] = $username;
            $_SESSION['loggedUserId'] = $user['id'];
            $_SESSION['loggedUserRole'] = $user['role'];
            header('Location: '.$path);
            exit;
        } catch(PDOException $ex) {            
            $_SESSION['errors'] = ["Email already registered."];
            var_dump($_SESSION['errors']);
        }
    } else if(count($errors) > 0) { 
        foreach($errors as $error) {?>
        <div class="errors">
            <?php echo($error); ?>
        </div>
    <?php
        }
    } else {
        $_SESSION['errors'] = $errors;
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
                        <div class="content register">
                        <h1 class="article-title">REGISTER</h1>
                        <div class="container reg">
                            <div class="article">
                                <form action="" method="POST" onSubmit="return check();">
                                    <label><input type="text" name="username" placeholder="Username" /></label>
                                    <label><input type="text" name="email" placeholder="E-Mail" /></label>
                                    <label><input type="password" name="pass" placeholder="Password" /></label>
                                    <label><input type="password" name="confirm-pass" placeholder="Confirm Password" /></label>
                                    <label><input type="submit" name="btn-register" value="Register" />
                                </form>
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

<!-- <script>
    function check(){
        let name = document.querySelector("input[name='username']").value;
        let regex = /^[A-Z][a-z]{2,19}$/;

        if(!regex.test(name)) {
        alert("Name invalid");
        return false;
        }

        let email = document.querySelector("input[name='email']").value;
        let regexEmail = /^\w+[.\d\w]*\@[a-z]{2,10}(\.[a-z]{2,3})+$/;

        if(!email.match(regexEmail)) {
        alert("Email not ok!");
        return false;
        }

        let regexPass = /^.{4,50}$/; 

        let pass = document.querySelector("input[name='pass']").value;

        if(!pass.match(regexPass)) {
        alert("Pass not ok!");
        return false;
        }

        let confirmPass = document.querySelector("input[name='confirm-pass']").value;


        if(pass != confirmPass) {
        alert("Passwords don't match!");
        return false;
        }

        return true;
    }
</script> -->