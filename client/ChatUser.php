<?php

class User{
    private $user;
    private $con;

    public function  __construct($con, $user){
        $this->con = $con;
        $user_details_query = mysqli_query($con, "SELECT * FROM user WHERE uname='$user'");
        $this->user = mysqli_fetch_array($user_details_query);
    }

    // get username
    public function getUserName(){
        return $this->user['uname'];
    }


    //get first and last name
    public function getFirstAndLastName()
    {
        // fetch data from database
        return $this->user['fname']." ".$this->user['lname'];
    }

    /**
     * check if user closed
     */
    public function isClosed()
    {
        $closed = $this->user['user_closed'];
        if($closed == "yes"){
            return true;
        }else{
            return false;
        }
    }

    }

?>