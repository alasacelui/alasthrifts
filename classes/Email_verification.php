<?php 

class Email_verification extends Config
{
    protected $token;

    public function verify($token)
    {
        $this->token = $token;

        $con = $this->con();
        $query= $this->con->query("UPDATE users set token = NULL , is_verified = 1 , updated_at = now() WHERE token = '$this->token'");

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