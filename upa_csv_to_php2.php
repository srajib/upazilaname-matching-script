
<?php
$server = 'localhost'; // MYSQL database host address 
$db ='dghs_hrm_main'; // MYSQL database name 
$login = 'root'; // Mysql Datbase user 
$password = ''; // Mysql Datbase password 
 
mysql_connect($server, $login, $password); 
mysql_select_db($db); 


$row = 1;
$errorCount = 0;
// correct_org_hrm_7_4_13.csv
// Combined-HRM_3_4_13.csv
//bbs_code_8_4_13.csv
//bbs_code_old_8_4_13.csv
$inFileName1 = 'upa.csv';

//$inFileName1 = 'bbs_code_old_8_4_13.csv';
//$inFileName2 = 'bbs_code_8_4_13.csv';


echo "<b>InFileName1: $inFileName1</b><br />";


$csv = array();
$file = fopen($inFileName1, 'r') or die("<br />Can't open file: $inFileName1");

while (($result = fgetcsv($file)) !== false) {
    $csv[] = $result;
}
$csv1 = $csv;
fclose($file);





echo "<pre>";
//print_r($csv1[2]);
//print_r($csv1[2][0]);
//print_r($csv2[2]);
//echo "</pre>";

$rowCount1 = count($csv1);
//$rowCount2 = count($csv2);

//$rowCount1 = 5000;
//$rowCount2= 5;
$hit = 0;
for ($i = 0; $i < $rowCount1; $i++) {
    for ($j = 0; $j < $rowCount2; $j++) {
        if ($csv1[$i][0] == $csv2[$j][0] && $csv1[$i][2] == $csv2[$j][2] && $csv1[$i][4] == $csv2[$j][4] && $csv1[$i][6] == $csv2[$j][6]) {
            $outString = $csv1[$i][0] . "," . $csv1[$i][1] . "," . $csv1[$i][2] . "," . $csv1[$i][3] . "," . $csv1[$i][4] . "," . $csv1[$i][5] . "," . $csv1[$i][6] . "," . $csv1[$i][7];
            $outString .= "\n";
            $outString .= $csv2[$j][0] . "," . $csv2[$j][1] . "," . $csv2[$j][2] . "," . $csv2[$j][3] . "," . $csv2[$j][4] . "," . $csv2[$j][5] . "," . $csv2[$j][6] . "," . $csv2[$j][7];
            $outString .= "\n";
//            echo "$outString";
            $hit = 1;
        }
    }
    if ($hit == 1) {
//        echo "<br><br>Row $i:-----------------------------------------------------<br>";
//        echo "$outString";
    } else {
        echo "<br><br>Row $i:-----------------------------------------------------";
        $outString = $csv1[$i][0] . "," . $csv1[$i][1] . "," . $csv1[$i][2] . "," . $csv1[$i][3] . "," . $csv1[$i][4] . "," . $csv1[$i][5] . "," . $csv1[$i][6] . "," . $csv1[$i][7];
        $outString .= "\n";        
        echo " <br />$outString";
      //  fwrite($fh, $outString);
        $errorCount++;
    }
    $hit = 0;
//    echo "<br><br>Row $i:-----------------------------------------------------<br>";
}
echo "</pre>";

//fwrite($fh, $stringData);
echo "<br> end all <br> file 1 count: $rowCount1 <br />";
fclose($fh);
?>
