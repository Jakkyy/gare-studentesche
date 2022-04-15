<?php
    include("init.php");

    $sql = "SELECT Nome FROM dati_discipline;";

    $result = mysqli_query($mysqli, $sql);

    while($row = mysqli_fetch_row($result)) {
        foreach($row as $cell)
            echo "<option value='$row[0]'>$row[0]</option>";
    }
?>