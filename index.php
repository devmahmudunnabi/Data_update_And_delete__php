<?php
  include "php.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="col-md-8 offset-md-2 mt-4">
    <?php
         $s= new sss;
         if(isset($_POST["save"])){
             $name =$_POST["name"];
             $email =$_POST["email"];
             $status =$_POST["status"];
             if(empty($name)){
                 echo'<span class="alert alert-danger"> name is empty</span>';
             }
             else if(empty($email)){
                 echo'<span class="alert alert-danger"> email is empty</span>';
             }
             else if(empty($status)){
                 echo'<span class="alert alert-danger"> status is empty</span>';
             }
             else{
                $mgs =$s->insert($name,$email,$status);
             }   
         }
          if(isset($_GET["shykat"])){
            $id =$_GET['shykat'];    
            if( $s->delete($id)){
                echo'<span class="alert alert-success">data delete</span>';
            }
            else{
                echo'<span class="alert alert-danger">data not delete</span>';
            }
          }


    ?>
    <form method="POST">

        <div class="form-group mt-5">
            <label >name</label>
            <input class="form-control" type="text" placeholder="name" name="name" >
        </div>
        <div class="form-group">
            <label >email</label>
            <input class="form-control" type="email" placeholder="email" name="email" >
        </div>
        <div class="form-group">
            <label >Status</label>
            <select name="status" class="form-control">
                <option value="">---secect status-----</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
        <button class="form-control mt-3 btn btn-success" name="save">save</button>
    </form>
</div>

    <div class="col-md-8 offset-md-2 mt-4">
        <table  class="table table-striped">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>email</th>
                <th>status</th>
                <th>actin</th>
            </tr>
            <?php
              $ss =$s->show();
              $sl=1;
              while ($data= $ss->fetch_assoc()){
                  echo '<tr>  
                            <td>'.$sl.'</td>
                            <td>'.$data["name"].'</td>
                            <td>'.$data["email"].'</td>
                            <td>'.$data["status"].'</td>
                            <td>                          
                            <a href="update.php?shykat='.$data["id"].'" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete'.$data["id"].'" ><i class="fa-solid fa-trash"></i></a>                            
                            </td>
                        </tr> ';
                  $sl++;
            ?>
                  <!-- Modal -->
            <div class="modal fade" id="delete<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                             Are you sure delete this items.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                            <!-- iMportent -->
                            <!-- <a href="delete.php?shykat=<?php echo $data['id'] ?>" type="button" class="btn btn-danger">delete</a> -->
                            <form method ="GET">
                                <button class="btn btn-danger" name ="shykat" value="<?php echo $data['id'] ?>"> 
                                    delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


                  <?php
              }
        ?>



        </table>
    </div>








<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>