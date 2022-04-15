<?php
    function startsWith ($string, $startString) {
        $len = strlen($startString);
        return (substr($string, 0, $len) === $startString);
    }

    include("init.php");

    echo "
        <link rel='stylesheet' type='text/css' href='../style/dataPage.css'>
        <div class='header'>
            <h1 style='display:inline-block'> Viewing all Tables: </h1>
            <hr>
        </div>
    ";

    $arr = ["dati_discipline", "dati_studente"];

    for($i=0; $i<count($arr); $i++) {
        
        $sql = "SELECT * FROM $arr[$i]";

        $result = mysqli_query($mysqli, $sql);

        $fields_num = mysqli_num_fields($result);

        echo "<div><table style='width:100%'><tr class='header_table'>";
            // printing table headers
        for($j=0; $j < $fields_num; $j++) {
            $field = mysqli_fetch_field($result);
            echo "<td>{$field->name}</td>";
        }
        echo "</tr>\n";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr class='column_table'>";
            foreach($row as $cell)
                if(startsWith(strtolower($cell), "via")) 
                    echo "<td> * * * </td>";
                else
                    echo "<td>$cell</td>";
            echo "</tr>\n";
        }
        echo "</div></table><br><br>";
    }
?>