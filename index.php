<?php

ob_start();
session_start();

require('config.php');
require('connection.php');

?>
		<?php require_once('header.php'); ?>
	
		<main>
			<?php require_once('main.php'); ?>
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
