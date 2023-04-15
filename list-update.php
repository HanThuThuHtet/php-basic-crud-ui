<?php
    require_once "./template/header.php";
?>

<div class=" container">
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <div class=" border rounded p-5 m-5">
                <h3>Update Debt List</h3>

                <!-- Start Logic -->
                <?php

                   $id = $_GET["id"];
                   $sql = "SELECT * FROM my WHERE id=$id";
                   $query = mysqli_query($connect,$sql);
                   $row = mysqli_fetch_assoc($query);

                ?>
                <!-- End Logic -->

                <form action="./list-updated-info.php" method="post">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="">
                        <label for="name" class=" form-label">Name</label>
                        <input type="text" value="<?= $row['name'] ?>" name="name" id="" class=" form-control" required>
                    </div>
                    <div class=" py-4">
                        <label for="debt" class=" form-label">Debt</label>
                        <input type="number" value="<?= $row['debt'] ?>" name="debt" id="" class=" form-control" required>
                    </div>
                    <button class=" btn btn-dark">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require_once "./template/footer.php";
?>
    

