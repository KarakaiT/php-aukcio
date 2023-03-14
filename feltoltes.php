<?php require "header.php";
    //require "connection.php";

    $error = "";
    $success = "";

    if(isset($_POST["upload"])){

        $target = "img/".$_FILES["termekkep"]["name"];
        $termekkep = $_FILES["termekkep"]["name"];
        $termeknev = $_POST["termeknev"];
        $termekar = $_POST["termekar"];
        $kategoria = $_POST["kategoria"];
        $feltolt_nev = $_POST["feltolt_nev"];
        $rleiras = $_POST["rleiras"];
        $hleiras = $_POST["hleiras"];

        if(empty($termekkep) || empty($termeknev) || empty($termekar) || empty($feltolt_nev) || empty($rleiras) || empty($hleiras)){

            $error = "Minden mező kitöltése kötelező!";
        }
        else{

            $sql = "INSERT INTO termekek(termeknev,ar,kategoria,rleiras,hleiras,feltolt_nev,termekkep) VALUES( '$termeknev','$termekar','$kategoria','$rleiras', '$hleiras', '$feltolt_nev','$termekkep')";

            mysqli_query($con, $sql);

            move_uploaded_file($_FILES["termekkep"]["tmp_name"], $target);

            $success = "Sikeres termékfeltöltés!";
        }
        

    }


?>


<div id="top">
    <?php require "menu.php"; ?>
</div>


<div id="kapcs">
    <div class="container">
            <form action="" method="post" class="w-75 mx-auto p-5 text-center shadow-lg mt-5" enctype="multipart/form-data">

                <h2 class="mb-3">Termék feltöltése</h2>

                <h5 class="text-success mb-3"><?php if(!empty($success)){echo $success;}  ?></h5>
                <h5 class="text-danger mb-3"><?php if(!empty($error)){echo $error;}  ?></h5>

                <label>Termékkép</label>
                <input type="file" name="termekkep[]" class="form-control my-2" >

                <label>Terméknév</label>
                <input type="text" name="termeknev" class="form-control my-2">

                <label>Termékár</label>
                <input type="text" name="termekar" class="form-control my-2">

                <label>Kategória</label>
                <select name="kategoria" class="form-control my-2">
                    <option value="1">Elektromos berendezés</option>
                    <option value="2">Könyv</option>
                    <option value="3">Háztartási cikk</option>
                    <option value="4">Játék</option>
                    <option value="5">Kultúra</option>
                    <option value="6">Sport</option>
                    <option value="7">Egészség</option>
                    <option value="8">Régiség</option>
                    <option value="9">Állat</option>
                </select>

                <label>Termék rövid leírása</label>
                <input type="text" name="rleiras" class="form-control my-2">

                <label>Termék részletes leírása</label>
                <textarea name="hleiras" class="form-control my-2" cols="30" rows="10"></textarea>

                <label>Feltöltő neve</label>
                <input type="text" name="feltolt_nev" class="form-control my-2 mb-5">

                <input type="hidden" name="feltolt_nev" value="<?php echo $_SESSION["user"]; ?>" />

                <button class="btn btn-primary mt-5" name="upload">Termék feltöltése</button>
            </form>
        </div>
</body>
</html>

