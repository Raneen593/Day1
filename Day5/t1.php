<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>PHP_SELF</td>
                    <td><?=$_SERVER['PHP_SELF'] ?></td>
                <tr>
                    <td>SERVER_NAME</td>
                    <td><?=$_SERVER['SERVER_NAME'] ?></td>
                <tr>
                    <td>HTTP_HOST</td>
                    <td><?=$_SERVER['HTTP_HOSTF'] ?></td>
                <tr>
                    <td>USER_AGENT</td>
                    <td><?=$_SERVER['USER_AGENT'] ?></td>
                <tr>
                    <td>REQUEST_METHOD</td>
                    <td><?=$_SERVER['REQUEST_METHOD'] ?></td>
            </table>
        </div>
    </div>
</body>

</html>