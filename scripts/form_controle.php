<?php
 session_start();

if(isset($_POST['submit'])){
    $validation=0;
    function test_inputs($input){
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        $input = htmlspecialchars_decode($input);
        return $input;
    }
    // validation of first name and last name
    $pattern ="/^[a-zA-Z]*$/";
    $fname=test_inputs($_POST['fname']);
    if(!preg_match($pattern,$fname)){
        $fnameErr="only letters,and whitespace characters are allowed";
        $_SESSION['users']['fname']['fnameErr']=$fnameErr;
    }
    else {
         $_SESSION['users']['fname']['succes']=$fname; 
        ++$validation;
    } 
    //lname
    $lname=test_inputs($_POST['lname']);
    if(!preg_match($pattern,$lname)){
        $lnameErr="only letters,and whitespace characters are allowed";
        $_SESSION['users']['lname']['lnameErr']=$lnameErr;
    }else {
        ++$validation;
         $_SESSION['users']['lname']['succes']=$lname;
    }
    //email validation 
    $email=test_inputs($_POST['email']);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    $emailerr="invalid email";
    else{
        ++$validation;
        $_SESSION['users']['email']=$email;
    } 
    
    //phone number validation
    $phone=test_inputs($_POST['phone']);
    $pattern="/(06|07)[0-9]{2}/";
    if(!preg_match($pattern,$phone)){
      $phoneErr="invalid phone number";
      $_SESSION['users']['phone']['phoneErr']=$phoneErr;  
    }
    else{
        ++$validation;
        $_SESSION['users']['phone']['succes']=$phone;
    } 
    
    //identification card validation
    $Cin=test_inputs($_POST['Cin']);
    $pattern="/^([a-zA-Z]|[a-zA-Z]{2})[0-9]{6}$/";
    if(!preg_match($pattern,$Cin)){
        $CinErr="invalid card identification";
        $_SESSION['users']['Cin']['CinErr']=$CinErr;
    }
    
    else{
        $_SESSION['users']['Cin']['succes']=$Cin;
        ++$validation;
    } 
    
    //diplomat
    $diploma=$_POST['diploma'];
    $_SESSION['users']['Diplomat']=$diploma;
    ++$validation;
    //Gender
    $gender=$_POST['Gender'];
    $_SESSION['users']['Gender']=$gender;
    ++$validation;
    
    //Birthday
    $birthday=$_POST['birthday'];
    $_SESSION['users']['birthday']=$birthday;
    ++$validation;    
    //files validation
    $target_dir="../files/";
    $target_file=$target_dir.basename($_FILES['image']['name']);

    if(!move_uploaded_file($_FILES['image']['tmp_name'],$target_file)){
       $imageerr="an error occurred while moving uploaded your file";
       $_SESSION['users']['image']['imageErr']=$imageerr; 
    }
    else {
        ++$validation;
        $_SESSION['users']['image']=$target_file;

    } 
    
    $target_dir="../files/";
    $target_file=$target_dir.basename($_FILES['cv']['name']);

    if(!move_uploaded_file($_FILES['cv']['tmp_name'],$target_file)){
         $imageerr="an error occurred while moving uploaded your file";
         $_SESSION['users']['cv']['cvErr']=$imageerr;
    }
   
    else
    {
        ++$validation;
        $_SESSION['users']['cv']=$target_file;
    } 

    if( $validation == 10){

        try{
                $Db=new PDO('mysql:host=localhost;dbname=Crudnative','root','');
               // echo"CONNECTING SUCCESSFILY";
            }
            catch(PDOException $e){
                echo "ERROR"."\t". $e->getMessage();
            }
            $name=$_SESSION['users']['fname']['succes'];
            $lname=$_SESSION['users']['lname']['succes'];
            $email=$_SESSION['users']['email'];
            $birthdate=$_SESSION['users']['birthday'];
            $number=$_SESSION['users']['phone']['succes'];
            $image=$_SESSION['users']['image'];
            $cv=$_SESSION['users']['cv'];
            $cin=$_SESSION['users']['Cin']['succes'];
            $diplomat=$_SESSION['users']['Diplomat'];
            $Gender=$_SESSION['users']['Gender'];
          
            
            if (isset($_SESSION['users']['getid'])) {
                //update data   
                  $id=$_SESSION['users']['getid'];

                $stmt= $Db->prepare("UPDATE `user` SET `name`=?,`lname`=?,`email`=?,`birthdate`=?,`number`=?,`image`=?,`cv`=?,`cin`=?,`diplomat`=?,`gender`=? WHERE id=$id");
                $stmt->execute([$name, $lname, $email, $birthdate, $number, $image, $cv, $cin, $diplomat, $gender]);
                    session_destroy();
                    header('Location: ../admin.php');

                     }else{ 
        
             $pdoQuery = "INSERT INTO `user`( `name`, `lname`, `email`, `birthdate`, `number`, `image`, `cv`, `cin`, `diplomat`, `gender` ) 
            VALUES (:name,:lname,:email,:birthdate,:number,:image,:cv,:cin,:diplomat,:gender)";
    
            $pdoResult = $Db->prepare($pdoQuery);
            
            $pdoExec = $pdoResult->execute(array(":name"=>$name,":lname"=>$lname,"email"=>$email,"birthdate"=>$birthdate,"number"=>$number,"image"=>$image,"cv"=>$cv,"cin"=>$cin,"diplomat"=>$diplomat,"gender"=>$Gender));
            
              //  check if mysql insert query successful
        session_destroy();
      header('Location: ../index.php');
    }
    }else
        header('Location: ../registration.php');
}
?>