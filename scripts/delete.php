<?php
$con = new mysqli("localhost","root","","crudnative");
$id = $_GET['id'];
// var_dump($_GET);
// echo $_GET['id'];
 $phpdatabase = "DELETE FROM user WHERE id= $id"; 
 if(mysqli_query($con ,$phpdatabase))header('Location:../admin.php');;



?>