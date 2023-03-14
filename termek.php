<?php require "header.php"; ?>


<div id="top">
    <?php require "menu.php"; ?>
</div>


<div class="right">
    <?php 
    
        if(isset($_GET["termekid"])){

            $termekid = $_GET["termekid"];

            $sql = "SELECT * FROM termekek WHERE id='$termekid'";

            $resoult = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($resoult)){

                $id = $row["id"];
                $termekkep = $row["termekkep"];
                $termeknev = $row["termeknev"];
                $ar = $row["ar"];
                $rleiras = $row["rleiras"];
                $hleiras = $row["hleiras"];
                $kategoria = $row["kategoria"];
                $feltolt_nev = $row["feltolt_nev"];

                echo "

                <div class='termekdoboz'>
                
                
                    <div id='termekkep'>
                        <img src='img/$termekkep' alt='$termekkep' title='$termekkep'/>
                    </div>

                    <div id='termekadatok' >

                        <div id='termeknev'>
                            <h2>".$termeknev."</h2>
                        </div>

                        <div id='termekar'>
                            <h3>".number_format($ar,0,".",".")."Ft</h3>
                        </div>
                        
                        <div id='cikkszam'>
                            <p><strong>Feltöltő neve: </strong>".$feltolt_nev."</p>
                        </div>

                        <div id='termekrovid'>
                            <p>".$rleiras."</p>
                        </div>

                        <div id='termekhosszu'>
                            <h3>Termék részletes leírása:</h3>
                            <p>".$hleiras."</p>
                        </div>

                        <div id='termekkosar'>
                            <a href='kosarmuvelet.php?id=$id&action=add'>Kosárba</a>
                        </div>

                    </div>
                    

                </div>
                
                
                ";
            }
        }


    
    ?>
</div>

</body>
</html>