<?php


class User extends Config
{
    public $id;
    protected $name ;
    protected $email ;
    protected $phone ;
    protected $address ;
    public $password ;
    public $result ;
    protected $token;
  

    public function registerUser($name , $email , $phone , $address, $password, $token)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->password = $password;
        $this->token = $token;

        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $con = $this->con();
        $user_check = $this->con->query("SELECT id , is_verified FROM users WHERE email = '$this->email' ");
        if($user_check->num_rows>0)
        {
           echo "<script>alert('Email is already taken')</script>";
        }
        else
        {
            $query = $this->con->query("INSERT INTO users (name , email , phone , address , password, token) VALUES ('$this->name', '$this->email',  '$this->phone',  '$this->address',  '$this->password', '$this->token')");
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



    public function login($email , $password)
    {   
        $this->email = $email;
        $this->password = $password;

        $con = $this->con();
        $query = $this->con->query("SELECT * FROM users WHERE email = '$this->email' LIMIT 1");
        $this->result = mysqli_fetch_assoc($query);
      
        if(password_verify($this->password, $this->result['password']))
        {
            if($this->result['is_verified'] == 0)
            {
                echo "<script>alert('You are not yet verified . Please verify first your email address..')</script>";
            }
            else
            {
                return $this->result;
            }
           
        }
        else
        {
            return false;
        }

     
    }

    public function showAllUsers()
    {
        $con = $this->con();
        $query = $this->con->query("SELECT * FROM users WHERE role = 'user'");
        $this->result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $this->result;
    }

    public function deleteUser($id)
    {
        $this->id = $id;
        $con = $this->con();
        $query = $this->con->query("DELETE FROM users WHERE id = $this->id");
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function editUser($id)
    {
        $this->id = $id;
        $con = $this->con();
        $query = $this->con->query("SELECT * FROM users WHERE id = $this->id");
        $this->result = mysqli_fetch_assoc($query);

        return $this->result;

    }

    public function updateU($id, $name , $email , $phone , $address, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->password = $password;
        $con = $this->con();
        $query = $this->con->query("UPDATE users SET name = '$this->name', email='$this->email', phone = '$this->phone', address = '$this->address', password = '$this->password', updated_at = now() WHERE id = $this->id");
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