<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <?php 
    include ('./client/bootstrap.php') 
    
    ?>
    
    
    
</head>

<body>
    <?php 
    session_start();
    include('./client/navbar.php'); 
    

    if(isset($_GET['pdf'])) {
        include('./client/pdf.php');
    }
    elseif(isset($_GET['home'])){
        include('./client/home.php');
    }
    else{
        include('./client/home.php');
    }

    ?>
    
    
    <!-- footer -->
    <footer> <?php include './client/footer.php' ?></footer>
    <!-- footer -->


</body>

</html>