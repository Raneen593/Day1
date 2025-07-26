<?php 
require("../config.php");
require("../navbar.php");

if($_SESSION["role"] != "admin") {
    header("Location: ../project.php");
    exit();
}
?>

<div class="container mt-5">
    <div class="row">
        <?php if($_SESSION["role"]=="admin"): ?>
        <a href="add_admin.php" class="btn btn-success active col-md-3">+ Add User or Admin</a>
        <?php endif; ?>

        <table class="table table-striped table-hover mt-5">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <?php if($_SESSION["role"]=="admin"): ?>
                    <th scope="col">Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `admin`";
                $data = mysqli_query($con, $query);
                
                while($row = mysqli_fetch_assoc($data)): 
                ?>
                <tr>
                    <td><?=htmlspecialchars($row["username"])?></td>
                    <td><?=htmlspecialchars($row["email"])?></td>
                    <td><?=htmlspecialchars($row["role"])?></td>
                    <?php if($_SESSION["role"]=="admin"): ?>
                    <td>
                        <a href="edit_admin.php?email=<?=htmlspecialchars($row["email"])?>"
                            class="btn btn-warning">Edit</a>
                        <a href="delet_admin.php?email=<?=htmlspecialchars($row["email"])?>" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this admin?')">Delete</a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>