<?php 

    require "connection.php";
//require "header.php";
//  require "kategoria.php"; 

$error ="";
$succes ="";

if(isset($_POST["reg"])){

    $user = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($user) || empty($email) || empty($password)){

        $error = "Regisztrációhoz minden mező kitöltése kötelező!";
    }
    elseif(strlen($password) < 6 ){
        //&& strlen($password) < 8

        $error="A jelszó hossza min. 6 karakter hosszú legyen!";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $error = "Nem megfelelő email formátum!";
    }

    else{

        $users = "SELECT user FROM adatok WHERE user='$user'";
        $user_result = mysqli_query($con,$users);

        if(mysqli_num_rows($user_result) == 1){

            $error= "Felhasználónév már foglalt!";
        }
        else{

            $sql = "INSERT INTO adatok(user,email,password) VALUES('$user','$email','$password')";
            mysqli_query($con, $sql);

            $success = "Sikeres regisztráció!";
            header("Location: login.php");
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP-Aukció Regisztáció</title>
</head>
<body>
    
    <div id="top">
        <?php require "menu.php"; ?>
    </div>


    <div  class="container">
        <div class="container">
            
                <form method="post" class="text-center w-50 mx-auto p-5 shadow-lg">
                    <h2 class="mb-5">PHP-Aukció Regisztáció</h2>

                    <span class="text-danger mb-3 d-block"><?php if(!empty($error)){echo $error;}  ?></span>
                    <span class="text-success mb-3 d-block"><?php if(!empty($success)){echo $success;}  ?></span>

                    <label for="">Felhasznalónév:</label>
                    <input type="text" name="user" class="form-control mb-3">

                    <label for="">Email:</label>
                    <input type="email" name="email" class="form-control mb-3">

                    <label for="">Jelszó:</label>
                    <input type="password" name="password" class="form-control mb-3">

                    <button type="submit" name="reg" class="btn btn-primary">Regisztráció</button>
                    
                    <p class="mt-5">Van már fiokód?<a href="login.php">Jelentkezz be!</a></p>
                </form>
            
        </div>
    </div>

    </body>
    </html>