<?php 
    $laptopQuery = "SELECT  `products`.`name` AS pName, `products`.`price` AS pPrice, `products`.`alt` AS pAlt, `products`.`image` AS pImage, `categories`.`name` 
                    FROM `products`
                    LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                    WHERE `products`.`price` < 1000 AND `categories`.`name` LIKE 'Laptops'
                    ORDER BY price ASC LIMIT 4;";
    $execLaptop = $pdo->query($laptopQuery);
    $dataLaptop = $execLaptop -> fetchAll(PDO::FETCH_ASSOC);
    $execLaptop -> closeCursor();

    $miceQuery = "SELECT  `products`.`name` AS pName, `products`.`price` AS pPrice, `products`.`alt` AS pAlt, `products`.`image` AS pImage, `categories`.`name` 
                    FROM `products`
                    LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                    WHERE `products`.`price` < 50 AND `categories`.`name` LIKE 'Mice'
                    ORDER BY price ASC LIMIT 4;";
    $execMice = $pdo->query($miceQuery);
    $dataMice = $execMice -> fetchAll(PDO::FETCH_ASSOC);
    $execMice -> closeCursor();

    $cameraQuery = "SELECT  `products`.`name` AS pName, `products`.`price` AS pPrice, `products`.`alt` AS pAlt, `products`.`image` AS pImage, `categories`.`name` 
                    FROM `products`
                    LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id`
                    WHERE `products`.`price` < 500 AND `categories`.`name` LIKE 'Cameras'
                    ORDER BY price ASC LIMIT 4;";
    $execCamera = $pdo->query($cameraQuery);
    $dataCamera = $execCamera -> fetchAll(PDO::FETCH_ASSOC);
    $execCamera -> closeCursor();
?>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 class="homeP">Maintaining technology standards for thousands since 1998. Highest quality equipment, ranging from laptops, cameras, mice,all tech accesories imaginable.</h3>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Laptops under $1000</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <div>
                        <!-- product widget -->
                        <?php foreach($dataLaptop as $laptopRow){?>
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="img/<?php echo $laptopRow['pImage']?>" alt="<?php echo $laptopRow['pAlt']?>" />
                                </div>
                                <div class="product-body">
                                    <h3 class="product-name"><?php echo $laptopRow['pName']?></h3>
                                    <h4 class="product-price">$<?php echo $laptopRow['pPrice']?></h4>
                                    <h5>
                                        <a class="cartAdd">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add to Cart</span>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- /product widget -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Mice under $50</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                        <?php foreach($dataMice as $miceRow){?>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="img/<?php echo $miceRow['pImage']?>" alt="<?php echo $miceRow['pAlt']?>" />
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><?php echo $miceRow['pName']?></h3>
                                        <h4 class="product-price">$<?php echo $miceRow['pPrice']?></h4>
                                        <h5>
                                            <a class="cartAdd">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">Cameras under $500</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
                        <!-- product widget -->
                        <?php foreach($dataCamera as $cameraRow){?>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="img/<?php echo $cameraRow['pImage']?>" alt="<?php echo $cameraRow['pAlt']?>" />
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><?php echo $cameraRow['pName']?></h3>
                                        <h4 class="product-price">$<?php echo $cameraRow['pPrice']?></h4>
                                        <h5>
                                            <a class="cartAdd">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                        <?php } ?>
                        <!-- /product widget -->

                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

