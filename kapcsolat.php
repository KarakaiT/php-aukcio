<?php require "header.php";
    //require "connection.php";

    $error="";
    $sucess="";

    if(isset($_POST["send"])){

        $vez_nev = $_POST["vez_nev"]; 
        $ker_nev = $_POST["ker_nev"]; 
        $email = $_POST["email"]; 
        $uzenet = $_POST["uzenet"];
        
        if(empty($vez_nev) || empty($ker_nev) || empty($email) || empty($uzenet)){

            $error ="Üzenet elküldéséhez minen mező kuitöltése kötelező!";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $error = "Nem megfelelő email formátum!";
        }
        else{

            $sql = "INSERT INTO message(vez_nev,ker_nev,email,uzenet) VALUES('$vez_nev','$ker_nev','$email','$uzenet')";
            mysqli_query($con, $sql);

            $success = "Sikeres Üzenet köldés!";
        }

    }


?>


<div id="top">
    <?php require "menu.php"; ?>
</div>


<div id="kapcs">
    <div class="container bg-danger d-flex flex-column">
        <h2 class="text-center p-5">Rólunk</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor laboriosam incidunt voluptatum fuga? Debitis reprehenderit vitae sunt est assumenda magni tenetur. Ipsum vero veritatis assumenda accusantium id. Molestias reiciendis omnis sequi id temporibus fugit sit, tempora, sint veniam nulla ducimus eius recusandae hic accusamus adipisci optio a quidem libero porro maiores error alias nisi fugiat iusto. Ratione laboriosam et odit vero in nihil suscipit ipsam explicabo exercitationem velit necessitatibus doloribus error est rerum, aspernatur quos nisi iure tempora, facere aliquid incidunt sit ducimus cumque perspiciatis. Exercitationem ullam rem sapiente aperiam quibusdam qui ex, ducimus architecto delectus iure expedita, incidunt laboriosam nesciunt corrupti quo inventore non voluptas fugit iste fuga? Maxime nesciunt beatae, nostrum, hic aliquam neque tenetur odit recusandae nobis eaque nemo, quibusdam error obcaecati dicta. Sed distinctio ipsum quod, natus cumque doloremque molestiae deleniti doloribus dolores omnis quis impedit nihil soluta ea corporis vel? Qui, id. Iusto, quae libero.</p>
     
        <h2 class="text-center p-5">Kapcsolat</h2>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d87333.48022534254!2d16.76739202606998!3d46.84031851470217!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47692817e6d34a01%3A0x400c4290c1e1250!2sZalaegerszeg!5e0!3m2!1shu!2shu!4v1677488188925!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
            <form action="" method="post" class="text-center w-50 mx-auto p-5">
                <h3 class="text-center mb-3">Üzenj nekünk</h3>

                    <span class="text-success mb-3 d-block"><?php if(!empty($error)){echo $error;}  ?></span>
                    <span class="text-success mb-3 d-block"><?php if(!empty($success)){echo $success;}  ?></span>

                <label for="">Vezetéknév:</label>
                    <input type="text" name="vez_nev" class="form-control mb-3">

                <label for="">Keresztnév:</label>
                    <input  type="text" name="ker_nev" class="form-control mb-3">

                <label for="">Email cím:</label>
                    <input type="email" name="email" class="form-control mb-3">

                <label for="">Üzenet:</label>
                    <textarea name="uzenet"  class="form-control mb-3"></textarea>

                    <button type="submit" name="send" class="btn btn-primary">Küldés</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>