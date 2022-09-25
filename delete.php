<?php
  $id = $_GET["shykat"];
  $con = new mysqli("localhost", "root", "", "ss");
  $con->query("DELETE FROM shykat WHERE id ='$id'");
  header("Location: index.php");



?>