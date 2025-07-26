<?php
require("../index.php");
require("../navbar.php");?>
<div class="container mt-5">
    <div class=" row "><?php if($_SESSION["role"]=="admin"){ ?>
        <a href="add_enrollment.php" class="btn btn-success active col-md-3 ">+add Enrollment</a> <?php }?>

        <table class="table table-striped table-hover mt-5">
            <div class="row">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">course title</th>
                        <th scope="col">grade</th>
                        <th scope="col">Enrollment date</th>
                        <?php if($_SESSION["role"]=="admin"){ ?>
                        <th scope="col">action</th>
                        <?php  } ?>
                    </tr>
                </thead>
                <tbody><?php

 $data=mysqli_query($con,"SELECT enrollments.id ,students.NAME , courses.title , enrollments.grade ,enrollments.enrollment_date FROM `enrollments` JOIN students ON enrollments.student_id =students.id JOIN courses ON enrollments.course_id =courses.id");
 while($row=mysqli_fetch_assoc($data)){ ?>
                    <tr>
                        <td><?=$row["NAME"]?></td>
                        <td><?=$row["title"]?></td>
                        <td><?=$row["grade"]?></td>
                        <td><?=$row["enrollment_date"]?></td>
                        <?php if($_SESSION["role"]=="admin"){ ?>
                        <td>
                            <a href="edit_enrollment.php?id=<?=$row["id"]?>" class=" bg-warning btn   ">edit</a>
                            <a href="delet_enrollment.php?id=<?=$row["id"]?>" class=" bg-danger btn ">delet</a>
                        </td> <?php } ?>
                    </tr>


                    <?php


 }?>