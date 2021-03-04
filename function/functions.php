<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



 function createUser($value)
{
    require 'vendor/autoload.php';
    $error = array();
    if(isset($_POST['register']))

    {
        $name = htmlentities($value['name']);
        $email = htmlentities($value['email']);
        $phone = htmlentities($value['phone']);
        $address = htmlentities($value['address']);
        $password = htmlentities($value['password']);
        $password2 = htmlentities($value['password2']);
        $token = "qwertyuiopasdfghhjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890@#$%^";
        $token = str_shuffle($token);
        $token = substr($token, 0 , 12);

         empty($name) ? $error['name'] = 'Name is required' : '';
         empty($email)? $error['email'] = 'Email is required' : '';
         empty($phone) ? $error['phone'] = 'Phone is required' : '';
         empty($address) ? $error['address'] = 'Address is required' : '';
         empty($password) ? $error['password'] = 'Password is required' : '';
         empty($password2) ? $error['password'] = 'Confirm Password is required' : '';
        !filter_var($email) ? $error['email'] = 'Invalid Email Address' : '';
      
        if(!$error)
        {
            $create = new User();
        
            if(!$create->registerUser($name , $email , $phone , $address , $password, $token))
            {
               die('ERROR');
            }
            else
            {
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'alasacelui010@gmail.com';                     // SMTP username
                    $mail->Password   = 'aceluimanalo010';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $mail->setFrom('alasthrifts@gmail.com', 'Alas Thrifts');
                    $mail->addAddress($email,$name);     // Add a recipient
                 
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Email Verification';
                    $body = "Please verify your email address <a href='http://localhost/test/confirm.php?token=$token'> Click here </a> ";
                    $mail->Body = $body;
                    // $mail->AltBody = strip_tags($body);
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                echo "<script>alert('registered successfully! Please check your email for verification ')</script>";
            }
        }
    
        return $error;
    }   
  
}

function admin_createUser($value)
{
    require '../../vendor/autoload.php';
    $error = array();
    if(isset($_POST['register']))

    {
        $name = htmlentities($value['name']);
        $email = htmlentities($value['email']);
        $phone = htmlentities($value['phone']);
        $address = htmlentities($value['address']);
        $password = htmlentities($value['password']);
        $password2 = htmlentities($value['password2']);
        $token = "qwertyuiopasdfghhjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890@#$%^";
        $token = str_shuffle($token);
        $token = substr($token, 0 , 12);

         empty($name) ? $error['name'] = 'Name is required' : '';
         empty($email)? $error['email'] = 'Email is required' : '';
         empty($phone) ? $error['phone'] = 'Phone is required' : '';
         empty($address) ? $error['address'] = 'Address is required' : '';
         empty($password) ? $error['password'] = 'Password is required' : '';
         empty($password2) ? $error['password'] = 'Confirm Password is required' : '';
        !filter_var($email) ? $error['email'] = 'Invalid Email Address' : '';
      
        if(!$error)
        {
            $create = new User();
        
            if(!$create->registerUser($name , $email , $phone , $address , $password, $token))
            {
               die('ERROR');
            }
            else
            {
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'alasacelui010@gmail.com';                     // SMTP username
                    $mail->Password   = 'aceluimanalo010';                               // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $mail->setFrom('alasthrifts@gmail.com', 'Alas Thrifts');
                    $mail->addAddress($email,$name);     // Add a recipient
                 
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Email Verification';
                    $body = "Please verify your email address <a href='http://localhost/test/confirm.php?token=$token'> Click here </a> ";
                    $mail->Body = $body;
                    // $mail->AltBody = strip_tags($body);
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                echo "<script>alert('registered successfully! Please check your email for verification ')</script>";
            }
        }
    
        return $error;
    }   
  
}

