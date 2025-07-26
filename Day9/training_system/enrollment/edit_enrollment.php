<?php

require("../index.php");
require("../navbar.php");
$id=$_GET["id"];
$enrollment=mysqli_fetch_assoc(mysqli_query($con,"SELECT students.id , students.name , courses.title , enrollments.grade ,enrollments.enrollment_date FROM `enrollments` JOIN students ON enrollments.student_id =students.id JOIN courses ON enrollments.course_id =courses.id "));
$student=mysqli_query($con,"SELECT * FROM `students` WHERE 1");
$corse=mysqli_query($con,"SELECT * FROM `courses` WHERE 1");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 bg-info">
        <div class=" row ">
            <form class="was-validated " method="POST" enctype="multipart/form-data"
                action="update_enrollment.php?id=<?=$id?>">
                <div class="row justify-content-center d-flex mt-5">

                    <div class="  mt-3  ">
                        <label for="validationServerUsername" class="form-label text-light"> name </label>
                        <select class="form-select is-invalid " name="name" required>
                            <option selected value="<?= htmlspecialchars($enrollment["id"]) ?>">
                                <?= htmlspecialchars($enrollment["name"]) ?></option>
                            <?php while($row=mysqli_fetch_assoc($student)){
              if($enrollment["id"]!=$row["id"]){?>
                            <option value="<?= htmlspecialchars($row["id"]) ?>"><?= htmlspecialchars($row["name"]) ?>
                            </option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">course</label>
                        <select class="form-select is-invalid " name="course" required>
                            <?php while($row=mysqli_fetch_assoc($corse)){
              if($enrollment["title"]==$row["title"]){?>
                            <option selected value="<?= htmlspecialchars($row["id"]) ?>">
                                <?= htmlspecialchars($enrollment["title"]) ?></option>
                            <?php }else{ ?>
                            <option value="<?= htmlspecialchars($row["id"]) ?>"><?= htmlspecialchars($row["title"]) ?>
                            </option>
                            <?php }} ?>
                        </select>

                    </div>
                    <div class="  mt-3 ">
                        <label for="validationServerUsername" class="form-label text-light">grade</label>
                        <input type="number" class="form-control" name="grade" value=<?=$enrollment["grade"] ?>
                            required>
                    </div>

                    <div class="  mt-3">
                        <label for="validationServer04" class="form-label">enrollment_date </label>
                        <input type="date" class="form-control" name="enrollment_date"
                            value=<?=$enrollment["enrollment_date"] ?> required>
                    </div>
                    <div class="  col-md-12 d-flex mt-5 gap-2">
                        <button type="submit" class="btn  btn-success  col-md-6 mr-5"> edit</button>

                    </div>

                </div>
        </div>

        </form>

    </div>
    </div>
</body>

</html>