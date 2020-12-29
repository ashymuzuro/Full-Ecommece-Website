<?php require_once('..\..\kresources\config.php'); ?>
<?php include(TEMPLATE_BACK.'\header.php');  ?>
<?php  if(!isset($_SESSION['username'])){   
    redirect('..\..\public');
}
          
      ?>    
          
           <div id="page-wrapper">
           
            <div class="container-fluid">

            
            <?php 
               if($_SERVER['REQUEST_URI'] == "/Ecommerce/public/admin/" || $_SERVER['REQUEST_URI'] == "/Ecommerce/public/admin/index.php")
                   
               {
                   include(TEMPLATE_BACK.'\admin_content.php');
               }
                //orders******************************************************************************
                if(isset($_GET['orders'])){
                    include(TEMPLATE_BACK.'\orders.php'); 
                }
                
                
                 //products****************************************************************************
                if(isset($_GET['products'])){
                    include(TEMPLATE_BACK.'\products.php'); 
                }
                
                //categories***************************************************************************
                 
                if(isset($_GET['categories'])){
                    include(TEMPLATE_BACK.'\categories.php'); 
                }
                //adding products**********************************************************************
                 
                if(isset($_GET['add_product'])){
                    include(TEMPLATE_BACK.'\add_product.php'); 
                }
                //users*******************************************************************************
                 if(isset($_GET['users'])){
                    include(TEMPLATE_BACK.'\users.php'); 
                }
                
                  //editting the products*******************************************************************************
                 if(isset($_GET['edit_product'])){
                    include(TEMPLATE_BACK.'\edit_product.php'); 
                }
                
                   //Adding the Users*******************************************************************************
                 if(isset($_GET['add_user'])){
                    include(TEMPLATE_BACK.'\add_user.php'); 
                }
                
                     //Editting the Users*******************************************************************************
                 if(isset($_GET['edit_user'])){
                    include(TEMPLATE_BACK.'\edit_user.php'); 
                }
              
                  //New Slides*******************************************************************************
                 if(isset($_GET['slides'])){
                    include(TEMPLATE_BACK . "\slides.php");
                }
         
                  //Deleting Slides*******************************************************************************
                 if(isset($_GET['delete_slide_id'])){
                    include(TEMPLATE_BACK . "\delete_slide.php");
                }




                 ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK.'\footer.php');  ?>
   