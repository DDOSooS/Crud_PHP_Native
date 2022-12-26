<?php session_start();

if(isset($_GET['id'])){
  $id=$_GET['id'];
  var_dump($_GET);
   try{
                $pdo=new PDO('mysql:host=localhost;dbname=Crudnative','root','');
               // echo"CONNECTING SUCCESSFILY";
            }
            catch(PDOException $e){
                echo "ERROR"."\t". $e->getMessage();
            }
            $personne = $pdo->query("SELECT * FROM user WHERE id=$id");
            $personnes = $personne->fetchAll();
            $_SESSION['users']['fname']['succes']=$personnes[0]['name'];
            $_SESSION['users']['lname']['succes']=$personnes[0]['lname'];
            $_SESSION['users']['email']=$personnes[0]['email'];
            $_SESSION['users']['birthday']=$personnes[0]['birthdate'];
            $_SESSION['users']['phone']['succes']=$personnes[0]['number'];
            $_SESSION['users']['image']=$personnes[0]['image'];
            $_SESSION['users']['cv']=$personnes[0]['cv'];
            $_SESSION['users']['Cin']['succes']=$personnes[0]['cin'];
            $_SESSION['users']['Diplomat']=$personnes[0]['diplomat'];
            $_SESSION['users']['Gender']=$personnes[0]['gender'];
            $_SESSION['users']['getid']=$id;


}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
  <body>
    <div class="modernForm">
      <div class="imageSection">
        <div class="image">
          <div class="overlay"></div>
          <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-4525.jpg?w=826&t=st=1670199017~exp=1670199617~hmac=5f9bfa881181955a703dfc6feaf581d4c15c3d612f2f0e0d66b5e85f2f01644a" alt="pexels-yuri-manei-2272854">
        </div>
      </div>
      <div class="contactForm">
        <h1>Registaration Form</h1>
       
        <form method="POST" action="scripts/form_controle.php" enctype="multipart/form-data">

        <div class="container">

            <div class="name">
                <label class="mb-2 text-danger" for="fnameEroor"> <?php if(isset($_SESSION['users'] ['fname']['fnameErr'])) echo $_SESSION['users']['fname']['fnameErr']; ?></label>
                <label for="fullName"> Name:</label>
                <input type="text" name="fname"  value="<?php if(isset($_SESSION['users']['fname']['succes'])) echo $_SESSION['users']['fname']['succes'];?>" placeholder="ex: Lindsey " required/>
            </div>

            <div class="name">
                <label class="mb-2 text-danger" for="lnameEroor"> <?php if(isset($_SESSION['users'] ['lname']['lnameErr'])) echo $_SESSION['users']['lname']['lnameErr'];  ?></label>
                <label for="lastName"> lastName:</label>
                <input type="text" name="lname"  value="<?php if(isset($_SESSION['users']['lname']['succes'])) echo $_SESSION['users']['lname']['succes'];?>" placeholder="ex:  Wilson" required/> 
            </div>

            <div class="name">
                <label for="email">Your Email:</label>
                <input type="email" name="email"  value="<?php if(isset($_SESSION['users']['email'])) echo $_SESSION['users']['email'];?>"id="email" required />
            </div>

            <div class="name">
                <label class="mb-2 text-danger" for="lnameEroor"> <?php if(isset($_SESSION['users'] ['phone']['phoneErr'])) echo $_SESSION['users']['phone']['phoneErr'];  ?></label>
                <label for="Number">Phone Number:</label>
                <input type="text" name="phone" value="<?php if(isset($_SESSION['users']['phone']['succes'])) echo $_SESSION['users']['phone']['succes'];?>" required />
            </div> 

            <div class="name">
                <label class="mb-2 text-danger" for="lnameEroor"> <?php if(isset($_SESSION['users'] ['Cin']['CinErr'])) echo $_SESSION['users']['Cin']['CinErr'];  ?></label>
                <label for="Cin">Cin:</label>
                <input type="text" name="Cin"  value="<?php if(isset($_SESSION['users']['Cin']['succes'])) echo $_SESSION['users']['Cin']['succes'];?>" required />
            </div>

            <div class="name">
                <label for="birthday">birthday:</label>
                <input type="date" name="birthday"  value="<?php if(isset($_SESSION['users']['birthday'])) echo $_SESSION['users']['birthday'];?>" required />
            </div>

            <div class="  col-5 w-100 " >
                <label class="mb-2" for="diplom">Diploma</label>
                <select name="diploma" id="" class="form-control" required>
                    <option value="" disabled >Select Your  Diploma</option>
                    <option value="bts" <?php if(isset($_SESSION['users']['Diplomat'])&&$_SESSION['users']['Diplomat']=="bts") echo "selected"?>>bts</option>
                    <option value="dut" <?php if(isset($_SESSION['users']['Diplomat'])&&$_SESSION['users']['Diplomat']=="dut") echo "selected"?>>dut</option>
                    <option value="dts"<?php if(isset($_SESSION['users']['Diplomat'])&&$_SESSION['users']['Diplomat']=="dts") echo "selected"?>>dts</option>
                    <option value="other" <?php if(isset($_SESSION['users']['Diplomat'])&&$_SESSION['users']['Diplomat']=="other") echo "selected"?>>other</option>
                </select>
            </div>
            <div class="name mb5" >
                 <label class="mb-2 text-danger" for="lnameEroor"> <?php if(isset($_SESSION['users'] ['GenderER'])) echo $_SESSION['users']['GenderER'];  ?></label>
                <label  for="form-check-label ">Gender</label> <br>
                <label class="form-check-label mt-2 " for="Gender">Male</label>
                <input  type="radio" value="male" name="Gender"   <?php if (isset($_SESSION['Gender']) && $_SESSION['Gender'] == "male"){ ?> checked<?php }?>>
                <label class="form-check-label mt-2 " for="Gender"> Female</label>
                <input  type="radio" name="Gender" value="female" <?php if (isset($_SESSION['Gender']) && $_SESSION['Gender'] == "female"){?> checked <?php }?>>
                </div>
            </div>


            <div class="name mt-2  w-75">
                <label class="mb-2 text-success" for="lnameEroor"> <?php if(isset($_SESSION['users'] ['cv'])) echo explode("/",$_SESSION['users']['image'])[2];  ?></label>
                <label for="image ">image:</label>
                <input type="file" name="image" accept="image/png, image/gif, image/jpeg"  value=""  required />
            </div>

            <div class="name w-75">
                <label class="mb-2 text-success" for="lnameEroor"> <?php if(isset($_SESSION['users'] ['cv'])) echo explode("/",$_SESSION['users']['cv'])[2];  ?></label>
                <label for="cv">CV:</label>
                <input type="file" name="cv" id="cv" accept="application/pdf " value="jksdflkasjfdlk" required />
            </div>
          <div class="d-flex justify-content-evenly ">
              <input type="submit" value="Register" name="submit" > 
          </div>
        </div>
        </form>
      </div>
    </div>
  </body>
</body>
</html>