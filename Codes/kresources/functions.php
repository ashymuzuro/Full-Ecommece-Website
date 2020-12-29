<?php require_once('config.php'); ?>
<?php 
//Helper Function

///below global variable upload
$upload_path = "uploads";
//**********************************************************************BACKEND FUNCTIONS********************************************
//########################################
//For the location of the header file
function redirect($location){
    header("Location: $location ");
}
//########################################

//########################################


//########################################
//Setting message for the wrong password on login 
function set_message($msg){
    
if(!empty($msg)){
    $_SESSION['message']=$msg;
}else{
      $msg="";  
} 
}

//########################################


//########################################
//########################################


//########################################
//Displaying message for the wrong password of login
function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
//########################################


//#######################################
//########################################
//Requesting information from the dataabse
function query($sql){
    global $connection;
    return mysqli_query($connection,$sql);
}
//#######################################

//########################################
//Error Message Conformation
function confirm($results){
    global $connection;
    if(!$results){
        die("QUERY FAILED".mysqli_error($connection)); 
    }
    
}
//########################################

//#######################################
//Escaping Values to avoid MySql Injections(hacking in General)
function escape_string($string){
   global $connection; 
   return mysqli_real_escape_string($connection,$string);
}
//#########################################

//#######################################
//Returning an Array of Data from MySql database
function fetch_array($results){
   return mysqli_fetch_array($results);
}
//#########################################
//**********************************************************************FRONTEND FUNCTIONS************************************
//########################################
//Products Functions(getting product)


function get_product(){
$query=query("SELECT * FROM products");
confirm($query);


//****************************PAgination Takiing Place here and everything Good Lucky***************************************
$rows = mysqli_num_rows($query); // Get total of mumber of rows from the database
if(isset($_GET['page'])){ //get page from URL if its there
    $page = preg_replace('#[^0-9]#', '', $_GET['page']);//filter everything but numbers
} else{// If the page url variable is not present force it to be number 1
    $page = 1;
}
$perPage = 6; // Items per page here 
$lastPage = ceil($rows / $perPage); // Get the value of the last page
// Be sure URL variable $page(page number) is no lower than page 1 and no higher than $lastpage
if($page < 1){ // If it is less than 1
    $page = 1; // force if to be 1
}elseif($page > $lastPage){ // if it is greater than $lastpage
    $page = $lastPage; // force it to be $lastpage's value
}
$middleNumbers = ''; // Initialize this variable

// This creates the numbers to click in between the next and back buttons
$sub1 = $page - 1;
$sub2 = $page - 2;
$add1 = $page + 1;
$add2 = $page + 2;

if($page == 1){
      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
} elseif ($page == $lastPage) {
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
}elseif ($page > 2 && $page < ($lastPage -1)) {
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
      $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
      $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';
} elseif($page > 1 && $page < $lastPage){
     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub1.'">' .$sub1. '</a></li>';
     $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
     $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
}
// This line sets the "LIMIT" range... the 2 values we place to choose a range of rows from database in our query
$limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;
// $query2 is what we will use to to display products with out $limit variable
$query2 = query(" SELECT * FROM products $limit");
confirm($query2);
$outputPagination = ""; // Initialize the pagination output variable
// if($lastPage != 1){
//    echo "Page $page of $lastPage";
// }
 // If we are not on page one we place the back link

if($page != 1){
    $prev  = $page - 1;
    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
}
 // Lets append all our links to this variable that we can use this output pagination

$outputPagination .= $middleNumbers;
// If we are not on the very last page we the place the next link

if($page != $lastPage){
    $next = $page + 1;
    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';
}
// Done with pagination
// Remember we use query 2 below :)

//************************************Pagination Finished******************************************************************

while ($row = fetch_array($query2)){
//$product_image = display_image($row['product_image']);
$product_photo = display_images($row['product_image']);
$products = <<< DELIMETER
<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a target="_blank" href="item.php?id={$row['product_id']}" ><img width ='100' src="../kresources/{$product_photo}" alt=""></a>
            <div class="caption">
                <h4 class="pull-right">&#165;{$row['product_price']}</h4>
               <h4> <a target="_blank" href="item.php?id={$row['product_id']}" >{$row['product_title']}</a></h4>
                 <p>{$row['product_description']}.</p>
                 </div> <a class="btn btn-primary" target="_blank" href="..\kresources\cart.php?add={$row['product_id']}" text-align:center>Add To Cart</a> </div>
 </div>
DELIMETER;
echo $products;
    }
    echo "<div class='text-center'><ul class='pagination'>{$outputPagination}</ul></div>";
}
//problem with add to cart
//#########################################

