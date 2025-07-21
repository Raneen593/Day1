<?php
$name=$_POST['name'] ?? ' ';
$email=$_POST['email'] ?? ' ';
$age=$_POST['age'] ?? ' ';
$city=$_POST['city']  ?? ' ';
function total($x,$y,$z) {
return $x + $y + $z;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="profile-container">
                    <h2 class="text-center mb-4">User profile</h2>
                    <?php if($name):?>
                    <div class="alert alert-success">
                        <strong>Welcom , <?php echo htmlspecialchars($name) ?>! </strong>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">User Information</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>Full Name : </strong> <?php echo htmlspecialchars($name) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Email : </strong> <?php echo htmlspecialchars($email) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Age : </strong> <?php echo htmlspecialchars($age) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>City : </strong> <?php echo htmlspecialchars($city) ?>
                                </li>
                                <li class="list-group-item">
                                    <strong>Total Offer : </strong> <?php echo total(5,7,8); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="t3.php" class="btn btn-primary">Back to form</a>
                    </div>
                    <?php else : ?>
                    <div class="alert alert-waring">
                        <strong> No data </strong>
                    </div>
                    <div class="text-center mt-4">
                        <a href="t3.php" class="btn btn-primary">Go to form</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>