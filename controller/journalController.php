<?php

require_once 'model/usermodel.php';

class UserController
    {

    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }



    public function home() 
    {
        require 'views/index.html';
    }



    public function writing() 
    { 
        
        require "views/writing.html";

    }

    public function starring() 
    {
       $this->userModel->starring($_REQUEST);
    }
    public function deleted()
    {
        $this->userModel->deleted($_REQUEST);
    }

    public function getdata() {

       $this->userModel->getdata();
  

    }

    public function store() {
        $this->userModel->store($_REQUEST);
    }
    

       public function trashview(){

         require 'views/trash.html';

        }

        public function deletedDatas()
        {
           $this->userModel->trash();
        
        }
        public function starreds()
        {
        require 'views/starred.html';
        }

        public function restore(){
           $this->userModel->restore($_REQUEST);
            
        }

        public function  restoreAll(){
            $this->userModel->restoreAll();
            
        }

        public function deleteAll()
        {
            $this->userModel->deleteAll();
        } 

        public function PermanentDelete()
        {
            $this->userModel->PermanentDelete($_REQUEST);
        }


        public function registration(){
            require 'views/Signup.html';
        }

        public function registrationLogic(){
            $this->userModel->registerLogic($_POST);
        }
        

        public function login(){
            require 'views/Login.html';
        }

        public function loginLogic(){
            $this->userModel->loginLogic($_POST);
        }

        public function logout(){
            $this->userModel->logout();
        }

}
