<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>
<?php require("./layout/db.php") ?>

<div class="container-fluid py-4">
    <div class="row">
        <?php
        $sql = "SELECT * FROM video order by title ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold text-center"><?php echo($row["title"])?></p>
                        <video poster="/uploads/<?php echo($row["img"])?>" style="height:200px" class="w-100" controls>
                            <source src="/uploads/<?php echo($row["video"])?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
        ?>
            <p class="text-muted pt-5" style="text-align:center">Nothing Found !</p>
        <?php
        }
        ?>

    </div>
</div>


<?php require("./layout/Footer.php") ?>