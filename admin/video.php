<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>
<?php require("./layout/db.php") ?>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h4 class="mb-0" style="display:flex;justify-content:space-between">
                Videos
                <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
                    Add
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Staff</h5>
                        <button type="button" class="btn btn-close text-dark" data-bs-dismiss="offcanvas" aria-label="Close">x</button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="/admin/action/addvideo.php" method="post" enctype="multipart/form-data">
                            <label>Title :</label>
                            <div class="mb-2">
                                <input type="text" required name="title" class="form-control" placeholder="Title" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Image :</label>
                            <div class="mb-2">
                                <input type="file" accept=".jpg" required name="img" class="form-control" placeholder="Mobile" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Video :</label>
                            <div class="mb-4">
                                <input type="file" accept=".mp4" required name="video" class="form-control" placeholder="Mobile" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </h4>
        </div>
        
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
                                <br>
                                <form action="/admin/action/deletevideo.php" onsubmit="return confirm('Do you want to delete the video?')" method="post" class="text-end">
                                    <input type="hidden" value="<?php echo($row['id'])?>" name="id">
                                    <button class="btn btn-link text-danger text-gradient px-3 mb-0">
                                        <i class="far fa-trash-alt me-2"></i>Delete
                                    </button>
                                </form>
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
    </div>
</div>


<?php require("./layout/Footer.php") ?>