//#######################################
//getting category
function get_categories(){
$query = query("SELECT * FROM categories");     
confirm($query);
while($row = fetch_array($query)) {
$category_links = <<< DELIMETER
<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMETER;
echo $category_links;              
        }
}
//#########################################

//#######################################
//getting products in same category
///unfinished work need patching on buy now
function get_products_in_category_page(){
$query = query("SELECT * FROM products WHERE product_category_id=".escape_string($_GET['id'])." ");     
confirm($query);
while($row = fetch_array($query)) {
$product_photo = display_images($row['product_image']);
$category_page = <<< DELIMETER
 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../kresources/{$product_photo}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title'] }</h3>
                        <p>{$row['short_desc'] }</p>
                        <p>
                            <a href="..\kresources\cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
echo $category_page;         
}
}
//#########################################

//#######################################
//getting products in same category
///unfinished work need patching on buy now
function get_products_in_shop_page(){
$query = query("SELECT * FROM products ");     
confirm($query);
while($row = fetch_array($query)) {
$product_photo = display_images($row['product_image']);
$category_page = <<< DELIMETER
 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../kresources/{$product_photo}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title'] }</h3>
                        <p>{$row['short_desc'] }</p>
                        <p>
                            <a href="..\kresources\cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
echo $category_page;         
}
}
//#########################################

//#######################################
//the log in to the system
function login_user(){
    if(isset($_POST['submit'])){
       $username = escape_string($_POST['username']);
       $password = escape_string($_POST['password']);
    
        $query = query("SELECT * FROM users WHERE username ='{$username}'AND password='{$password}' "); 
        confirm($query);
       if (mysqli_num_rows($query)==0){
           set_message("Your Username or Password are wrong.Please try again!");
           redirect("login.php");
       }else{
           //set_message("Welcome to Admin {$username}!");//after linked ---
         $_SESSION['username']= $username;
         redirect("admin");  
       }
}
}
//Display name
function user_name(){
        $query = query("SELECT * FROM users WHERE username ='{$_SESSION['username']}' "); 
        confirm($query);
        return $_SESSION['username'];
}



//#########################################

//#######################################
//#########################################

//#######################################
//the function to send the messages from the contact us page to admin
function send_message (){
    ///Not fully function need for correction in sendmail.ini and in php.ini(setting in XAMPP)
    if(isset($_POST['submit'])){
         $to           = "muzurotenday@gmail.com";
         $from_name    = ($_POST['name']);
         $from_email   = ($_POST['email']);
         $from_subject = ($_POST['subject']);
         $from_message = ($_POST['message']);
        
        $headers="From:{$from_name} {$from_email}";
        $result = mail($to,$from_subject,$from_message,$headers);
        
        if(!$result){
                set_message('Sorry we could not send your message');
                redirect("contact.php");
        } else{
            
            set_message('Your Message has been sent');
            redirect("contact.php");
        }
    }
}


function last_id(){
   global $connection;
   return mysqli_insert_id($connection);  
}


//########################################################### Admin Orders ###############################################
function display_order(){
$query = query("SELECT * FROM orders");
confirm($query);
        
while ($row= fetch_array($query)){
$orders = <<< DELIMETER
    <tr>
        <td>{$row['order_id']}</td>
        <td>{$row['order_amount']}</td>
        <td>{$row['order_transaction']}</td>
        <td>{$row['order_currency']}</td>
        <td>{$row['order_status']}</td>
        <td><a class = "btn btn-danger" href ="..\..\kresources\ktemplates\backend\delete_order.php?id={$row['order_id']}"><span class ="glyphicon glyphicon-remove"></span></a>        
        </td>
    </tr>
DELIMETER;
echo $orders;
    }
}


//************************************Admin Products ******************************
function display_images($pictures){
global $upload_path;

return $upload_path.DS.$pictures;
}

function show_product_category_title($product_category_id){
$category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
confirm($category_query);

while($categories_row = fetch_array($category_query)){
     return $categories_row['cat_title']; 
    }
}

