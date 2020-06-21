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

if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION["shopping_cart"])){
        $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
        if(!in_array($_GET['id'], $item_array_id)){
            $count = count($_SESSION['shopping_cart']);
            $item_array = array(
                'item_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name'],
                'item_price' => $_POST['hidden_price'],
                'item_image' => $_POST['hidden_img']
            );
            $_SESSION['shopping_cart'][$count] = $item_array;
        }else {
            echo '<script>alert("Item already added.")</script>';
            echo '<script>window.location="index.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET['id'],
            'item_name' => $_POST['hidden_name'],
            'item_price' => $_POST['hidden_price'],
            'item_image' => $_POST['hidden_img']
        );
        $_SESSION['shopping_cart'] [0] = $item_array;
    }
}

if(isset($_GET['action'])){
    if($_GET['action'] == 'delete'){
        foreach($_SESSION['shopping_cart'] as $keys => $values){
            if($values['item_id'] == $_GET['id']) {
                unset($_SESSION['shopping_cart'][$keys]);
                echo '<script>alert("Item removed")</script>';
                echo '<script>window.location="shop.php"</script>';
            }
        }
    }
}

?>
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
                                            <input type="checkbox" value="<?php echo $rowCat['name'] ?>" id="<?php echo $rowCat['name']?>" name="categoryCheck[]" />
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
                                <?php try {

                                    // Count table items
                                    $total = $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();

                                    // No of items per page
                                    $limit = 6;

                                    // No of pages
                                    $pages = ceil($total / $limit);

                                    // Current page
                                    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                                        'options' => array(
                                            'default'   => 1,
                                            'min_range' => 1,
                                        ),
                                    )));

                                    // Query offset
                                    $offset = ($page - 1)  * $limit; 
                                    $start = $offset + 1;
                                    $end = min(($offset + $limit), $total);

                                    // Back link
                                    $prevlink = ($page > 1) ? '<li><a href="?page=1" title="First page">&laquo;</a></li> <li><a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a></li>' : '<li><a class="disabled">&laquo;</a></li> <li><a class="disabled">&lsaquo;</a></li>';

                                    // Forward link
                                    $nextlink = ($page < $pages) ? '<li><a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a></li> <li><a href="?page=' . $pages . '" title="Last page">&raquo;</a></li>' : '<li><a class="disabled">&rsaquo;</a></li> <li><a class="disabled">&raquo;</a></li>';

                                    // Paging info display
                                    echo ' <ul class="store-pagination">', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </ul>';
                    
                                    // Paged query
                                    $stmt = $pdo->prepare('SELECT `products`.*, `categories`.`name` AS `catName`, `companies`.`name` AS `compName`
                                        FROM `products` 
                                        LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` 
                                        LEFT JOIN `companies` ON `products`.`company_id` = `companies`.`id`
                                        ORDER BY `name` 
                                        LIMIT :limit
                                        OFFSET :offset');

                                    // Parameter bind
                                    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                                    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                                    $stmt->execute();

                                    // Result check
                                    if ($stmt->rowCount() > 0) {
                                        // Result fetch
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        $result = new IteratorIterator($stmt);

                                        // Result display
                                        foreach ($result as $row) {?>
                                            <div class="col-md-4 col-xs-6">
                                            <div class="product">
                                                <div class="product-img">
                                                    <img class="shop-image" src="./img/<?php echo $row['image'] ?>" alt="<?php echo $row['alt']?>" />
                                                </div>
                                                <div class="product-body">
                                                    <form method="post" action="shop.php?action=add&id=<?php echo $row['id']?>">
                                                        <p class="product-category"><?php echo $row['catName'] ?></p>
                                                        <p class="product-category"><?php echo $row['compName'] ?></p>
                                                        <h3 class="product-name"><?php echo $row['name'] ?></h3>
                                                        <h4 class="product-price">$<?php echo $row['price'] ?></h4>
                                                        <input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>" />
                                                        <input type="hidden" name="hidden_price" value="<?php echo $row['price'] ?>" />
                                                        <input type="hidden" name="hidden_img" value="<?php echo $row['image'] ?>" />
                                                        <input type="submit" name="add_to_cart" class="cartBTN" value="Add to cart" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }

                                    } else {
                                        echo '<p>No results could be displayed.</p>';
                                    }

                                    } catch (Exception $e) {
                                    echo '<p>', $e->getMessage(), '</p>';
                                    }?>
                            </div>
                            <!-- /store products -->
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
