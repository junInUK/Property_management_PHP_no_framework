<?php

function myUploadFile($file)
{
  var_dump($file);
  if(is_uploaded_file($_FILES["image"]["tmp_name"])){
    //  define what king of type can be uploaded
    $allowType = ['image/png', 'image/jpeg', 'image/gif', 'image/jpg'];
    $type = $_FILES["image"]["type"];
    //  check if the type allowed
    if(!in_array($type, $allowType)){
      exit("file type is not allowed!");
    }

    //  check file size
    if($_FILES["image"]["size"] > 1024*1024*8)  //  file cannot large than 8M bytes
    {
      exit("file cannot over 8M bytes!");
    }

    //  set new filename
    $filename = date('YmdHis', strtotime('now')).rand(1000,9999);

    //  get the extension name of the file
    $name = $_FILES["image"]["name"];
    //  get the filename string
    $filestr = explode('.',$name);
    $ext = array_pop($filestr);

    //  generate the new full file name
    $newfilename = $filename.'.'.$ext;

    //  generate file path
    $newfilePath = '../uploads/'.$newfilename;

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $newfilePath)){

    }else {
      echo "upload file failed.";
      return NULL;
    }
    return $newfilePath;
  }else{
    echo "This is not the uploaded file.";
    return NULL;
  }
}
