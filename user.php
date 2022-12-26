<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   
</head>
<body>
    <?php 
        if(isset($_GET['userno'])){ 
            try {
                    $Db = new PDO('mysql:host=localhost;dbname=Crudnative', 'root', '');
                    // echo"CONNECTING SUCCESSFILY";
                } catch (PDOException $e) {
                    echo "ERROR" . "\t" . $e->getMessage();
                }

        
            $pdoQuery1 = "SELECT  * FROM `user` WHERE id=? ";

            $pdoResult1 = $Db->prepare($pdoQuery1);

            $pdoResult1->execute([$_GET['userno']]);
            
            $count1 = $pdoResult1->rowCount();

                while ( $row=$pdoResult1->fetch()){
                    $name=$row['name'];
                    $lname=$row['lname'];
                    $email=$row['email'];
                    $image=$row['image'];
                    $cin=$row['cin'];
                    $number = $row['number'];
                    $birthday=$row['birthdate'];

            }

    ?>
         <a href="index.php" class=" mt-4 h-100 p-2 w-50 bg-warning  text-center rounded pb-2 text-black text-decoration-none ">Log out</a>
        <section class="" style="background-color: #f4f5f7;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-dark"
                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src="<?php echo substr($image,1); ?>"
                            alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                        <h5><?php echo $lname . " " . $name; ?></h5>
                        <p>Web Designer</p>
                        <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                        <div class="card-body p-4">
                            <h6>Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                            <div class="col-6 mb-3">
                                <h6>Email</h6>
                                <p class="text-muted"><?php echo $email; ?></p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>Phone</h6>
                                <p class="text-muted"><?php echo $number; ?></p>
                            </div>
                            </div>
                            <h6>Personnal Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                            <div class="col-6 mb-3">
                                <h6>Cin</h6>
                                <p class="text-muted"><?php echo $cin; ?></p>
                            </div>
                            <div class="col-6 mb-3">
                                <h6>birthday</h6>
                                <p class="text-muted"><?php echo $birthday; ?></p>
                            </div>
                            </div>
                            <div class="d-flex justify-content-start">
                            <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                            <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                            <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
<?php }?>
</body>
</html>