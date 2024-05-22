<?php
	if(isset($_POST['editid'])){
        	$sid=$_POST['schid'];
        	$conn = mysqli_connect("localhost","root","","doctor");
		$sql="SELECT * from schedule where scheduleid='".$sid."'";
		$result=$conn->query($sql);
        	if($result->num_rows==0){
			header("location:editidcheck.html");
			exit();
		}
		else{
			$result=mysqli_fetch_assoc($result);
			$sql="DELETE FROM schedule where scheduleid='".$sid."'";
			$conn->query($sql);
		}
	}
?>
<html>
<head>
<title>Edit Details</title>
<link rel="stylesheet" href="editdetails.css">
</head>
<body>
<style>
body {
  background-image: url('stethoscope.jpg');
  background-size:800px 750px;
  background-repeat:no-repeat;
}
</style>
<form action="#" method="POST" autocomplete="off">
<div class="box">
<h1><center>EDIT DETAILS</center></h1>
	<p>SCHEDULE ID</p>
      <input type="text" name="schid" value="<?php if(isset($_POST['editid'])){echo $result['scheduleid'];}?>" required>
      <p>DOCTOR ID</p>
      <input type="text" name="docid" placeholder="Enter Doctor ID" value="<?php if(isset($_POST['editid'])){echo $result['doctorid'];}?>" required>
	<p>NAME</p>
      <input type="text" name="docname" placeholder="Enter Doctor's name" value="<?php if(isset($_POST['editid'])){echo $result['name'];}?>" required>
      <p>SPECIALISATION</p>
      <input type="text" name="docspec" placeholder="Enter Specialisation" value="<?php if(isset($_POST['editid'])){echo $result['specialisation'];}?>" required>
	<p>DATE</p>
      <input type="text" name="date" placeholder="Enter Date" value="<?php if(isset($_POST['editid'])){echo $result['date'];}?>" required>
      <p>START TIME</p>
      <input type="text" name="stime" placeholder="Enter starting time" value="<?php if(isset($_POST['editid'])){echo $result['starttime'];}?>" required>
	<p>END TIME</p>
	<input type="text" name="etime" placeholder="Enter ending time" value="<?php if(isset($_POST['editid'])){echo $result['endtime'];}?>" required>
      <input type="Submit" name="edit" value="EDIT">
</div>
</form>
</body>
</html>
<?php
	if(isset($_POST['edit'])){
        $nsid=$_POST['schid'];
        $did=$_POST['docid'];
        $dname=$_POST['docname'];
        $dspec=$_POST['docspec'];
        $date=$_POST['date'];
        $stime=$_POST['stime'];
	  $etime=$_POST['etime'];
	  $conn = mysqli_connect("localhost","root","","doctor");
        $sql = "INSERT INTO schedule(scheduleid, doctorid, name, specialisation, date, starttime,endtime)VALUES('$nsid','$did','$dname','$dspec','$date','$stime','$etime')";
	  if($conn->query($sql)==true){
			header("location:confirmedit.html");
			exit();
	  }
	}
?>