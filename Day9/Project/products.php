<?php session_start();
include("dp.php"); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head> <?php
if(!isset( $_SESSION["logstate"]) || !$_SESSION["logstate"]){header("Location:register.php");exit;} ?>

<div class="container mt-5">
    <div class="row d-flex">
        <div class="card border-light mb-3">
            <div class="card-header">

                <form method="POST" enctype="multipart/form-data">
                    <div class="d-flex">
                        <div class="col-md-6 mt-5">
                            <label for="validationCustom01" class="form-label">product name</label>
                            <input type="text" class="form-control" name="name" id="validationCustom01" required>
                        </div>
                        <div class="col-md-6 mt-5">
                            <label for="validationCustom01" class="form-label">Description</label>
                            <input type="text" class="form-control" id="validationCustom01" name="description" required>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <input type="file" name="image" class="form-control" aria-label="file example" required>
                    </div>
                    <div class="col-6 mx-auto mt-5 container">
                        <button type="submit" class="btn btn-primary w-100">add product</button>
                    </div>
                </form>
            </div>
            <?php 
        if($_SERVER["REQUEST_METHOD"]=="POST" ){
            $n=$_POST["name"];
            $d=$_POST["description"];
            $name=$_FILES ["image"] ["name"];
            $type=$_FILES ["image"] ["type"];
            $cou1=count(explode(".",$name));
            $ex=explode(".",$name)[$cou1-1];
            $allowed=["jpg","jped","png","jpeg"];
            $size=$_FILES["image"]["size"];
            $type1=explode("/",$type);
            $allowedtype=["image","wave"];
            $tmp=$_FILES["image"]["tmp_name"];
            if(!in_array($ex,$allowed)){?>
            <div class="alert alert-warning" role="alert">
                **Check the file type, it must be jpg or jped
                Error in the file <?php 
            } else if(!in_array($type1[0],$allowedtype)){?>
                **Check the file type, it must be img or wave
                Error in the file <?php  }else if($size>=4000000000){?>
                File size large please upload files less than 4GB
            </div>
            <?php }else {
            move_uploaded_file($tmp, "/img/$name");
            $encod=base64_encode("/img/$name");
            $id=$_SESSION["id"];
            $R=mysqli_query($con,"INSERT INTO `products`( `IMAGE`, `NAME`, `des`, `user_id`) VALUES ('$encod','$n','$d','$id')");?>
            <?php  
        }
    
            header("Location: products.php?success=1"); exit;} ?>
            <div class="card-body ">
                <div class="row d-flex">
                    <?php 
            $sql="SELECT admin.id , products.IMAGE , products.NAME , products.des ,admin.email FROM products JOIN admin ON products.user_id=admin.id";
            $data=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($data)){ 
            if($_SESSION["id"]==$row['id']){
            $decode=base64_decode($row["IMAGE"]);?>
                    <div class="col-md-4 mb-4">
                        <div class="card  ">
                            <?php echo "<img src='$decode' class='card-img-top' style='height: 250px; object-fit: cover;'  >";?>
                            <div class="card-body">
                                <h5 class="card-title"><?=$row["NAME"]?></h5>
                                <p class="card-text"><?=$row["des"]?></p>
                                <span>added by </span><a href="#"><?=$row["email"]?></a>
                            </div>
                        </div>
                    </div>

                    <?php }} ?>
                </div>
            </div>
        </div>
        <a href="logout.php" class="btn btn-primary active  w-100 mt-5">Logout</a>
        <a href="dashboard.php" class="btn btn-primary active  w-100 mt-5">go to welcom</a>
    </div>
</div>