<?php 
    if(isset($_POST['submit'])){
            function input_test($data)
            {
                htmlspecialchars($data);
                trim($data);
                strip_tags($data);
                return $data;
            }
            $email = $password = " ";
            $email = input_test($_POST['email']);
            $password = input_test($_POST['password']);
            try{
                $Db=new PDO('mysql:host=localhost;dbname=Crudnative','root','');
               // echo"CONNECTING SUCCESSFILY";
            }
            catch(PDOException $e){
                echo "ERROR"."\t". $e->getMessage();
            }

            $pdoQuery = "SELECT  * FROM `user` WHERE email=? AND password=?";
    
            $pdoResult = $Db->prepare($pdoQuery);
            
            $del = $pdoResult->execute([$email,$password]);
            $count=$pdoResult->rowCount();
             if ($count == 1)
             header('Location:../admin.php');
    else
        header('Location:../index.php?error=1');
            // $pdoQuery = "SELECT  * FROM `user` ";
    
            // $pdoResult = $Db->prepare($pdoQuery);
            
            // $pdoResult->execute();

            // while($row=$pdoResult->fetch()){
            //     echo $row['email']."<br/>";
            //      echo $row['password']."<br/>";
            // }
    //         $count=$pdoResult->rowCount();
    // if ($count == 1) {
    //     echo "login success";
    //     echo $count;
    // } else {
    //     echo "login failure";
    //     echo $count;
    // }


            
              //  check if mysql insert query successful
           
        }
?>