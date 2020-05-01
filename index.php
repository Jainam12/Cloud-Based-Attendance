<?php 
	include "inc/header.php"; 
	include "classes/Employee.php"; 
	$emp = new Employee();
?>
<?php 
	error_reporting(0);
	date_default_timezone_set('Asia/Kolkata');
	$cur_date = date('Y-m-d');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$attend = $_POST['attend'];
		$insertattend = $emp->insertAttendance($attend);
	}
?>
	<div class="container">
<?php 
	if (isset($insertattend)) {
		echo $insertattend;
	}
?>
<div class='alert alert-danger' style="display: none;"><strong>Error !</strong> Employee ID Missing !</div>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add.php">Add Employee</a>
					<a class="btn btn-info float-right" href="employeewise_view.php" style="margin-left:10px">View Employeewise Attendance</a>
					<a class="btn btn-info float-right" href="datewise_view.php" style="margin-left:10px">View Datewise Attendance</a>
				</h2>
			</div>

			<div class="card-body">
				<div class="card bg-light text-center mb-3">
					<h4 class="m-0 py-3"><strong>Date</strong>: <?php echo $cur_date; ?></h4>
				</div>
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="25%">S/L</th>
							<th width="25%">Employee Name</th>
							<th width="25%">Employee ID</th>
							<th width="25%">Attendance</th>
						</tr>
<?php 
ech0('1');
	$getemployee = $emp->getEmployees();
	if ($getemployee) {
		$i = 0;
		while ($value = $getemployee->fetch_assoc()) {
			$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['roll']; ?></td>
							<td>
								<input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="present">P
								<input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="absent">A
							</td>
						</tr>
<?php } } ?>

						<tr>
							<td colspan="4" class="text-center">
								<input type="submit" name="submit" class="btn btn-primary px-5" value="Submit">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include "inc/footer.php"; ?>