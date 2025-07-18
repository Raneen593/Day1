<?php

if ($_SERVER['REQUEST_METHOD']='POST' && isset($_FILES['image'])){
echo($_POST['username']);

echo"<pre>";

print_r($_FILES);

echo"</pre>";

$name = $_FILES['image']['name'];

$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp, "img/$name");

$temp2=$_FILES['file']['tmp_name'];

$name2=$_FILES['file']['name'];


move_uploaded_file($temp2, "pdf/$name2");

}
?>

<form method="post" enctype="multipart/form-data" class="p-3">

    <input type="text" name="username">

    <input type="file" name="image" class="form-control mb-2">

    <input type="file" name="file" tlass="form-control mb-2">

    <button class="btn btn-primary">Upload</button>

</form>