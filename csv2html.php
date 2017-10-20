<?php

 $sow  = $_REQUEST["file"];
//echo "hii";
$row = 1;
if (($handle = fopen($sow, "r")) !== FALSE) {
echo '<table>';
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
       $num = count($data);
       echo '<tr>';
        //echo "<p> $num fields in line $row: <br /></p>\n";
        
        for ($c=0; $c < $num; $c++) {
           if ($row == 0)
            echo '<th>' . $data[$c] . '</th>';
            else echo '<td>' .  $data[$c] . '</td>';
        }
    echo '</tr>';
    $row++;
    }
    echo '</table>';
    fclose($handle);
}
?>