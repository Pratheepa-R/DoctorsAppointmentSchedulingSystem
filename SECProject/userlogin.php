<?php 
if(isset($_POST['login'])){
	$conn = mysqli_connect("localhost","root","","doctor");
	$id = $_POST['id'];
	$name = $_POST['username'];
	$password = $_POST['pass'];
	$sql="SELECT * from login where userid='".$id."'";
	$result=$conn->query($sql);
	if($result->num_rows==0){
	?>
		<script>alert("Invalid Credentials");
		window.location.replace("userlogin.html");
		</script>';
	<?php
	}
	else{
		while ($row=mysqli_fetch_assoc($result)){
			if(($password==$row['password']) and ($name==$row['username'])){
				session_start();
				$_SESSION['USERID']=$id;
				header("location:mainpage.php");
				exit();
			}
			else{
			?>
				<script>alert("Invalid Credentials");
				window.location.replace("userlogin.html");
				</script>
			<?php
			}
		}
	}
}
?>


