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
					<a class="btn btn-info float-right" href="employeewise_view.php" style="margin-left:10px">View Employeewise Attendance</a>
				</h2>
			</div>

			<div class="card-body">
      <div class="card bg-light text-center mb-3">
					<h4 class="m-0 py-3"><strong>Datewise Attendance</strong></h4>
				</div>
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="30%">S/L</th>
							<th width="50%">Attendance Date</th>
							<th width="20%">Action</th>
						</tr>
<?php 
	$getdate = $emp->getDateList();
	if ($getdate) {
		$i = 0;
		while ($value = $getdate->fetch_assoc()) {
			$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['att_time']; ?></td>
							<td>
							<a class="btn btn-primary" href="date_view.php?dt=<?php echo $value['att_time']; ?>">View</a>
							</td>
						</tr>
<?php } } ?>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php include("inc/footer.php"); ?>