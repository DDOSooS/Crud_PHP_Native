<?php
if (isset($_POST['submit'])) {
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
    try {
        $Db = new PDO('mysql:host=localhost;dbname=Crudnative', 'root', '');
        // echo"CONNECTING SUCCESSFILY";
    } catch (PDOException $e) {
        echo "ERROR" . "\t" . $e->getMessage();
    }

    $pdoQuery = "SELECT  * FROM `user` WHERE email=? AND password=? AND type=1";

    $pdoResult = $Db->prepare($pdoQuery);

    $del = $pdoResult->execute([$email, $password]);
    $count = $pdoResult->rowCount();
    if ($count == 1)
        header('Location:../admin.php');
    else if ($count == 0) {
        $pdoQuery1 = "SELECT  * FROM `user` WHERE email=? AND password=? AND type=0";

        $pdoResult1 = $Db->prepare($pdoQuery1);

        $pdoResult1->execute([$email, $password]);
        
        $count1 = $pdoResult1->rowCount();

        if ($count1 == 1){ 
            while ( $id=$pdoResult1->fetch())

             header('Location:../user.php?userno='.$id[0].'');
        }
           
        else
            header('Location:../index.php?error=1');

    }
}
?>