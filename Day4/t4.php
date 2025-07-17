<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <?php
        $products = [
            ["الاسم" => "Lugirop", "السعر" => 15000, "الكمية" => 3],
            ["الاسم" => "Phone", "السعر" => 8000, "الكمية" => 5],
            ["الاسم" => "Tablet", "السعر" => 6000, "الكمية" => 2]
        ];
        ?>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>الاسم</th>
                                    <th>السعر (ج.م)</th>
                                    <th>الكمية</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($products as $product): 
                                    if ($product['السعر'] <= 8000):
                                ?>
                                <tr>
                                    <td><?php echo $product['الاسم']; ?></td>
                                    <td><?php echo number_format($product['السعر']); ?></td>
                                    <td><?php echo $product['الكمية']; ?></td>
                                </tr>
                                <?php 
                                    endif;
                                endforeach; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>