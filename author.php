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
					<div class="author col-md-6">
                    <p id="authorText">O meni: Rođen sam 5.6.1998. godine u Beogradu i osnovno obrazovanje sam stekao u OOŠ "Vladislav Ribnikar". Završio sam Treću beogradsku gimnaziju u Beogradu i trenutno studiram na Visokoj ICT školi na smeru Internet tehnologije pod brojem indeksa 143/17.</p>
					</div>
					<div class="author col-md-6">
                        <img src="img/author.jpg" alt="Author Image" />
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
