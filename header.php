<?php
    require_once('config.php');
    require_once('connection.php');
    $navQuery = "SELECT * FROM `navigation`";
    $execNav = $pdo->query($navQuery);
    $dataNav = $execNav -> fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Electronic shop" /> 
        <meta name="author" content="mailto: filip.vuskovic.143.17@ict.edu.rs" /> 
        <meta name="language" content="English" />
        <meta name="keywords" content="laptops, phones, mice, electronics, webstore, webshop" />
        <meta name="robots" content="index, follow" />
        <meta name="copyright" content="Filip Vuskovic">
        <link rel="icon" type="image/png" href="img/favicon.ico" />

		<title>Electro</title>

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
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            
            <ul class="header-links pull-right">
                <?php 
                if(isset($_SESSION['loggedUserName']) && !empty($_SESSION['loggedUserName'])) { ?>
                    <li><a href="<?php echo $path; ?>/profile.php"><?php print_r($_SESSION['loggedUserName']); ?></a></li>
                    <?php if($_SESSION['loggedUserRole'] == 0){?> 
                    <li><a href="<?php echo $path; ?>/adminPanel.php">Admin Panel</a></li>
                    <?php }; ?>
                    <li><a href="<?php echo $path; ?>/logout.php">LOGOUT</a></li>
                <?php
                } else { ?>
                    <li><a href="<?php echo $path; ?>/login.php">Login</a></li>
                    <li><a href="<?php echo $path; ?>/registration.php">Register</a></li>
                    </ul> 
                <?php } ?>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="index.php" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->


                <!-- ACCOUNT -->
                <div class="col-md-9 clearfix">
                    <div class="header-ctn">

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <?php if(!empty($_SESSION['shopping_cart'])){
                                        $total = 0;
                                        foreach($_SESSION['shopping_cart'] as $keys => $values){?>
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="img/<?php echo $values['item_image']?>" alt="<?php echo $values['item_name']?>">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><?php echo $values['item_name']?></h3>
                                                    <h4 class="product-price">$<?php echo $values['item_price']?></h4>
                                                </div>
                                                <a href="shop.php?action=delete&id=<?php echo $values['item_id']?>" class="delete"><i class="fa fa-close"></i></a>
                                            </div>
                                    <?php $total = $total + $values['item_price']; }} ?>
                                    
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $<?php echo number_format($total, 2); ?></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <?php foreach($dataNav as $rowNav){ ?>
                    <li><a href="<?php echo $path . $rowNav['href']?>"><?php echo $rowNav['name']?></a></li>
                <?php   } ?>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->