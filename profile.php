<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="upload.php" method="POST" enctype="multipart/form-data">
<input type="file" name="images_files" id="image_files"><br><br>
<?php if(isset($_GET['error'])):?>

<span class="message" style="color: red;"><?php echo $_GET['error']?></span><?php endif;?>
<?php if(isset($_GET['success'])):?>

<span class="message" style="color: green;"><?php echo $_GET['success']?></span><?php endif;?>
<br><br>
<button type="submit" name="submit">Upload</button>

</form>


</body>
</html>

