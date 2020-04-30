<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
/**
 * Employee Class
 */
class Employee{
	private $db;
	private $fm;
	
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getEmployees(){
		$query = "SELECT * FROM tbl_employee";
		$result = $this->db->select($query);
		return $result;
	}

	
	public function getEmployeeAttendance(){
		$query = "SELECT name,present.count_p,total.count_t
		FROM
		(SELECT roll,name FROM tbl_employee) AS employee,
		(SELECT roll, COUNT(attend) AS count_P FROM tbl_attendance WHERE attend='present' GROUP BY roll) AS present,
		(SELECT roll, COUNT(att_time) AS count_t FROM tbl_attendance GROUP BY roll) AS total
		WHERE employee.roll=present.roll and employee.roll=total.roll";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertEmployee($name, $roll){
		$name = $this->fm->validation($name);
		$roll = $this->fm->validation($roll);

		$name = mysqli_real_escape_string($this->db->link, $name);
		$roll = mysqli_real_escape_string($this->db->link, $roll);

		if (empty($name) || empty($roll)) {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not be empty !</div>";
			return $msg;
		} else {
			$emp_query = "INSERT INTO tbl_employee(name, roll) VALUES('$name', '$roll')";
			$emp_insert = $this->db->insert($emp_query);
			if ($emp_insert) {
				$msg = "<div class='alert alert-success'><strong>Success !</strong> Employee data inserted successfully !</div>";
				return $msg;
			} else {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong> Employee data not inserted !</div>";
				return $msg;
			}
		}
	}

	public function insertAttendance($attend = array()){
		$query = "SELECT DISTINCT att_time FROM tbl_attendance";
		$getdata = $this->db->select($query);
		while ($result = $getdata->fetch_assoc()) {
			$db_date = $result['att_time'];
			$cur_date = date('Y-m-d');
			if ($cur_date == $db_date) {
				$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance Already Taken Today !</div>";
				return $msg;
			}
		}

		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "present") {
				$emp_query = "INSERT INTO tbl_attendance(roll, attend, att_time) VALUES('$atn_key', 'present', now())";
				$data_insert = $this->db->insert($emp_query);
			} elseif ($atn_value == "absent") {
				$emp_query = "INSERT INTO tbl_attendance(roll, attend, att_time) VALUES('$atn_key', 'absent', now())";
				$data_insert = $this->db->insert($emp_query);
			}
		}

		if ($data_insert) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong> Attendance data inserted successfully !</div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance data not inserted !</div>";
			return $msg;
		}
	}

	public function getDateList(){
		$query = "SELECT DISTINCT att_time FROM tbl_attendance";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllData($dt){
		$date = $this->fm->validation($dt);
		$date = mysqli_real_escape_string($this->db->link, $date);

		$query = "SELECT tbl_employee.name, tbl_attendance.*
				FROM tbl_employee
				INNER JOIN tbl_attendance
				ON tbl_employee.roll = tbl_attendance.roll
				WHERE att_time = '$date'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateAttendance($dt, $attend){
		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value == "present") {
				$query = "UPDATE tbl_attendance
						SET attend = 'present'
						WHERE roll = '".$atn_key."' AND att_time = '".$dt."'";
				$data_update = $this->db->update($query);
			} elseif ($atn_value == "absent") {
				$query = "UPDATE tbl_attendance
						SET attend = 'absent'
						WHERE roll = '".$atn_key."' AND att_time = '".$dt."'";
				$data_update = $this->db->update($query);
			}
		}

		if ($data_update) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong> Attendance data updated successfully !</div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance data not updated !</div>";
			return $msg;
		}
	}

}