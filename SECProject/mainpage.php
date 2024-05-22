<html>
<head>
<title>Schedule An Appointment</title>
</head>
<body>
<style>
body{
	background-image:url("doctorsline.jpg");
	background-size:1280px 400px;
  	background-repeat:no-repeat;
	background-color:powderblue;
}
</style>
<p style="color:green; position:absolute; top:60%; left:17%; font-size:30px; font-weight:bold;">SCHEDULE AN APPOINTMENT WITH THE BEST DOCTORS</p>
<?php
	$conn = mysqli_connect("localhost","root","","doctor");
	$sql="SELECT * from schedule where date>curdate() or (date=curdate() and starttime>current_time())";
	$result=$conn->query($sql);
	while($row=mysqli_fetch_assoc($result)){
	?>
		<div class="appointment">
			<form>
			<p><?php echo $row['name']; ?></p>
			<p><?php echo $row['specialisation']; ?></p>
			<p><?php echo $row['date']; ?></p>
			<p><?php echo $row['starttime']; ?>-<?php echo $row['endtime']; ?></p>
			<input type="submit" class="schedulebutton" onclick="book(<?php echo $row['scheduleid']; ?>)" formaction="booking.php" value="SCHEDULE">
		</form>
		</div></br></br>
	<?php
	}
?>
<style>
.appointment{
	background-color:white;
	border:2px solid black;
	border-radius:5px;
	position:relative;
	top:80%;
}
.appointment p{
	font-weight:bold;
	font-size:20px;
	padding-left:5%;
}
.schedulebutton{
		border: none;
        outline: none;
        height: 40px;
        background: #549db9;
        color: #fff;
        font-size: 18px;
        border-radius: 10px;
		width:25%;
}
.appointment input[type="submit"]{
	margin-left:60%;
	margin-top:-100px;
}
.schedulebutton:hover{
	cursor:pointer;
	background-color:#38cc44;
	color:black;
}
</style>
<script>
	function book(x){
		document.cookie="scheduleid="+x;
	}
</script>
</body>
</html>