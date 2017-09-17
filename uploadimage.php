<!DOCTYPE html>
<html>
<header>
       <meta http-equiv=Content-Type content="text/html; charset=tis-620"> 
</header>
<body>        

<?php
//klEpBwCOrxZN1BzFo7FE6EFdExc6yZXQfo83y6NyL25    line gjsayhi
if(empty($_FILES['image']) === false)
{
    $image_temp = $_FILES['image'] ['tmp_name'];
    echo $image_temp;
    if (function_exists('curl_file_create')) { // php 5.5+
        $cFile = curl_file_create($image_temp);
      } else { // 
        $cFile = '@' . realpath($image_temp);
      }
    $image_name = $_FILES['image'] ['name'];
    $image_size = $_FILES['image'] ['size'];
    $image_ext = strtolower(end(explode('.', $image_name)));
    if ($image_size > 2097152*5) {
                    echo 'Maximum filesize is 10 MB';
    }
    else {
        $file_name = 'line_img.'.$image_ext;
	$data = [
        'temp' => $cFile,
        'fname'  => $file_name
	];
	$post = json_encode($data);
	$headers = array('Content-Type: application/json');
	$url = 'http://ismartfun.com/lineimage.php';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	echo $result;
    }  
}


?>
    
 <form id="upload_form" action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
           <label>File input</label>
           <input type="file" name="image" id="file1" accept="image/*"  required>
    </div>

   <input type="submit" value="Upload">
 </form>
</body>
</html>