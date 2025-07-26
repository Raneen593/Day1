<?php session_start(); 
include("dp.php");?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php

  if (isset($_SESSION['username']) && $_SESSION["logstate"]==true) {?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
<div class="container mt-5">
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-6 mx-auto mt-5 container">
            <div class="card" style="width: 30rem;">

                <div class="alert alert-success" role="alert">
                    ✅ welcome,Admin(<?=$_SESSION["username"]?> )
                </div>
                <p class="d-inline-flex gap-1">
                    <a href="logout.php" class="btn btn-primary active  col-md-4">Logout</a>
                    <a href="products.php" class="btn btn-primary active  col-md-4">products</a>
                    <a href=" creat_account.php" class="btn btn-primary active  col-md-4">creat account</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php }else{
      header("Location:register.php");
      exit();
    }?>