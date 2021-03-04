<?php


class Product extends Config 
{   
    protected $user_id;
    protected $id;
    protected $title ;
    protected $description ;
    protected $price ;
    protected $qty ;
    protected $file ;
    protected $category ;
    public $result;

    
    public function createProduct($user_id, $title, $description, $price, $qty, $file, $category)
    {   
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->qty = $qty;
        $this->file = $file;
        $this->category = $category;
      

        $con = $this->con();
        $query = $this->con->query("INSERT INTO products (user_id, title,description,price,qty,img,category) VALUES ('$this->user_id','$this->title','$this->description','$this->price',
        '$this->qty','$this->file','$this->category')");
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function showAllProducts()
    {
        $con = $this->con();
        $query = $this->con->query("SELECT * FROM products ORDER BY id DESC LIMIT 5");
        $this->result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $this->result;
    }

    public function editProduct($id)
    {
        $this->id = $id ;
        $con = $this->con();
        $query = $this->con->query("SELECT * FROM products WHERE id = $this->id");
        $this->result = mysqli_fetch_assoc($query);

        return $this->result;
    }

    public function updateProduct($user_id, $id, $title , $description, $price , $qty , $file, $category)
    {   
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->qty = $qty;
        $this->file = $file;
        $this->category = $category;
        
        $con = $this->con();
        $query = $this->con->query("UPDATE products SET user_id = $this->user_id , title = '$this->title', description = '$this->description', price = $this->price , qty = $this->qty , img = '$this->file', category = '$this->category', updated_at = now() WHERE id = $this->id");
        if($query)
        {
            return true;
        }
        else 
        {
           return false;
        }
    }

    public function updateProductWithoutImg($user_id, $id, $title , $description, $price , $qty, $category)
    {   
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->qty = $qty;
        $this->category = $category;
        
        $con = $this->con();
        $query = $this->con->query("UPDATE products SET user_id = $this->user_id , title = '$this->title', description = '$this->description', price = $this->price , qty = $this->qty , category = '$this->category', updated_at = now() WHERE id = $this->id");
        if($query)
        {
            return true;
        }
        else 
        {
           return false;
        }
    }


    public function deleteProduct($id)
    {
        $this->id = $id;
        $con = $this->con();
        $query = $this->con->query("DELETE FROM products WHERE id = $this->id");
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function showSnapback()
    {
        $con = $this->con();
        $query = $this->con->query("SELECT * FROM products WHERE category = 'snapback'");
        $this->result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $this->result;
    }
}

?>