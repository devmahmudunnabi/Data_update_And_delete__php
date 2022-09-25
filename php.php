<?php
  class sss{
      private $con;
      function __construct(){
          $this->con = new mysqli("localhost","root", "","ss");
      }
      function insert ($name, $email, $status){
          $result = $this->con->query("INSERT INTO shykat(name,email,status)VALUES('$name','$email','$status')");
          if($result){
             echo ' <span class="alert alert-success"> Data  save</span>';
          }
          else{
              echo ' <span class="alert alert-danger"> Data not save</span>';
          }

      }
        function show(){
          $result = $this->con->query("SELECT *FROM shykat");
          return  $result;
        }
        function delete($id){
          $result =$this-> con->query("DELETE FROM shykat WHERE id='$id'");  
          if ($result){
            header("location:index.php");
            return true;
          }
          else{
            return false ;

          }
        }
        function findData($id){
          $result = $this->con->query("SELECT *FROM shykat WHERE id='$id' LIMIT 1");
          return $result;
        }
        function update($data,$id){
          $name= $data["name"];
          $email= $data["email"];
          $status= $data["status"];
          $result = $this->con->query("UPDATE shykat SET name='$name', email='$email', status ='$status' WHERE id='$id'");
          if($result){
            header("location: index.php");
          }
        }

  }
?>