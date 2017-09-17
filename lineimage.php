<?php include "backoffice/php/init.php"; 


$content = file_get_contents('php://input');
$data = json_decode($content, true);
$message = $data['message'];
if(empty($message)!== true)
{
    $sql = "INSERT INTO line_rec (`MESSAGE`) VALUES ('$message');";
    mysql_query($sql);
}  
 

//$sql = "SELECT * FROM line_rec;";
//print_r(get_data_sql($sql));
echo $message;
echo 'Save Completed!';
mysql_close($link);