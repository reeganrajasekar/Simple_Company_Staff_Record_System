<?php require("./layout/Header.php") ?>
<?php require("./layout/Navbar.php") ?>
<?php require("./layout/db.php") ?>
<?php
$id=$_GET["id"];
$sql = "SELECT * FROM staff WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $eid=$row["eid"];
        $email=$row["email"];
        $name=$row["name"];
        $mobile=$row["mobile"];
        $insfol=$row["insfol"];
        $shoe=$row["shoe"];
        $handle=$row["handle"];
    }
}
?>
<div class="container-fluid">
    <div class="page-header min-height-100 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?php echo($eid." - ".$name); ?>
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        <?php echo($email); ?>
                    </p>
                    <p class="mb-0 font-weight-bold text-sm">
                        <?php echo($mobile); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Usage of goggles, gloves and shoes</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="300"></canvas>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <a href="/admin/action/increment.php?id=<?php echo($id) ?>&data=shoe" class="btn btn-success w-100">Increment</a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/action/decrement.php?id=<?php echo($id) ?>&data=shoe" class="btn btn-danger w-100">Decrement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Following the instruction properly</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-bars-1" class="chart-canvas" height="300"></canvas>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <a href="/admin/action/increment.php?id=<?php echo($id) ?>&data=insfol" class="btn btn-success w-100">Increment</a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/action/decrement.php?id=<?php echo($id) ?>&data=insfol" class="btn btn-danger w-100">Decrement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Machine Handling</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-bars-2" class="chart-canvas" height="300"></canvas>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <a href="/admin/action/increment.php?id=<?php echo($id) ?>&data=handle" class="btn btn-success w-100">Increment</a>
                        </div>
                        <div class="col-6">
                            <a href="/admin/action/decrement.php?id=<?php echo($id) ?>&data=handle" class="btn btn-danger w-100">Decrement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<script>
var ctx = document.getElementById("chart-bars").getContext("2d");
new Chart(ctx, {
  type: "pie",
  data: {
    labels: ["Good", "Bad"],
    datasets: [{
      label: "Sales",
      tension: 0.4,
      borderWidth: 0,
      borderRadius: 4,
      borderSkipped: false,
      backgroundColor: ["#8f00ff","#ddd"],
      data: [<?php echo($shoe) ?>,<?php echo(100-$shoe) ?>],
      maxBarThickness: 6
    }, ]
  },
});

var ctx1 = document.getElementById("chart-bars-1").getContext("2d");
new Chart(ctx1, {
  type: "pie",
  data: {
    labels: ["Good", "Bad"],
    datasets: [{
      label: "Sales",
      tension: 0.4,
      borderWidth: 0,
      borderRadius: 4,
      borderSkipped: false,
      backgroundColor: ["#FF00FF","#ddd"],
      data: [<?php echo($insfol) ?>,<?php echo(100-$insfol) ?>],
      maxBarThickness: 6
    }, ]
  },
});

var ctx2 = document.getElementById("chart-bars-2").getContext("2d");
new Chart(ctx2, {
  type: "pie",
  data: {
    labels: ["Good", "Bad"],
    datasets: [{
      label: "Sales",
      tension: 0.4,
      borderWidth: 0,
      borderRadius: 4,
      borderSkipped: false,
      backgroundColor: ["#cb0c9f","#ddd"],
      data: [<?php echo($handle) ?>,<?php echo(100-$handle) ?>],
      maxBarThickness: 6
    }, ]
  },
});
</script>

<?php require("./layout/Footer.php") ?>