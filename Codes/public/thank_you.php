<?php require_once('..\kresources\config.php'); ?>
<?php require_once ('..\kresources\cart.php');?>
<!-- might end up triggering an error in the system so if any error happen come and check this area very important note-->
<?php include(TEMPLATE_FRONT.DS.'header.php'); ?>
<?php process_transaction();    ?>
    <!-- Page Content -->
        <div class="container">
            <h1 class="text-center"> Thank You </h1>
    <!-- /.container -->
        </div>

  <?php include(TEMPLATE_FRONT.DS.'footer.php'); ?>