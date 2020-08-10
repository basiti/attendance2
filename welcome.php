<!DOCTYPE html>
<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'studentstwo';
    
    $conn = mysqli_connect($host, $user, $pass, $db);
?>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <meta charset="utf-8" />
        <title>Titre</title>
        <style>

            h1{
                font-family: cursive;
                text-align: center;
            }
              
        </style>
    </head>

    <body>
        <h1>Merci et Bienvenue car vous etes bel et bien present <?php echo" le ".date('d-m-Y'). " à " .date('H:i:s') ?> </h1><br><br><br>

    <div class="mx-auto" style="width: 200px;">
        <a href="index2.php"  class="btn btn-primary"> OK </a>
    </div>
    <?php
        $email = $_SESSION["email"];
        $sql=mysqli_query($conn,"select id, name from student_table where email='$email'");
        $row = mysqli_fetch_assoc($sql);
        $id = $row["id"];

        $inserer = "INSERT INTO attendance_table(idUser, name)VALUES('".$row["id"]."', '".$row["name"]."')";
        mysqli_query($conn, $inserer);

        mysqli_close($conn);
    ?>
    </body>
</html>