function get_products_in_admin(){

$query = query("SELECT * FROM products");
confirm($query);
//$category = show_product_category_title['product_category_id'];

while ($row = fetch_array($query)){

//***********************************************************
$result_product = $row['product_category_id'];
$category = show_product_category_title($result_product);

$product_photo = display_images($row['product_image']);
//************************************************************
$products = <<< DELIMETER
        <tr>
            <td> {$row['product_id']}</td>
            <td><a href="index.php?edit_product&id={$row['product_id']}"><p>{$row['product_title']}</p></a><div><img width='100' src="../../kresources/uploads/{$product_photo}" alt=""></div></td>
            <td>{$category}</td>
            <td>&#165;{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
            <td>
            <a class="btn btn-danger" href = "..\..\kresources\ktemplates\backend\delete_product.php?id={$row['product_id']}"><span class = " glyphicon glyphicon-remove"></span></a>
            </td>
       </tr>
      
DELIMETER;
echo $products;
    }
} 


//*************************Adding Products in Admin*************************************************************************8
function add_product(){
if(isset($_POST['publish'])){

$product_title         = escape_string($_POST['product_title']);
$product_category_id   = escape_string($_POST['product_category_id']);
$product_price         = escape_string($_POST['product_price']);
$product_quantity      = escape_string($_POST['product_quantity']);
$product_description   = escape_string($_POST['product_description']);
$short_desc            = escape_string($_POST['short_desc']);
//********************************************************************************special zone the image uploading zone ******************


$product_image = ($_FILES['file']['name']);
$image_temp_location = ($_FILES['file']['tmp_name']);
$final_destination = UPLOAD_DIRECTORY.DS.$product_image;
move_uploaded_file($image_temp_location ,$final_destination);

//****************************************************************************************************************************************
$query=query("INSERT INTO products(product_title,product_category_id,product_price,product_description,short_desc,product_quantity,product_image)VALUES('{$product_title}','{$product_category_id}','{$product_price}','{$product_description}','{$short_desc}','{$product_quantity}','{$product_image}')");
$last_id=last_id();
confirm($query);
set_message("New Product with id : {$last_id}  was Added");
redirect("index.php?products");

}

}


