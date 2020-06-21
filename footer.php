<?php

if(isset($_POST['message'])){
    $message = $_POST['content'];
    $query = "INSERT INTO messages (message)
                VALUES (:msg)";
    $prepare = $pdo->prepare($query);
    $prepare->bindParam(':msg', $message, PDO::PARAM_STR);
    $execute = $prepare->execute();
}

?>
<!-- contact form -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Send a message to our staff!</p>
                    <form action="" method="post">
                        <input class="input" type="text" name="content" placeholder="Enter Your Message">
                        <input type="submit" class="newsletter-btn" name="message" value="Send"/>
                    </form>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /contact form -->


<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Navigation</h3>
                        <ul class="footer-links">
                            <?php foreach($dataNav as $rowNav){ ?>
                                <li><a href="<?php echo $path . $rowNav['href']?>"><?php echo $rowNav['name']?></a></li>
                            <?php   } ?>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Account</h3>
                        <ul class="footer-links">
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
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
                <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->