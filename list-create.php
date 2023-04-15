<?php
    require_once "./template/header.php";
?>

<div class=" container">
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <div class="border rounded p-5 pt-3 m-5">
                <div class="ms-auto text-end pb-2">
                    <a href="./list-index.php" class="text-secondary"><i class="bi bi-x-circle bi-2x" style="font-size: 20px"></i></a>
                </div>
                <h3>Create Debt List</h3>

                <!-- Start Logic -->
                <?php

                    if($_SERVER["REQUEST_METHOD"] === "POST"){
                        $name = $_POST["name"];
                        $debt = $_POST["debt"];
                        $sql = "INSERT INTO my (name,debt) VALUES ('$name',$debt)";
                        if(mysqli_query($connect,$sql)){
                            // echo "Created Successfully";
                             echo alert("Created Successfully","success");
                        }
                    }

                ?>
                <!-- End Logic -->

                <form action="" method="post">
                    <div class="">
                        <label for="name" class=" form-label">Name</label>
                        <input type="text" name="name" id="" class=" form-control" required>
                    </div>
                    <div class=" py-4">
                        <label for="debt" class=" form-label">Debt</label>
                        <input type="number" name="debt" id="" class=" form-control" required>
                    </div>
                    <button class=" btn btn-dark">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    require_once "./template/footer.php";
?>
    

