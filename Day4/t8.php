<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

</head>

<body>
    <?php
$salary=["Ali"=> 5000,"Mona"=> 6000,"Tarek"=> 7000,"Ziad"=> 55000];
$filter=array_filter($salary,function($sal){
    return $sal >= 6000;
});
?>
    <div class="container bg-dark mt-5 p-4">
        <h4 class="text-primary">High Salary Employees</h4>
        <ul class="list-group bg-waring">
            <?php foreach($filter as $se => $price):?>
            <li class="list-group-item d-flex justify-content-between">
                <span><?= ($se)?></span>
                <span class="bg-dark text-white"><?= $price?>EGP</span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>