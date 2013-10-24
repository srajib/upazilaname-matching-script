<?php
$connect = mysql_connect("localhost","root","") or die('Could    not connect: ' . mysql_error());
$handle = fopen("upa.csv", "r");

// connect to mysql and select database or exit 
mysql_select_db("dghs_hrm_main", $connect);

// loop content of csv file, using comma as delimiter
while (($data = fgetcsv($handle, 1701, ",")) !== false) {
$org_code = $data[0];
$stock = $data[8];



$query = 'SELECT org_code FROM organization';
if (!$result = mysql_query($query)) {
continue;
} 

if ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

// entry exists update
$query = "UPDATE organization SET upazila_thana_name ='$stock' 
WHERE org_code = '$org_code'";


mysql_query($query);
if (mysql_affected_rows() <= 0) {
 echo "no rows where affected by update query";
}
} else {
echo "entry doesn't exist continue or insert...";
}

mysql_free_result($result);
}

fclose($handle);
mysql_close($connect);

?>