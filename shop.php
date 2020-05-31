<?php

ob_start();
session_start();

require('config.php');
require('connection.php');

$catQuery = "SELECT * FROM `categories`";
$execCat = $pdo->query($catQuery);
$dataCat = $execCat -> fetchAll();

$compQuery = "SELECT * FROM `companies`";
$execComp = $pdo->query($compQuery);
$dataComp = $execComp -> fetchAll();

$productQuery = "SELECT `products`.*, `categories`.`name` as `catName`, `companies`.`name` as `compName`
                FROM `products` 
                LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` 
                LEFT JOIN `companies` ON `products`.`company_id` = `companies`.`id`;";
$execProduct = $pdo->query($productQuery);
$dataProduct = $execProduct -> fetchAll();


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
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- ASIDE -->
                        <div id="aside" class="col-md-3">
                            <!-- aside Widget -->
                            <div class="aside">
                                <h3 class="aside-title">Categories</h3>
                                <div class="checkbox-filter">
                                
                                    <?php foreach($dataCat as $rowCat){ ?>
                                        <div class="input-checkbox">
                                            <input type="checkbox" id="<?php echo $rowCat['name']?>">
                                            <label for="<?php echo $rowCat['name']?>">
                                                <span></span>
                                                <?php echo $rowCat['name'] ?>
                                            </label>
                                        </div>
                                    <?php   } ?>

                                </div>
                            </div>
                            <!-- /aside Widget -->

                            <!-- aside Widget -->
                            <div class="aside">
                                <h3 class="aside-title">Price</h3>
                                <div class="price-filter">
                                    <div id="price-slider"></div>
                                    <div class="input-number price-min">
                                        <input id="price-min" type="number">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                    <span>-</span>
                                    <div class="input-number price-max">
                                        <input id="price-max" type="number">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /aside Widget -->

                            <!-- aside Widget -->
                            <div class="aside">
                                <h3 class="aside-title">Brand</h3>
                                <div class="checkbox-filter">

                                    <?php foreach($dataComp as $rowComp){ ?>
                                        <div class="input-checkbox">
                                            <input type="checkbox" id="<?php echo $rowComp['name']?>">
                                            <label for="<?php echo $rowComp['name']?>">
                                                <span></span>
                                                <?php echo $rowComp['name'] ?>
                                            </label>
                                        </div>
                                    <?php   } ?>

                                </div>
                            </div>
                            <!-- /aside Widget -->
                        </div>
                        <!-- /ASIDE -->

                        <!-- STORE -->
                        <div id="store" class="col-md-9">

                            <!-- store products -->
                            <div class="row">

                                <?php foreach($dataProduct as $rowProduct){ ?>
                                    <div class="col-md-4 col-xs-6">
                                        <div class="product">
                                            <div class="product-img">
                                                <img class="shop-image" src="./img/<?php echo $rowProduct['image'] ?>" alt="<?php echo $rowProduct['alt']?>" />
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo $rowProduct['catName'] ?></p>
                                                <p class="product-category"><?php echo $rowProduct['compName'] ?></p>
                                                <h3 class="product-name"><?php echo $rowProduct['name'] ?></h3>
                                                <h4 class="product-price">$<?php echo $rowProduct['price'] ?></h4>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- /store products -->

                            <!-- store bottom filter -->
                            <div class="store-filter clearfix">
                                <span class="store-qty">Showing 20-100 products</span>
                                <ul class="store-pagination">
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- /store bottom filter -->
                        </div>
                        <!-- /STORE -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /SECTION -->
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
