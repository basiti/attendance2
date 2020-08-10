
<?php
		include 'databasetwo.php';
		
		if(isset($_POST['user_phone']))
		{
			$phone=$_POST['user_phone'];
		
			$duplicate=" SELECT telephone FROM student_table WHERE telephone='$phone' ";
		
			$query = mysqli_query($conn, $duplicate);
			$count = mysqli_num_rows($query);
		
			if($count>0)
			{
				echo "Numéro Existe Déja renseigné autre";
			}
			else
			{
				echo "juste";
			}
			exit();
		}
		
		if(isset($_POST['user_email']))
		{
			$emailId=$_POST['user_email'];
		
			$duplicate=" SELECT email FROM student_table WHERE email='$emailId' ";
		
			$query=mysqli_query($conn, $duplicate);
			$row = mysqli_num_rows($query);
			if($row>0)
			{
			 echo "Email Existe Déja renseigné autre";
			}
			else
			{
				echo "juste";
			}
			exit();
		}
		
		if(isset($_POST['user_pass2']))
		{
			if($_POST['user_pass2'] != $_POST['user_pass'])
			{
			 echo " Email ne correspond pas, verifier s'il vous plait";
			}
			else
			{
				echo "juste";
			}
			exit();
		}
		
		// If file upload form is submitted 
		$status = $statusMsg = '';
		if( isset($_POST['save']) )
		{
		
			$status = 'error';
			$path = 'uploads/'; // Repertoire de telechargement
			if(!empty($_FILES["file"]["name"])) { 
				// Obtention information sur le fichier 
				$fileName = basename($_FILES["file"]["name"]); 
				$ext = $_FILES['file']['tmp_name']; 
				
				$fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 
		
				// On peut télécharger la même image en utilisant la rand function
				$final_image = rand(1000,1000000).$fileName;
				 
				// Autoriser certains formats d'images 
				$allowTypes = array('jpg','png','jpeg','gif'); 
				if(in_array($fileType, $allowTypes)){
		
					$path = $path.strtolower($final_image); 
		
					if(move_uploaded_file($ext,$path)){
		
						$name = htmlspecialchars($_POST['name']);
						$email = htmlspecialchars($_POST['email']);
						$telephone = htmlspecialchars($_POST['telephone']);
						$password = htmlspecialchars($_POST['password']);
						$sexe = $_POST['sexe'];
					
						// Insertion des données dans la base de données 
						$insert = mysqli_query($conn,"INSERT into student_table (name, email, password, telephone, sexe ,image)
						VALUES ('$name','$email','$password','$telephone','$sexe','$path')"); 
						
						if($insert){ 
							$status = 'success'; 
							header('Location: index2.php');
		
						}else{ 
							echo  'Echec du téléchargement, Veuillez reprendre votre telechargement svp.'; 
						}  
				}else{ 
					echo 'Désolé, seul les types JPG, JPEG, PNG, & GIF sont autorisés.'; 
				} 
			 }else{ 
				echo  'selectionner une image à télécharger.'; 
			 }
			}
					
			mysqli_close($conn);
		
		
		}
	?>

