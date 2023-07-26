<?php

require "connection.php";


class UserModel extends Database{

   
    public function create($data) {
    
    }
    public function deleted($id) {
       $id = $id['id'];

       $query = $this->db->prepare("SELECT * FROM post where id = $id");
       $query->execute();
       $details = $query->fetchAll();
       
 
       foreach($details as $detail){
       if($detail['delete_at'])
       {
            $query = $this->db->prepare("UPDATE post SET delete_at = Null where id=$id");
            $query->execute();
       }
       else
       {
            $query = $this->db->prepare("UPDATE post SET delete_at = now() where id=$id");
            $query->execute();
       }
  


    }
    $query = $this->db->prepare("SELECT delete_at FROM post where id = $id");
    $query->execute();
    $deletedList = $query->fetchAll();
    echo  json_encode($deletedList);
  


  }
    public function starring($id){
      $id = $id['id'];

      $query = $this->db->prepare("SELECT * FROM post where id = $id");
      $query->execute();
      $details = $query->fetchAll();
      

      foreach($details as $detail){
      if($detail['is_starred'])
      {
           $query = $this->db->prepare("UPDATE post SET is_starred = 0 where id=$id");
           $query->execute();
      }
      else
      {
           $query = $this->db->prepare("UPDATE post SET is_starred = 1 where id=$id");
           $query->execute();
      }
    }



      $querys = $this->db->prepare("SELECT is_starred FROM post where id = $id");
      $querys->execute();
      $detail = $querys->fetchAll();
      



      echo  json_encode($detail);


        
        


    }




    public function trash(){

      $query = $this->db->prepare("SELECT * FROM post where delete_at IS NOT NULL");
      $query->execute();
      $details = $query->fetchAll();

      echo json_encode($details);







  }



  public function getdata(){

      $query = $this->db->prepare("SELECT * FROM post");
      $query->execute();
      $details = $query->fetchAll();

        echo  json_encode($details);




}



  public function store($data)
  {

    $key = array_keys($data);

    $val = array_values($data);

        $sql = "INSERT INTO post (" . implode(', ', $key) . ") "
        . "VALUES ('" . implode("', '", $val) . "')";
      $query =   $this->db->prepare($sql);
      $query->execute();

      header("location:/");

  }

   public function restore($data){
     $restoreId = $data['id'];
     $query = $this->db->prepare("UPDATE post
     SET delete_at = NULL
     WHERE id = $restoreId");
    $details = $query->execute();

     $query = $this->db->prepare("SELECT * FROM post where delete_at IS NOT NULL");
      $query->execute();
      $details = $query->fetchAll();

      echo json_encode($details);

   }

   public function restoreAll(){
    $query = $this->db->prepare("UPDATE post
    SET delete_at = NULL
    WHERE delete_at IS NOT NULL");
    $query->execute();


    header('location:/trash');


   }

   public function deleteAll()
   {
     $query = $this->db->prepare("DELETE FROM post where delete_at IS NOT NULL");
     $query->execute(); 

     require "views/trash.html";   



   } 


   public function PermanentDelete($deletedItems)
   {

    $deletedItemId = $deletedItems['id'];

    $query = $this->db->prepare("DELETE FROM post where id = $deletedItemId");
    $query->execute();



     $deleted = $this->db->prepare("SELECT * FROM post where delete_at IS NOT NULL");
     $deleted->execute();
     $delete = $deleted->fetchAll();
       echo  json_encode($delete);


   }

    public function registerLogic($data){
    
    $username = $data['userName'];
    $email = $data['email'];
    $password = $data['password'];
    $cpassword = $data['cpassword'];

    if($email){
      $statement = $this->db->query("select * from users where email ='$email'");
      $exists = $statement->fetchAll();

  
      if($exists){
          $_SESSION['register'] = "Email Already Exists ! ";
          header('Location:/registration');
      }
      else if ($password != $cpassword ){
        $_SESSION['register'] = "Password Doesn't Match";
        header('Location:/registration'); 
      }
      else{
          $statement = $this->db->query("INSERT into users (username,email,password) values ('$username ','$email', md5('$cpassword'))");
  
          $_SESSION['login'] = [
              'email' => $email
          ];
          header('Location:/');
        }
      }

   }

   public function loginLogic($data){
    $email = $data['email'];
    $password = $data['password'];

    if($email && $password){
    $statement = $this->db->query("select * from users where email ='$email' and password = md5('$password')");
    $exists = $statement->fetchAll();

    if($exists){
        $_SESSION['login'] = [
            'email' => $email
        ];
        header('Location:/');
    }
    else{
        $_SESSION['Incorrect Details'] = "Email Doesn't Exists";
        header('Location:/login');
    }

    $statements = $this->db->query("select username from users where email ='$email'");
    $exist = $statements->fetchAll();
    foreach($exists as $exist){
        $_SESSION['username'] = $exist['username'];
        
    }
     }
   }
   public function logout(){
    session_destroy();
     header('Location: /login');
   }
}