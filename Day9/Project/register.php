<?php session_start();
include("dp.php"); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</script>

<body>
    <div class="container mt-5 bg-dark p-4  ">
        <div class="row justifiy-content-center d-flex mt-5 ">
            <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION["logstate"]=false;
    $admin=mysqli_query($con,"SELECT * FROM `admin` WHERE 1");
    while($row=mysqli_fetch_assoc($admin)){
        if($email==$row["email"]){
        if(password_verify($password,$row["password"])){ 
        $_SESSION["username"]=$row["username"];
        $_SESSION["id"]=$row["id"];
        $_SESSION["logstate"]=true;
        header("Location: dashboard.php");
        exit();}}}
        if($_SESSION["logstate"]){ ?>
            <div class="container mt-5 p-4">
                <div class="row justify-content-center d-flex mt-5">
                    <div class="alert alert-danger" role="alert">
                        ⚠️ wrong password or email
                    </div>
                </div>
            </div>

            <?php } }}?>
            <form class="was-validated " method="POST" enctype="multipart/form-data">
                <div class="row justifiy-content-center d-flex mt-5">

                    <div class="mt-3 ">
                        <label for="validationServerUserusername" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" name="email" id="validationServerUserusername"
                            required>
                        <div class="invalid-feedback">
                            Please enter a email
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="validationServerUserusername" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" name="password" id="validationServerUserusername "
                            required>
                        <div class="invalid-feedback">
                            Please enter a password
                        </div>
                    </div>

                    <div class="row mt-5">
                        <button type="submit" class="btn btn-primary btn-success col-md-6"> Login</button>
                        <a href="creat_account.php" class="btn btn-primary active  col-md-6">Creat account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>