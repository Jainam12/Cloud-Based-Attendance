<?php 
	include "inc/header.php"; 
	include "classes/Employee.php"; 
	$emp = new Employee();
?>
<?php 
	// error_reporting(0);
	$name = $_GET['name'];
	$roll = $_GET['roll'];
?>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add.php">Add Employee</a>
					<a class="btn btn-info float-right" href="employeewise_view.php">Back</a>
				</h2>
			</div>

			<div class="card-body">
				<div class="card bg-light text-center mb-3">
					<h4 class="m-0 py-3"><strong>Employee</strong>: <?php echo $name; ?>&emsp;&emsp;<strong>Employee ID</strong>: <?php echo $roll; ?></h4>
				</div>
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="20%">S/L</th>
							<th width="40%">Date</th>
							<th width="40%">Status</th>
						</tr>
            <?php 
              $getemployee = $emp->getEmployeeAttendance($roll);
              if ($getemployee) {
                $i = 0;
                while ($value = $getemployee->fetch_assoc()) {
                  $i++;
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $value['att_time']; ?></td>
              <td><?php echo $value['attend']; ?></td>
            </tr>
            <?php } } ?>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include("inc/footer.php"); ?>