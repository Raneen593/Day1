<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5&6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

</head>

<body>
    <?php
// $dev=[
//     '1'=> "VS Code",
//     '2'=> "Git",
//     '3'=> "GitHub",
//     '4'=> "Figma",
//     '5'=> "Postman"
// ];
// echo "Total Count" . count($dev) ."<br>";

// $sear="GitHub";
// if (in_array($sear,$dev)){
//     echo " $sear Is In list" ."<br>" ;
// }
// echo "ALL Job : ";
// print_r(array_values($dev));

$arr=["HTML","CSS","JS","PHP"];
array_push($arr,"MySQL");
array_unshift($arr,"Git");
array_shift($arr)
?>
    <div class="container mt-4 bg-success p-3">
        <h4 class="text-primary">Avalible Courses</h4>
        <ul class="list-group bg-waring">
            <?php foreach($arr as $array):?>
            <li class="list-group-item d-flex justify-content-between">
                <span><?= ($array)?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>