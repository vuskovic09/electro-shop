<?php

ob_start();
session_start();

require('config.php');
require('connection.php');

$stmt = $pdo->prepare('SELECT `products`.*, `categories`.`name` AS `catName`, `companies`.`name` AS `compName`
                        FROM `products` 
                        LEFT JOIN `categories` ON `products`.`category_id` = `categories`.`id` 
                        LEFT JOIN `companies` ON `products`.`company_id` = `companies`.`id`
                        ORDER BY `name`');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$products = new IteratorIterator($stmt);

if(isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM products WHERE id = :id";
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $id = $_REQUEST['id'];
    $result->execute();
    unset($result);

    header('Location: '. $path . '/adminPanel.php');
    exit;
}
?>
        <?php require_once('header.php'); ?>
        <main>
            <div class="container">
                <table class="responstable">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Company</th>
                        <th>Category</th>
                        <th>Remove product</th>
                    </tr>
                    <?php foreach ($products as $row) { ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td>$<?php echo $row['price']?></td>
                        <td><?php echo $row['compName']?></td>
                        <td><?php echo $row['catName']?></td>
                        <td>
                            <form method="POST" action=""><input type="hidden" name="id" value= <?php echo $row['id'] ?>/><input type="submit" class="delButton" value="Delete Product" name="delete" /></form>
                        </td>
                    </tr>
                    <?php } ?>                
                </table>
            </div>
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
