
<?php require_once('..\kresources\config.php'); ?>
<?php include(TEMPLATE_FRONT.DS.'header.php'); ?>
    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

          <?php include(TEMPLATE_FRONT.DS.'side_nav.php'); ?>

<?php
$query=query("SELECT * FROM products WHERE product_id=". escape_string($_GET['id'])." ");
confirm($query);
while ($row=fetch_array($query)): 
  
    
?>





<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="..\kresources\<?php echo  display_images($row['product_image']);?>" alt="" >
        
    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $row['product_title']?></a> </h4>
        <hr>
        <h4 class="">&#165;<?php echo $row['product_price']?></h4>

    <div class="ratings">
     
        <p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            4.0 stars
        </p>
    </div>
          
        <p><?php echo $row['short_desc']?></p>

   
    <form action="">
        <div class="form-group">
            <!--<input type="submit" class="btn btn-primary" value="ADD TO CART">-->
            <a href="..\kresources\cart.php?add=<?php echo $row['product_id'];?>" class="btn btn-primary">ADD TO CART</a>
        </div>
    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <p><?php echo $row['product_description']?></p>



    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  <div class="col-md-6">

       <h3>2 Reviews From </h3>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">10 days ago</span>
                <p>This product was great in terms of quality. I would definitely buy another!</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">12 days ago</span>
                <p>I've alredy ordered another one!</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                Anonymous
                <span class="pull-right">15 days ago</span>
                <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
            </div>
        </div>

    </div>


    <div class="col-md-6">
        <h3>Add A review</h3>

     <form action="" class="form-inline">
        <div class="form-group">
            <label for="">Name</label>
                <input type="text" class="form-control" >
            </div>
             <div class="form-group">
            <label for="">Email</label>
                <input type="test" class="form-control">
            </div>

        <div>
            <h3>Your Rating</h3>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
        </div>

            <br>
            
             <div class="form-group">
             <textarea name="" id="" cols="60" rows="10" class="form-control"></textarea>
            </div>

             <br>
              <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
            </div>
        </form>

    </div>

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div><!-- col-md-9 end here-->
<?php endwhile;?>

</div>
    <!-- /.container -->

   <?php include(TEMPLATE_FRONT.DS.'footer.php'); ?>