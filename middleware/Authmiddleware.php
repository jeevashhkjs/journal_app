<?php

class Authmiddleware{
  
    public function handler(){
        if (!isset($_SESSION['login'])) {
            header('Location: /registration');
        }
    }


}