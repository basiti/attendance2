<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      body{
          text-align: center;
          border-color: black;
      }
      .container{
          border-color: black;
          background-color: #d9d9d9;
          padding-top: 5%;
          width: 50%;
      }
      H2{
          color:black;
          font-family: cursive ;
      }
      
    </style>
</head>
<body>
<div style="margin: auto;width: 60%;">
	<form id="login_form" name="form1" method="post" class="container">	
	<h2 class="form-title">Sign form</h2>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email_log" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
			</div>
		<input type="button" name="submit" class="form-submit" value="Signer" id="butlogin"><br>
		<a href="iconsmenu.php">Aller au menu</a>
	</form>
</div>

<script>
$(document).ready(function() {
    
    $('#butlogin').on('click', function() {
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		if(email!="" && password!="" ){
			$.ajax({
				url: "savetwo2.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "welcome.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid EmailId or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>  