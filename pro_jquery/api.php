<?php 

$action = $_POST['action'];
if (isset($action))
  $action();


function upload(){
    extract($_POST);
   $error_controller=array();
   $data=array();
    // files
    $filename = $_FILES["file"]['name'];
    $file_type = $_FILES["file"]['type'];
    $file_size = $_FILES["file"]['size'];
    $file_error = $_FILES["file"]['error'];
    $temp_directory = $_FILES["file"]['tmp_name'];
 
   
    $extension = explode(".",$filename);
    $actualExtension= strtolower(end($extension));

    $file_extensions=array("jpg","jpeg","png","gif");

    if (in_array($actualExtension,$file_extensions)){
        if($file_size<=5242880){
            if ($file_error==0){
                $file_destination="../uploads/".rand().$filename.".".$actualExtension;
                move_uploaded_file($temp_directory,$file_destination);
                $error_controller=array("message"=>"Sucessfully Uploaded 😊😊","success"=>true);

            }
            else
            $error_controller=array("message"=>"Something Went Wrong While Uploading The File..","success"=>false);
             
        }
        else
          $error_controller=array("message"=>"File Size Must Be Less Then 5MB","success"=>false);
    }
    else
       $error_controller=array("message"=>"Files That Has .".$actualExtension." Extensions Is Not Allowed","success"=>false);

   
    echo json_encode($error_controller);
}



?>