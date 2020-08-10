<?php
		session_start();
		include 'databasetwo.php';  
        
    if($_POST['type']==2){
			$email=$_POST['email'];
			$password=$_POST['password'];
			$check=mysqli_query($conn,"select * from student_table where email='$email' and password='$password'");
			if (mysqli_num_rows($check)>0)
			{
				$row = mysqli_fetch_assoc($check);
				$idUser = $row['id'];
			
				mysqli_query($conn, "INSERT INTO attendance_table (iduser) VALUES ('$idUser')");
	
				$_SESSION['email']=$email;
				echo json_encode(array("statusCode"=>200));
			}
			else{
				echo json_encode(array("statusCode"=>201));
			}
			mysqli_close($conn);
		}
	?>