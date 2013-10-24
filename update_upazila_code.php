<?php
$connect = mysql_connect("localhost","root","") or die('Could    not connect: ' . mysql_error());
//$handle = fopen("upa.csv", "r");

// connect to mysql and select database or exit 
mysql_select_db("dghs_hrm_main", $connect);

// loop content of csv file, using comma as delimiter
/*
$query = mysql_query("SELECT * from organization where upazila_thana_code=0");
echo $row = mysql_num_rows($query ); 

 print_r($query);
 $i=0;
 while($results = mysql_fetch_array($query))
{   
$i++;
$upazila_name=$results['upazila_thana_name'];
echo "<pre>";
print_r($results);
$query = mysql_query("UPDATE organization SET upazila_thana_code =$upazila_name WHERE org_code = '$org_code'");
}
*/

$query = mysql_query("UPDATE organization o, admin_upazila u
   SET o.upazila_thana_code = u.upazila_bbs_code
 WHERE o.upazila_thana_name = u.upazila_name
   AND o.district_code = u.upazila_district_code
   AND o.upazila_thana_code = '0'");




//fclose($handle);
//mysql_close($connect);

?>