function show_categories_add_product(){
$query = query("SELECT * FROM categories");     
confirm($query);
while($row = fetch_array($query)) {
$category_options = <<< DELIMETER
    <option value="{$row['cat_id']}">{$row['cat_title']}</option>
           
DELIMETER;
echo $category_options;              
        }
}
//***************************************************Updating Products Code In Admin Page  ***************************************
function update_product(){
    //not fully functing as function yet still bugs in the the EDIT PAGE of the ADMIN PAGE!!!!!
if(isset($_POST['update'])){

$product_title         = escape_string($_POST['product_title']);
$product_category_id   = escape_string($_POST['product_category_id']);
$product_price         = escape_string($_POST['product_price']);
$product_quantity      = escape_string($_POST['product_quantity']);
$product_description   = escape_string($_POST['product_description']);
$short_desc            = escape_string($_POST['short_desc']);
//******************************************************special zone the image uploading zone ************************************
$product_image = $_FILES['file']['name'];
$image_temp_location = $_FILES['file']['tmp_name'];
$final_destination = UPLOAD_DIRECTORY.DS.$product_image;
move_uploaded_file($image_temp_location , $final_destination);

if(empty($product_image))
{
    $get_pic = query("SELECT product_image FROM products WHERE product_id =" .escape_string($_GET['id'])."");
    confirm($get_pic);
    $row = fetch_array($get_pic);
    $product_image = $row['product_image'];
}



//********************************************************************************************************************************
$query = "UPDATE products SET ";
$query .= "product_title          = '{$product_title}'            , ";
$query .= "product_category_id    = '{$product_category_id}'      , ";
$query .= "product_price          = '{$product_price}'            , ";
$query .= "product_quantity       = '{$product_quantity}'         , ";
$query .= "product_description    = '{$product_description}'      , ";
$query .= "short_desc             = '{$short_desc}'               , ";
$query .= "product_image          = '{$product_image}'              ";
$query .= "WHERE product_id= ".escape_string($_GET['id']);
$send_update_query = ($query);
confirm($send_update_query);
set_message("Products has been updated !");
redirect("index.php?products");

}

}
//*************************************************Category Zone Under The Admin Page {Editting Category ,Deleting and other Options in Admin } **********
function show_categories_in_admin(){



$query = "SELECT * FROM categories";
$category_query = query($query);
confirm($query);
while($row= fetch_array($category_query)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
$category_admin = <<<DELIMETER
<tr>
    <td>{$cat_id}</td>
    <td>{$cat_title}</td>
    <td><a class="btn btn-danger" href = "..\..\kresources\ktemplates\backend\delete_category.php?id={$row['cat_id']}"><span class = " glyphicon glyphicon-remove"></span></a></td>
</tr>
DELIMETER;

echo $category_admin;
    }
}
function add_category(){
if(isset($_POST['add_category'])){
     $cat_title = escape_string($_POST['cat_title']);
     if(empty($cat_title) || $cat_title == ""){
        echo "<p class= 'bg-danger' >THIS CANNOT BE EMPTY TRY AGAIN ! </p> ";
     }else{
     $query = query ("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
    confirm($query);
    set_message("Category Created !");
        }
    }
}

//**************************************************Admin User Setting & Functions **************************************
 function display_users(){

$category_query = query("SELECT * FROM users");
confirm($category_query);


while($row = fetch_array($category_query)) {

$user_id = $row['user_id'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];

$user = <<<DELIMETER


<tr>
    <td>{$user_id}</td>
    <td>{$username}</td>
     <td>{$email}</td>
    <td><a class="btn btn-danger" href="..\..\kresources\ktemplates\backend\delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>



DELIMETER;

echo $user;
    }


 }
 function add_user() {


if(isset($_POST['add_user'])) {


$username   = escape_string($_POST['username']);
$email      = escape_string($_POST['email']);
$password   = escape_string($_POST['password']);
$user_photo = $_FILES['file']['name'];
//$photo_temp = escape_string($_FILES['file']['tmp_name']);
//$final_destination = UPLOAD_DIRECTORY . DS . $user_photo;

 //move_uploaded_file($photo_temp,$final_destination);


$query = query("INSERT INTO users(username,email,password) VALUES('{$username}','{$email}','{$password}')");
confirm($query);

set_message("USER CREATED");

redirect("index.php?users");

    }

}
/******************Slides Functions *******************/

function add_slides() {
if(isset($_POST['add_slide'])) {
$slide_title        = escape_string($_POST['slide_title']);
$slide_image        = $_FILES['file']['name'];
$slide_image_loc    = $_FILES['file']['tmp_name'];
if(empty($slide_title) || empty($slide_image)) {
echo "<p class='bg-danger'>This field cannot be empty</p>";
} else {
$final_destination = UPLOAD_DIRECTORY . DS . $slide_image;
move_uploaded_file($slide_image_loc, $final_destination);
$query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
confirm($query);
set_message("Slide Added");
redirect("index.php?slides");
                }
        }
}

function get_current_slide_in_admin(){
$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
confirm($query);

while($row = fetch_array($query)) {

$slide_image = display_images($row['slide_image']);

$slide_active_admin = <<<DELIMETER
    <img width='800' height='300' class="img-responsive" src="../../kresources/{$slide_image}" alt="">
DELIMETER;
echo $slide_active_admin;
    }
}
function get_active_slide() {
$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
confirm($query);
while($row = fetch_array($query)) {
$slide_image = display_images($row['slide_image']);
$slide_active = <<<DELIMETER
 <div class="item active">
    <img width='800' height='300' class="slide-image" src="../kresources/{$slide_image}" alt="">
</div>
DELIMETER;
echo $slide_active;
    }

}



function get_slides() {

$query = query("SELECT * FROM slides");
confirm($query);
while($row = fetch_array($query)) {
$slide_image = display_images($row['slide_image']);
$slides = <<<DELIMETER


<div class="item">
    <img width='800' height='300' class="slide-image"  src="../kresources/{$slide_image}" alt="">
</div>

DELIMETER;
echo $slides;
    }

}


function get_slide_thumbnails(){
$query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
confirm($query);

while($row = fetch_array($query)) {

$slide_image = display_images($row['slide_image']);

$slide_thumb_admin = <<<DELIMETER


<div class="col-xs-6 col-md-3 image_container">
    
    <a href="index.php?delete_slide_id={$row['slide_id']}">
        
         <img width='800' height='300' class="img-responsive slide_image" src="../../kresources/{$slide_image}" alt="">


    </a>

    <div class="caption">

    <p>{$row['slide_title']}</p>

    </div>


</div>
DELIMETER;

echo $slide_thumb_admin;


    }

}
?>