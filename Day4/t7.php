<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

</head>

<body>
    <?php
$dev=["Mouse"=> 150,"Monitor"=> 1200,"Keyboard"=> 300,"Chair"=> 1000,"Headset"=> 400];
asort($dev);
?>
    <div class="container bg-dark mt-5 p-4">
        <h4 class="text-danger">Product Prices</h4>
        <ul class="list-group bg-waring">
            <?php foreach($dev as $device => $price):?>
            <li class="list-group-item d-flex justify-content-between">
                <span><?= ($device)?></span>
                <span class="bg-dark rounded-pill text-white"><?= $price?>EGP</span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>