function loginUser($value)
{
    
    $error = array();
    if(isset($_POST['login']))
    {
        $email = htmlentities($value['email']);
        $password = htmlentities($value['password']);

        empty($email)? $error['email'] = 'Email is required' : '';
        empty($password) ? $error['password'] = 'Password is required' : '';

        if(!$error)
        {
            $login = new User();
            if($login->login($email,$password))
            {
              if($login->result['role'] != 'user')
              {
                  // go to admin page
                  $_SESSION['isloggedin'] = true;
                  $_SESSION['role'] = 'admin' ;
                  $_SESSION['id'] = $login->result['id'];
                  $_SESSION['name'] = $login->result['name'];
                  $_SESSION['email'] = $login->result['email'];
                  echo "<script>alert('You are now logged in')</script>";
                  echo "<script>window.location.href='views/admin/index.php'</script>";
                //   header("location:/views/admin/index.php");
              }
              else
              {
                  // go to main page
                  $_SESSION['isloggedin'] = true;
                  $_SESSION['role'] = 'user' ;
                  $_SESSION['id'] = $login->result['id'];
                  $_SESSION['name'] = $login->result['name'];
                  $_SESSION['email'] = $login->result['email'];
                  echo "<script>alert('You are now logged in')</script>";
                  echo "<script>window.location.href='index.php'</script>";

              }
            }
            else
            {
                echo "<small class='text-danger'>Invalid Email/Password </small> ";
            }
  
        }

        return $error;
        
    }
  
}

