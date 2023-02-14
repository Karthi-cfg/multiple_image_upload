<?php

include 'db.php';

// if(isset($_POST['submit'])) {

//     $extension = array('jpeg','jpg', 'png', 'gif');
//     foreach ($_FILES['image']['tmp_name'] as $key => $value) {

//       echo $filename = $_FILES['image']['name'][$key];
//         $filename_tmp = $_FILES['image']['tmp_name'][$key];

//         echo '<br>';

//         $ext = pathinfo($filename, PATHINFO_EXTENSION);
//         print_r($ext);

//         $finalimg = '';
//         $filename = md5(date('Y-m-d H:i:s:u')). "." .$ext;
//         if(in_array($ext, $extension)) {
           
//             if(!file_exists('uploads/' . $filename)) {
//              move_uploaded_file( $filename_tmp, 'uploads/' .$filename);
//             $finalimg = $filename;
//         } else {
//             echo $filename = str_replace('.','-',basename($filename,$ext));
//             echo $newfilename = $filename.time(). ".".$ext;
//             move_uploaded_file( $filename_tmp, 'uploads/' .$filename);
//             $finalimg = $newfilename;
//         }
//         $creattime = date('Y-m-d h:i:s');
//         $insertquery = "INSERT INTO `images` ( `image_name`, `image_createtime`) 
//         VALUES ('$finalimg', '$creattime');";

//         mysqli_query($db,$insertquery);

//         header('location: multidisplay.php');
//     } else {
//         //display error message 
//         echo 'file not uploaded';
//     }
// }
// }

if(isset($_POST['submit'])) {
    // print_r($_FILES);
    $imagecount = count($_FILES['image']['name']);
    // echo $imagecount;

    for($i=0;$i<$imagecount;$i++) {
        echo $imagename = $_FILES['image']['name'][$i];
        $imagetempname  = $_FILES['image']['tmp_name'][$i];
        $targetpath = "./uploads/" . $imagename;
        if(move_uploaded_file($imagetempname, $targetpath)) {
            $sql = "INSERT INTO multi_images(img)VALUES('$imagename')";
            $result = mysqli_query($db,$sql);
        }
        echo '<br>';
    }

    if($result) {
        header('location:multidisplay.php?msg=ins');
    }
}
?>

