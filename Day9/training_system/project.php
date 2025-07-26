<?php
require("index.php");
require("navbar.php");
 $student=mysqli_query($con,"SELECT * FROM `students` WHERE 1");
 $course=mysqli_query($con,"SELECT * FROM `courses` WHERE 1");
 $enrollment=mysqli_query($con,"SELECT enrollments.id ,students.name , courses.title , enrollments.grade ,enrollments.enrollment_date FROM `enrollments` JOIN students ON enrollments.student_id =students.id JOIN courses ON enrollments.course_id =courses.id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <div class="container mt-5 ">
        <div class=" row gap-5">

            <div class="card" style="width: 25rem;">
                <div class="card-body text-center">
                    <h3 class="card-title">Students</h3>
                    <p class="card-text">number students : <?=mysqli_num_rows($student)?></p>
                    <a href="students/dp.php" class="btn btn-info">view</a>
                </div>
            </div>

            <div class="card" style="width: 25rem;">
                <div class="card-body text-center">
                    <h3 class="card-title">Courses</h3>
                    <p class="card-text">courses : <?=mysqli_num_rows($course)?></p>
                    <a href="course/dp.php" class="btn btn-info">view</a>
                </div>
            </div>


            <div class="card" style="width: 25rem;">
                <div class="card-body text-center">
                    <h3 class="card-title">Enrollments</h3>
                    <p class="card-text">enrollments : <?=mysqli_num_rows($student)?> </p>
                    <a href="Enrollments/dp.php" class="btn btn-info">view</a>
                </div>
            </div>

        </div>
    </div>
</body>

</html>