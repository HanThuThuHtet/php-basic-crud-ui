<?php
    require_once "./template/header.php";
?>

<div class=" container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class=" border  bg-light rounded p-5 m-5">
                <div class="row p-2 justify-content-between align-items-center">
                    <div class="col-4"><h2>All Debt List</h2></div>
                    <div class="col-4 text-end"><a href="./list-create.php" class="btn btn-success"> + Create</a></div>
                </div>

                <!-- Start Logic -->
                <?php
                    // dd(date("j M Y",strtotime('2023-04-13 11:54:20'))); //13 Feb 2023
                    $sql = "SELECT * FROM my";

                    //search
                    if(isset($_GET["q"])){
                        $q = $_GET["q"];
                        $sql .= " WHERE name LIKE '%$q%'";
                    }

                    $query = mysqli_query($connect,$sql);
                    //dd($query); //mysqli_result Object
                    $totalSql = "SELECT sum(debt) AS total from my";
                    $totalQuery = mysqli_query($connect,$totalSql);
                    //dd(mysqli_fetch_assoc($totalQuery));


                    
                ?>
                <!-- End Logic -->

                <div class="row px-0 mx-0 py-3 bg-white align-items-center justify-content-between">
                    <div class="col-4">
                        <h6>Total List : <?= $query->num_rows  ?></h6>
                    </div>
                    <div class="col-4">
                        <form action="" method="get">
                            <div class=" input-group">
                                <input type="text" name="q" value="<?php if(isset($_GET['q'])): ?><?= $_GET['q'] ?><?php endif; ?>" class=" form-control">
                                <button class=" btn btn-dark">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-12 ms-auto text-end px-3 py-2">      -->
                
                <?php if(isset($_GET['q'])): ?>
                    <div class="row align-items-center justify-content-between py-2 border border border-2 mx-0">                    
                        <p class="col-6 d-inline-block mb-0"><b><?= $query->num_rows ?></b> results for name matching <b><?= $_GET['q'] ?></b> </p>
                        <div class="col-6 text-end">
                        <a href="./list-index.php" class="btn btn-secondary d-inline-block">
                            <i class="bi bi-x"></i> Clear filter
                        </a>
                        </div>
                    </div>
                <?php endif; ?>
                

                <table class=" table table-bordered table-dark">
                    <thead>
                        <tr class=" text-center">
                            <th>No</th>
                            <th>Name</th>
                            <th>Debt Amount</th>
                            <th>Created At</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                       <?php while($row = mysqli_fetch_assoc($query)): ?>
                            
                            <tr class=" align-middle">
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td class=" text-end"><?= $row["debt"] ?></td>
                                <td class=" text-center">
                                    <p class=" mb-0">
                                        <!-- <i class=" bi bi-calendar"></i> -->
                                        <?= showDate($row["created_at"]) ?>
                                    </p>
                                    <!-- <p class="small mb-0"><?= showDate($row["created_at"]," h : i : s") ?></p> -->
                                </td>
                                <td class=" text-center">
                                    <a href="./list-update.php?id=<?= $row['id'] ?>" class=" btn btn-success me-2">Update</a>
                                    <form class=" d-inline-block" action="./list-delete.php" method="post">
                                        <input type="hidden" name="id" value="<?= $row
                                        ['id'] ?>">
                                        <button onclick="return confirm('Are your sure to delete?')" class=" btn btn-danger" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                       <?php endwhile;  ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="1"></td>
                            <td colspan="1">Total</td>
                            <td colspan="1" class=" text-end">
                                <?= mysqli_fetch_assoc($totalQuery)["total"] ?>
                            </td>
                            <td colspan="2"></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>

<?php
    require_once "./template/footer.php";
?>
    

