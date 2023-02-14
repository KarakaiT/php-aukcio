<?php 

    session_start();

    $_SESSION["logged"] = false;

    require "connection.php";
//require "header.php";
//  require "kategoria.php"; 

    $error="";
    $success="";

    if(isset($_POST["login"])){

        $user = $_POST["user"];
        $password = $_POST["password"];

        if(empty($user) || empty($password)){

            $error = "Bejelentkezéshez minden mező kitöltése kötelező!";
        }
        else{

            $sql = "SELECT user,password FROM adatok WHERE user='$user' AND password='$password'";

            $result = mysqli_query($con,$sql);

            if(mysqli_num_rows($result) > 0){

                $_SESSION["logged"] = true;
                $_SESSION["logged"] = $user;
                header("Location: index.php");
            }
            else{
                
                $error = "Hibás felhasználónév, vagy jelszó!";
            }
        }


    }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP-Aukció Bejelentkezés</title>
</head>
<body>

    <div id="top">
        <?php require "menu.php"; ?>
    </div>


    <div class="container">
                <form method="post"  class="text-center w-50 mx-auto p-5 shadow-lg">
                    <h2 class="mb-5">PHP-Aukció Bejelentkezés</h2>

                    <span class="text-danger mb-3 d-block"><?php if(!empty($error)){echo $error;}  ?></span>
                    <span class="text-success mb-3 d-block"><?php if(!empty($success)){echo $success;}  ?></span>

                    <label for="">Felhasznalónév:</label>
                    <input type="text" name="user" class="form-control mb-3">

                    <label for="">Jelszó:</label>
                    <input type="password" name="password" class="form-control mb-3">

                    <button type="submit" name="login" class="btn btn-success">Bejelentkezés</button>
                    
                    <p class="mt-3">Még nincs fiokód?<a href="reg.php">Regisztrálj!</a></p>
                </form>
    </div>

    </body>
    </html>









