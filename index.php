<?php session_start();
session_destroy();
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
          <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-4525.jpg?w=826&t=st=1670199017~exp=1670199617~hmac=5f9bfa881181955a703dfc6feaf581d4c15c3d612f2f0e0d66b5e85f2f01644a" alt="pexels-yuri-manei-2272854">
        </div>
      </div>
      <div class="contactForm">
        <h1>Log in Form</h1>

        <form method="POST" action="./scripts/login_controle.php" enctype="multipart/form-data">

        <div class="container d-block ">
            <label class="mb-2 text-danger" for="fnameEroor"> <?php if(isset($_GET['error'])) echo " Error  :( - invalide email or passworrd "?></label>
            <div class="name">
                <label for="log"> email :</label>
                <input type="email" name="email"  required/>
            </div>

            <div class="name">
                <label for="password"> Password:</label>
                <input  type="password" name="password"  required/> 
            </div>
          <div class="d-flex justify-content-evenly ">
              <input type="submit" value="login" name="submit" > 
              <a href="registration.php" class=" mt-4 h-100 p-2 w-25 bg-warning  text-center rounded pb-2 text-black text-decoration-none ">Registration</a>
          </div>
        </div>
        </form>
      </div>
    </div>
  </body>
</body>
</html>