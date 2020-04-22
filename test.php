<!DOCTYPE HTML>  
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
       /* include("TabelKlasser/login.php");
        $loginclasstest = new login(mysqli_connect("localhost", "root", "", "portfoliodb"));
        $derp = $loginclasstest->read();
        for($i = 0; $i < count($derp); $i++)
        {
            echo $derp[$i][0] . " " . $derp[$i][1] . "<br>";
        }*/
      /*  $date = date('Y-m-d H:i:s', time());
        echo $date;*/
        
            include("FunktionKlasser/RedigerBruger.php");
            $redigerBruger = new RedigerBruger(mysqli_connect("localhost", "root", "", "portfoliodb"));
            $redigerBruger->brugernavn = "Karlsmart";
            $redigerBruger->ModtagBrugerData();
        ?>
    </body>
</html>
