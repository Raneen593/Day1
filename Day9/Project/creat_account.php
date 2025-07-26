<?php session_start();
include("dp.php"); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5">
    <div class=row>
        <div class="col-4 mx-auto mt-2 container">
            <?php if($_SERVER["REQUEST_METHOD"]=="POST"){
    if ($_FILES["image"]["error"] == 4) {
?>
            <div class="alert alert-danger" role="alert">
                ❌ Please upload an image.
            </div>
            <?php }else{

    $_SESSION["logstate"]=true;
    $username=$_POST["username"];
    $email=$_POST["email"];
    $sel="SELECT `id` FROM `admin` WHERE email='$email'";
     $d=mysqli_query($con,$sel); 
      if(mysqli_num_rows($d)>0){ ?>
            <div class="alert alert-danger" role="alert">
                ❌ There is an account with the same email.
            </div>
            <?php $_SESSION["logstate"]=false; }
    
    if($_SESSION['logstate']){
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $r=mysqli_query($con,"INSERT INTO `admin`( `username`, `email`, `password`) VALUES ('$username','$email','$password')");
    $se="SELECT `id` FROM `admin` WHERE email='$email'";
    $_SESSION["id"]=mysqli_fetch_assoc(mysqli_query($con,$se))["id"];

    $tmp=$_FILES["image"]["tmp_name"];
    $type=$_FILES["image"]["type"];
    $n=$_FILES["image"]["name"];
    move_uploaded_file($tmp, "img/$n");
    ?>

            <div class="card" style="width: 18rem;">
                <?php echo "<img src='img/$n' class='card-img-top' >";?>
                <div class="card-body">
                    <h5 class="card-title"><?=$username?></h5>
                    <p class="card-text"><?=$email?></p>
                    <a href="products.php" class="btn btn-primary active  col-md-4">go to products</a>
                </div>
            </div>
            <div class=" alert alert-success" role="alert">
                ✅account created successfully
            </div>
        </div>
        <?php }}}?>
        <form class="row g-3 needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            <div class="col-md-12 mt-3"> User Name
                <input type="text" class="form-control" name="username" id="validationCustom01" required>
            </div>
            <div class="col-md-12 mt-3"> Email
                <input type="email" class="form-control" id="validationCustom01" name="email" required>
            </div>
            <div class="col-md-12 mt-3"> Password
                <input type="password" class="form-control" id="validationCustom01" name="password" required>
            </div>
            <div class="col-md-12 mt-3"> Image
                <input type="file" name="image" class="form-control" aria-label="file example" required>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary w-100">sign up</button>
                <a href="register.php" class="btn btn-primary active  w-100 mt-2">login</a>
            </div>
        </form>
    </div>
</div>
</div>