<?php

require_once 'user.php';

class admin extends user
{
    public function Redirect(){
        header('Location: admin_view.php');
    }
}