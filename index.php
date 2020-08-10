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
	
	<form id="register_form" method="post" action="savetwo.php" enctype="multipart/form-data" class="container" onsubmit="return checkall();">
    <h2>Register form</h2>
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name" >
		

			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email" required onkeyup="checkemail();">
			<span id="email_status"></span>
		

			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password (8 Max)" required maxlength="10">
		

			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password2" name="password2" placeholder="Confirme ton password (8 Max)" required maxlength="10" onkeyup="checkpass();">
			<span id="pass_status"></span>
		

			<label for="telephone">telephone:</label>
			<input type="text" class="form-control" id="telephone" placeholder="telephone" name="telephone" onkeyup="checktelphone();">
			<span id="telephone_status"></span>
		

                                    <input type="radio" name="sexe" id="agree-term" class="agree-term" value="male"checked />
                                    <label for="agree-term" class="label-agree-term">homme</label>
                                    
                                    <input type="radio" name="sexe" id="agree-term" class="agree-term" value="female" />
                                    <label for="agree-term" class="label-agree-term">Femme</label>
                                    
                                    <input type="radio" name="sexe" id="agree-term" class="agree-term" value="autre" />
                                    <label for="agree-term" class="label-agree-term">Autre</label>
                                
									
									<input type="file" class="form-control" id="img" placeholder="image" name="file">
								
									
									<input type="submit" name="save" class="btn btn-primary" value="Register"><br><br>
									<a href="iconsmenu.php">Aller au menu</a>
    </form>
 </div>
   
        <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <script>

        function checktelephone()//Fonction qui vérifie si le téléphone existe ou pas
        {
            var telephone=document.getElementById( "telephone" ).value;
                
            if(telephone)
            {
                $.ajax({
                    type: 'post',
                    url: 'savetwo.php',
                    data: {
                    user_phone:telephone,
                    },
                    success: function (response) {
                        $( '#phone_status' ).html(response);
                        if(response=="juste")	
                        {
                            return true;	
                        }
                        else
                        {
                            return false;	
                        }
                    }
                });
            }
                else
                {
                    $( '#phone_status' ).html("");
                    return false;
                }
        }

        function checkemail()//Fonction qui vérifie si le mail existe ou pas
        {
        var email=document.getElementById( "email" ).value;
            
        if(email)
        {
            $.ajax({
                type: 'post',
                url: 'savetwo.php',
                data: {
                user_email:email,
                },
                success: function (response) {
                    $( '#email_status' ).html(response);
                    if(response=="juste")	
                    {
                        return true;	
                    }
                    else
                    {
                        return false;	
                    }
                }
            });
            }
            else
            {
                $( '#email_status' ).html("");
                return false;
            }
        }

        function checkpass()//Fonction qui vérifie si les mMdp correspondent
        {
            var password2=document.getElementById( "password2").value;
            var password=document.getElementById( "password").value;
                
            if(password2)
            {
                $.ajax({
                    type: 'post',
                    url: 'savetwo.php',
                    data: {
                    user_pass2:password2,
                    user_pass:password,
                    },
                    success: function (response) {
                        $( '#pass_status' ).html(response);
                        if(response=="juste")	
                        {
                            return true;	
                        }
                        else
                        {
                            return false;	
                        }
                    }
                });
            }
                else
                {
                    $( '#pass_status' ).html("");
                    return false;
                }
        }


        function checkall()
        {
            var namehtml=document.getElementById("phone_status").innerHTML;
            var emailhtml=document.getElementById("email_status").innerHTML;
            var passhtml=document.getElementById("pass_status").innerHTML;

            if((namehtml && emailhtml && passhtml)=="juste")
            {
                return true;//On peut s'inscrire
            }
            else
            {
                return false;//On ne peut pas s'incrire
            }
        }



    </script>
</body>
</html>  