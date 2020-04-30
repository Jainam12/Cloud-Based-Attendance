<html>
 <head>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Student Attendance</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/c3.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/highcharts.js"></script>
  <script src="js/highcharts-exporting.js"></script>
  <script src="js/jquery.knob.js"></script>
  <script src="js/student.js"></script>
 </head>
 <body>
  <div id="header" class="clearfix">
    <h1>Shah and Anchor Kutchhi Engineering College</h1>
    <h3>Attendance Tracker</h3>	
  </div>
 <div class="container">
  <div id="output"></div>
  <form id="getAttendance">
    <div class="form-group">
      <label>Year</label>
      <select name="year" class="form-control">
      <option>1</option><option>2</option><option>3</option><option>4</option> 
      </select>
    </div>
    <div class="form-group">
      <label>Class</label>
      <select name="section" class="form-control">
      <option>1</option><option>2</option><option>3</option>
      <option>4</option><option>5</option><option>6</option>
    </select>
    </div>
    <div class="form-group">
      <label>Roll Number</label>
      <input type="text" class="form-control" name="roll" placeholder="">
    </div>
    <button class="btn btn-primary">Get Results</button>
  </form>
  </div>
 </body>
</html>
