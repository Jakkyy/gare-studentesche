<?php
    include("init.php");

    $id = $_POST["search"];
    
    echo "<link rel='stylesheet' type='text/css' href='../style/dataPage.css'>"; 

    echo "
        <div class='header'>
            <h1 style='display:inline-block'> Result Found for ID = $id: </h1>
            <hr>
        </div>
    ";

    $sql = "SELECT * FROM dati_studente WHERE ID=$id";

    $result = mysqli_query($mysqli, $sql) or die("<h2 style='color:red;font-weight:bold;'> NO RESULTS FOUND! </h2>");
    
    $fields_num = mysqli_num_fields($result);

    echo "<table><tr class='header_table'>";
    for($i=0; $i<$fields_num; $i++) {
        $field = mysqli_fetch_field($result);
        echo "<td>{$field->name}</td>";
    }
    echo "</tr>\n";
    while($row = mysqli_fetch_row($result)) {
        echo "<tr class='column_table'>";
        foreach($row as $cell)
            echo "<td>$cell</td>";
        echo "</tr>\n";
    }
    echo "</table><br><br>"; 

?>