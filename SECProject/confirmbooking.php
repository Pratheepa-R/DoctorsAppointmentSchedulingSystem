<html>
<head>
<title>Confirm Booking</title>
</head>
<body>
<style>
body{
	background-color:powderblue;
}
</style>
<?php
	session_start();
	$userid=$_SESSION['USERID'];
	$schid=$_COOKIE['scheduleid'];
	$conn = mysqli_connect("localhost","root","","doctor");
	$sql="SELECT * from login where userid='".$userid."'";
	$result=$conn->query($sql);
?>
	<div class="box">
	<center>
	<h2>You have Successfully Booked an Appointment</h2>
	</center>
<?php
	while($row=mysqli_fetch_assoc($result)){
?>
			<pre>
				<p class="column">USER ID         : <?php echo $row['userid']; ?></p>
				<p class="column">USERNAME        : <?php echo $row['username']; ?></p>
<?php
	}
			$sql="SELECT * from schedule where scheduleid='".$schid."'";
			$result=$conn->query($sql);
			while($row=mysqli_fetch_assoc($result)){
?>
				<p class="column">DOCTOR'S NAME   : <?php echo $row['name']; ?></p>
				<p class="column">SPECIALISATION  : <?php echo $row['specialisation']; ?></p>
				<p class="column">DATE            : <?php echo $row['date']; ?></p>
<?php 
			}
				$sql="SELECT endtime from bookings where userid='".$userid."' and scheduleid='".$schid."'";
				$result=$conn->query($sql);
				while($row=mysqli_fetch_assoc($result)){
            			$endtime=$row['endtime'];
        			}
				$starttime=strtotime("-10 minutes",strtotime($endtime));
				$starttime=date("H:i:s",$starttime);
?>
				<p class="column">TIMINGS         : <?php echo $starttime; ?>-<?php echo $endtime; ?></p>
			</pre>
	</div>
<a href="mainpage.php"><button class="button">HOME</button></a>
<style>
.box{
	background-color:white;
	height:650px;
	width:750px;
	position:absolute;
	top:15%;
	left:20%;
	border:2px dashed black;
	border-radius:5%;
}
.column{
	text-indent:10em;
	font-size:20px;
	font-weight:bold;
}
.button{
	background-color:white;
  	color: green;
  	padding:15px 30px;
  	text-align: center;
  	font-size: 16px;
  	border:3px solid black;
  	cursor:pointer;
 	position:absolute;
  	top:20px;
	left:1100px;
	font-weight:bold;
	border-radius:5px;
}
.button:hover{
  background-color:green;
  color:white;
}
</style>
</body>
</html>
