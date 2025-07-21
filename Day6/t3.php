<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save'])) {
        if (!empty($_POST['name']) && !empty($_POST['email'])) {
            if (!isset($_SESSION['users'])) {
                $_SESSION['users'] = [];
            }
            $_SESSION['users'][] = [
                'name' => $_POST['name'],
                'email' => $_POST['email']
            ];
        }
    } elseif (isset($_POST['clear'])) {
        unset($_SESSION['users']);
    } elseif (isset($_POST['remove_last'])) {
        if (!empty($_SESSION['users'])) {
            array_pop($_SESSION['users']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class=" mb-4">
            <div class="card-body">
                <form method="POST">
                    <input type="text" class="form-control" id="name" placeholder="Name" name="name"> <br>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"> <br>
                    <div class="row mt-2">
                        <div class="col-md-12 mb-2">
                            <button type="submit" name="save" class="btn btn-success w-100">Save</button>
                        </div>
                        <div class="col-md-6 ">
                            <button type="submit" name="clear" class="btn btn-danger w-100">Clear Session</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="remove_last" class="btn btn-warning w-100">Remove Last</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body p-0">
                <?php if (empty($_SESSION['users'])): ?>
                <p class="text-muted p-3" style="background-color: #f6cbcb;">No users!</p>
                <?php else: ?>
                <table class="table table-striped m-0">
                    <tr>
                        <th class="bg-light">user name</th>
                        <th class="bg-light">user email</th>
                    </tr>
                    <?php foreach ($_SESSION['users'] as $user): ?>
                    <tr>
                        <td class="bg-white"><?= htmlspecialchars($user['name']) ?></td>
                        <td class="bg-white"><?= htmlspecialchars($user['email']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>