<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>
<?php require("./layout/db.php") ?>

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h4 class="mb-0" style="display:flex;justify-content:space-between">
                Staff Details
                <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
                    Add
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Staff</h5>
                        <button type="button" class="btn btn-close text-dark" data-bs-dismiss="offcanvas" aria-label="Close">x</button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="/admin/action/addstaff.php" method="post">
                            <label>Emp Id :</label>
                            <div class="mb-2">
                                <input type="number" required name="eid" class="form-control" placeholder="Emp. Id" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Name :</label>
                            <div class="mb-2">
                                <input type="text" required name="name" class="form-control" placeholder="Name" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Email :</label>
                            <div class="mb-2">
                                <input type="email" required name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Mobile :</label>
                            <div class="mb-2">
                                <input type="number" required name="mobile" class="form-control" placeholder="Mobile" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </h4>
        </div>
        <form method="get" class="card-header pb-0 px-3 text-end mb-3">
            <input type="number" name="eid" placeholder="Staff ID" required class="m-0 border rounded" style="height:35px">
            <button class="btn btn-secondary m-0" style="height:40px">Search</button>
        </form>
        <div class="card-body pt-2 p-3">
            <ul class="list-group">
                <?php
                if(isset($_GET["eid"])){
                    $eid=$_GET["eid"];
                    $sql = "SELECT * FROM staff WHERE eid='$eid'";
                }else{
                    $sql = "SELECT * FROM staff order by eid ASC";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                ?>
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                        <h6 class="mb-3 text-md"><?php echo($row['eid'])?></h6>
                        <span class="mb-2 text-sm">Staff Name: <span class="text-dark font-weight-bold ms-sm-2"><?php echo($row['name'])?></span></span>
                        <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo($row['email'])?></span></span>
                        <span class="text-xs">Mobile Number: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo($row['mobile'])?></span></span>
                    </div>
                    <div class="ms-auto text-end">
                        <a href="/admin/view.php?id=<?php echo($row['id'])?>" class="btn btn-link text-success text-gradient px-3 mb-0">
                            <i class="far fa-eye me-2"></i>View
                        </a>
                    </div>
                </li>
                <?php
                    }
                } else {
                ?>
                    <p class="text-muted" style="text-align:center">Nothing Found !</p>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>


<?php require("./layout/Footer.php") ?>