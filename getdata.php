        

<?php
/*<! DOCUMENT TYLE HTML>
<html>
<header>
       <meta http-equiv=Content-Type content="text/html; charset=tis-620"> 
</header>
<body>
 */


$data = [
        'action' => "GET"
];
$post = json_encode($data);
$headers = array('Content-Type: application/json');
$url = 'http://ismartfun.com/lineview.php';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
echo $result;
/*
$datas = json_decode($result, true);
curl_close($ch);
//echo $result . "\r\n";

echo "<table><td>ID<td>MESSAGE<td>TIME<tbody>";

foreach($datas as $row)
{
        echo "<tr><td>".$row['ID']."<td>".$row['MESSAGE']."<td>".$row['TIMESTAMP'];
}
echo "</tbody></table>";
</body>
</html>
*/




?>
