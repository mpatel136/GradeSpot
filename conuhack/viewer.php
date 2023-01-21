<?php
if (isset($_FILES["pdf-file"]) && $_FILES["pdf-file"]["error"] == UPLOAD_ERR_OK) {
    $file_name = $_FILES["pdf-file"]["name"];
    $file_tmp = $_FILES["pdf-file"]["tmp_name"];
    $upload_dir = 'uploads/';
    if(move_uploaded_file($file_tmp, $upload_dir . $file_name)){
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename='$file_name'");
        readfile($upload_dir . $file_name);
    }else{
        echo "error while uploading the file";
    }
} else {
    echo 'An error occurred while uploading the file. Please try again later.';
}
?>
