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
        <div class="row d-flex justify-contant-center">
            <div>
                <div class="col-mb-6">

                    <div class="form-container w-100">
                        <h2 class="text-center mb-4">User Information</h2>
                    </div>
                    <form action="T1_Form.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" id="age" name="age" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" id="city" name="city" class="form-control">
                        </div>
                        <div class="d-grid ">
                            <button type="submit" class="btn btn-success">Submeit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>