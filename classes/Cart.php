<?php 

class Cart extends Config 
{
    public $id ;
    protected $user_id;
    protected $product_id;
    protected $product_qty;
    public $result;
    public $count;

    public function createCart( $user_id , $product_id)
    {
        // $this->id = $id;
        $this->user_id = $user_id;
        $this->product_id = $product_id;

        $con = $this->con();
        $querySelect = "SELECT * FROM cart WHERE product_id = $this->product_id AND user_id = $this->user_id ";
        $this->result = mysqli_query($this->con, $querySelect);
        if( $this->result->num_rows>0)
        {
               // update product qty if the user click the add_to_cart button
               $query2 = $this->con->query("UPDATE cart SET product_qty = product_qty+1 , updated_at = now() WHERE product_id = $this->product_id AND user_id = $this->user_id ");
               if($query2)
               {
                   return true;
               }
               else
               {
                   return false;
               }
        }
        else
        {   
            // if the product does not exist yet in the cart then the product will be added to the cart..
            $query = $this->con->query("INSERT INTO cart (user_id , product_id , product_qty) VALUES ('$this->user_id', '$this->product_id' , product_qty+1)");
            if($query)
            {
    
                return true;
             
                
            }
            else
            {
                return false;
            }
        }
      
    }

    public function showCart($user_id)
    {
        $this->user_id = $user_id;

        $con = $this->con();
        $query = $this->con->query("SELECT products.title , products.img , products.price , products.qty , products.category, cart.id, cart.product_id , cart.product_qty FROM products INNER JOIN cart ON cart.product_id = products.id WHERE cart.user_id = $this->user_id");
        $this->result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        // print_r($this->result);

        return $this->result;
    }

    //Update Cart Qty 
    public function increaseCartProductQty($id , $product_id , $user_id)
    {
         // $check = "SELECT products.qty ,  cart.product_qty FROM products INNER JOIN cart ON  products.id = cart.product_id  WHERE cart.id = $this->id AND cart.product_id = $this->product_id AND cart.user_id = $this->user_id";

        $this->id = $id;
        $this->product_id = $product_id;
        $this->user_id = $user_id;

        $con = $this->con();
        $check = "SELECT cart.product_qty , products.qty FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.id = $this->id AND cart.product_id = $this->product_id AND cart.user_id = $this->user_id";
        $queryselect = mysqli_query($this->con, $check);
        $this->result = mysqli_fetch_assoc($queryselect);

        // print_r($this->result);
       

        //check if the cart.product_qty is greater than or equal the product.qty 
        if($this->result['product_qty'] >= $this->result['qty'])
        {
            echo '<script>alert("The product exceeded its quantity") </script>';
            die;
        }
        else
        {
            
            $query = $this->con->query("UPDATE cart SET product_qty = product_qty + 1 WHERE id = $this->id AND product_id = $this->product_id AND user_id = $this->user_id");
            return true;
            
        }

       
           
    }

    public function decreaseCartProductQty($id ,$product_id, $user_id)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->user_id = $user_id;
        $con = $this->con();
        $check = "SELECT cart.product_qty , products.qty FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.id = $this->id AND cart.product_id = $this->product_id AND cart.user_id = $this->user_id";
        $queryselect = mysqli_query($this->con, $check);
        $this->result = mysqli_fetch_assoc($queryselect);

        // check if the cart.product_qty is lower than 0 then it will throw and error
        if($this->result['product_qty'] <= 0)
        {
            echo '<script>alert("Cannot process at the moment") </script>';
            die;
        }
        else
        {
            $query = $this->con->query("UPDATE cart SET product_qty = product_qty - 1 WHERE id = $this->id AND user_id = $this->user_id");
            if($query)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
      
    }

    public function removeProductFromCart($id, $product_id, $user_id)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->user_id = $user_id;
        $con = $this->con();
        $query = $this->con->query("DELETE FROM cart WHERE id = $this->id AND product_id = $this->product_id AND user_id = $this->user_id");
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

}












    // public function CartRowCount($user_id)
    // {
    //     $this->user_id = $user_id;
    //     $con = $this->con();
    //     $query = "SELECT * FROM cart WHERE user_id = $this->user_id";
    //     $this->result = mysqli_query($this->con , $query);
    //     $this->count = $this->result->num_rows;

    //     return $this->count;
    // }


    // public function validateCartProductQty($id , $product_id , $user_id)
    // {
    //     $this->id = $id;
    //     $this->product_id = $product_id;
    //     $this->user_id = $user_id;

    //     $con = $this->con();
    //     $check = "SELECT cart.product_qty , products.qty FROM cart INNER JOIN products ON cart.product_id = products.id WHERE cart.id = $this->id AND cart.product_id = $this->product_id AND cart.user_id = $this->user_id";
    //     $queryselect = mysqli_query($this->con, $check);
    //     $this->result = mysqli_fetch_assoc($queryselect);

    //     return $this->result;
    // }




?>