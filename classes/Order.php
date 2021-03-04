<?php 

class Order extends Config
{
    protected $id;
    protected $user_id;
    protected $cart_id ;
    protected $product_id;
    protected $amount;
    public $result;
    protected $status;
    protected $message;

    public function createOrder($user_id , $cart_id,$product_id, $amount)
    {
        $this->user_id = $user_id;
        $this->cart_id = $cart_id;
        $this->product_id = $product_id;
        $this->amount = $amount;
        $con = $this->con();
        $query = $this->con->query("INSERT INTO orders (user_id, cart_id ,product_id, amount ) VALUES ($this->user_id, $this->cart_id,$this->product_id, $this->amount)");
        if($query)
        {   
            // if the user order the added cart then the cart will be totaly removed .
            $queryremoveCart = $this->con->query("DELETE FROM cart WHERE id= $this->cart_id AND user_id = $this->user_id");
            return true;
           
           
        }
        else
        {
            return false;
        }
    }

    public function showOrder($user_id )
    {
        $this->user_id = $user_id;
        $con = $this->con();
        $query = $this->con->query("SELECT products.title , products.img , products.category , orders.amount , orders.status, orders.message, orders.created_at FROM orders INNER JOIN products ON orders.product_id = products.id WHERE orders.user_id = $this->user_id ORDER BY orders.id DESC");
        $this->result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $this->result;

    }

    public function showOrders()
    {
        $con = $this->con();
        $query = $this->con->query("SELECT users.name , products.title , products.img , products.category , orders.id, orders.amount , orders.status, orders.created_at FROM orders INNER JOIN products ON orders.product_id = products.id INNER JOIN users ON products.user_id = users.id ORDER BY orders.id DESC");
        $this->result = mysqli_fetch_all($query , MYSQLI_ASSOC);

        // return $this->result;
    }

    public function editOrder($id)
    {
        $this->id = $id;

        $con = $this->con();
        $query = $this->con->query("SELECT users.name , products.title , products.img , products.category , orders.id, orders.amount , orders.status,orders.message, orders.created_at FROM orders INNER JOIN products ON orders.product_id = products.id INNER JOIN users ON products.user_id = users.id WHERE orders.id = $this->id");
        $this->result = mysqli_fetch_assoc($query);
        return $this->result;
    
    }

    public function updateOrder($id, $status, $message)
    {
        $this->id = $id;
        $this->status = $status;
        $this->message = $message;

        $con = $this->con();
        $query = $this->con->query("UPDATE orders SET status = '$this->status', message= '$this->message' WHERE id = $this->id");
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

?>