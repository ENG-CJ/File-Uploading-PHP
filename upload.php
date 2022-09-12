<?php
if (isset($_POST['submit']))
  {
    // file name
    $filename= $_FILES['images_files']['name'];
    $file_size = $_FILES['images_files']['size'];
    $file_type = $_FILES['images_files']['type'];
    $temp_location = $_FILES['images_files']['tmp_name'];
    $file_error= $_FILES['images_files']['error'];
    // file extension
    $fileExtension=explode(".",$filename);
    $actualExtension= strtolower(end($fileExtension));

    // array extensions 
    $extensions= array("jpg","jpeg","png","gif");
   if(in_array($actualExtension,$extensions)){
        if($file_size<=5242880){
            if ($file_error==0)
            {
            $fileDestination="./uploads/".rand().$filename.".".$actualExtension;
            move_uploaded_file($temp_location,$fileDestination);
            header("Location: profile.php?success=Uploaded Successfully");
            }
            else
            header("Location: profile.php?error=Something Went Wrong While Image Uploading");

        }
        else
        header("Location: profile.php?error=File Size Is Too Big. Allowed Size 5MB");
   }else
      header("Location: profile.php?error=Files That Has [ .".$actualExtension." ] Extensions Is Not Allowed");
  }

?>