function verify_email()
{
    if(isset($_REQUEST['token']))
    {
        $token = htmlentities($_REQUEST['token']);

        $verifyEmail = new Email_verification;
        if($verifyEmail->verify($token))
        {
            echo "<script>alert('Your email is now verified .. redirecting to login page') </script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else
        {
            die('error');
        }

    }
}




// STATISTICS 

function totalUsers()
{
    $totalU = new Statistic;
    echo $totalU->countUser();
}

function totalProducts()
{
    $totalP = new Statistic;
    echo $totalP->countProducts();
}

function totalOrders()
{
    $totalO = new Statistic;
    echo $totalO->countOrders();
}

// end of Statistics


//showALLUSERS
function displayUsers()
{
    $displayU = new User;
    $displayU->showAllUsers();
    
    $output = " <table class='table table-striped'>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>";

    foreach($displayU->result as $data)
    {
        $output .= 
            "<tr>
                <td>$data[name]</td>
                <td>$data[email]</td>
                <td>$data[role]</td>
                <td>" .date('m/d/Y h:iA', strtotime($data['created_at']))."</td>
                <td>
                <a class='btn btn-sm btn-primary' href='show_user.php?edit=$data[id]'>View</a>
                <a class='btn btn-sm btn-danger' href='index.php?delete=$data[id]' onclick='return confirm(\"Do you want to Delete?\")'>Delete</a>
              
                </td>
            </tr>
      ";
    }
        $output .= 
            "</tbody>
            </table>";

 echo $output;

}

// Edit and Update User by ID

function updateUser()
{
        if(isset($_REQUEST['edit']))
        {
            $id = htmlentities($_REQUEST['edit']);
            $editU = new User;
            $editU->editUser($id);
            
           echo '<div class="container">
            <form class="col-md-4" action="" method="POST">
            <h1>Edit User </h1>
                <div class="form-group">
                    <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="' .$editU->result['name'].'">
                </div>
        
                <div class="form-group">
                    <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="' .$editU->result['email'].'">
                </div>
        
                <div class="form-group">
                    <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" value="' .$editU->result['phone'].'">
                </div>
        
                <div class="form-group">
                    <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="' .$editU->result['address'].'">
                </div>
        
                <div class="form-group">
                    <label for="">Password</label>
                        <input type="text" class="form-control" name="password" value="' .$editU->result['password'].'">
                </div>
                    <input class="btn btn-sm btn-secondary" type="submit" name="updateUser" value="Save">
        
            </form>
        </div>';
       
        }

        if(isset($_POST['updateUser']))
        {
            $id = $_REQUEST['edit'];
            $name = htmlentities($_POST['name']);
            $email = htmlentities($_POST['email']);
            $phone = htmlentities($_POST['phone']);
            $address = htmlentities($_POST['address']);
            $password = htmlentities($_POST['password']);

            $updateU = new User;
            if($updateU->updateU($id, $name , $email , $phone , $address, $password))
            {
                echo "<script>alert('Updated Successfully')</script>";
                echo "<script>window.location.href='show_user.php?edit=$id'</script>";
            }
            else
            {
                die('Error Update');
            }
        }

      
}


// DELETE USER by ID

function destroyUser()
{
    if(isset($_REQUEST['delete']))
    {
        $id = htmlentities($_REQUEST['delete']);
        $destroyU = new User;
        if($destroyU->deleteUser($id))
        {
            echo "<script>alert('Deleted Successfully!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else
        {
            die('ERROR');
        }
    }
  
}


// ADD PRODUCT

function addProduct($value)
{
    $error = array();

    if(isset($_POST['add_product']))
    {
        $user_id = $_SESSION['id'];
        $title = htmlentities($value['title']);
        $description = htmlentities($value['description']);
        $price = htmlentities($value['price']);
        $qty = htmlentities($value['qty']);
        $category = htmlentities($value['category']);
        $file = $_FILES['file'];
        $img = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $dir = "../../uploads/";
        // $dir = "../../uploads". $file_name;

        empty($title) ? $error['title'] = "Title is required": '';
        empty($description) ? $error['description'] = "Description is required": '';
        empty($price) ? $error['price'] = "Price is required": '';
        empty($qty) ? $error['qty'] = "Quantity is required": '';
        empty($file) ? $error['img'] = "Image is required": '';
        empty($category) ? $error['category'] = "Please select a category": '';

        if(!$error)
        {   
            $addProduct = new Product;
            if ($addProduct->createProduct($user_id,$title,$description,$price,$qty,$img,$category))
            {
                move_uploaded_file($tmp_name, $dir. $img);
                echo "<script>alert('Added Successfully !')</script>";
            }
            else
            {
                echo 'ERROR';
            }
     
        }
        
        return $error;
       
     
    }
   

}


function displayProducts()
{
    $displayP = new Product;
    $displayP->showAllProducts();

    $output = " <table class='table table-striped'>
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Category</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>";

    foreach($displayP->result as $product)
    {
        $output .= 
            "<tr>
                <td>$product[title]</td>
                <td><img src='../../uploads/$product[img]' width='100'></img></td>
                <td>$product[category]</td>
                <td>" .date('m/d/Y h:iA', strtotime($product['created_at']))."</td>
                <td>
                <a class='btn btn-sm btn-primary' href='show_product.php?edit_product=$product[id]'>View</a>
                <a class='btn btn-sm btn-danger' href='index.php?deleteproduct=$product[id]' onclick='return confirm(\"Do you want to Delete?\")'>Delete</a>
                </td>
            </tr>
      ";
    }
        $output .= 
            "</tbody>
            </table>";

 echo $output;
}   

// EDIT AND UPDATE Product by ID 
function editProduct()
{
    if(isset($_REQUEST['edit_product']))
    {
        $id = $_REQUEST['edit_product'];
        $editP = new Product;
        $editP->editProduct($id);

        echo '
    
        <div class="col-md-4">
        <h1 class="m-2">Edit Product </h1>
        <form class="" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="' .$editP->result['title'].'">
            </div>
    
            <div class="form-group">
                <label for="">Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="10" value="' .$editP->result['description'].'">'.$editP->result['description'].'</textarea>
            </div>
    
            <div class="form-group">
                <label for="">Price</label>
                    <input type="text" class="form-control" name="price" value="' .$editP->result['price'].'">
            </div>
    
            <div class="form-group">
                <label for="">Quantity</label>
                    <input type="text" class="form-control" name="qty" value="' .$editP->result['qty'].'">
            </div>
    
            <div class="form-group">
                <label for="">Image</label>
                <br>
                   
                    <input type="file" class="form-control" name="file" value="' .$editP->result['img'].'">
                    <small>Current Image : ' .$editP->result['img'].'  </small>
            </div>

            <div class="form-group">
            <label for="">Select Category</label><br>
              <select class="form-control" name="category" id="category">
              <option ></option>
                <option value="snapback">Snabpack</option>
                <option value="jersey">Jersey</option>
              </select>
              <small> Current ( '.$editP->result['category'].' ) </small>
            </div>

                <input class="btn btn-sm btn-secondary" type="submit" name="updateProduct" value="Save">
        </form>
        </div>

        <div class="col-md-6">
            <br><br><br><br>
            <img src= "../../uploads/raiders.jpg" class="img-fluid ml-5" width="350">
        </div>

     ';
    }

    if(isset($_POST['updateProduct']))
    {   
        $id = htmlentities($_REQUEST['edit_product']);
        $user_id = $_SESSION['id'];
        $title = htmlentities($_POST['title']);
        $description = htmlentities($_POST['description']);
        $price = htmlentities($_POST['price']);
        $qty = htmlentities($_POST['qty']);
        $file = $_FILES['file'];
        $img = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $dir = "../../uploads/";
        $category = htmlentities($_POST['category']);

        // if image is empty then update all 
        if($img > 0)
        {
            $updateP = new Product;
            if($updateP->updateProduct( $user_id ,  $id ,  $title, $description, $price, $qty,  $img , $category))
            {
                move_uploaded_file($tmp_name, $dir. $img);
                exit('Success2');
            }
            else{
                die('Error2!');
            }
        }
        // if image is not empty then update all except image which has a value already.
        else
        {
            $updateP = new Product;
            if($updateP->updateProductWithoutImg( $user_id ,  $id ,  $title, $description, $price, $qty, $category))
            {
                exit('Success');
            }
            else{
                die('Error!');
            }
        }  
        
    }
   
}
function destroyProduct()
{
    if(isset($_REQUEST['deleteproduct']))
    {
        $id = htmlentities($_REQUEST['deleteproduct']);
        $destroyP = new Product;
        if($destroyP->deleteProduct($id))
        {
            echo "<script>alert('Product Deleted Successfully!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else
        {
            die('ERROR');
        }
    }
}


function displaySnapback()
{
    $displayS = new Product;
    $displayS->showSnapback();
    $output = "";
    foreach($displayS->result as $snapback)
    {
        $output .= "
        <div class='col-md-4'>
            <div class='card' style='width: 18rem;'>
                <a href='show-snapback.php?id=$snapback[id]'><img src='uploads/$snapback[img]' class='card-img-top' alt='$snapback[title]' title='View Details' style='width:250px;'></a>
                    <div class='card-body'>
                        <p class='card-text'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, vero.</p>
                    </div>
                    <form action='' method='POST'>
                    <input type='hidden' name='product_id' value='$snapback[id]'>";
                    if($snapback["qty"] == 0)
                    {
    $output .=              "<center><small class='text-danger'> Out of Stock </small></center>";
                    }
                    else
                    {
    $output.=            " <center><button class='btn btn-sm btn-primary m-2' name='addtocart' type='submit'> Add to cart <i class='fas fa-cart-plus'></i> </button></center>";
                     }

    $output .= "  
                </form>
            </div>
        </div>";                   
        
        }
    
    echo $output;

}

function addToCart()
{

    if(isset($_POST['addtocart']))
        {
            if(isset($_SESSION['role']))
            {
                $user_id = $_SESSION['id'];
                $product_id = htmlentities($_POST['product_id']);
        
                $addTocart = new Cart;
                if($addTocart->createCart($user_id, $product_id))
                {
                   
                   echo "<script>alert('Product Added Successfully!')</script>";
                   echo "<script>window.location.href='cart.php?id=$user_id'</script>";
                }
                else
                {
                    die('ERROR!');
                }
            }

            else
            {
                echo "<script>alert('You need to login first')</script>";
                echo "<script>window.location.href='index.php'</script>";
              
            }
            
        }
 
}

// Display cart by USER_ID
function displayCart()
{
    
    if(isset($_REQUEST['id']))
    {
        $user_id = htmlentities($_REQUEST['id']);
        $total = 0;

        $displayCart = new Cart;
        $displayCart->showCart($user_id);
       
        $output = 
                "<table class='table table-striped'>
                    <thead>
                        <tr>
                            <td>Product Name</td>
                            <td>Product Image</td>
                            <td>Category</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Action</td>
                            <td>Total</td>
                            
                        </tr>
                    </thead>
                    <tbody>";
        if($displayCart->result)
        {
            foreach($displayCart->result as $mycart)
            {
              
                // get the sub total price of a product depends on its qty .
               $subtotal = $mycart['price'] * $mycart['product_qty'];
                
               // get the total of sub totals
                $total += $subtotal;
               $output .= 
                            "<tr>
                                <td>$mycart[title]</td>
                                <td><img src='./uploads/$mycart[img]' width='50'></td>
                                <td>$mycart[category]</td>
                                <td>₱ $mycart[price]</td>
                                <td>$mycart[product_qty]</td>
                                <td>
                                    <form action='' method='POST'>
                                    <input type='hidden' name='cart_id' value='$mycart[id]'>
                                    <button type='submit' class='btn btn-sm btn-light' name='sub_qty' ><i class='fas fa-minus'></i></button> 
                                    <button type='submit' class='btn btn-sm btn-light' name='add_qty' ><i class='fas fa-plus'></i></button>
                                    <button type='submit' class='btn btn-sm btn-primary' name='order' onclick='return confirm(\" Do you want to Order ?\")'>Order</button>
                                    <button type='submit' class='btn btn-sm btn-secondary' name='remove_product' onclick='return confirm(\" Do you want to remove this product ?\")'><i class='fas fa-trash-alt'></i></button>  
                                    </td>
                                    <input type='hidden' name='product_id' value='$mycart[product_id]'>
                                    <input type='hidden' name='amount' value='$total'>
                                    </form>
                                <td>₱ $subtotal</td>
                            </tr>";
                           
                            // <a class='btn btn-sm btn-primary' href='payment.php?id=$user_id' onclick='return confirm(\" Do you want to Order ?\")'>Order</a>

            }
        }
        // if THE CART IS EMPTY
        else
        {
          $output .= 
                    "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='text-danger'>Your Cart is Empty ! </td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>";
        }

        $output .= 
                    "</tbody>
                   </table>";
     
       $output.= 
                    "<h2 class='ml-auto p-2 text-info'> TOTAL ₱ $total </h2>";
      

        echo $output;
  
    }
    else
    {
        echo "<script>alert('You need to login first')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}

function editCart()
{
    if(isset($_POST['add_qty']))
    {
        $cart_id  = htmlentities($_POST['cart_id']);
        $product_id = htmlentities($_POST['product_id']);
        $user_id = $_SESSION['id'];

        $add_qty = new Cart;
        if($add_qty->increaseCartProductQty($cart_id, $product_id,  $user_id))
        {
            echo '<script>alert("Added 1 Quantity") </script>';
            exit;
        }
        else
        {
            die('ERROR!');
        }
    }

    if(isset($_POST['sub_qty']))
    {
        $cart_id  = htmlentities($_POST['cart_id']);
        $product_id = htmlentities($_POST['product_id']);
        $user_id = $_SESSION['id'];

        $sub_qty = new Cart;
        if($sub_qty->decreaseCartProductQty($cart_id,$product_id, $user_id))
        {
           
        }
        else
        {
            die('ERROR!');
        }
    }

    if(isset($_POST['remove_product']))
    {
        $cart_id  = htmlentities($_POST['cart_id']);
        $product_id  = htmlentities($_POST['product_id']);
        $user_id = $_SESSION['id'];

        $removeP =  new Cart;
        if($removeP->removeProductFromCart($cart_id , $product_id, $user_id))
        {
            exit('Product Removed');
        }
        else
        {
            die('ERROR!');
        }
    }

    
}


function addOrder()
{
    if(isset($_POST['order']))
    {
        $cart_id = htmlentities($_POST['cart_id']);
        $product_id = htmlentities($_POST['product_id']);
        $amount = htmlentities($_POST['amount']);
        $user_id = $_REQUEST['id'];

        $addOrder = new Order;
        if($addOrder->createOrder($user_id , $cart_id, $product_id, $amount))
        {
            // $removeCart = new Cart;
            // $removeCart->removeProductFromCart($cart_id , $product_id, $user_id);
            echo "<script>alert('Ordered Successfully ! Redirecting to Payment') </script>";
            echo "<script>window.location.href='order.php?id=$user_id' </script>";
        }
        else
        {
            die('Error HERE');
        }
    }
}

// show the products that the user order
function displayOrder()
{
    if(isset($_REQUEST['id']))
    {
        $user_id = $_REQUEST['id'];
   

        $showOrder = new Order;
        $showOrder->showOrder($user_id);

        $output = 
        "<table class='table table-striped'>
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Product</td>
                    <td>Category</td>
                    <td>Amount</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Message</td>
                </tr>
            </thead>
            <tbody>";

        if($showOrder->result)
        {
            foreach($showOrder->result as $order)
            {
               $output.= 
                        "<tr>
                            <td>$order[title]</td>
                            <td><img src='uploads/$order[img]' width='150' title='$order[title]'></td>
                            <td>$order[category]</td>
                            <td>₱$order[amount]</td>";
               $output.=    '<td>'.date('m/d/Y h:iA', strtotime($order['created_at'])) .'</td>';
               $output.=    "<td>$order[status]</td>
                             <td><em>$order[message]</em></td>
                        </tr>";
            }
        }
        else
        {
            $output.= 
                        "<tr>
                            <td></td>
                            <td class='text-danger'>Your Order is Empty ! </td>
                            <td></td>
                         </tr>";
                           
        }
      

        $output .= 
        "</tbody>
       </table>";

       echo $output;
        
    }
    else
    {
        echo "<script>alert('You need to login first')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}


// show all the product that the user order (ADMIN)
function displayOrders()
{
    $displayAllorders = new Order;
    $displayAllorders->showOrders();

    $output = 
              '<table class="table table-striped">
              <thead>
                  <tr>
                      <td>From</td>
                      <td>Title</td>
                      <td>Product</td>
                      <td>Amount</td>
                      <td>Date</td>
                      <td>Status</td>
                      <td>Actions</td>
                  </tr>
              <tbody>';
    foreach($displayAllorders->result as $user_order)
    {
        $output .= 
                   "<tr>
                   <td>$user_order[name]</td>
                   <td>$user_order[title]</td>
                   <td><img src='../../uploads/$user_order[img]' width='150'> </td>
                   <td>$user_order[amount]</td>
                   <td>" .date('m/d/Y h:iA', strtotime($user_order['created_at']))."</td>
                   <td>$user_order[status]</td>
                   <td>
                   <a class='btn btn-sm btn-primary' href='show_order.php?order=$user_order[id]'>View</a>|
                   <a class='btn btn-sm btn-danger' href='#'>Delete</a> 
                   </td>
               </tr>";
    }

    $output .=
                "</tbody>
            </table>";

            echo $output;


   
}


//ADMIN MANAGE (EDIT ORDER )
function updateOrder()
{
    if(isset($_REQUEST['order']))
    {
        $id = htmlentities($_REQUEST['order']);
        $editO = new Order;
        $editO->editOrder($id);

        echo 
             '
             <div class="col-md-6">
             <form  method="POST">
                <h1>Edit Order </h1>
               <div class="form-group">
                    <label>Order From</label>
                    <input class="form-control" type="text" value="'.$editO->result['name'].'" disabled>
                </div>

                <div class="form-group">
                     <label>Product Name</label>
                     <textarea class="form-control"  rows="5" disabled>'.$editO->result['title'].'</textarea>
                </div>

                <div class="form-group">
                    <label>Product</label>
                    <br>
                    <img src ="../../uploads/'.$editO->result['img'].'" width="200" title="'.$editO->result['title'].'">
                </div>
               </div>

               <div class="col-md-6">
                 <div class="form-group">
                    <label>Category</label>
                    <input class="form-control" type="text" value="'.$editO->result['category'].'" disabled>
                </div>

                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" type="text" value="'.$editO->result['amount'].'" disabled>
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input class="form-control" type="text" value="'.date('m/d/Y h:iA', strtotime($editO->result['created_at'])).'" disabled>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="'.$editO->result['name'].'">'.$editO->result['status'].' (Current) </option>
                        <option value="PENDING">PENDING</option>
                        <option value="PROCESSING">PROCESSING</option>
                        <option value="DELIVERED">DELIVERED</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Message</label>
                    <input class="form-control" type="text" name="message" value="'.$editO->result['message'].'">
                </div>

                <div class="form-group">
                    <input class="btn btn-sm btn-primary" type="submit" name="update_order" value="Save">
                </div>
                </form>
              </div>
               ';
    }

    if(isset($_POST['update_order']))
    {
        $id = htmlentities($_REQUEST['order']);
        $status = htmlentities($_POST['status']);
        $message = htmlentities($_POST['message']);

        $updateOrder = new Order;
        if($updateOrder->updateOrder($id, $status, $message))
        {
            echo "<script>alert('Order Updated Successfully!')</script>";

        }
        else
        {
            die('Error');
        }

    }
}


?>
