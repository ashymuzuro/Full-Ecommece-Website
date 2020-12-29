<?php


//******************************************Product Title***********************************
function extra_title(){
      if(isset($_GET['id'])){
      $query = query("SELECT * FROM products WHERE product_id = ".escape_string($_GET['id'])."");
      confirm($query);
            while($row = fetch_array($query)){
                $product_title         = escape_string($row['product_title']);
            return $product_title;
            }
        }
}
//*********************************************************************************************



//******************************************Product Category Id***********************************
function extra_category_id(){
      if(isset($_GET['id'])){
      $query = query("SELECT * FROM products WHERE product_id = ".escape_string($_GET['id'])."");
      confirm($query);
            while($row = fetch_array($query)){
               $product_category_id   = escape_string($row['product_category_id']);
            return $product_category_id;
            }
        }
}
//*********************************************************************************************



//******************************************Product Price***********************************
function extra_price(){
      if(isset($_GET['id'])){
      $query = query("SELECT * FROM products WHERE product_id = ".escape_string($_GET['id'])."");
      confirm($query);
            while($row = fetch_array($query)){
               $product_price = escape_string($row['product_price']);
            return $product_price;
            }
        }
}
//*********************************************************************************************




//******************************************Product Quantity***********************************
function extra_quantity(){
      if(isset($_GET['id'])){
      $query = query("SELECT * FROM products WHERE product_id = ".escape_string($_GET['id'])."");
      confirm($query);
            while($row = fetch_array($query)){
               $product_quantity = escape_string($row['product_quantity']);
            return $product_quantity;
            }
        }
}
//*********************************************************************************************


//******************************************Product Description***********************************
function extra_description(){
      if(isset($_GET['id'])){
      $query = query("SELECT * FROM products WHERE product_id = ".escape_string($_GET['id'])."");
      confirm($query);
            while($row = fetch_array($query)){
                $product_description = escape_string($row['product_description']);
            return $product_description;
            }
        }
}
//*********************************************************************************************


//******************************************Short Desc***********************************
function extra_short_desc(){
      if(isset($_GET['id'])){
      $query = query("SELECT * FROM products WHERE product_id = ".escape_string($_GET['id'])."");
      confirm($query);
            while($row = fetch_array($query)){
                $short_desc   = escape_string($row['short_desc']);
            return $short_desc;
            }
        }
}
//*********************************************************************************************





//******************************************Product Image***********************************
function extra_image(){
      if(isset($_GET['id'])){
      $query = query("SELECT * FROM products WHERE product_id = ".escape_string($_GET['id'])."");
      confirm($query);
            while($row = fetch_array($query)){
                $product_image = escape_string($row['product_image']);
                $product_image = display_images($product_image);
                return $product_image;
            }
        }
}

?>
<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product
   <?php
    //***************************************************Updating Product Function being called***************************************
    update_product();
    //*******************************************************************************************************************************
     ?>
</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo extra_title(); ?>">
       
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"><?php echo extra_description(); ?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo extra_price(); ?>">
      </div>
    </div>


    <div class="form-group">
           <label for="product-title">Product Short Description</label>
      <textarea name="short_desc" id="" cols="30" rows="3" class="form-control"><?php echo extra_short_desc(); ?></textarea>
    </div>

    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
        <select name="product_category_id" id="" class="form-control">
            <option value="<?php echo $product_category_id;?>"><?php echo show_product_category_title($product_category_id);?></option>
           <?php show_categories_add_product(); ?>
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
         <input type="number" name ="product_quantity" class="form-control" value="<?php echo extra_quantity(); ?>">
    </div>


<!-- Product Tags -->


  <!--  <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div>
    -->
    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file"><br>
        <img width="200" src="..\..\kresources\<?php echo extra_image(); ?>" alt="">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>