<?php

ob_start();
session_start();

require('config.php');
require('connection.php');
?>
		<?php require_once('header.php'); ?>

		<main>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="profileInfo">Username: <?php echo $_SESSION['loggedUserName'] ?></h2>
					</div>
					<div class="col-md-6">
						<h3 class="profileInfo">User E-Mail: <?php echo $_SESSION['loggedUserEmail'] ?></h3>
					</div>	
					<div class="col-md-6">
						<h3 class="profileInfo">User Join Date: <?php echo $_SESSION['loggedUserCreated'] ?></h3>
					</div>
				</div>
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
