<?php
require("../index.php");
require("../navbar.php");?>
<div class="container mt-5">
    <div class=" row "> <?php 
      if($_SESSION["role"]=="admin"){ ?>
        <a href="add_student.php" class="btn btn-success active col-md-3 ">+add student</a>
        <?php }?>
        <table class="table table-striped table-hover mt-5">
            <div class="row">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">Email</th>
                        <th scope="col">phone</th>
                        <th scope="col">dob</th> <?php
      if($_SESSION["role"]=="admin"){?>
                        <th scope="col">action</th> <?php }?>

                    </tr>
                </thead>
                <tbody><?php

 $data=mysqli_query($con,"SELECT * FROM `students` WHERE 1");
 while($row=mysqli_fetch_assoc($data)){ ?>
                    <tr>
                        <td><?=$row["name"]?></td>
                        <td><?=$row["email"]?></td>
                        <td><?=$row["phone"]?></td>
                        <td><?=$row["date_of_birth"]?></td> <?php 
      if($_SESSION["role"]=="admin"){ ?>
                        <td>
                            <a href="edit_student.php?id=<?=$row["id"]?>" class=" bg-warning btn   ">edit</a>
                            <a href="delet_student.php?id=<?=$row["id"]?>" class=" bg-danger btn ">delet</a>
                        </td> <?php }?>
                    </tr>


                    <?php


 }?>