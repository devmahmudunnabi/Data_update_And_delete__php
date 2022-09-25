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
    $id =$_GET['shykat'];
        $shykat = new sss;
        $result = $shykat->findData($id);
        $data = $result->fetch_assoc();
        if(isset($_POST['update'])){
            $shykat->update($_POST,$id);
        }


    ?>
    <form method="POST">

        <div class="form-group mt-5">
            <label >name</label>
            <input class="form-control" type="text" placeholder="name" name="name" value="<?php echo $data["name"] ?>" >
        </div>
        <div class="form-group">
            <label >email</label>
            <input class="form-control" type="email" placeholder="email" name="email" value="<?php echo $data["email"] ?>" >
        </div>
        <div class="form-group">
            <label >Status</label>
            <select name="status" class="form-control">
            <?php
            
            if($data["status"]==1){
                if($data["status"]){
                   echo '<option value="1">Active</option>' ;
                }
                else{
                    echo' <option value="2">Inactive</option>';
                }
            }
            ?>


                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
        <button class="form-control mt-3 btn btn-success" name="update">Update</button>
    </form>
</div>








<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>