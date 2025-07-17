<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Project </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container py-5">
        <?php
        $students = [
            ["name" => "Ahmed", "course" => "PHP", "grade" => 75, "status" => "Passed"],
            ["name" => "Salma", "course" => "JS", "grade" => 58, "status" => "Failed"],
            ["name" => "Youssef", "course" => "MySQL", "grade" => 82, "status" => "Passed"],
            ["name" => "Laila", "course" => "HTML", "grade" => 45, "status" => "Failed"]
        ];
        ?>

        <div class="row justify-content-center bg-dark">
            <div class="col-lg-10">
                <div class="card shadow bg-dark">
                    <div class="card-body">
                        <?php if(count($students) > 0): ?>

                        <div class="table-responsive ">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Degree</th>
                                        <th>Statues</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($students as $student): ?>
                                    <tr class="<?= $student['grade'] < 60 ? 'table-danger' : '' ?>">
                                        <td><?= $student['name'] ?></td>
                                        <td><?= $student['course'] ?></td>
                                        <td>
                                            <?= $student['grade'] ?>%

                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-<?= $student['status'] == 'Passed' ? 'success' : 'danger' ?>">
                                                <?= $student['status'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#studentModal<?= $student['name'] ?>">
                                                عرض التفاصيل
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php else: ?>
                        <div class="alert alert-warning">لا توجد بيانات للطلاب</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($students as $student): ?>
    <div class="modal fade" id="studentModal<?= $student['name'] ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تفاصيل الطالب: <?= $student['name'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Name : </strong> <?= $student['name'] ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Subject :</strong> <?= $student['course'] ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Degree:</strong> <?= $student['grade'] ?>%
                        </li>
                        <li class="list-group-item">
                            <strong>Statues : </strong>
                            <span class="badge bg-<?= $student['status'] == 'Passed' ? 'success' : 'danger' ?>">
                                <?= $student['status'] ?>
                            </span>
                        </li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>