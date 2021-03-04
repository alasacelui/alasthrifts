<?php 

class Statistic extends Config
{

   public $count;
  
    

    public function countUser()
    {
        $con = $this->con();
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->con, $query);
        $count = $result->num_rows;
        
        return $count;
     
     
    }

    public function countProducts()
    {
        $con = $this->con();
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->con, $query);
        $count = $result->num_rows;
        
        return $count;
    }

    public function countOrders()
    {
        $con = $this->con();
        $query = "SELECT * FROM orders";
        $result = mysqli_query($this->con, $query);
        $count = $result->num_rows;
        
        return $count;
    }
}

?>