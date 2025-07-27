<?php require("../index.php");
require("../navbar.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class=" row ">

            <table class="table table-striped table-hover mt-5">
                <div class="row">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=mysqli_query($con,"SELECT  `email`, `state` FROM `log` WHERE 1");
                        while($row=mysqli_fetch_assoc($data)){ ?>
                        <tr>
                            <td><?=$row["email"]?></td>
                            <td><?=$row["state"]?></td>
                        </tr>
                        <?php
                                            }?>

</body>

</html>