<?php 
	include "inc/header.php"; 
	include "classes/Employee.php"; 
	$emp = new Employee();
?>

	<div class="container">
<?php 
	if (isset($insertattend)) {
		echo $insertattend;
	}
?>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-success" href="add.php">Add Employee</a>
					<a class="btn btn-dark float-right" href="index.php" style="margin-left:10px">Take Attendance</a>
					<a class="btn btn-info float-right" href="datewise_view.php" style="margin-left:10px">View Datewise Attendance</a>
				</h2>
			</div>

			<div class="card-body">
      <div class="card bg-light text-center mb-3">
					<h4 class="m-0 py-3"><strong>Employeewise Attendance</strong></h4>
				</div>
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="30%">S/L</th>
							<th width="50%">Employee Name</th>
							<th width="20%">Attencance Ratio (Present/Total)</th>
						</tr>
<?php 
	$getdate = $emp->getEmployeeAttendance();
	if ($getdate) {
		$i = 0;
		while ($value = $getdate->fetch_assoc()) {
			$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['count_p']."/".$value['count_t']; ?></td>
						</tr>
<?php } } ?>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include("inc/footer.php"); ?>