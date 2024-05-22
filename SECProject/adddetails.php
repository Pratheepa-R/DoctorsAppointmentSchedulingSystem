<?php
 $conn = mysqli_connect("localhost","root","","doctor");
        $sid=$_POST['schid'];
        $did=$_POST['docid'];
        $dname=$_POST['docname'];
        $dspec=$_POST['docspec'];
        $date=$_POST['date'];
        $stime=$_POST['stime'];
	      $etime=$_POST['etime'];
        $sql1 = "INSERT INTO schedule(scheduleid, doctorid, name, specialisation, date, starttime, endtime) VALUES('$sid','$did','$dname','$dspec','$date','$stime','$etime')";
        $sql2="SELECT * from doctors where id='".$did."'";
        $result=$conn->query($sql2);
        if($result->num_rows==0){
          $sql3="INSERT INTO doctors(id,name,specialisation,rating) VALUES('$did','$dname','$dspec','')";
          $conn->query($sql3);
        }
	      if($conn->query($sql1)==true){
          header("location:confirmadd.html");
          exit();
	      }
?>