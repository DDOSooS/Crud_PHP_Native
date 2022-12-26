<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="./css/style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
  
   <a href="index.php" class=" mt-4 h-100 p-2 w-50 bg-warning  text-center rounded pb-2 text-black text-decoration-none ">Log out</a>

    <table class="table mt-5 w-75 mx-auto">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope>image</th>
      <th scope="col">Name</th>
      <th scope="col">Lname</th>
      <th scope="col">Email</th>
      <th scope="col">Diplomat</th>
      <th scope="col">CV</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
            if (isset($_GET['pageno'])) 
                $pageno = $_GET['pageno'];
            else 
                $pageno = 1;
            
            $no_of_records_per_page = 3;
            
            $offset = ($pageno-1) * $no_of_records_per_page;
          
            
            try{
                $Db=new PDO('mysql:host=localhost;dbname=Crudnative','root','');
               // echo"CONNECTING SUCCESSFILY";
            }
           
            catch(PDOException $e){

                echo "ERROR"."\t". $e->getMessage();

            }
            
            $pdoQ = "SELECT  count(*) FROM `user` ";
    
            $pdoResult1 = $Db->prepare($pdoQ);
            
            $pdoResult1->execute();
            
            while ($row = $pdoResult1->fetch())
            
            $total_rows = $row[0];

            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $pdoQuery = "SELECT  * FROM `user` LIMIT $offset, $no_of_records_per_page";
    
            $pdoResult = $Db->prepare($pdoQuery);
            
            $pdoResult->execute();

            while($row=$pdoResult->fetch()){?>

                <tr>
                    <th scope="row"><?php echo $row['id'];?></th>
                    <th scope="col " ><img src="<?php echo substr($row['image'],1);?>" class="image"style=" width:70px ; height=70px ;padding:0 ;" alt=""></th>
                    <th scope="col"><?php echo $row['name'];?></th>
                    <th scope="col"><?php echo $row['lname'];?></th>
                    <th scope="col"><?php echo $row['email'];?></th>
                    <th scope="col"><?php echo $row['diplomat'];?></th>
                    <th scope="col"><a href="<?php echo substr($row['cv'],1);?>">CV</a></th>
                    <td><a href="registration.php?id=<?php echo $row['id'] ?>"> <i class="bi bi-pencil-square text-warning"></i></a></td>
                    <td><a href="./scripts/delete.php?id=<?php echo  $row['id'] ?>"><i class="bi bi-archive-fill text-danger"></i></a></td>
                </tr>

                    <?php      
                        }
                    ?>
                <tr>
     </tbody>
</table>

<div class="position-absolute top-75 start-50 translate-middle">
    <nav aria-label="Page navigation example ">
        <ul class="pagination">
           <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="
                    <?php
                        if($pageno <= 1) echo '#'; 
                        else  echo "?pageno=".($pageno - 1); 
                    ?>" 
                class="page-link">Prev</a>
           </li>

           <li class="page-item ">
                <a href="<?php 
                if ($pageno == 1)
                    echo "?pageno=" . ($pageno);
                    else
                    echo "?pageno=" . ($pageno - 1); ?>" 
                    class="page-link"> 
                    <?php if ($pageno == 1) 
                    echo $pageno;
                    else if ($pageno == $total_pages)
                    echo  $pageno-1;
                    else 
                    echo $pageno;?> 
                </a>
           </li>

           <li class="page-item ">
                <a href="
                   <?php 
                        if ($total_pages == $pageno)
                            echo "?pageno=" . ($pageno);
                        else
                            echo "?pageno=" . ($pageno + 1); 
                    ?>" 
                class="page-link">
                    <?php 
                        if ($total_pages == $pageno)
                            echo $pageno ;
                        else echo $pageno+1;
                    ?>
                </a>
           </li>

           <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                 <a href="<?php
                  if($pageno >= $total_pages){ echo '#'; } 
                 else { echo "?pageno=".($pageno + 1); } ?>" 
                 class="page-link">Next</a>
           </li>
    </nav>
</div>


 


<!-- jQuery + Bootstrap JS -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</script>
</body>
</html>