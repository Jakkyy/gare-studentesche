<?php
    include("init.php");

    $data = $_POST;

    $sql = "INSERT INTO dati_studente(Nome, Cognome, Indirizzo, Altezza, Classe, Peso, Sport) 
    VALUES('".$_POST["inputNome"]."','".$_POST["inputCognome"]."', '".$_POST["inputAddress"]."', '".$_POST["inputClasse"]."', '".$_POST["inputPeso"]."','".$_POST["inputAltezza"]."','".$_POST["list"]."')";

    if (!mysqli_query($mysqli,$sql)) {
        echo("<h2 style='color:red;font-weight:bold;'> STUDENTE GIA REGISTRATO </h2>");
        header("Refresh:5; url='../register.html'");
    } else {
        echo "Utente registrato!";
        header("Refresh:2; url='../index.html'");
    }
?>