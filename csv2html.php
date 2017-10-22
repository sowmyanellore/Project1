<?php
 
 $obj = new csv2html();
 
 
 
 
 
 class csv2html {
 
 public function __construct()
     {
        
          
            $this::csv();
         
     }
 
 public static function csv(){
 
 $sow  = $_REQUEST["file"];
 echo '<html>';
 echo '<head>';
 echo '<link rel="stylesheet" href="style.css">';
 echo '</head>';
 echo '<body>';
 
 $row = 1;
 if (($handle = fopen($sow, "r")) !== FALSE) {
 echo '<table>';
     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo '<tr>';
        
         
         for ($c=0; $c < $num; $c++) {
            if ($row == 1) echo '<th>' . $data[$c] . '</th>';
            else  echo '<td>' .  $data[$c] . '</td>';
         }
     echo '</tr>';
     $row++;
     }
     echo '</table>';
     fclose($handle);
     }
     
     echo '</body>';
     echo '</html>';
     }
 }
 ?>