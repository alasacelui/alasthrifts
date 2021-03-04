<?php

class Config 
{
   protected $con = NULL ;

    public function con()
    {
        $this->con = new mysqli('localhost', 'root', '', 'test');

        if ($this->con -> connect_errno) {
            return "Failed to connect to MySQL: " . $this->con -> connect_error;
            exit();
  }
    }
}